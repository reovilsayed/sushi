<x-user>
    <br><br><br>
    <!-- Contact Section -->
    <section id="contact" class="contact section ">

        <!-- Section Title -->
        <!-- Section Title -->
        <div class="container content mb-5" data-aos="fade-up">
            <h2 class="text-colour">Login with Us</h2>
            <div class="d-flex gap-3">
                <p class="fst-italic">don't have a account?</p>
                <a href="{{route('register')}}">Register</a>
            </div>

        </div><!-- End Section Title -->



        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-12">
                    <form action="{{ route('login') }}" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-8 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    required="">
                            </div>

                            <div class="col-md-8">
                                <input type="password" name="password" class="form-control" placeholder="Password"
                                    required="">  
                            </div>

                            

                            <div class="col-md-12 text-start">
                                <button type="submit">Login</button>
                            </div>

                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->
</x-user>
