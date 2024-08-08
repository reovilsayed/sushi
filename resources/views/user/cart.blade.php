<x-user>
    @push('css')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">

        <style>
            .nav-tabs .nav-link.active {
                color: #e4d4bf !important;
                background-color: var(--sec-color);
                border-color: var(--sec-color);
            }

            .nav-link {
                color: var(--sec-color);
            }

            .subcart img {
                width: 80px;
                height: 80px;
                object-fit: contain;
            }

            .subcart h5 {
                font-size: 14px;
            }

            .carousel-control-prev-icon,
            .carousel-control-next-icon {
                background-color: #000;
            }

            .btn.pbtn {
                border: none;
                color: white;
                padding: 5px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 14px;
                margin: 4px 2px;
                cursor: pointer;
                border-radius: 4px;
            }

            @media (max-width: 767px) {
                .carousel-inner .carousel-item>div {
                    display: none;
                }

                .carousel-inner .carousel-item>div:first-child {
                    display: block;
                }
            }

            #orderButton {
                color: var(--default-color);
                background: none;
                border: 2px solid var(--accent-color);
                padding: 5px 10px;
                transition: 0.4s;
                border-radius: 0px !important;
            }

            h5 {
                color: var(--accent-color);
            }
        </style>
    @endpush


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
                                    {{-- @dd($item->image) --}}
                                    <tr>
                                        <td class="cart-product-remove text-start ps-4">
                                            <a class="cart-product-remove text-center"
                                                href="{{ url('/cart-destroy/' . $item->id) }}">x</a>
                                        </td>
                                        <td class="cart-product-image">
                                            <a href="product-details.html"><img src="{{ $item->image ?? '' }}"
                                                    alt="{{ $item->image }}"></a>
                                        </td>


                                        <td class="cart-product-info text-center">
                                            @if (isset($item->attributes['resturent']))
                                                @php
                                                    $restuarant = App\Models\Restaurant::find(
                                                        $item->attributes['resturent'],
                                                    );
                                                @endphp
                                                <h4><a
                                                        href="{{ route('single.restaurant', ['restaurant' => $restuarant->slug, 'product' => $item->model->id]) }}">{{ $item->name }}</a>
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
                        <h4 class="ms-3 pt-2" style="">Cart Totals</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table-responsive" style="width: 100%;">
                            <tbody class="me-2 ms-2">
                                <tr style="height: 40px; ">
                                    <td class="ps-4">Cart Subtotal</td>
                                    <td>{{ Cart::getSubTotal() }} €</td>
                                </tr>
                                <tr style="height: 40px;">
                                    <td class="ps-4">Shipping and Handing</td>
                                    <td>$00.00</td>
                                </tr>
                                <tr style="height: 40px;">
                                    <td class="ps-4">Vat</td>
                                    <td>$00.00</td>
                                </tr>
                                <tr style="height: 40px;">
                                    <td class="ps-4"><strong>Order Total</strong></td>
                                    <td><strong>{{ Cart::getTotal() }} €</strong></td>
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
    <section id="" class="extra_section pt-1">
        <div class="container section-title aos-init aos-animate mt-5" data-aos="fade-up">
            <h2>Menu</h2>
            <p>Choose Our Extra Menu</p>
        </div>
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-12">
                    <form action="{{ route('extras') }}" method="POST">
                        @csrf
                        <div class="row text-center p-2">
                            @foreach ($extras as $extra)
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
                                <button type="submit" id="extraButton" {{ Cart::isEmpty() ? 'disabled' : '' }}>Proceed to checkout</button>
                                @if (Cart::isEmpty())
                                    <p class="mt-2 text-danger">Please add products to the cart before selecting
                                        extras.</p>
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
                const getTotal = document.getElementById('total_price');
                // console.log(getTotal.value)
          
                let currentQuantity = parseInt(quantityInput.value);
                quantityInput.removeAttribute('disabled');
                let newQuantity = currentQuantity + change;

                if (newQuantity < 0) {
                    newQuantity = 0;
                }

                quantityInput.value = newQuantity;

                let newPrice = newQuantity * price;
                getTotal.value = parseFloat(getTotal.value) + newPrice;


                const priceElement = document.getElementById(`price_${id}`);
                priceElement.value = `${newPrice.toFixed(2)}€`;

                // Update hidden inputs
                const hiddenPriceElement = document.getElementById(`hidden_price_${id}`);
                hiddenPriceElement.removeAttribute('disabled');
                hiddenPriceElement.value = newPrice;

                const hiddenNameElement = document.getElementById(`name_${id}`);
                hiddenNameElement.removeAttribute('disabled');
                hiddenNameElement.value = name;
            }
        </script>
    @endpush





    {{-- <section class="pt-0 pb-5">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="section-title text-center">
                    <h2>Menu</h2>
                    <p>Let yourself be tempted by…</p>
                </div>
                <div class="col-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="accompagnements-tab" data-bs-toggle="tab"
                                data-bs-target="#accompagnements" type="button" role="tab"
                                aria-controls="accompagnements" aria-selected="true">ACCOMPANIMENTS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="deserts-tab" data-bs-toggle="tab" data-bs-target="#deserts"
                                type="button" role="tab" aria-controls="deserts"
                                aria-selected="false">DESSERTS</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="boissons-tab" data-bs-toggle="tab"
                                data-bs-target="#boissons" type="button" role="tab" aria-controls="boissons"
                                aria-selected="false">DRINKS</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <!-- Accompaniments Tab Pane -->
                        <div class="tab-pane fade show active" id="accompagnements" role="tabpanel"
                            aria-labelledby="accompagnements-tab">
                            <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-4 col-md-3 d-flex justify-content-center">
                                                <div class="product-card text-center p-3">
                                                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1999&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                        class="img-fluid" alt="Edamame">
                                                    <h5 class="mt-3 mb-2">Edamame</h5>
                                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                                        <button class="btn btn-outline-secondary btn-sm me-2"
                                                            disabled>x</button>
                                                        <input type="text"
                                                            class="form-control form-control-sm text-center"
                                                            value="1" style="width: 40px;">
                                                        <a href="" class="btn btn-primary btn-sm ms-2">+</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-3 d-flex justify-content-center">
                                                <div class="product-card text-center p-3">
                                                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1999&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                        class="img-fluid" alt="Edamame">
                                                    <h5 class="mt-3 mb-2">Edamame</h5>
                                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                                        <button class="btn btn-outline-secondary btn-sm me-2"
                                                            disabled>x</button>
                                                        <input type="text"
                                                            class="form-control form-control-sm text-center"
                                                            value="1" style="width: 40px;">
                                                        <a href="" class="btn btn-primary btn-sm ms-2">+</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-3 d-flex justify-content-center">
                                                <div class="product-card text-center p-3">
                                                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1999&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                        class="img-fluid" alt="Edamame">
                                                    <h5 class="mt-3 mb-2">Edamame</h5>
                                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                                        <button class="btn btn-outline-secondary btn-sm me-2"
                                                            disabled>x</button>
                                                        <input type="text"
                                                            class="form-control form-control-sm text-center"
                                                            value="1" style="width: 40px;">
                                                        <a href="" class="btn btn-primary btn-sm ms-2">+</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-3 d-flex justify-content-center">
                                                <div class="product-card text-center p-3">
                                                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1999&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                        class="img-fluid" alt="Edamame">
                                                    <h5 class="mt-3 mb-2">Edamame</h5>
                                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                                        <div class="text-center ">
                                                            <button type="submit" id="orderButton"
                                                                style="border: 2px solid var(--accent-color)"
                                                                disabled>Order </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Repeat the col for each product -->
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-4 col-md-3 d-flex justify-content-center">
                                                <div class="product-card text-center p-3">
                                                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1999&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                        class="img-fluid" alt="Edamame">
                                                    <h5 class="mt-3 mb-2">Edamame</h5>
                                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                                        <button class="btn btn-outline-secondary btn-sm me-2"
                                                            disabled>x</button>
                                                        <input type="text"
                                                            class="form-control form-control-sm text-center"
                                                            value="1" style="width: 40px;">
                                                        <a href="" class="btn btn-primary btn-sm ms-2">+</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-3 d-flex justify-content-center">
                                                <div class="product-card text-center p-3">
                                                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1999&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                        class="img-fluid" alt="Edamame">
                                                    <h5 class="mt-3 mb-2">Edamame</h5>
                                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                                        <button class="btn btn-outline-secondary btn-sm me-2"
                                                            disabled>x</button>
                                                        <input type="text"
                                                            class="form-control form-control-sm text-center"
                                                            value="1" style="width: 40px;">
                                                        <a href="" class="btn btn-primary btn-sm ms-2">+</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-3 d-flex justify-content-center">
                                                <div class="product-card text-center p-3">
                                                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1999&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                        class="img-fluid" alt="Edamame">
                                                    <h5 class="mt-3 mb-2">Edamame</h5>
                                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                                        <button class="btn btn-outline-secondary btn-sm me-2"
                                                            disabled>x</button>
                                                        <input type="text"
                                                            class="form-control form-control-sm text-center"
                                                            value="1" style="width: 40px;">
                                                        <a href="" class="btn btn-primary btn-sm ms-2">+</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4 col-md-3 d-flex justify-content-center">
                                                <div class="product-card text-center p-3">
                                                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1999&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                                        class="img-fluid" alt="Edamame">
                                                    <h5 class="mt-3 mb-2">Edamame</h5>
                                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                                        <div class="text-center ">
                                                            <button type="submit" id="orderButton"
                                                                style="border: 2px solid var(--accent-color)"
                                                                disabled>Order </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Repeat the col for each product -->
                                        </div>
                                    </div>
                                    <!-- Additional carousel items go here -->
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#productCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#productCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>


                        </div>
                    </div>


                    <!-- Desserts Tab Pane -->
                    <div class="tab-pane fade" id="deserts" role="tabpanel" aria-labelledby="deserts-tab">

                    </div>

                    <!-- Drinks Tab Pane -->
                    <div class="tab-pane fade" id="boissons" role="tabpanel" aria-labelledby="boissons-tab">
                        <div class="text-center">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section> --}}

    {{-- @push('js')
        <script>
            function changeQuantity(change, id, price) {
                const quantityInput = document.getElementById(id);
                let currentQuantity = parseInt(quantityInput.value);

                let newQuantity = currentQuantity + change;

                if (newQuantity < 1) {
                    newQuantity = 1;
                }

                quantityInput.value = newQuantity;

                let newPrice = newQuantity * price;

                const priceElement = document.getElementById(`price_${id}`);
                priceElement.value = `${newPrice.toFixed(2)}€`;
            }
        </script>
        <script>
            function changeQuantity(change, id, price) {
                const quantityInput = document.getElementById(id);
                let currentQuantity = parseInt(quantityInput.value);
                let newQuantity = currentQuantity + change;
                newQuantity = newQuantity < 1 ? 1 : newQuantity;
                quantityInput.value = newQuantity;
                const priceElement = document.getElementById(`price_${id}`);
                priceElement.value = newQuantity * price;
            }
        </script>

        <script>
            $(document).ready(function() {
                function initCarousel() {
                    if ($("#visible").css("display") == "block") {
                        $(".carousel .carousel-item").each(function() {
                            var i = $(this).next();
                            i.length || (i = $(this).siblings(":first")),
                                i.children(":first-child").clone().appendTo($(this));

                            for (var n = 0; n < 4; n++)
                                (i = i.next()).length || (i = $(this).siblings(":first")),
                                i.children(":first-child").clone().appendTo($(this));
                        });
                    }
                }
                $(window).on({
                    resize: initCarousel(),
                    load: initCarousel()
                });
            });
        </script>
    @endpush --}}
</x-user>
