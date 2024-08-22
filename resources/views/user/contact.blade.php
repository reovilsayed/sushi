<x-user>
    @push('css')
        <style>
            #map-nos {
                height: 500px;
                /* Set a height for the map */
                width: 100%;
            }
        </style>
    @endpush
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

                {{-- <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>{{ __('sentence.call') }} {{ __('sentence.us') }}</h3>
                            <p>{{ Settings::setting('site.phone') }}</p>
                        </div>
                    </div><!-- End Info Item -->

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="500">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>{{ __('sentence.email') }} {{ __('sentence.us') }}</h3>
                            <p>{{ Settings::setting('site.phone') }}</p>
                        </div>
                    </div><!-- End Info Item -->
                </div> --}}

                <div class="">
                    {{-- <form action="{{route('contact.mail')}}" method="post" class="php-email-form" data-aos="fade-up"
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
                    </form> --}}

                    <div id="map" style="height: 500px; width: 100%;"></div>


                    {{-- <div id="map-nos"></div> --}}
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->

    @push('js')
        <script>
            function initMap() {
                const locations = [{
                        lat: 47.631498,
                        lng: 6.856458
                    },
                    {
                        lat: 47.2452395,
                        lng: 6.0284224
                    },
                    {
                        lat: 47.3234108,
                        lng: 5.0314998
                    }
                ];
                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 7,
                    center: {
                        lat: 47.4,
                        lng: 6.0
                    }
                });
                locations.forEach(location => {
                    new google.maps.Marker({
                        position: location,
                        map: map
                    });
                });
            }
            google.maps.event.addDomListener(window, 'load', initMap);
        </script>
    @endpush
</x-user>
