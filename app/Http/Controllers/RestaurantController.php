<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Restaurant;
use App\Models\RestaurantZone;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    public function viewRestaurants()
    {
        $restaurants = Restaurant::latest()->get();
        return view('pages.restaurants.all-restaurant', compact('restaurants'));
    }
    public function createRestaurant()
    {
        $areas = RestaurantZone::all();
        return view('pages.restaurants.create', compact('areas'));
    }
    public function storeRestaurant(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);
        $api_key = [
            'merchantId' => $request->merchantId,
            'secretKey' => $request->secretKey,
        ];

        $restaurant = new Restaurant;

        $restaurant->name = $request->name;
        $restaurant->description = $request->description;
        $restaurant->email = $request->email;
        $restaurant->number = $request->number;

        $restaurant->address = $request->address;

        $restaurant->api_key = json_encode($api_key);
        $restaurant->key_version = $request->key_version;
        $restaurant->sid = $request->sid;
        $restaurant->token = $request->token;
        $restaurant->printer_id = $request->printer_id;
        $restaurant->serial_number = $request->serial_number;
        $restaurant->delivery_option = $request->delivery_option;
        $restaurant->status = $request->status;
        $restaurant->vat_number = $request->vat_number;

        $restaurant->enable_printer = isset($request->enable_printer);
        $restaurant->enable_payment = isset($request->enable_payment);

        $restaurant->slug = Str::slug($request->name);
        if ($request->hasFile('image')) {
            if ($restaurant->image && Storage::exists($restaurant->image)) {
                Storage::delete($restaurant->image);
            }
            $restaurant->image = $request->file('image')->store('restaurant', 'public');
        }

        $restaurant->save();
        return redirect(route('admin.restaurants'))->with('success', 'Restaurant Created Successfully');
    }
    public function editRestaurant(Restaurant $restaurant)
    {
        return view('pages.restaurants.edit', compact('restaurant'));
    }

    public function updateRestaurant(Request $request, Restaurant $restaurant)
    {

        if ($request->has('image')) {
            $image = $request->file('image')->store('restaurant', 'public');
            Storage::delete($request->image);
        } else {
            $image = $restaurant->image;
        }
        $api_key = [
            'merchantId' => $request->merchantId,
            'secretKey' => $request->secretKey,
            'key_version' => $request->key_version,
        ];
        $printer = [
            'sid' => $request->sid,
            'token' => $request->token,
            'printer_id' => $request->printer_id,
            'serial_number' => $request->serial_number,
        ];

        $restaurant->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $image,
            'description' => $request->description,
            'email' => $request->email,
            'number' => $request->number,
            'address' => $request->address,
            'delivery_option' => $request->delivery_option,
            'status' => $request->status,
            'vat_number' => $request->vat_number,
            'api_key' => json_encode($api_key),
            'printer' => json_encode($printer),
            'enable_printer' => isset($request->enable_printer),
            'enable_payment' => isset($request->enable_payment),

        ]);
        $restaurant->save();

        return redirect(route('admin.restaurants'))->with('success', 'Restaurant Updated Successfully');
    }
    public function destroyRestaurant(Restaurant $restaurant)
    {
        if ($restaurant->image && Storage::exists($restaurant->image)) {
            Storage::delete($restaurant->image);
        }

        $restaurant->delete();
        return redirect(route('admin.restaurants'))->with('success', 'Restaurant deleted');
    }
    public function printRestaurantOrder(Request $request, Restaurant $restaurant)
    {
        $fromDate = Carbon::createFromFormat('Y-m-d', $request->input('fromDate'))->startOfDay();
        $toDate = Carbon::createFromFormat('Y-m-d', $request->input('toDate'))->endOfDay();

        $orders = Order::whereBetween('created_at', [$fromDate, $toDate])->where('restaurant_id', $restaurant->id)->get();
        if ($orders->isEmpty()) {
            return back()->withErrors(['message' => 'Aucune commande trouvée pour la plage de dates sélectionnée.']);
        }
        $takeAwayOrders = $orders->where('delivery_option', 'take_away');
        $homeDeliveryOrders = $orders->where('delivery_option', 'home_delivery');
        $onlinePaymentOrder = $orders->where('payment_method', 'Card');
        $codOrder = $orders->whereNotIn('payment_method', ['Card']);
        $data = [
            'total' => $orders->count(),
            'takeAwayOrders' => $takeAwayOrders->count(),
            'homeDeliveryOrders' => $homeDeliveryOrders->count(),
            'onlinePaymentOrder' => $onlinePaymentOrder->count(),
            'onlinePaymentOrder' => $onlinePaymentOrder->count(),
            'codOrder' => $codOrder->count(),
            'total_amount' => number_format($orders->sum('total'), 2) . '€',
            'takeAwayOrders_amount' => number_format($takeAwayOrders->sum('total'), 2). '€',
            'homeDeliveryOrders_amount' => number_format($homeDeliveryOrders->sum('total'), 2). '€',
            'onlinePaymentOrder_amount' => number_format($onlinePaymentOrder->sum('total'), 2). '€',
            'codOrder_amount' => number_format($codOrder->sum('total'), 2). '€',
        ];

        $msg = '';

        $msg .= "<C><BOLD>{$restaurant->name}</BOLD></C>\n";
        $msg .= "DU: {$request->fromDate} AU: {$request->toDate} \n";
        $msg .= "Nb total commandes: {$data['total']}\n";
        $msg .= "Montant total commandes: {$data['total_amount']}\n";
        $msg .= "Nb a emporter: {$data['takeAwayOrders']}\n";
        $msg .= "Montant à emporter: {$data['takeAwayOrders_amount']}\n";
        $msg .= "Nb livraison: {$data['homeDeliveryOrders']}\n";
        $msg .= "Montant livraison: {$data['homeDeliveryOrders_amount']}\n";
        $msg .= "--------------------------------\n";

        // Products
        $msg .= "Commandes:\n";
        foreach ($orders as $order) {
            $payment_method = $order->payment_method == 'Card' ? 'PEL' : 'RESTO';
            $msg .= "{$order->id}   {$order->total}€  {$payment_method}\n";
        }

        $msg .= "--------------------------------\n";


        // Totals
        $msg .= "Paiement:\n";

        $msg .= "Nb PEL : {$data['onlinePaymentOrder']}\n";
        $msg .= "Montant PEL: {$data['onlinePaymentOrder_amount']}\n";
        $msg .= "Nb RESTO: {$data['codOrder']}\n";
        $msg .= "Montant RESTO: {$data['codOrder_amount']}\n";


        $msg .= "<CUT/>";


        $response = Http::withHeaders([
            'Authorization' => $restaurant->getPrinterCreds('sid') . ':' . $restaurant->getPrinterCreds('token'),
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
        ])->post('https://www.expedy.fr/api/v2/printers/' . $restaurant->getPrinterCreds('printer_id') . '/print', [
            'printer_msg' =>  $msg,
            'origin' => url('/')
        ]);
         return back()->withSuccess(['message' => 'Successfully printed']);
    }
}
