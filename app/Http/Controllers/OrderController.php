<?php

namespace App\Http\Controllers;

use App\Mail\DuePaidMail;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Transaction;
use App\Report\Earnings;
use App\Services\Payment;
use App\Services\PrinterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Cart;
use Settings;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $query = Order::latest()->filter();

        if ($user->role_id == 3) {
            $query->where('restaurant_id', $user->restaurant_id);
        }

        $allOrderCount = $query->get();
        
        $orders = $query->paginate(20)->withQueryString();

        $paidOrderCount = $query->where('status', 'PAID')->get();
        $unpaidOrderCount = $query->where('status', 'UNPAID')->get();
        $dueOrderCount = $query->where('status', 'DUE')->get();

        $restaurants = Restaurant::all();

        $data = [
            'total' => [
                'count' => $allOrderCount->count(),
                'sum' => $allOrderCount->sum('total')
            ],
            'paid' => [
                'count' => $paidOrderCount->count(),
                'sum' => $paidOrderCount->sum('total')
            ],
            'unpaid' => [
                'count' => $unpaidOrderCount->count(),
                'sum' => $unpaidOrderCount->sum('total')
            ],
            'due' => [
                'count' => $dueOrderCount->count(),
                'sum' => $dueOrderCount->sum('total')
            ]
        ];

        return view('pages.orders.list', compact('orders', 'data', 'restaurants'));
    }

    public function getChartData()
    {
        $eranings = Earnings::range(now()->subDays(15), now()->startOfDay())->graph();
        // dd($eranings);
        return response()->json(data: ['data' => $eranings]);
    }
    public function expedy_print(Order $order)
    {
        (new PrinterService($order))->sendToPrinter();
        return back()->with('success', 'Request Send to printer');
    }
    public function getChartDataMonth()
    {
        $earnings = Earnings::range(now()->subMonths(12), now())->graph('Month');

        if (count($earnings) > 0) {
            $months = [
                9,
                10,
                11,
                0,
                1,
                2,
                3,
                4,
                5,
                6,
                7,
                8,
            ];
            $currentMonth = date('n');

            $months = array_merge(array_slice($months, $currentMonth), array_slice($months, 0, $currentMonth));

            $data = [
                'sales' => [],
                'profit' => [],
            ];

            foreach ($months as $month) {
                $data['sales'][] = $earnings[$month]['sales'] ?? 0;
                $data['profit'][] = $earnings[$month]['total_profit'] ?? 0;
            }
        } else {
            $data = ['sales' => [], 'profit' => []];
        }

        return response()->json(['data' => $data]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        if (Cart::getTotalQuantity() == 0) {
            return redirect(url('/'));
        }
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
        ]);

        // Start a database transaction
        DB::beginTransaction();
        // try {

        $shipping = $request->only(['f_name', 'l_name', 'email', 'address', 'city', 'post_code', 'house', 'phone']);
        $extra_charge = Settings::setting('extra.charge');
        // Create the order
        $order = Order::create([
            'customer_id' => auth()->check() ? auth()->id() : null,
            'shipping_info' => json_encode($shipping),
            'sub_total' => Cart::getSubTotal(),
            'total' => Cart::getTotal() + $extra_charge,
            'tax' => Settings::totalTax(),
            'comment' => $request->input('commment'),
            'time_option' => $request->time_option,
            'payment_method' => $request->input('payment_method'),
            'delivery_option' => $request->input('delivery_option'),
            'restaurant_id' => session()->get('restaurent_id'),
        ]);

        $extra = [];
        foreach (Cart::getContent() as $item) {
            if (isset($item->attributes['options'])) {
                $options = $item->attributes['options'];
            } else {
                $options = null;
            }

            if (isset($item->attributes['product'])) {
                $order->products()->attach($item->attributes['product']->id, [
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'options' => $options,
                    'tax_amount' => Settings::itemTax($item->price, $item->attributes['tax'], $item->quantity),
                    'tax_percentage' => $item->attributes['tax']
                ]);
            }

            if (isset($item->attributes['extra'])) {
                $extra[] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'price' => $item->price,
                    'quantity' => $item->quantity,
                    'tax_amount' => Settings::itemTax($item->price, $item->attributes['tax'], $item->quantity),
                    'tax_percentage' => $item->attributes['tax']
                ];
            }
        }
        if (!empty($extra)) {
            $order->update([
                'extra' => json_encode($extra),
            ]);
        }
        // $order_mail = Settings::setting('order.mail');
        DB::commit();
        // $emails = array_filter([$request->email, $order->restaurent->email, $order_mail]);
        session()->forget('current_location');
        session()->forget('delivery_time');
        session()->forget('restaurent_id');
        session()->forget('address');
        session()->forget('restaurant');
        session()->forget('method');
        // Clear the cart and session data
        Cart::clear();


        return Payment::make($order);
    }






    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    public function invoice(Order $order)
    {
        return view('pages.orders.invoice', compact('order'));
    }
    public function errorpage()
    {
        return view('pages.errorPage.404');
    }
    public function duepay(Request $request)
    {
        $amount = $request->amount;
        $order = Order::find($request->order_id);
        if ($order->due >= $request->amount) {
            Transaction::create([
                'order_id' => $order->id,
                'amount' => $request->amount,
            ]);
            $order->update([
                'paid' => $order->paid + $request->amount,
                'due' => $order->due - $request->amount,
            ]);
            if ($order->due == 0) {
                $order->update([
                    'status' => 'PAID',
                ]);
            }
            if ($order->customer_id && $order->customer->email) {
                $customerEmailTo = $order->customer->email;

                try {
                    Mail::to($customerEmailTo)->send(new DuePaidMail($order, $amount));
                } catch (\Exception $e) {
                    return response()->json(['error' => 'Failed to send email to customer.']);
                }
            }
            // dd($order);
            return back()->with('success', 'Transaction create successfully');
        } else {
            return back()->withErrors('Transaction amount grater, then order due');
        }
    }
    public function mark_pay(Request $request)
    {
        // dd($request->orders);
        if ($request->orders == !null) {
            foreach ($request->orders as $item) {
                $order = Order::findOrFail($item);
                $order->update([
                    'status' => 'PAID',
                    'payment_status' => 'PAID',
                ]);
            }
            return back()->with('success', 'Mark as paid successfuly complete');
        } else {
            return back()->withErrors('Please at least one item select');
        }
    }
    public function mark_delivered(Order $order)
    {
        $order->update([
            'delivered' => 1,
            'status' => 'PAID',
            'payment_status' => 'PAID',
        ]);
        return back()->with('success', 'Order marked as delivered successfully');
    }
}
