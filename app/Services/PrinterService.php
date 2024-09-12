<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Settings; 

class PrinterService
{


    protected Order $order;
    protected Restaurant $restaurant;
    protected $config;
    protected $orderBody;
    protected $message = '';
    public $response;


    public function __construct(Order $order)
    {
        $this->order = $order;
        $this->restaurant = $order->restaurent;
        $this->setConfig();
        $this->setOrderBody();
        $this->makeMessage();
    }


    protected function setConfig()
    {
        $this->config = [
            'print_on' => $this->restaurant->enable_printer ? true : false,
            'printer_size' => 80,
            'printer_uid' => $this->restaurant->getPrinterCreds('printer_id'),
            // 'printer_uid' => '4TMPLAFUYKH',
            'printer_uid_backup' => 'TEST_UID_BACKUP',
            'sms_num' => $this->restaurant->number,
            'print_nb' => 1,
            'multistore' => '1:TEST_UID',
            'time_shift' => 0,
            'logo_url' => Storage::url(Settings::setting('site.logo')),
            'title' => $this->restaurant->name,
            'company' => $this->restaurant->name,
            'company_id' => $this->restaurant->id,
            'adr1' => $this->restaurant->fullAddress(),
            'adr2' => $this->restaurant->fullAddress(),
            'zip' => $this->restaurant->fullAddress('post_code'),
            'city' => $this->restaurant->fullAddress('city'),
            'phone' => $this->restaurant->number,
            'email' => $this->restaurant->email,
            'sid' => $this->restaurant->getPrinterCreds('sid'),
            'token' => $this->restaurant->getPrinterCreds('token'),
            // 'sid' => '6638e275f8c972bef91bb4e3cd8134af3556c23d',
            // 'token' => '79bdb4e5e695e9a6dc0eee251a441f5211e225b9',
            'short_opts' => 1
        ];
    }

    protected function setOrderBody()
    {

        $this->orderBody = (object) [
            'id' => $this->order->id,
            'created_at' => $this->order->created_at->format('Y-m-d H:i:s'),
            'payment_method_title' => ucwords($this->order->payment_method),
            'shipping_method_title' => ucwords(str_replace('_', ' ', $this->order->delivery_option)),
            'delivery_date' => now()->format('Y-m-d'),
            'delivery_time' =>  $this->order->time_option,
            'shipping' => (object) [
                'first_name' => $this->order->getShipping('f_name'),
                'last_name' => $this->order->getShipping('l_name'),
                'email' => $this->order->getShipping('email'),
                'address_1' => $this->order->delivery_option != 'take_away' ? $this->order->getShipping('house') . ',' . $this->order->getShipping('city') . ' ' . $this->order->getShipping('post_code') : '',
                'address_2' => $this->order->getShipping('address'),
                'postcode' => $this->order->getShipping('post_code'),
                'city' => $this->order->getShipping('city'),
                'phone' => $this->order->getShipping('phone'),
            ],
            'products' => (object) $this->order->getProducts()->toArray(),
            'total' => $this->order->total,
            'vendor_id' => $this->order->restaurant_id
        ];
    }

    protected function makeMessage()
    {


        $msg = '';

        // Logo
        if (!empty($this->config['logo_url'])) {
            $msg .= '<IMG>' . $this->config['logo_url'] . '</IMG>';
        }

        // Header
        $msg .= "<C><BOLD>{$this->config['title']}</BOLD></C>\n";
        $msg .= "{$this->config['company']}\n";
        $msg .= "{$this->config['company_id']}\n";
        $msg .= "{$this->config['adr1']}\n";
        $msg .= "{$this->config['adr2']}\n";
        $msg .= "{$this->config['zip']} {$this->config['city']}\n";
        $msg .= "Tel: {$this->config['phone']} | Email: {$this->config['email']}\n";
        $msg .= "--------------------------------\n";

        // Order Reference and Date
        $order_date_created = $this->orderBody->created_at;
        $msg .= "Commande: {$this->orderBody->id}\nDate: {$order_date_created}\n";

        // Payment Method
        $payment_method = $this->orderBody->payment_method_title == 'Card' ? 'PEL' : 'RESTO';
        $msg .= "Paiement: " . ucfirst($payment_method) . "\n";

        // Delivery Method and Time
        $msg .= "Mode Livraison: " . ($this->orderBody->shipping_method_title ?? 'N/A') . "\n";
        $msg .= "Date: " . ($this->orderBody->delivery_date ?? 'N/A') . "\n";
        $msg .= "Heure: " . ($this->orderBody->delivery_time ?? 'N/A') . "\n";

        // Shipping Address
        $shipping = $this->orderBody->shipping;
        if ($shipping) {
            $msg .= "Adresse Livraison:\n";
            $msg .= "{$shipping->first_name} {$shipping->last_name}\n";
            $msg .= "{$shipping->email}\n";

            $msg .= "{$shipping->address_1}\n";
            if ($shipping->address_2) {
                $msg .= "{$shipping->address_2}\n";
            }
            $msg .= "{$shipping->postcode} {$shipping->city}\n";
        }

        // Products
        $msg .= "Produits:\n";
        foreach ($this->orderBody->products as $product) {
            $productName = $product->name;
            if(isset($product->category)){
                $category = $product?->category?->name;
            }else{
                $category = '';
            }
            
            $quantity = $product->quantity;
            $price = number_format($product->price, 2, '.', '') . '€';
            $msg .= "{$quantity} x {$category} - {$productName} - {$price}\n";

            // Handle suboptions if any
            $suboptions = $product->options ?? [];
            foreach ($suboptions as $suboption) {
                $msg .= "   • {$suboption}\n";
            }
        }
        $extras = json_decode($this->order->extra, true) ?? [];
        foreach ($extras as $item) {
            $price = number_format($item['price'], 2, '.', '') . '€';
            $msg .= "{$item['quantity']} x {$item['name']} - {$price} \n";
        }
        // Totals
        $msg .= "--------------------------------\n";
        $msg .= "Total: " . number_format($this->orderBody->total, 2, '.', '') . "€\n";


        $msg .= "Magasin:\n{$this->config['adr1']}\n{$this->config['adr2']}\n{$this->config['zip']} {$this->config['city']}\n";
        $msg .= "<CUT/>";

        $this->message = iconv('UTF-8', 'ASCII//TRANSLIT', strtoupper($msg));
    }






    public function sendToPrinter()
    {

        if (!$this->config['print_on']) {
            return response()->json(['message' => 'Printing is disabled.'], 200);
        }
        $response = Http::withHeaders([
            'Authorization' => $this->config['sid'] . ':' . $this->config['token'],
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://www.expedy.fr/api/v2/printers/' . $this->config['printer_uid'] . '/print', [
            'printer_msg' =>  $this->message,
            'origin' => url('/')
        ]);
        $this->response = $response->body();
        return $this->response;
    }
}
