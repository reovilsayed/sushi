<x-user>
    @push('css')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <!-- plugins css -->
        {{-- <link rel="stylesheet" href="{{ asset('css/plugins.css') }}"> --}}
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Responsive css -->
        {{-- <link rel="stylesheet" href="{{ asset('css/responsive.css') }}"> --}}
        <style>
            .btn-invoice {
                padding: 4px 8px;
                padding-left: 10px;
                padding-right: 10px;
                border: 1px solid #ff883e;
                color: var(--section-bg-1);
            }

            .logout {
                background: transparent;
                color: #ff883e;
            }
        </style>
    @endpush
    <br><br>
    <section id="about" class="cart_section pb-5 bg-transparent">
        <div class="container section-title aos-init aos-animate mt-4" data-aos="fade-up">
            <h2 style="color: var(--accent-color); font-weight: 600; font-family: var(--heading-font">Welcome</h2>
            <p style="color: var(--accent-color); margin: 0; font-size: 36px; font-weight: 600; font-family: var(--heading-font">
                Our dashboard</p>
        </div>
    </section>
    <!-- WISHLIST AREA START -->
    <div class="liton__wishlist-area pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- PRODUCT TAB AREA START -->
                    <div class="ltn__product-tab-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="ltn__tab-menu-list mb-50">
                                        <div class="nav">
                                            <a class="active show" data-bs-toggle="tab" href="#liton_tab_1_1">Dashboard
                                                <i class="fas fa-home"></i></a>
                                            <a data-bs-toggle="tab" href="#liton_tab_1_2">Orders <i
                                                    class="fas fa-file-alt"></i></a>
                                            {{-- <a data-bs-toggle="tab" href="#liton_tab_1_3">Downloads <i
                                                    class="fas fa-arrow-down"></i></a> --}}
                                            <a data-bs-toggle="tab" href="#liton_tab_1_5">Account Details <i
                                                    class="fas fa-user"></i></a>
                                            <a data-bs-toggle="tab" href="#liton_tab_1_4">Password Update <i
                                                    class="fa-solid fa-lock"></i></a>
                                            <form action="{{ route('logout') }}" method="post" id="logout-form"
                                                class="php-email-form"
                                                style="height: 51px; display: flex; margin-left: 20px;">
                                                @csrf
                                                <button type="submit" class="logout">Logout <i
                                                        class="fas fa-sign-out-alt"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="liton_tab_1_1">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <p>Hello <strong>UserName</strong> (not <strong>UserName</strong>?
                                                    <small><a href="login-register.html">Log out</a></small> )
                                                </p>
                                                <p>From your account dashboard you can view your <span>recent
                                                        orders</span>, manage your <span>shipping and billing
                                                        addresses</span>, and <span>edit your password and account
                                                        details</span>.</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="liton_tab_1_2">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="table-responsive">
                                                    @if ($orders->count() > 0)
                                                        <table class="table">
                                                            <thead class="order" style="background-color: #ff883e;">
                                                                <tr>
                                                                    <th style="padding-left:20px;">
                                                                        {{ __('sentence.index') }}</th>
                                                                    <th>{{ __('sentence.order') }}</th>
                                                                    <th>{{ __('sentence.time') }}</th>
                                                                    <th>{{ __('sentence.paid') }}</th>
                                                                    <th class="text-center">invoice</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody class="order" style="border: 1px solid #ff883e;">
                                                                @foreach ($orders as $key => $order)
                                                                    <tr class="">
                                                                        <td class="py-3" style="padding-left:20px;">
                                                                            {{ $key + 1 }}</td>
                                                                        <td class="">{{ $order->id }}</td>
                                                                        <td class="">
                                                                            {{ $order->created_at->format('d M, Y h:i A') }}
                                                                        </td>
                                                                        <td class="">{{ $order->total }}€</td>
                                                                        <td class="text-center">
                                                                            <a href="{{ route('invoice', $order) }}"
                                                                                class="btn btn-invoice ">Invoice</a>
                                                                            <!-- Positioned to the right -->
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <div class="container " data-aos="fade-up" data-aos-delay="100">
                                                            <h2 class="text-colour text-center fst-italic">Please place
                                                                order to view Orders</h2>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="tab-pane fade" id="liton_tab_1_3">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Date</th>
                                                                <th>Expire</th>
                                                                <th>Download</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Carsafe - Car Service PSD Template</td>
                                                                <td>Nov 22, 2020</td>
                                                                <td>Yes</td>
                                                                <td><a href="#"><i
                                                                            class="far fa-arrow-to-bottom mr-1"></i>
                                                                        Download File</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Carsafe - Car Service HTML Template</td>
                                                                <td>Nov 10, 2020</td>
                                                                <td>Yes</td>
                                                                <td><a href="#"><i
                                                                            class="far fa-arrow-to-bottom mr-1"></i>
                                                                        Download File</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Carsafe - Car Service WordPress Theme</td>
                                                                <td>Nov 12, 2020</td>
                                                                <td>Yes</td>
                                                                <td><a href="#"><i
                                                                            class="far fa-arrow-to-bottom mr-1"></i>
                                                                        Download File</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="tab-pane fade" id="liton_tab_1_5">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <p>The following addresses will be used on the checkout page by default.
                                                </p>
                                                <div class="ltn__form-box">
                                                    <form method="POST" action="{{ route('user.update.name') }}"
                                                        class="php-email-form" data-aos="fade-up" data-aos-delay="200">
                                                        @csrf
                                                        <div class="row gy-4">

                                                            <div class="col-md-6">
                                                                <input type="text" name="name"
                                                                    class="form-control capitalize-first"
                                                                    placeholder="Your firsr Name" required
                                                                    value="{{ ucfirst(auth()->user()->name) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="last_name"
                                                                    class="form-control capitalize-first"
                                                                    placeholder="Your last Name" required
                                                                    value="{{ ucfirst(auth()->user()->l_name) }}">
                                                            </div>

                                                            <div class="col-md-6">
                                                                <input type="email" class="form-control"
                                                                    name="email" placeholder="Your Email"
                                                                    required=""
                                                                    value="{{ auth()->user()->email }}" disabled>

                                                            </div>

                                                            <div class="col-md-6">
                                                                <input type="text" name="address"
                                                                    class="form-control" placeholder="Your Address"
                                                                    value="{{ ucfirst(auth()->user()->address) }}"
                                                                    required="">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="city"
                                                                    class="form-control" placeholder="Your City"
                                                                    value="{{ ucfirst(auth()->user()->city) }}"
                                                                    required="">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="post_code"
                                                                    class="form-control" placeholder="Your Post Code"
                                                                    value="{{ ucfirst(auth()->user()->post_code) }}"
                                                                    required="">
                                                            </div>
                                                            {{-- <div class="col-md-6">
                                                                <input type="text" name="zip" class="form-control"
                                                                    placeholder="Your Zip" required="">
                                                            </div> --}}
                                                            <div class="col-md-6">
                                                                <input type="number" id="number_type" name="phone"
                                                                    class="form-control"
                                                                    placeholder="Your Phone Number"
                                                                    value="{{ ucfirst(auth()->user()->phone) }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="house"
                                                                    class="form-control" placeholder="Your House"
                                                                    value="{{ ucfirst(auth()->user()->house) }}"
                                                                    required="">
                                                            </div>


                                                            <div class="col-md-12 text-start">
                                                                <button id="update"
                                                                    type="submit">{{ __('sentence.update') }}</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="liton_tab_1_4">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <p>The following addresses will be used on the checkout page by default.
                                                </p>
                                                <div class="ltn__form-box">
                                                    <form method="POST" action="{{ route('user.update.password') }}"
                                                        class="php-email-form" data-aos="fade-up"
                                                        data-aos-delay="200">
                                                        @csrf
                                                        <div class="row gy-4">
                                                            <div class="col-md-12">
                                                                <input type="password" name="current_password"
                                                                    class="form-control"
                                                                    placeholder="Current Password" required="">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="password" name="password"
                                                                    class="form-control" placeholder="Password"
                                                                    required="">
                                                            </div>
                                                            <div class="col-md-12">
                                                                <input type="password" name="password_confirmation"
                                                                    class="form-control"
                                                                    placeholder="Confirm Password" required="">
                                                            </div>

                                                            <div class="col-md-12 text-start">
                                                                <button id="update_pass"
                                                                    type="submit">{{ __('sentence.update') }}</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- PRODUCT TAB AREA END -->
                </div>
            </div>
        </div>
    </div>


    @push('css')
        <script src="{{ asset('js/plugins.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    @endpush
    <!-- WISHLIST AREA START -->
</x-user>
