<x-user>
    <br><br><br>
    <!-- Contact Section -->
    <section id="contact" class="contact section ">

        <!-- Section Title -->
        <!-- Section Title -->
        <div class="container content mb-5" data-aos="fade-up">
            <h2 class="text-colour">Register with Us</h2>
            <div class="d-flex gap-3">
                <p class="fst-italic">have a account?</p>
                <a href="{{ route('login') }}">Login</a>
            </div>

        </div><!-- End Section Title -->



        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('register') }}" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control" placeholder="Your Name"
                                    required="" > 
                            </div>
                            {{-- <div class="col-md-8">
                                <input type="text" name="number" class="form-control" placeholder="Your Number">
                            </div> --}}

                            <div class="col-md-8 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    required="">
                            </div>

                            <div class="col-md-8">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required="">
                            </div>
                            <div class="col-md-8">
                                <input type="password" name="password_confirmation" class="form-control"
                                    placeholder="Confirm Password" required="">
                            </div>
                            <input type="hidden" name="role" value="2">

                            <div class="col-md-12 text-start">
                                <button type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->
</x-user>
