    @php
        $firstItem = Cart::getContent()->first();
        $restaurant = $firstItem ? App\Models\Restaurant::find($firstItem->attributes->restaurent) : null;
        // $zone = $restaurant ? $restaurant->zones->get() : null;
    @endphp

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
        <section id="contact" class="contact section bg-transparent">
            {{-- @dd($zone) --}}
            <!-- Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-md-12 col-sm-12 mb-4">
                        <div class="container content mb-5 ps-0" data-aos="fade-up">
                            <div class=" section-title aos-init aos-animate pb-0" data-aos="fade-up">
                                {{-- <h2>Menu</h2> --}}
                                <p class="">{{ __('sentence.checkout') }}</p>
                            </div>
                            @auth
                            @else
                                <div class="d-flex gap-3">
                                    <p class="fst-italic">{{ __('sentence.returningcustomer') }}</p>
                                    <a href="{{ route('login') }}"> {{ __('sentence.login') }}</a>
                                </div>
                            @endauth

                        </div>

                        <form action="{{ route('order_store') }}" method="post" class="php-email-form"
                            data-aos="fade-up" data-aos-delay="200">
                            @csrf
                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <div class="col-md-12">
                                        <select id="deliveryOption" name="delivery_option"
                                            class="form-select selectpicker" data-container="body">
                                            <option selected style="color: var(--accent-color)">
                                                {{ __('sentence.openthismenu') }}
                                            </option>
                                            <option value="take_away">{{ __('sentence.takeaway') }}</option>
                                            <option value="home_delivery">{{ __('sentence.homedelevery') }}</option>
                                        </select>
                                    </div>

                                    <div id="takeAwayForm" class="mt-5">
                                        @if ($restaurant)
                                            <div class="content mb-3 mt-5" data-aos="fade-up">
                                                <h2 class="text-colour">{{ $restaurant->name }}</h2>
                                                {{-- <div class="d-flex gap-3">
                                                    <p class="fst-italic">{{ $restaurant->zone }}</p>
                                                </div> --}}
                                            </div>
                                        @endif

                                        <div class="row gy-4">

                                            <div class="col-md-6 ">
                                                <input type="text" class="form-control" name="f_name"
                                                    placeholder="Your First Name" required=""
                                                    value={{ auth()->user()->name ?? '' }}>
                                            </div>

                                            <div class="col-md-6">
                                                <input type="text" name="l_name" class="form-control"
                                                    placeholder="Your Last Name" required=""
                                                    value={{ auth()->user()->l_name ?? '' }}>
                                            </div>

                                            <div class="col-md-6">
                                                <input type="email" name="email" disabled class="form-control"
                                                    placeholder="Your Email" required=""
                                                    value={{ auth()->user()->email ?? '' }}>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="time_option"class="form-select selectpicker"
                                                    data-container="body" disabled>
                                                    {{-- <option  style="color: var(--accent-color)">Select a time
                                                    </option> --}}
                                                    @foreach ($timeSlots as $time)
                                                        <option value="{{ $time }}">{{ $time }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="homeDeliveryForm" class="mt-5">

                                        @if ($restaurant)
                                            <div class="content mb-3 mt-5" data-aos="fade-up">
                                                <h2 class="text-colour">{{ $restaurant->name }}</h2>
                                                <div class="d-flex gap-3">
                                                    {{-- @dd($restaurant->zones) --}}
                                                    {{-- @foreach ($restaurant->zones as $zone)
                                                        <p class="fst-italic">{{ $zone->pivot->zone_name }}</p>
                                                    @endforeach --}}
                                                </div>
                                            </div>
                                        @endif

                                        <div class="row gy-4">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="f_name"
                                                    placeholder="Your First Name" required=""
                                                    value={{ auth()->user()->name ?? '' }}>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="l_name"
                                                    placeholder="Your Last Name" required=""
                                                    value={{ auth()->user()->l_name ?? '' }}>
                                            </div>


                                            <div class="col-md-12">
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="Your Email" required=""
                                                    value={{ auth()->user()->email ?? '' }}>
                                            </div>

                                            <div class="col-md-12">
                                                <input type="text" name="address" class="form-control"
                                                    placeholder="Your Address" required="">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="text" name="city" class="form-control"
                                                    placeholder="Your City" required="">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="post_cod" class="form-control"
                                                    placeholder="Your Post Code" required="">
                                            </div>
                                            {{-- <div class="col-md-6">
                                                <input type="text" name="zip" class="form-control"
                                                    placeholder="Your Zip" required="">
                                            </div> --}}
                                            <div class="col-md-6">
                                                <input type="number" id="number_type" name="phone"
                                                    class="form-control" placeholder="Your Phone Number">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="house" class="form-control"
                                                    placeholder="Your House" required="">
                                            </div>


                                            <div class="col-md-6">
                                                <select id="deliveryOption" name="time_option"
                                                    class="form-select selectpicker" data-container="body">
                                                    {{-- <option style="color: var(--accent-color)">Select a time
                                                    </option> --}}
                                                    @foreach ($timeSlots as $slot)
                                                        <option value="{{ $slot }}">{{ $slot }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="col-md-12">
                                                <textarea name="commment" class="form-control" placeholder="Your Comment ( Optionl )" style="height:122px;"></textarea>
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
                                        <button type="submit" id="orderButton" disabled>{{ __('sentence.order') }}
                                        </button>
                                    </div>

                                    {{-- </div> --}}

                                </div>
                                <div class="col-md-4 col-sm-12 col-sm-12">

                                    <div class="checkout_main_body">
                                        <div class="container content mb-3 mt-3" data-aos="fade-up">
                                            <h2 class="text-colour">{{ __('sentence.yourorder') }}</h2>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table-responsive" style="width: 100%;">
                                                <thead class="">
                                                    <tr>
                                                        <td class="fs-4 fw-medium ps-3 pe-0">
                                                            {{ __('sentence.products') }}
                                                            <hr>
                                                        </td>
                                                        <td class="fs-4 fw-medium text-center pe-3 ps-0">
                                                            {{ __('sentence.price') }}
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
                                                    {{-- <tr style="border: 1px solid var(--accent-color)">
                                                    <td>
                                                        <p class="fs-5 fw-medium ps-3 pt-2 pb-2">Shipping</p>
                                                        <div class="ps-3">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" id="flexRadioDefault1">
                                                                <label class="form-check-label"
                                                                    style="font-size: 15px;" for="flexRadioDefault1">
                                                                    Home Delivery
                                                                </label>
                                                            </div>
                                                            <div class="form-check mt-2 mb-3">
                                                                <input class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" id="flexRadioDefault2"
                                                                    checked>
                                                                <label class="form-check-label"
                                                                    style="font-size: 15px;" for="flexRadioDefault2">
                                                                    Pickup From Outlet
                                                                </label>
                                                            </div>
                                                        </div>

                                                    </td>
                                                    <td class="fs-5 fw-medium text-center">0 €</td>
                                                </tr> --}}

                                                    <tr style="border: 1px solid var(--accent-color)">
                                                        <td>
                                                            <p class="fs-5 fw-medium ps-3 pt-2 pb-2">Payment Methods
                                                            </p>
                                                            <div class="ps-3">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="payment_method" id="payment_method1"
                                                                        value="Cash on delivery">
                                                                    <label class="form-check-label"
                                                                        style="font-size: 15px;"
                                                                        for="payment_method1">
                                                                        Cash on delivery
                                                                    </label>
                                                                </div>
                                                                <div class="form-check mt-2 mb-3">
                                                                    <input class="form-check-input" type="radio"
                                                                        name="payment_method" id="payment_method2"
                                                                        checked value="Card">
                                                                    <label class="form-check-label"
                                                                        style="font-size: 15px;"
                                                                        for="payment_method2">
                                                                        Card
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    <tr style="border-top: 1px solid var(--accent-color)">
                                                        <td class="fs-6 fw-medium ps-3 pt-2 pb-2">Subtotal</td>
                                                        <td class="fs-6 fw-medium text-center">
                                                            {{ Cart::getSubTotal() }} €
                                                        </td>
                                                    </tr>
                                                    <tr
                                                        style="background-color: var(--accent-color); padding: 15px 0px; color:#ffff; border-left: 1px solid var(--accent-color);">
                                                        <td class="fs-5 fw-medium ps-3 pt-2 pb-2">Total</td>
                                                        <td class="fs-5 fw-medium text-center">{{ Cart::getTotal() }}
                                                            €
                                                        </td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div><!-- End Contact Form -->



                </div>

            </div>
        </section><!-- /Contact Section -->
        @push('js')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const deliveryOption = document.getElementById('deliveryOption');
                    const takeAwayForm = document.getElementById('takeAwayForm');
                    const homeDeliveryForm = document.getElementById('homeDeliveryForm');
                    const orderButton = document.getElementById('orderButton');

                    // Function to set the disabled state for all inputs within a form
                    const setFormDisabledState = (form, disabled) => {
                        const inputs = form.querySelectorAll('input, select, textarea');
                        inputs.forEach(input => input.disabled = disabled);
                    };

                    // Function to update form visibility and input state based on the selected option
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

                    // Event listener to detect changes in the delivery option
                    deliveryOption.addEventListener('change', updateFormVisibility);

                    // Initialize the form state on page load
                    updateFormVisibility();
                });
            </script>
        @endpush
    </x-user>
