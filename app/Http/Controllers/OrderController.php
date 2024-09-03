<?php

namespace App\Http\Controllers;

use App\Facades\Settings\Settings as SettingsSettings;
use App\Mail\DuePaidMail;
use App\Mail\OrderConfirmationMail;
use App\Mail\UserCreateMail;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\Transaction;
use App\Models\User;
use App\Report\Earnings;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Http;
use Settings;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::latest()->filter()->paginate(20)->withQueryString();
        $allOrderCount = Order::filter()->get();
        $paidOrderCount = Order::filter()->where('status', 'PAID')->get();
        $unpaidOrderCount = Order::filter()->where('status', 'UNPAID')->get();
        $dueOrderCount = Order::filter()->where('status', 'DUE')->get();
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
        return response()->json(['data' => $eranings]);
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
        if (!auth()->check()) {
            $request->validate([
                'f_name' => 'required|string|max:255',
                'l_name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email'
            ]);
        }
        // Start a database transaction
        DB::beginTransaction();

        try {

            // Handle user authentication
            if (!auth()->check()) {

                $pass = Str::random(16);
                $user = User::create([
                    'name' => $request->input('f_name') ?? $request->input('f_name'),
                    'l_name' => $request->input('l_name') ?? $request->input('l_name'),
                    'email' => $request->input('email') ?? $request->input('email'),
                    'role_id' => 2,
                    'password' => Hash::make($pass), // Generate a random password
                ]);

                $data = [
                    'name' => $request->name,
                    'subject' => 'We Create User Account to Sushi',
                    'body' => 'Name:' . $user->name . '<br>' . 'Last Name:' . $user->l_name . '<br>' . 'Email:' . $user->email . '<br>' . 'Password:' . $pass,
                    'button_link' => '',
                    'button_text' => '',
                ];
                Mail::to($user['email'])->send(new UserCreateMail($data));
            } else {

                $user = auth()->user();
            }

            // Prepare shipping information
            $shipping = $request->only(['f_name', 'l_name', 'email', 'address', 'city', 'post_code', 'house', 'phone']);
            $extra_charge = Settings::setting('extra.charge');
            // Create the order
            $order = Order::create([
                'customer_id' => $user->id,
                'shipping_info' => json_encode($shipping),
                'sub_total' => Cart::getSubTotal(),
                'total' => Cart::getTotal()+ $extra_charge,
                'comment' => $request->input('commment'),
                'time_option' => $request->time_option,
                'payment_method' => $request->input('payment_method'),
                'delivery_option' => $request->input('delivery_option'),
                'restaurant_id' => session()->get('restaurent_id'),
            ]);

            $extra = [];
            foreach (Cart::getContent() as $item) {

                if (isset($item->attributes['product'])) {
                    $order->products()->attach($item->attributes['product']->id, [
                        'quantity' => $item->quantity,
                        'price' => $item->price,
                    ]);
                }

                if (isset($item->attributes['extra'])) {
                    $extra[] = [
                        'id' => $item->id,
                        'name' => $item->name,
                        'price' => $item->price,
                        'quantity' => $item->quantity,
                    ];
                }
            }
            if (!empty($extra)) {
                $order->update([
                    'extra' => json_encode($extra),
                ]);
            }
            $order_mail = Settings::setting('order.mail');

            $emails = array_filter([$order->customer->email, $order->restaurent->email, $order_mail]);

            foreach ($emails as $email) {
                if (!empty($email)) {
                    Mail::to($email)->send(new OrderConfirmationMail($order));
                }
            }
            session()->forget('current_location');
            session()->forget('delivery_time');
            session()->forget('restaurent_id');
            // Clear the cart and session data
            Cart::clear();
            DB::commit();
            // if ($request->payment_method == 'Card') {
            //     $amount = $order->total * 100;
            //     $orderId = $order->id;
            //     $merchantId = '083262709500018';
            //     $secretKey = 'iPPdH5CgxCQV05UiWF5tK4tsu1wcWwbHL2KZWiFCDY0';
            //     $keyVersion = 3;
            //     $normalRetrunUrl = url('payment/callback');
            //     $currencyCode = 978;

            //     $transactionReference = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);

            //     $interfaceVersion = "HP_3.2";

            //     $data = 'amount=' . $amount . '|s10TransactionReference.s10TransactionId=' . $transactionReference . '|currencyCode=' . $currencyCode . '|merchantId=' . $merchantId . '|normalReturnUrl=' . $normalRetrunUrl . '|orderId=' . $orderId . '|keyVersion=' . $keyVersion;

            //     $seal = hash('sha256', mb_convert_encoding($data, 'UTF-8') . $secretKey);

            //     $response = Http::asForm()->post('https://sherlocks-payment-webinit.secure.lcl.fr/paymentInit', [
            //         'DATA' => $data,
            //         'SEAL' => $seal,
            //         'interfaceVersion' => $interfaceVersion,
            //     ]);
            //     return $response->body();
            // }

            return redirect()->route('thank_you');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'There was an issue placing your order. Please try again.');
        }
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
        $amount = $request->amount;
        if ($request->orders == !null) {

            foreach ($request->orders as $item) {
                $order = Order::findOrFail($item);
                Transaction::create([
                    'order_id' => $order->id,
                    'amount' => $order->due,
                ]);
                $order->update([
                    'paid' => $order->paid + $order->due,
                    'due' => 0,
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
            return back()->with('success', 'Mark as paid successfuly complete');
        } else {
            return back()->withErrors('Please at least one item select');
        }
    }
    public function mark_delivered(Order $order)
    {
        $order->update([
            'delivered' => 1
        ]);
        return back()->with('success', 'Order marked as delivered successfully');
    }
}
