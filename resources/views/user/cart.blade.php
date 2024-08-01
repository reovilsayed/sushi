<x-user>
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    @endpush
    <div class="container main_cart">
        <div class="row">
            <div class="col-md-8">

            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>

    <section id="about" class="cart_section pb-5">
        <div class="container section-title aos-init aos-animate mt-4" data-aos="fade-up">
            <h2>Menu</h2>
            <p>Check Our Products</p>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-8 col-sm-12">
                    <div class="table-responsive">
                        <table class="cart_table  table-responsive">
                            <thead class="table_head text-dark">
                                <th class="cart-product-remove" style="padding-left:20px;">Remove</th>
                                <th class="cart-product-image">Image</th>
                                <th class="cart-product-info text-center">Name</th>
                                <th class="cart-product-price">Price</th>
                                <th class="cart-product-quantity text-center">Quantity</th>
                                <th class="cart-product-subtotal text-center">Subtotal</th>
                            </thead>
                            <tbody class="table_body">
                                @forelse (Cart::getContent() as $item)
                                    {{-- @dd($item) --}}
                                    <tr>
                                        <td class="cart-product-remove text-start ps-4">
                                            <a class="cart-product-remove text-center"
                                                href="{{ url('/cart-destroy/' . $item->id) }}">x</a>
                                        </td>
                                        <td class="cart-product-image">
                                            <a href="product-details.html"><img src="{{ asset('img/3.png') }}"
                                                    alt="#"></a>
                                        </td>


                                        <td class="cart-product-info text-center">
                                            @if (isset($item->attributes['resturent']))
                                                @php
                                                    $restuarant = App\Models\Restaurant::find(
                                                        $item->attributes['resturent'],
                                                    );
                                                @endphp
                                                <h4><a
                                                        href="{{ route('restaurant.product', ['restaurant' => $restuarant->slug, 'product' => $item->model->id]) }}">{{ $item->name }}</a>
                                                </h4>
                                            @endif
                                        </td>
                                        <td class="cart-product-price">{{ $item->price }}€</td>
                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item->id }}" />
                                            <td class="cart-product-quantity d-flex justify-content-center mt-3">
                                                <div class="text-start d-flex cart_quantity">
                                                    <div class="cart_quantity_item">
                                                        <input type="text" value="{{ $item->quantity }}" name="quantity"
                                                            class="text-center"
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
                <div class="col-lg-4 col-sm-12 order-2 order-lg-1 content p-md-0" style="height: 270px;">
                    <div class="cart_total_section">
                        <h4 class="ms-3 pt-2" style="color: var(--accent-color);">Cart Totals</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table-responsive" style="width: 100%;">
                            <tbody class="me-2 ms-2">
                                <tr style="height: 40px; ">
                                    <td class="ps-4">Cart Subtotal</td>
                                    <td>$618.00</td>
                                </tr>
                                <tr style="height: 40px;">
                                    <td class="ps-4">Shipping and Handing</td>
                                    <td>$15.00</td>
                                </tr>
                                <tr style="height: 40px;">
                                    <td class="ps-4">Vat</td>
                                    <td>$00.00</td>
                                </tr>
                                <tr style="height: 40px;">
                                    <td class="ps-4"><strong>Order Total</strong></td>
                                    <td><strong>$633.00</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="btn-wrapper text-center pe-md-3">
                        <a href="{{ route('restaurant.checkout') }}" class="checkout_btn">Proceed to checkout</a>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <section id="" class="extra_section pt-1">
        <div class="container section-title aos-init aos-animate mt-5" data-aos="fade-up">
            <h2>Menu</h2>
            <p>Choose Our Extra Menu</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class=" col-md-12">
                    <div class="row text-center p-2">
                        <div class="col-md-2 d-flex align-items-center subcart2"
                            style="flex-direction: column; justify-content: space-between;">
                            <h5 class="ft-16 p-2 seccolr">SOJA SUCRÉE
                            </h5>
                            <div class="pricetag pricetag1 justify-content-center">
                                <div class="sidept">
                                    <button class="btn pbtn decrease-btn" data-item="soja_sucre">-</button>
                                </div>
                                <div class="centerinput"><input type="text" value="0" id="soja_sucre"
                                        disabled=""></div>
                                <div class="sidelast">
                                    <button class="btn pbtn increase-btn" data-item="soja_sucre">+</button>
                                </div>
                            </div>
                            <div class="pricetag justify-content-center">
                                <div class="centerinput">
                                    <p style="font-weight: 100;"><strong id="soja_sucre_price">0.00€</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center subcart2"
                            style="flex-direction: column; justify-content: space-between;">
                            <h5 class="ft-16 p-2 seccolr">SOJA SALÉE</h5>
                            <div class="pricetag pricetag1 justify-content-center">
                                <div class="sidept">
                                    <button class="btn pbtn decrease-btn" data-item="soja_salee">-</button>
                                </div>
                                <div class="centerinput"><input type="text" value="0" id="soja_salee"
                                        disabled=""></div>
                                <div class="sidelast">
                                    <button class="btn pbtn increase-btn" data-item="soja_salee">+</button>
                                </div>
                            </div>
                            <div class="pricetag pricetag1 justify-content-center">
                                <div class="centerinput">
                                    <p style="font-weight: 100;"><strong id="soja_salee_price">0.00€</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center subcart2"
                            style="flex-direction: column; justify-content: space-between;">
                            <h5 class="ft-16 p-2 seccolr">SAUCE SPICY</h5>
                            <div class="pricetag pricetag1 justify-content-center">
                                <div class="sidept"><button class="btn pbtn decrease-btn"
                                        data-item="sauce_spicy">-</button></div>
                                <div class="centerinput"><input type="text" value="0" id="sauce_spicy"
                                        disabled=""></div>
                                <div class="sidelast">
                                    <button class="btn pbtn increase-btn" data-item="sauce_spicy">+</button>
                                </div>
                            </div>
                            <div class="pricetag pricetag1 justify-content-center">
                                <div class="centerinput">
                                    <p style="font-weight: 100;"><strong id="sauce_spicy_price">0.00€</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center subcart2"
                            style="flex-direction: column; justify-content: space-between;">
                            <h5 class="ft-16 p-2 seccolr">BAGUETTES</h5>
                            <div class="pricetag justify-content-center">
                                <div class="sidept"><button class="btn pbtn decrease-btn"
                                        data-item="baguettes">-</button></div>
                                <div class="centerinput"><input type="text" value="0" id="baguettes"
                                        disabled=""></div>
                                <div class="sidelast">
                                    <button class="btn pbtn increase-btn" data-item="baguettes">+</button>
                                </div>
                            </div>
                            <div class="pricetag justify-content-center">
                                <div class="centerinput">
                                    <p style="font-weight: 100;"><strong id="baguettes_price">Gratuit</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center subcart2"
                            style="flex-direction: column; justify-content: space-between;">
                            <h5 class="ft-16 p-2 seccolr">WASABI</h5>
                            <div class="pricetag pricetag1 justify-content-center">
                                <div class="sidept"><button class="btn pbtn decrease-btn"
                                        data-item="wasabi">-</button></div>
                                <div class="centerinput"><input type="text" value="0" id="wasabi"
                                        disabled=""></div>
                                <div class="sidelast">
                                    <button class="btn pbtn increase-btn" data-item="wasabi">+</button>
                                </div>
                            </div>
                            <div class="pricetag pricetag1 justify-content-center">
                                <div class="centerinput">
                                    <p style="font-weight: 100;"><strong id="wasabi_price">0.00€</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 d-flex align-items-center subcart2"
                            style="flex-direction: column; justify-content: space-between;">
                            <h5 class="ft-16 p-2 seccolr">GINGEMBRE</h5>
                            <div class="pricetag pricetag1 justify-content-center">
                                <div class="sidept"><button class="btn pbtn decrease-btn"
                                        data-item="ginger">-</button></div>
                                <div class="centerinput"><input type="text" value="0" id="ginger"
                                        disabled=""></div>
                                <div class="sidelast">
                                    <button class="btn pbtn increase-btn" data-item="ginger">+</button>
                                </div>
                            </div>
                            <div class="pricetag pricetag1 justify-content-center">
                                <div class="centerinput">
                                    <p style="font-weight: 100;"><strong id="ginger_price">0.00€</strong>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </section>

    @push('js')
        <script>
            function changeQuantity(change, id) {
                // Get the input field by its id
                const quantityInput = document.getElementById(id);
                let currentQuantity = parseInt(quantityInput.value);

                // Calculate the new quantity
                let newQuantity = currentQuantity + change;

                // Ensure the quantity doesn't go below 1
                if (newQuantity < 1) {
                    newQuantity = 1;
                }

                // Update the value in the input field
                quantityInput.value = newQuantity;

                // Optionally, update the server with the new quantity
                // Example: updateCart(id, newQuantity);
            }
        </script>
    @endpush
</x-user>
