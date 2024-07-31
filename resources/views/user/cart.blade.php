<x-user>
    @push('css')
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
                                <th class="cart-product-info">Product</th>
                                <th class="cart-product-price">Price</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-subtotal">Subtotal</th>
                            </thead>
                            <tbody class="table_body">
                                <tr class="text-centr">
                                    <td class="cart-product-remove text-center">x</td>
                                    <td class="cart-product-image">
                                        <a href="product-details.html"><img src="{{ asset('img/1.png') }}"
                                                alt="#"></a>
                                    </td>
                                    <td class="cart-product-info">
                                        <h4><a href="product-details.html">Vegetables Juices</a></h4>
                                    </td>
                                    <td class="cart-product-price">$149.00</td>
                                    <td class="cart-product-quantity">
                                        <div class="cart-plus-minus">
                                            <div class="dec qtybutton">-</div>
                                            <input type="text" value="02" name="qtybutton"
                                                class="cart-plus-minus-box">
                                            <div class="inc qtybutton">+</div>
                                        </div>
                                    </td>
                                    <td class="cart-product-subtotal">$298.00</td>
                                </tr>
                                <tr>
                                    <td class="cart-product-remove text-center">x</td>
                                    <td class="cart-product-image">
                                        <a href="product-details.html"><img src="{{ asset('img/2.png') }}"
                                                alt="#"></a>
                                    </td>
                                    <td class="cart-product-info">
                                        <h4><a href="product-details.html">Orange Sliced Mix</a></h4>
                                    </td>
                                    <td class="cart-product-price">$85.00</td>
                                    <td class="cart-product-quantity">
                                        <div class="cart-plus-minus">
                                            <div class="dec qtybutton">-</div>
                                            <input type="text" value="02" name="qtybutton"
                                                class="cart-plus-minus-box">
                                            <div class="inc qtybutton">+</div>
                                        </div>
                                    </td>
                                    <td class="cart-product-subtotal">$170.00</td>
                                </tr>
                                <tr>
                                    <td class="cart-product-remove text-center">x</td>
                                    <td class="cart-product-image">
                                        <a href="product-details.html"><img src="{{ asset('img/3.png') }}"
                                                alt="#"></a>
                                    </td>
                                    <td class="cart-product-info">
                                        <h4><a href="product-details.html">Red Hot Tomato</a></h4>
                                    </td>
                                    <td class="cart-product-price">$75.00</td>
                                    <td class="cart-product-quantity">
                                        <div class="cart-plus-minus">
                                            <div class="dec qtybutton">-</div>
                                            <input type="text" value="02" name="qtybutton"
                                                class="cart-plus-minus-box">
                                            <div class="inc qtybutton">+</div>
                                        </div>
                                    </td>
                                    <td class="cart-product-subtotal">$150.00</td>
                                </tr>
    
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 order-2 order-lg-1 content p-md-0">
                    <div class="cart_total_section">
                        <h4 class="ms-3 pt-2" style="color:rgb(19, 16, 16)">Cart Totals</h4>
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
                    <div class="btn-wrapper text-end pe-md-3">
                        <a href="checkout.html" class="btn" style="background: 
color-mix(in srgb, var(--accent-color), transparent 20%);">Checkout</a>
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
</x-user>
