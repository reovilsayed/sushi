<x-user>
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
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
                                {{-- @dd(Cart::getContent()) --}}
                                @forelse (Cart::getContent() as $item)
                                
                                    {{-- @dd($item) --}}
                                    <tr>
                                        <td class="cart-product-remove text-start ps-4">
                                            <a class="cart-product-remove text-center"
                                                href="{{ url('/cart-destroy/' . $item->id) }}">x</a>
                                        </td>
                                        @if (isset($item->attributes['restaurent']))
                                            @php
                                                $restuarant = App\Models\Restaurant::find(
                                                    $item->attributes['restaurent'],
                                                );
                                            @endphp
                                            <td class="cart-product-image">
                                                <a
                                                    href="{{ route('single.restaurant', ['restaurant' => $restuarant->slug, 'product' => $item->model->id]) }}">
                                                    <img src="{{ Storage::url($item->image ?? '') }}"
                                                        alt="">
                                                </a>
                                            </td>
                                            <td class="cart-product-info text-center">
                                                <h4><a
                                                        href="{{ route('single.restaurant', ['restaurant' => $restuarant->slug, 'product' => $item->model->id]) }}">{{ $item->name }}</a>
                                                </h4>
                                            </td>
                                        @endif

                                        <td class="cart-product-price">{{ $item->price }}€</td>

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
                                                                class="fa-solid fa-pen-nib"></i></button>
                                                    </div>
                                                </div>
                                            </td>
                                        </form>
                                        <td class="cart-product-subtotal text-center">
                                            {{ $item->price * $item->quantity }} €</td>
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
                                    <td>{{ Cart::getSubTotal() }} €</td>
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
                                    <td><strong id="order_total_display">{{ Cart::getTotal() }} €</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="btn-wrapper text-center pe-md-3">
                        @if (Cart::isEmpty())
                            <a href="{{ route('restaurant.home') }}" class="checkout_btn">Proceed to checkout</a>
                        @else
                            <a href="{{ route('restaurant.checkout') }}" class="checkout_btn">Proceed to checkout</a>
                        @endif
                    </div> --}}

                </div>
            </div>
        </div>

    </section>
    <section id="" class="extra_section pt-1 bg-transparent">
        <div class="container section-title aos-init aos-animate mt-5" data-aos="fade-up">
            <h2>{{ __('sentence.menu') }}</h2>
            <p>{{ __('sentence.estratitle') }}</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-12">
                    <form action="{{ route('extras') }}" method="POST">
                        @csrf
                        <div class="row text-center p-2">
                            @foreach ($extras as $extra)
                                {{-- @dd($extra); --}}
                                <div class="col-md-2 col-sm-6 d-flex align-items-center subcart2"
                                    style="flex-direction: column; justify-content: space-between;">
                                    <h5 class="ft-16 p-2 seccolr">{{ $extra->name }}</h5>
                                    <div class="cart-product-quantity d-flex justify-content-center mt-3">
                                        <div class="cart-plus-minus">
                                            <div class="dec qtybutton"
                                                onclick="changeQuantity(-1, '{{ $extra->id }}', {{ $extra->price }}, '{{ $extra->name }}')">
                                                -</div>
                                            <input type="text" value="0"
                                                name="extras[{{ $extra->id }}][quantity]"
                                                class="cart-plus-minus-box" id="extra_quantity_{{ $extra->id }}"
                                                min="1" placeholder="0" data-price="{{ $extra->price }}"
                                                data-name="{{ $extra->name }}" readonly disabled>
                                            <div class="inc qtybutton"
                                                onclick="changeQuantity(1, '{{ $extra->id }}', {{ $extra->price }}, '{{ $extra->name }}')">
                                                +</div>
                                        </div>
                                    </div>
                                    <div class="pricetag justify-content-center">
                                        <div class="centerinput" style="width: 100px">
                                            <p style="font-weight: 100;">
                                                <input name="" id="price_{{ $extra->id }}"
                                                    style="width: 100px" class="p-0 text-center" readonly
                                                    value="0">
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Hidden inputs to store extra details -->
                                    <input type="hidden" name="extras[{{ $extra->id }}][name]"
                                        id="name_{{ $extra->id }}" value="" disabled>
                                    <input type="hidden" name="extras[{{ $extra->id }}][price]"
                                        id="hidden_price_{{ $extra->id }}" value="" disabled>

                                    <input type="hidden" name="product_id" value="" disabled>
                                </div>
                            @endforeach
                            <input type="hidden" name="total_price" id="total_price"
                                value="{{ Cart::getTotal() }}">
                            <div class="col-md-12 text-start mt-3 p-0">
                                <!-- Proceed to checkout button -->
                                <button type="submit" id="extraButton"
                                    {{ Cart::isEmpty() ? 'disabled' : '' }}>{{ __('sentence.proceedtocheckout') }}</button>

                                <!-- Message -->
                                @if (Cart::isEmpty())
                                    <p class="mt-2 text-danger">Please add products to the cart before selecting
                                        extras.</p>
                                    {{-- @elseif (!auth()->check())
                                    <p class="mt-2 text-danger">Please log in to proceed to checkout.</p> --}}
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @push('js')
        <script>
            function changeQuantity(change, id, price, name) {
                const quantityInput = document.getElementById(`extra_quantity_${id}`);
                const currentQuantity = Math.max(0, parseInt(quantityInput.value) + change);

                quantityInput.value = currentQuantity;
                document.getElementById(`price_${id}`).value = `${(currentQuantity * price).toFixed(2)}€`;

                document.getElementById(`hidden_price_${id}`).value = currentQuantity * price;
                document.getElementById(`name_${id}`).value = name;

                // Enable hidden inputs if quantity is greater than 0
                if (currentQuantity > 0) {
                    quantityInput.removeAttribute('disabled');
                    document.getElementById(`hidden_price_${id}`).removeAttribute('disabled');
                    document.getElementById(`name_${id}`).removeAttribute('disabled');
                } else {
                    quantityInput.setAttribute('disabled', true);
                    document.getElementById(`hidden_price_${id}`).setAttribute('disabled', true);
                    document.getElementById(`name_${id}`).setAttribute('disabled', true);
                }

                recalculateTotal();
            }

            function recalculateTotal() {
                const extrasTotal = [...document.querySelectorAll('.cart-plus-minus-box')].reduce((total, extra) =>
                    total + (parseFloat(extra.dataset.price) * parseInt(extra.value) || 0), 0);

                const finalTotal = parseFloat('{{ Cart::getTotal() }}') + extrasTotal;
                document.getElementById('total_price').value = finalTotal.toFixed(2);
                document.getElementById('order_total_display').innerText = `${finalTotal.toFixed(2)} €`;
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
