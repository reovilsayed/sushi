    <x-user>
        @push('css')
            {{-- <link rel="stylesheet" href="{{ asset('css/checkout.css') }}"> --}}
        @endpush
        <br><br><br>


        <!-- Contact Section -->
        <section id="contact" class="contact section ">
            <div class=" container py-5 text-center">

                <h2>Checkout form</h2>
                <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required
                    form group has a validation state that can be triggered by attempting to submit the form without
                    completing it.</p>
            </div>

            <!-- Section Title -->
            <div class="container" data-aos="fade-up" data-aos-delay="100">

                <div class="row gy-4">
                    <div class="col-lg-8 order-md-1 mb-4">
                        <div class="container content mb-5" data-aos="fade-up">
                            <h2 class="text-colour">Login with Us</h2>
                            <div class="d-flex gap-3">
                                <p class="fst-italic">don't have a account?</p>
                                <a href="{{ route('user.register') }}">Register</a>
                            </div>
            
                        </div>

                        <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="row gy-4">
                                <div class="col-md-6 ">
                                    <input type="text" class="form-control" name="f_name" placeholder="Your First Name"
                                        required="">
                                </div>

                                <div class="col-md-6">
                                    <input type="text" name="l_name" class="form-control" placeholder="Your Last Name"
                                        required="">
                                </div>
                                <div class="col-md-12">
                                    <input type="email" name="email" class="form-control" placeholder="Your Email"
                                        required="">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="l_name" class="form-control" placeholder="Your Last Name"
                                        required="">
                                </div>



                                <div class="col-md-12 text-start">
                                    <button type="submit">Login</button>
                                </div>

                            </div>
                        </form>
                    </div><!-- End Contact Form -->
                    <div class="col-md-4 col-sm-12 order-md-2">

                        <div class="container content mb-5" data-aos="fade-up">
                            <h2 class="text-colour">Login with Us</h2>
                            <div class="d-flex gap-3">
                                <p class="fst-italic">don't have a account?</p>
                                <a href="{{ route('user.register') }}">Register</a>
                            </div>
            
                        </div>

                        <ul class="list-group mb-3">
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Product name</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$12</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Second product</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$8</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div>
                                    <h6 class="my-0">Third item</h6>
                                    <small class="text-muted">Brief description</small>
                                </div>
                                <span class="text-muted">$5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between bg-light">
                                <div class="text-success">
                                    <h6 class="my-0">Promo code</h6>
                                    <small>EXAMPLECODE</small>
                                </div>
                                <span class="text-success">-$5</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Total (USD)</span>
                                <strong>$20</strong>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </section><!-- /Contact Section -->
    </x-user>
