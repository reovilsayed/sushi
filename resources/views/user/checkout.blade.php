    <x-user>
        @push('css')
            <style>
                .checkout_main_body {
                    border: 1px solid var(--accent-color);
                }

                .contact .php-email-form button[type=submit] {
                    color: var(--default-color);
                    background: none;
                    border: 2px solid var(--accent-color);
                    padding: 8px 36px;
                    transition: 0.4s;
                    border-radius: 0px !important;
                }

                .form-select {
                    font-size: 14px;
                    padding: 10px 15px;
                    box-shadow: none;
                    border-radius: 0;
                    color: var(--default-color);
                    background-color:
                        color-mix(in srgb, var(--background-color), transparent 50%);
                    border-color: var(--accent-color);

                }

                .form-select:focus {
                    border: 1px solid var(--accent-color);
                    box-shadow: none;
                }

                #takeAwayForm,
                #homeDeliveryForm {
                    display: none;
                }

                .form-select option {
                    background-color:
                        color-mix(in srgb, var(--background-color) 90%, white 5%);
                }

                #number_type {
                    font-size: 14px;
                    padding: 10px 15px;
                    box-shadow: none;
                    border-radius: 0;
                    color: var(--default-color);
                    background-color:
                        color-mix(in srgb, var(--background-color), transparent 50%);
                    border-color: var(--accent-color);
                    opacity: 1 !important;
                }

                input[type='number']::placeholder {
                    color: var(--accent-color);
                    opacity: 0.5 !important;
                }
            </style>
        @endpush
        <br><br><br>


        <!-- Contact Section -->
        <section id="contact" class="contact section ">
            {{-- <div class=" container py-5 text-center">

                <h2>Checkout form</h2>
                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required
                    form group has a validation state that can be triggered by attempting to submit the form without
                    completing it.</p>
            </div> --}}
            <div class="container section-title aos-init aos-animate mt-4" data-aos="fade-up">
                {{-- <h2>Menu</h2> --}}
                <p class="text-center">Checkout form</p>
            </div>

            <!-- Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-md-12 col-sm-12 mb-4">
                        <div class="container content mb-5 ps-0" data-aos="fade-up">
                            <h2 class="text-colour">Billing address</h2>
                            <div class="d-flex gap-3">
                                <p class="fst-italic">Returning customer?</p>
                                <a href=""> Login</a>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <form action="{{ route('order_store') }}" method="post" class="php-email-form"
                                    data-aos="fade-up" data-aos-delay="200">
                                    @csrf
                                    <div class="col-md-12">
                                        <select id="deliveryOption" name="delivery_option"
                                            class="form-select selectpicker" data-container="body">
                                            <option selected style="color: var(--accent-color)">Open this select menu
                                            </option>
                                            <option value="take_away">TAKE AWAY</option>
                                            <option value="home_delivery">HOME DELIVERY</option>
                                        </select>
                                    </div>


                                    <div id="takeAwayForm" class="mt-5">

                                        <div class="content mb-3" data-aos="fade-up">
                                            <h2 class="text-colour">Central Sushi Besancon</h2>
                                            <div class="d-flex gap-3">
                                                <p class="fst-italic">35 Av. Sadi Carnot, 25000 Besançon, France</p>
                                            </div>

                                        </div>

                                        <div class="row gy-4">
                                            <div class="col-md-6 ">
                                                <input type="text" class="form-control" name="take_f_name"
                                                    placeholder="Your First Name" required=""
                                                    value={{ auth()->user()->name ?? '' }}>
                                            </div>

                                            <div class="col-md-6">
                                                <input type="text" name="take_l_name" class="form-control"
                                                    placeholder="Your Last Name" required=""
                                                    value={{ auth()->user()->l_name ?? '' }}>
                                            </div>

                                            <div class="col-md-12">
                                                <input type="email" name="take_email" class="form-control"
                                                    placeholder="Your Email" required=""
                                                    value={{ auth()->user()->email ?? '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="homeDeliveryForm" class="mt-5">

                                        <div class="content mb-3" data-aos="fade-up">
                                            <h2 class="text-colour">Central Sushi Belfort</h2>
                                            <div class="d-flex gap-3">
                                                <p class="fst-italic">60 Fbg de Montbéliard, 90000 Belfort, France</p>
                                            </div>

                                        </div>

                                        <div class="row gy-4">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="home_f_name"
                                                    placeholder="Your Name" required=""
                                                    value={{ auth()->user()->name ? auth()->user()->name : '' }}>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="home_l_name"
                                                    placeholder="Your Name" required=""
                                                    value={{ auth()->user()->l_name ? auth()->user()->l_name : '' }}>
                                            </div>


                                            <div class="col-md-12">
                                                <input type="email" name="home_email" class="form-control"
                                                    placeholder="Your Email" required=""
                                                    value={{ auth()->user()->email ? auth()->user()->email : '' }}>
                                            </div>

                                            <div class="col-md-12">
                                                <input type="text" name="home_address" class="form-control"
                                                    placeholder="Your Address" required="">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="home_city" class="form-control"
                                                    placeholder="Your City" required="">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="home_post_cod" class="form-control"
                                                    placeholder="Your Post Code" required="">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="home_zip" class="form-control"
                                                    placeholder="Your Zip" required="">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="number" id="number_type" name="home_phone"
                                                    class="form-control" placeholder="Your Phone Number">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" name="home_house" class="form-control"
                                                    placeholder="Your House" required="">
                                            </div>
                                            

                                            <div class="col-md-12">
                                                <textarea name="home_commment" class="form-control" placeholder="Your Comment ( Optionl )" style="height:122px;"></textarea>
                                            </div>
                                            {{-- <div class="input-group mb-3">
                                                <input type="text" class="form-control form-control-lg location"
                                                    placeholder="Enter Location" aria-label="Enter Location"
                                                    aria-describedby="button-addon2" required
                                                    style="border: 2px solid var(--accent-color)">
                                                <button class="btn btn-outline-orange " type="button"
                                                    id="button-addon2"><i
                                                        class="bi bi-geo-alt flex-shrink-0"></i></button>
                                            </div> --}}
                                        </div>
                                    </div>



                                    <div class="col-md-12 text-start mt-5">
                                        <button type="submit" id="orderButton" disabled>Order </button>
                                    </div>

                                    {{-- </div> --}}
                                </form>
                            </div>
                            <div class="col-md-4 col-sm-12 col-sm-12">

                                <div class="checkout_main_body">
                                    <div class="container content mb-3 mt-3" data-aos="fade-up">
                                        <h2 class="text-colour">Your Order</h2>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table-responsive" style="width: 100%;">
                                            <thead class="">
                                                <tr>
                                                    <td class="fs-4 fw-medium ps-3 pe-0">Product
                                                        <hr>
                                                    </td>
                                                    <td class="fs-4 fw-medium text-center pe-3 ps-0">Price
                                                        <hr>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody class="">
                                                @foreach (Cart::getContent() as $product)
                                                    <tr style="height: 38px;">
                                                        <td class="ps-3" style="font-size: 13px;">
                                                            {{ $product->name }} * {{ $product->quantity }}
                                                        </td>
                                                        <td class="text-center" style="font-size: 13px;">
                                                            {{ $product->price }} €
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr style="border-top: 1px solid var(--accent-color)">
                                                    <td class="fs-6 fw-medium ps-3 pt-2 pb-2">Subtotal</td>
                                                    <td class="fs-6 fw-medium text-center">{{ Cart::getSubTotal() }} €
                                                    </td>
                                                </tr>
                                                {{-- <tr style="border: 1px solid var(--accent-color)">
                                                    <td>
                                                        <p class="fs-5 fw-medium ps-3 pt-2 pb-2">Shipping</p>
                                                        <div class="ps-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" id="flexRadioDefault1">
                                                                <label class="form-check-label" style="font-size: 15px;"
                                                                    for="flexRadioDefault1">
                                                                    Home Delivery
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-2 mb-3">
                                                                <input class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" id="flexRadioDefault2" checked>
                                                                <label class="form-check-label" style="font-size: 15px;"
                                                                    for="flexRadioDefault2">
                                                                    Pickup From Outlet
                                                                </label>
                                                            </div>
                                                        </div>
        
                                                    </td>
                                                    <td class="fs-5 fw-medium text-center">125 €</td>
                                                </tr> --}}
                                                <tr
                                                    style="background-color: var(--accent-color); padding: 15px 0px; color:#ffff">
                                                    <td class="fs-5 fw-medium ps-3 pt-2 pb-2">Total</td>
                                                    <td class="fs-5 fw-medium text-center">{{ Cart::getTotal() }} €
                                                    </td>
                                                </tr>


                                                {{-- <tr style="border: 1px solid var(--accent-color)">
                                                    <td>
                                                        <p class="fs-5 fw-medium ps-3 pt-2 pb-2">Payment Methods</p>
                                                        <div class="ps-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="payment_method" id="payment_method1">
                                                                <label class="form-check-label" style="font-size: 15px;"
                                                                    for="payment_method1">
                                                                    Cash on delivery
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-2 mb-3">
                                                                <input class="form-check-input" type="radio"
                                                                    name="payment_method" id="payment_method2" checked>
                                                                <label class="form-check-label" style="font-size: 15px;"
                                                                    for="payment_method2">
                                                                    Card / Mobile Banking / Wallet
                                                                </label>
                                                            </div>
                                                        </div>
            
                                                    </td>
                                                    <td></td>
                                                </tr> --}}
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End Contact Form -->



                </div>

            </div>
        </section><!-- /Contact Section -->
        @push('js')
            <script>
                // document.addEventListener('DOMContentLoaded', function() {
                //     const deliveryOption = document.getElementById('deliveryOption');
                //     const takeAwayForm = document.getElementById('takeAwayForm');
                //     const homeDeliveryForm = document.getElementById('homeDeliveryForm');

                //     deliveryOption.addEventListener('change', function() {
                //         const selectedOption = this.value;

                //         if (selectedOption === 'take_away') {
                //             takeAwayForm.style.display = 'block';
                //             homeDeliveryForm.style.display = 'none';
                //         } else if (selectedOption === 'home_delivery') {
                //             takeAwayForm.style.display = 'none';
                //             homeDeliveryForm.style.display = 'block';
                //         } else {
                //             takeAwayForm.style.display = 'none';
                //             homeDeliveryForm.style.display = 'none';
                //         }
                //     });
                // });

                document.addEventListener('DOMContentLoaded', function() {
                    const deliveryOption = document.getElementById('deliveryOption');
                    const takeAwayForm = document.getElementById('takeAwayForm');
                    const homeDeliveryForm = document.getElementById('homeDeliveryForm');
                    const orderButton = document.getElementById('orderButton');

                    const setFormDisabledState = (form, disabled) => {
                        const inputs = form.querySelectorAll('input');
                        inputs.forEach(input => input.disabled = disabled);
                    };

                    const updateFormVisibility = () => {
                        const selectedOption = deliveryOption.value;

                        if (selectedOption === 'take_away') {
                            takeAwayForm.style.display = 'block';
                            homeDeliveryForm.style.display = 'none';
                            setFormDisabledState(takeAwayForm, false);
                            setFormDisabledState(homeDeliveryForm, true);
                            orderButton.disabled = false;
                        } else if (selectedOption === 'home_delivery') {
                            takeAwayForm.style.display = 'none';
                            homeDeliveryForm.style.display = 'block';
                            setFormDisabledState(takeAwayForm, true);
                            setFormDisabledState(homeDeliveryForm, false);
                            orderButton.disabled = false;
                        } else {
                            takeAwayForm.style.display = 'none';
                            homeDeliveryForm.style.display = 'none';
                            setFormDisabledState(takeAwayForm, true);
                            setFormDisabledState(homeDeliveryForm, true);
                            orderButton.disabled = true;
                        }
                    };

                    deliveryOption.addEventListener('change', updateFormVisibility);

                    // Initialize the form state
                    updateFormVisibility();
                });
            </script>
        @endpush
    </x-user>
