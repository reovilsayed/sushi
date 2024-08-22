@php
    $extras = json_decode($order->extra, true) ?? [];
    $restaurant = App\Models\Restaurant::find($order->products()->first()->pivot->restaurant_id);
@endphp
{{-- @dd($extras) --}}
<x-user>
    <br><br><br>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <button onclick="printDiv('printarea')" class="btn me-1 mb-2 forget-button "><i
                        class="fa fa-print me-2  "></i> Print</button>
                <div class="card bg-transparent "  id="printarea" style="border: 2px solid var(--accent-color)">
                    <div class="card-body bg-transparent">
                        {{-- @if ($order->notes)
                            <div class="text-start">

                                <span class="text-danger fw-bolder fs-6">Note: {{ $order->notes }}</span>
                            </div>
                        @endif --}}
                        <hr class="mt-3 mb-4">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="text-muted">
                                    <h5 class="font-size-16 mb-3">Billed To:</h5>

                                    <h5 class="font-size-15 mb-2 text-colour">
                                        {{ $order->customer->name ?? 'Walk in customer' }}
                                        {{ $order->customer->l_name ?? '' }}
                                    </h5>
                                    {{-- <p class="mb-1">{{ $order->customer->address }}</p> --}}
                                    <p class="mb-1 text-colour">{{ $order->customer->email }}</p>
                                    {{-- <p   >{{ $order->customer->phone }}</p> --}}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="text-muted text-sm-end">
                                    <div>
                                        <h5 class="font-size-15 mb-1">Invoice No:</h5>
                                        <p class="text-colour">#{{ $order->id }}</p>
                                    </div>
                                    <div class="mt-4">
                                        {{-- @dd($order->products) --}}
                                        <h5 class="font-size-15 mb-1">Restaurant Name:</h5>
                                        <p class="text-colour">{{ $restaurant->name ?? '' }}</p>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1">Invoice Date:</h5>
                                        <p class="text-colour">{{ $order->created_at->format('F j, Y, g:i a') }}</p>

                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-size-15 mb-1" >Delivery Time:</h5>
                                        <p class="text-colour">{{ $order->time_option }}</p>
                                    </div>


                                </div>
                            </div>

                        </div>


                        <div class="py-2">
                            <h5 class="font-size-15">Order Summary</h5>

                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap table-centered mb-0 bg-transparent">
                                    <thead>
                                        <tr>
                                            <th class="bg-transparent text-colour" style="width: 70px; ">No.</th>
                                            <th class="bg-transparent text-colour">Item</th>
                                            <th class="bg-transparent text-colour">Quantity</th>
                                            <th class="text-end bg-transparent text-colour">Price</th>
                                            <th class="text-end bg-transparent text-colour" style="width: 120px;">Total
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @dd($order ) --}}
                                        @foreach ($order->products as $product)
                                            <tr>
                                                <th class="bg-transparent text-light" scope="row">{{ $product->id }}
                                                </th>
                                                <td class="bg-transparent text-light">
                                                    <div>
                                                        <h5 class="text-truncate  font-size-14 mb-1">
                                                            {{ $product->name }}
                                                            {{ $product->strength }}
                                                        </h5>
                                                        <p class="text-light mb-0">{{ $product->category->name }}</p>
                                                    </div>
                                                </td>
                                                <td class="bg-transparent text-light">{{ $product->pivot->quantity }}
                                                </td>
                                                <td class="text-end bg-transparent text-light">
                                                    {{ Settings::price($product->pivot->price) }}</td>
                                                <td class="text-end bg-transparent text-light">
                                                    {{ Settings::price($product->pivot->price * $product->pivot->quantity) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        @foreach ($extras as $item)
                                            <tr>
                                                <th class="bg-transparent text-light" scope="row">
                                                    {{ $item['id'] }}</th>
                                                <td class="bg-transparent text-light">
                                                    <div>
                                                        <h5 class="text-truncate font-size-14 mb-1">{{ $item['name'] }}
                                                        </h5>
                                                        {{-- <p class="text-muted mb-0">{{ $product->category->name }}</p> --}}
                                                    </div>
                                                </td>
                                                <td class="bg-transparent text-light">{{ $item['quantity'] }}</td>
                                                <td class="text-end bg-transparent text-light">
                                                    {{ Settings::price($item['price']) }}</td>
                                                <td class="text-end bg-transparent text-light">
                                                    {{ Settings::price($item['price'] * $item['quantity']) }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th scope="row" colspan="4"
                                                class="text-end bg-transparent text-light">Sub Total</th>
                                            <td class="text-end bg-transparent text-light">
                                                {{ Settings::price($order->sub_total) }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" colspan="4"
                                                class="border-0 text-end bg-transparent text-light">Total</th>
                                            <td class="border-0 text-end bg-transparent text-light">
                                                <h4 class="m-0 fw-semibold">{{ Settings::price($order->total) }}</h4>
                                            </td>
                                        </tr>

                                        {{-- <tr class="bg-success">
                                            <th scope="row" colspan="4"
                                                class="border-0 text-end bg-transparent text-light">
                                                Paid Ammount:</th>
                                            <td class="border-0 text-end bg-transparent text-light">
                                                {{ Settings::price($order->paid) }}
                                            </td>
                                        </tr>
                                        <tr class="bg-warning">
                                            <th scope="row" colspan="4"
                                                class="border-0 text-end bg-transparent text-light">
                                                Due Ammount :</th>
                                            <td class="border-0 text-end bg-transparent text-light">
                                                {{ Settings::price($order->due) }}
                                            </td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>

                            {{-- @if ($order->transactions->count() > 0)
                                <h5 class="font-size-15 mt-3">Due payment transaction history</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->transactions as $transaction)
                                            <tr>
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>
                                                    {{ Settings::price($transaction->amount) }}
                                                </td>
                                                <td>{{ $transaction->created_at->format('M d,Y') }}</td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
    </div>

    @push('js')
        <script>
            function printDiv(divName) {
                console.log(divName)
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;

                window.print();

                document.body.innerHTML = originalContents;
            }
        </script>
    @endpush
</x-user>
