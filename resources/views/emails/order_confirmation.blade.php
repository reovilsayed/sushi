@extends('layouts.email')
@section('content')

    <x-emails.tableImage :logo="asset('images/orderSuccess.jpg')" />
    @php
        $previousDues = $order->customer->orders->where('id', '!=', $order->id)->where('due', '!=', 0);
        $extras = json_decode($order->extra, true) ?? [];
        $customer = json_decode($order->shipping_info, true);
    @endphp
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding: 0 27px;">
        <tbody>
            <tr>
                <td>
                    <div class="title title-2 text-center">
                        <h2 style="font-size: 20px;font-weight: 700;margin: 24px 0 0;">Thank You for
                            Your Purchase!
                        </h2>
                        <p
                            style="font-size: 14px;margin: 5px auto 0;line-height: 1.5;color: #939393;font-weight: 500;width: 70%;">
                            Thank you for choosing our service. Your purchase has been successful. If
                            you have any questions or need further assistance, feel free to contact us.
                        </p>
                        {{-- @dd($restaurant->name) --}}
                        <p
                            style="font-size: 14px;margin: 5px auto 0;line-height: 1.5;color: #939393;font-weight: 500;width: 70%;">
                            Best regards, {{ $order->restaurent->name ?? '' }}</p>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    {{-- @dd($customer['f_name']); --}}
    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="padding: 0 27px;">
        <tbody>
            <tr>
                <td>
                    <div class="title title-2 text-start">
                        <h2 style="font-size: 20px;font-weight: 700;margin: 24px 0 0; margin-bottom: 15px;">Customer Information
                        </h2>
                        {{-- <p style="font-size: 14px;margin: 5px auto 0;line-height: 1.5;color: #939393;font-weight: 500;width: 70%;">
                            
                        </p>
                       
                        <p
                            style="font-size: 14px;margin: 5px auto 0;line-height: 1.5;color: #939393;font-weight: 500;width: 70%;">
                            Best regards, {{ $restaurant->name }}</p> --}}

                            <strong style="font-size:16px; font-weight:normal;color:#333333; margin-left: 30px;"><span style="font-weight:500;">Customer Name :</span> {{ $customer['f_name'] ?? '' }} {{ $customer['l_name'] ?? ''}}</strong><br>
                            <strong style="font-size:16px; line-height:24px; font-weight:normal;color:#333333; margin-left: 30px;"><span style="font-weight:500;">Customer email :</span> {{ $customer['email'] ?? ''}}</strong><br>
                            <strong style="font-size:16px; line-height:24px; font-weight:normal;color:#333333; margin-left: 30px;"><span style="font-weight:500;">Customer Phone :</span> {{ $customer['phone'] ?? ''}}</strong><br>
                            <strong style="font-size:16px; line-height:24px; font-weight:normal;color:#333333; margin-left: 30px;"><span style="font-weight:500;">Customer Address :</span> {{$customer['city'] ?? '' }} ,{{$customer['address'] ?? '' }} ,{{$customer['post_code'] ?? '' }} ,{{$customer['house'] ?? '' }}</strong><br>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
   

    <table class="shipping-table" align="center" border="0" cellpadding="0" cellspacing="0" width="100%"
        style="padding: 0 27px;">
        <thead>
            <tr>
                <th
                    style="font-size: 17px;font-weight: 700;padding-bottom: 8px;border-bottom: 1px solid rgba(217, 217, 217, 0.5);text-align: left; margin-top: 18px;">
                    Purchased Items</th>
            </tr>
        </thead>
        <tbody>
            <tr
                style="column-count: 1; column-rule-style: dashed; column-rule-color: rgba(82, 82, 108, 0.7); column-gap: 0; column-rule-width: 0; ">
                <td style="width: 100%;" align="center">
                    <table class="product-table" align="center" border="0" cellpadding="0" cellspacing="0"
                        width="100%">
                        <tbody>
                            @foreach ($order->products as $product)
                                <tr>
                                    <td style="padding: 28px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                        <img src="{{ $product->image ?? asset('img/images.png') }}"
                                            alt="{{ $product->name ?? 'Product Image' }}" />
                                    </td>
                                    <td style=" padding: 28px 0;border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                        <ul class="product-detail">
                                            <li>{{ $product->name }}
                                                {{-- @foreach ($product->options as $option)
                                                    <span style="color: #000; font-size: 13px;">({{ $option->name ?? '' }})</span>
                                                @endforeach --}}
                                            </li>
                                            {{-- <li>{{ $product->strength }}</li> --}}
                                            <li>QTY: <span>{{ $product->pivot->quantity }} </span></li>
                                            <li>Price:
                                                <span>{{ Settings::price($product->pivot->price) }}</span>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            @foreach ($extras as $extra)
                                {{-- @dd($extra['name'] ) --}}
                                <tr>
                                    <td style="padding: 28px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                        <img src="{{ asset('img/images.png') }}" alt="" />
                                    </td>
                                    <td style=" padding: 28px 0;border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                        <ul class="product-detail">
                                            <li>{{ $extra['name'] ?? '' }}
                                                {{-- <span
                                                    style="color: #000; font-size: 13px;">({{ $product->category?->name }})</span> --}}

                                                {{-- <li>{{ $product->strength }}</li> --}}
                                            <li>QTY: <span>{{ $extra['quantity'] ?? '' }}</span></li>
                                            <li>Price:
                                                <span>{{ Settings::price($extra['price'] ?? '') }}</span>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </td>

                {{-- <td style="width: 100%;">
                                    <table class="dilivery-table" align="center" border="0" cellpadding="0"
                                        cellspacing="0" width="100%"
                                        style="background-color: #F7F7F7; padding: 14px;">
                                        <tbody>
                                            <tr>
                                                <td style="font-weight: 700; font-size: 17px; padding-bottom: 15px; border-bottom: 1px solid rgba(217, 217, 217, 0.5);"
                                                    colspan="2">Order summary</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="text-align: left; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                                    Subtotal</td>
                                                <td
                                                    style="text-align: right; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                                    {{ $order->sub_total }}</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="text-align: left; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                                    Discount</td>
                                                <td
                                                    style="text-align: right; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                                    {{ $order->discount }}</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="text-align: left; font-size: 15px; font-weight: 600; padding-top: 15px; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                                    Paid</td>
                                                <td
                                                    style="text-align: right; font-size: 15px; font-weight: 600; padding-top: 15px; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                                    {{ $order->paid }}</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="text-align: left; font-size: 15px; font-weight: 600; padding-top: 15px; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                                    Due</td>
                                                <td
                                                    style="text-align: right; font-size: 15px; font-weight: 600; padding-top: 15px; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                                    {{ $order->due }}</td>
                                            </tr>
                                            <tr>
                                                <td
                                                    style="text-align: left; font-size: 15px; font-weight: 600; padding-top: 15px;">
                                                    Total</td>
                                                <td
                                                    style="text-align: right; font-size: 15px; font-weight: 600; padding-top: 15px;">
                                                    {{ $order->total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td> --}}
            </tr>
            <tr
                style="column-count: 1; column-rule-style: dashed; column-rule-color: rgba(82, 82, 108, 0.7); column-gap: 0; column-rule-width: 0;">


                <td style="width: 100%;" align="center">
                    <table class="dilivery-table" align="center" border="0" cellpadding="0" cellspacing="0"
                        width="100%" style="background-color: #F7F7F7; padding: 14px;">
                        <tbody>
                            <tr>
                                <td style="font-weight: 700; font-size: 17px; padding-bottom: 15px; border-bottom: 1px solid rgba(217, 217, 217, 0.5);"
                                    colspan="2">Order summary</td>
                            </tr>
                            <tr>
                                <td
                                    style="text-align: left; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                    Delivery Time</td>
                                <td
                                    style="text-align: right; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                    {{ $order->time_option }}</td>
                            </tr>
                            <tr>
                                <td
                                    style="text-align: left; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                    Subtotal</td>
                                <td
                                    style="text-align: right; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                    {{ Settings::price($order->sub_total) }}</td>
                            </tr>
                            {{-- <tr>
                                <td
                                    style="text-align: left; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                    Discount</td>
                                <td
                                    style="text-align: right; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                    {{ Settings::price($order->discount) }}</td>
                            </tr> --}}

                            <tr>
                                <td
                                    style="text-align: left; font-size: 15px; font-weight: 600; padding-top: 15px; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                    Total</td>
                                <td
                                    style="text-align: right; font-size: 15px; font-weight: 600; padding-top: 15px; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                    {{ Settings::price($order->total) }}</td>
                            </tr>
                            <tr>
                                <td
                                    style="text-align: left; font-size: 15px; font-weight: 600; padding-top: 15px; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                    Paid</td>
                                <td
                                    style="text-align: right; font-size: 15px; font-weight: 600; padding-top: 15px; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                    {{ Settings::price($order->paid) }}</td>
                            </tr>
                            <tr>
                                <td style="text-align: left; font-size: 15px; font-weight: 600; padding-top: 15px; ">
                                    Due</td>
                                <td style="text-align: right; font-size: 15px; font-weight: 600; padding-top: 15px;">
                                    {{ Settings::price($order->due) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            @if ($previousDues->count() > 0)
                <tr style="height: 30px;"></tr>

                <tr
                    style="column-count: 1; column-rule-style: dashed; column-rule-color: rgba(82, 82, 108, 0.7); column-gap: 0; column-rule-width: 0;">


                    <td style="width: 100%;" align="center">
                        <table class="dilivery-table" align="center" border="0" cellpadding="0" cellspacing="0"
                            width="100%" style="background-color: #F7F7F7; padding: 14px;">
                            <tbody>
                                <tr>
                                    <td style="font-weight: 700; font-size: 17px; padding-bottom: 15px; border-bottom: 1px solid rgba(217, 217, 217, 0.5);"
                                        colspan="2">Previous Dues</td>
                                </tr>
                                @foreach ($previousDues as $order)
                                    <tr>
                                        <td
                                            style="text-align: left; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                            Order Id: {{ $order->id }}</td>
                                        <td
                                            style="text-align: left; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                            Order Created: {{ $order->created_at->format('d-M-y') }}
                                        </td>
                                        <td
                                            style="text-align: right; font-size: 15px; font-weight: 400; padding: 15px 0; border-bottom: 1px solid rgba(217, 217, 217, 0.5);">
                                            Due: {{ Settings::price($order->due) }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    {{-- <td colspan="2"
                                                        style="text-align: left; font-size: 15px; font-weight: 600; padding-top: 15px; ">
                                                    </td> --}}
                                    <td colspan="3"
                                        style="text-align: right; font-size: 15px; font-weight: 600; padding-top: 15px;">
                                        Total Due {{ Settings::price($previousDues->sum('due')) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            @endif

        </tbody>
    </table>

@endsection
