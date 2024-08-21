<x-user>
    <br> <br> <br>
    <!-- Contact Section -->
    <section id="contact" class="contact section bg-transparent">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('sentence.contact') }}</h2>
            <p>{{ __('sentence.contact') }} {{ __('sentence.us') }}</p>
        </div><!-- End Section Title -->



        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>{{__('sentence.call')}} {{__('sentence.us')}}</h3>
                            <p>{{ Settings::site_phone()  }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>{{__('sentence.email')}} {{__('sentence.us')}}</h3>
                            <p>{{ Settings::site_email() }}</p>
                        </div>
                    </div><!-- End Info Item -->
                </div>

                <div class="col-lg-8">
                    <form action="{{route('contact.mail')}}" method="post" class="php-email-form" data-aos="fade-up"
                        data-aos-delay="200" enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name"
                                    required="">
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    required="">
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                            </div>
                        </div>
                        <button type="submit"
                        class="d-xl-block user-logout-button mt-3">Submit</button>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->
</x-user>
