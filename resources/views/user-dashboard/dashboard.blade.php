<x-user>
    {{-- @push('css')
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    @endpush
    <br><br><br>
    <!-- Contact Section -->
    <section id="contact" class="contact section bg-transparent">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Your Order</h2>
            <p>Thank You for Joinig Us</p>
            <div class="col-md-12 mt-4">
                <div class="">
                    <a href="{{ route('user.update.profile') }}" class="btn btn-profile">Profile</a>
                </div>
            </div>
        </div>


        @if ($orders->count() > 0)
            <div class="container mt-5" data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-colour">Your Order Table</h2>
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="cart_table  table-responsive">
                            <thead class="table_head text-dark">
                                <th style="padding-left:20px;">{{ __('sentence.index') }}</th>
                                <th>{{ __('sentence.order') }}</th>
                                <th>{{ __('sentence.time') }}</th>
                                <th>{{ __('sentence.paid') }}</th>
                                <th class="text-center">invoice</th>
                            </thead>
                            <tbody class="table_body">
                                @foreach ($orders as $key => $order)
                                    <tr class="">
                                        <td class="py-3" style="padding-left:20px;">{{ $key + 1 }}</td>
                                        <td class="">{{ $order->id }}</td>
                                        <td class="">{{ $order->created_at->format('d M, Y h:i A') }}</td>
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
                    </div>
                </div>

            </div>
            <div class="container mt-5" data-aos="fade-up" data-aos-delay="100">
                <div class="col-md-12 mt-4">
                    <div class="d-flex justify-content-end">
                        
                        {{ $orders->onEachSide(1)->links() }}
                    </div>
                </div>
    
            </div>
    
           
        @else
            <div class="container " data-aos="fade-up" data-aos-delay="100">
                <h2 class="text-colour text-center fst-italic">Please place order to view Orders</h2>
            </div>
        @endif

        <div class="container mt-5" data-aos="fade-up" data-aos-delay="100">
            <div class="col-md-12 mt-4">
                <div class="d-flex justify-content-end">
                    <form action="{{ route('logout') }}" method="post" id="logout-form" class="php-email-form">
                        @csrf
                        <button type="submit"
                            class="d-xl-block user-logout-button">{{ __('sentence.logout') }}</button>
                    </form>
                </div>
            </div>

        </div>



    </section><!-- /Contact Section -->
    <br><br> --}}
    @push('css')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

        <!-- plugins css -->
        <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
        <!-- Main Stylesheet -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Responsive css -->
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @endpush
    <br><br><br><br>
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
                                            <a data-bs-toggle="tab" href="#liton_tab_1_4">address <i
                                                    class="fas fa-map-marker-alt"></i></a>
                                            <a data-bs-toggle="tab" href="#liton_tab_1_5">Account Details <i
                                                    class="fas fa-user"></i></a>
                                            <a href="login.html">Logout <i class="fas fa-sign-out-alt"></i></a>
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
                                                    <table class="table">
                                                        <thead class="order" style="background-color: #ff883e;">
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="order" style="border: 1px solid #ff883e;">
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Jun 22, 2019</td>
                                                                <td>Pending</td>
                                                                <td>$3000</td>
                                                                <td><a href="cart.html">View</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>Nov 22, 2019</td>
                                                                <td>Approved</td>
                                                                <td>$200</td>
                                                                <td><a href="cart.html">View</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>Jan 12, 2020</td>
                                                                <td>On Hold</td>
                                                                <td>$990</td>
                                                                <td><a href="cart.html">View</a></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
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
                                        <div class="tab-pane fade" id="liton_tab_1_4">
                                            <div class="ltn__myaccount-tab-content-inner">
                                                <p>The following addresses will be used on the checkout page by default.
                                                </p>
                                                <div class="row">
                                                    <div class="col-md-6 col-12 learts-mb-30">
                                                        <h4 style="color: #ff883e">Billing Address
                                                        </h4>
                                                        <address>
                                                            <p style="color: #ff883e"><strong>Alex Tuntuni</strong></p>
                                                            <p style="color:white">1355 Market St, Suite 900 <br>
                                                                San Francisco, CA 94103</p>
                                                            <p style="color:white">Mobile: (123) 456-7890</p>
                                                        </address>
                                                    </div>
                                                    {{-- <div class="col-md-6 col-12 learts-mb-30">
                                                        <h4>Shipping Address <small><a href="#">edit</a></small>
                                                        </h4>
                                                        <address>
                                                            <p><strong>Alex Tuntuni</strong></p>
                                                            <p>1355 Market St, Suite 900 <br>
                                                                San Francisco, CA 94103</p>
                                                            <p>Mobile: (123) 456-7890</p>
                                                        </address>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
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
                                                                    required="" value="{{ auth()->user()->email }}"
                                                                    disabled>

                                                            </div>

                                                            <div class="col-md-6">
                                                                <input type="text" name="address"
                                                                    class="form-control" placeholder="Your Address"
                                                                    required="">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="city"
                                                                    class="form-control" placeholder="Your City"
                                                                    required="">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="post_cod"
                                                                    class="form-control" placeholder="Your Post Code"
                                                                    required="">
                                                            </div>
                                                            {{-- <div class="col-md-6">
                                                                <input type="text" name="zip" class="form-control"
                                                                    placeholder="Your Zip" required="">
                                                            </div> --}}
                                                            <div class="col-md-6">
                                                                <input type="number" id="number_type" name="phone"
                                                                    class="form-control"
                                                                    placeholder="Your Phone Number">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="text" name="house"
                                                                    class="form-control" placeholder="Your House"
                                                                    required="">
                                                            </div>


                                                            <div class="col-md-12 text-start">
                                                                <button id="update"
                                                                    type="submit">{{ __('sentence.update') }}</button>
                                                            </div>

                                                        </div>
                                                    </form>
                                                    {{-- <form action="#">
                                                        <div class="row mb-50">
                                                            <div class="col-md-6">
                                                                <label>First name:</label>
                                                                <input type="text" name="ltn__name">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Last name:</label>
                                                                <input type="text" name="ltn__lastname">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Display Name:</label>
                                                                <input type="text" name="ltn__lastname"
                                                                    placeholder="Ethan">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Display Email:</label>
                                                                <input type="email" name="ltn__lastname"
                                                                    placeholder="example@example.com">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="name"
                                                                    class="form-control capitalize-first"
                                                                    placeholder="Your Name" required
                                                                    value="{{ ucfirst(auth()->user()->name) }}">
                                                            </div>
                                                            <div class="col-md-10">
                                                                <input type="text" name="last_name"
                                                                    class="form-control capitalize-first"
                                                                    placeholder="Your Name" required
                                                                    value="{{ ucfirst(auth()->user()->l_name) }}">
                                                            </div>

                                                            <div class="col-md-10">
                                                                <input type="email" class="form-control"
                                                                    name="email" placeholder="Your Email"
                                                                    required="" value="{{ auth()->user()->email }}"
                                                                    disabled>

                                                            </div>

                                                        </div>
                                                        <fieldset>
                                                            <legend>Password change</legend>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label>Current password (leave blank to leave
                                                                        unchanged):</label>
                                                                    <input type="password" name="ltn__name">
                                                                    <label>New password (leave blank to leave
                                                                        unchanged):</label>
                                                                    <input type="password" name="ltn__lastname">
                                                                    <label>Confirm new password:</label>
                                                                    <input type="password" name="ltn__lastname">
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="btn-wrapper">
                                                            <button type="submit"
                                                                class="btn theme-btn-1 btn-effect-1 text-uppercase">Save
                                                                Changes</button>
                                                        </div>
                                                    </form> --}}
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
