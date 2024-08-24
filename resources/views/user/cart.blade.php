<x-user>
    @php
        $firstItem = Cart::getContent()->first();
        $restaurant = $firstItem ? App\Models\Restaurant::find($firstItem->attributes->restaurent) : null;
        // $zone = $restaurant ? $restaurant->zones->get() : null;
    @endphp
    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
        <style>
            .cart_submit {
                background-color: var(--accent-color);
                border: none;
                color: var(--heading-color);
                border-radius: 4px;
                font-size: small;
            }
        </style>
    @endpush

    <section id="about" class="cart_section pb-5 bg-transparent">
        <div class="container section-title aos-init aos-animate mt-4" data-aos="fade-up">
            <h2>{{ __('sentence.cart') }}</h2>
            <p>{{ __('sentence.products') }}</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-8 col-sm-12">
                    <div class="table-responsive">
                        <table class="cart_table  table-responsive">
                            <thead class="table_head text-dark">
                                <th class="cart-product-remove" style="padding-left:20px;">{{ __('sentence.remove') }}
                                </th>
                                <th class="cart-product-image">{{ __('sentence.image') }}</th>
                                <th class="cart-product-info text-center">{{ __('sentence.name') }}</th>
                                <th class="cart-product-price">{{ __('sentence.price') }}</th>
                                <th class="cart-product-quantity text-center">{{ __('sentence.quantity') }}</th>
                                <th class="cart-product-subtotal text-center">{{ __('sentence.subtotal') }}</th>
                            </thead>
                            <tbody class="table_body">
                                @forelse (Cart::getContent() as $item)

                                    <tr>
                                        <td class="cart-product-remove text-start ps-4">
                                            <a class="cart-product-remove text-center"
                                                href="{{ url('/cart-destroy/' . $item->id) }}"><i class="bi bi-trash" style="color: var(--accent-color);"></i>
                                            </a>
                                        </td>

                                        @if (isset($item->attributes['restaurent']))
                                            @php
                                                $restuarant = App\Models\Restaurant::find(
                                                    $item->attributes['restaurent'],
                                                );
                                            @endphp
                                            <td class="cart-product-image">
                                                @if (isset($item->attributes['product']))
                                                    @php
                                                        $product = $item->attributes['product'];
                                                    @endphp
                                                    <a
                                                        href="{{ route('single.restaurant', ['restaurant' => $restuarant->slug, 'product' => $item->attributes['product']->id]) }}">
                                                        <img src="{{ $product->image ?? '' }}" alt="">
                                                    </a>
                                                @endif
                                            </td>
                                            @if (isset($item->attributes['product']))
                                                <td class="cart-product-info text-center">
                                                    <h4><a
                                                            href="{{ route('single.restaurant', ['restaurant' => $restuarant->slug, 'product' => $item->attributes['product']->id]) }}">{{ $item->name }}</a>
                                                    </h4>
                                                </td>
                                            @else
                                                <td class="cart-product-info text-center">
                                                    <h4><a href="#">{{ $item->attributes['extra']->name }}</a>
                                                    </h4>
                                                </td>
                                            @endif
                                        @endif


                                        <td class="cart-product-price">{{ number_format($item->price, 2) }}€</td>


                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item->id }}" />
                                            <td class="cart-product-quantity d-flex justify-content-center mt-3">
                                                <div class="text-start d-flex cart_quantity">
                                                    <div class="cart_quantity_item">
                                                        <input type="text" value="{{ $item->quantity }}"
                                                            name="quantity" class="text-center"
                                                            style="width: 100% !important; height: 100% !important; background-color: transparent !important;  border: 0 !important;outline: none; color:var(--heading-color);">
                                                    </div>
                                                    <div class="cart_quantity_item1">
                                                        <button type="submit" class="update_btn"><i
                                                                class="bi bi-pencil"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </form>
                                        <td class="cart-product-subtotal text-center">
                                            {{ number_format($item->price * $item->quantity, 2) }} €</td>
                                    </tr>

                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 order-2 order-lg-1 content p-md-0" style="height: 226px;">
                    <div class="cart_total_section">
                        <h4 class="ms-3 pt-2" style="">{{ __('sentence.cart') }} {{ __('sentence.total') }}
                        </h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table-responsive" style="width: 100%;">
                            <tbody class="me-2 ms-2">
                                <tr style="height: 40px; ">
                                    <td class="ps-4">{{ __('sentence.cart') }} {{ __('sentence.subtotal') }}</td>
                                    <td>{{ number_format(Cart::getSubTotal(), 2) }} €</td>
                                </tr>
                                <tr style="height: 40px;">
                                    <td class="ps-4">{{ __('sentence.shipping') }} & {{ __('sentence.handling') }}
                                    </td>
                                    <td>$00.00</td>
                                </tr>
                                <tr style="height: 40px;">
                                    <td class="ps-4">{{ __('sentence.vat') }}</td>
                                    <td>$00.00</td>
                                </tr>
                                <tr style="height: 40px;">
                                    <td class="ps-4"><strong>{{ __('sentence.order') }}
                                            {{ __('sentence.total') }}</strong></td>
                                    <td><strong id="order_total_display">{{ number_format(Cart::getTotal(), 2) }}
                                            €</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="btn-wrapper text-center pe-md-3">
                        @if (Cart::isEmpty())
                            <a href="{{ route('restaurant.home') }}"
                                class="checkout_btn">{{ __('sentence.proceedtocheckout') }}</a>
                        @else
                            <a href="{{ route('restaurant.checkout') }}"
                                class="checkout_btn">{{ __('sentence.proceedtocheckout') }}</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </section>
    @if (Cart::isEmpty())
        <a href="{{ route('restaurant.home') }}" class="checkout_btn">{{ __('sentence.gohome') }}</a>
    @else
        <section id="" class="extra_section pt-1 bg-transparent">
            <div class="container section-title aos-init aos-animate mt-5" data-aos="fade-up">
                <h2>{{ __('sentence.menu') }}</h2>
                <p>{{ __('sentence.estratitle') }}</p>
            </div>
            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="row text-center p-2">
                            @foreach ($extras as $extra)
                                {{-- @dd($extra); --}}

                                <div class="col-md-2 col-sm-6 d-flex align-items-center subcart2"
                                    style="flex-direction: column; justify-content: space-between;">
                                    <h5 class="ft-16 p-2 seccolr">{{ $extra->name }}</h5>
                                    <form action="{{ route('extra.store') }}" method="post">
                                        @csrf
                                        <div class="cart-product-quantity d-flex justify-content-center">
                                            <div class="cart-plus-minus">
                                                <div class="dec qtybutton"
                                                    onclick="changeQuantity(-1, '{{ $extra->id }}', {{ $extra->price }}, '{{ $extra->name }}')">
                                                    -</div>
                                                {{-- @dd($extra) --}}
                                                <input type="text" value="0" name="quantity"
                                                    class="cart-plus-minus-box"
                                                    id="extra_quantity_{{ $extra->id }}" min="1"
                                                    placeholder="0" data-price="{{ $extra->price }}"
                                                    data-name="{{ $extra->name }}" readonly>

                                                <div class="inc qtybutton"
                                                    onclick="changeQuantity(1, '{{ $extra->id }}', {{ $extra->price }}, '{{ $extra->name }}')">
                                                    +</div>
                                            </div>
                                        </div>
                                        <div class="pricetag justify-content-center">
                                            <div class="centerinput" style="width: 100px">
                                                <p style="font-weight: 100;" class="mb-0">
                                                    <input name="" id="price_{{ $extra->id }}"
                                                        style="width: 100px" class="p-0 text-center" readonly
                                                        value="0">
                                                    {{-- {{ $extra->price }} --}}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mb-2">

                                            {{-- <input type="hidden" name="quantity" id="form_quantity_{{ $extra->id }}"
                                            value="1"> --}}
                                            <input type="hidden" name="product_id" value="{{ $extra->id }}">
                                            <input type="hidden" name="price" id="{{ $extra->id }}"
                                                value="{{ $extra->price }}">
                                            <input type="hidden"
                                                name="restaurent_id"value="{{ $restaurant->id ?? '' }}">
                                            <button type="submit" id="add_cart_button_{{ $extra->id }}"
                                                class="cart_submit">{{ __('sentence.addtocart') }}</button>

                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
    @push('js')
        <script>
            function changeQuantity(change, id, price, name) {
                const quantityInput = document.getElementById(`extra_quantity_${id}`);
                const currentQuantity = Math.max(0, parseInt(quantityInput.value) + change);

                quantityInput.value = currentQuantity;
                document.getElementById(`price_${id}`).value = `${(currentQuantity * price).toFixed(2)}€`;

                // Update hidden form fields
                document.getElementById(`form_quantity_${id}`).value = currentQuantity;
                // document.getElementById(`form_price_${id}`).value = currentQuantity * price;

                // Enable or disable the "Add Cart" button based on the quantity
                const addButton = document.getElementById(`add_cart_button_${id}`);
                addButton.disabled = currentQuantity === 0;
            }
        </script>


        {{-- <script>
            function checkLoginStatus() {
                @if (auth()->check())
                    return true; // Allow form submission
                @else
                    alert('Please log in to proceed to checkout.');
                    return false; // Prevent form submission
                @endif
            }
        </script> --}}
    @endpush

</x-user>
