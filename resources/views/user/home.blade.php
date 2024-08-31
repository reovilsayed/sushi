<x-user>
    @push('css')
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
            #location-input:focus {
                outline: none !important;
                box-shadow: none !important;
            }

            @media (min-width: 375px) and (max-width: 667px) {
                .header {
                    background-color: rgb(26, 15, 15);
                    color: var(--default-color) !important;
                    transition: all 0.5s;
                    z-index: 997;
                }
            }

            @media (min-width: 360px) and (max-width: 740px) {
                .header {
                    background-color: rgb(26, 15, 15);
                    color: var(--default-color) !important;
                    transition: all 0.5s;
                    z-index: 997;
                }
            }

            @media (min-width: 768px) and (max-width: 1024px) {
                .header {
                    background-color: rgb(26, 15, 15);
                    color: var(--default-color) !important;
                    transition: all 0.5s;
                    z-index: 997;
                }
            }


            .carousel-caption {
                position: absolute;
                top: 50%;
                right: 0;
                bottom: 20px;
                left: 0px !important;
                z-index: 10;
                padding-top: 20px;
                padding-bottom: 20px;
                color: #fff;
                text-align: left;
                margin-left: 150px;
            }

            @keyframes bounceInRight {
                from {
                    opacity: 0;
                    transform: translate3d(100%, 0, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            @keyframes bounceInLeft {
                from {
                    opacity: 0;
                    transform: translate3d(-100%, 0, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            @keyframes slideInDown {
                from {
                    opacity: 0;
                    transform: translate3d(0, -100%, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            @keyframes slideInRight {
                from {
                    opacity: 0;
                    transform: translate3d(100%, 0, 0);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            @keyframes zoomIn {
                from {
                    opacity: 0;
                    transform: scale3d(0.3, 0.3, 0.3);
                }

                to {
                    opacity: 1;
                    transform: none;
                }
            }

            /* Extra Large Devices (desktops, 1200px and up) */
            /* Large Devices (desktops, 992px - 1199px) */
            @media (min-width: 992px) and (max-width: 1199px) {
                #hero {
                    padding: 100px 0;
                }

                .carousel-caption h2 {
                    font-size: 3rem;
                }

                .carousel-caption h3 {
                    font-size: 1.5rem;
                }
            }

            /* Tablets (768px - 991px) */
            @media (min-width: 768px) and (max-width: 991px) {
                #hero {
                    padding: 80px 0;
                }

                .carousel-caption h2 {
                    font-size: 2.5rem;
                }

                .carousel-caption h3 {
                    font-size: 1.3rem;
                }
            }

            /* Mobile Devices (576px - 767px) */
            @media (min-width: 576px) and (max-width: 767px) {
                #hero {
                    padding: 60px 0;
                }

                .carousel-caption h2 {
                    font-size: 2.2rem;
                }

                .carousel-caption h3 {
                    font-size: 1.2rem;
                }
            }

            /* Extra Small Mobile Devices (up to 575px) */
            @media (max-width: 575px) {
                #hero {
                    padding: 40px 0;
                }

                .carousel-caption h2 {
                    font-size: 1.8rem;
                }

                .carousel-caption h3 {
                    font-size: 1rem;
                }
            }

            @media (min-width: 344px) and (max-width: 882px) {
                #hero {
                    padding: 50px 0;
                }
                .carousel-caption {
                top: 20%;
                right: 30%;
                bottom: 20px;
                left: 0px !important;
                z-index: 9999;
                padding-top: 20px;
                padding-bottom: 20px;
                color: #fff;
                text-align: center;
            }
                .carousel-caption h2 {
                    font-size: 2.2rem;
                }

                .carousel-caption h3 {
                    font-size: 1.1rem;
                }

                /* Additional styles for this range */
                .header {
                    background-color: #333;
                    color: #fff;
                }

                /* Example for text styling */
                p {
                    font-size: 1.2rem;
                    line-height: 1.5;
                    color: #666;
                }
            }

            #hero{
                height: 100vh !important;
            }
            .carousel-inner{
                height: 100%;
            }
        </style>
    @endpush

    <section id="hero" class="hero section dark-background bg-transparent">
        {{-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($heros as $index => $hero)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <img src="{{ Storage::url($hero->slider_image) }}" class="d-block w-100 img-fluid" alt="">
                    </div>
                @endforeach
            </div>
        </div> --}}
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" data-interval="3000"
            style="width: 100%">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://i.postimg.cc/wTBDN2JW/1.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="animated bounceInRight" style="animation-delay: 1s">We Are Reliable</h2>
                        <h3 class="animated bounceInLeft" style="animation-delay: 2s">Lorem ipsum dolor sit amet.</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://i.postimg.cc/GhHwf0Gv/2.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="animated slideInDown" style="animation-delay: 1s">We Deliver On Time</h2>
                        <h3 class="animated slideInRight" style="animation-delay: 2s">Lorem ipsum dolor sit amet.</h3>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://i.postimg.cc/ncsgk4fk/3.jpg" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h2 class="animated zoomIn" style="animation-delay: 1s">Best Customer Support</h2>
                        <h3 class="animated zoomIn" style="animation-delay: 2s">Lorem ipsum dolor sit amet.</h3>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            {{-- <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> --}}
        </div>



        {{-- <div class="container">
            <div class="row">
                <div class="col-lg-8 d-flex flex-column align-items-center align-items-lg-start">
                    <h2 class="text-center" data-aos="fade-up" data-aos-delay="100">{{ __('sentence.welcome') }}
                        <span>{{ Settings::setting('site.title') }}</span>
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="200">{{ Settings::setting('site.subtitle') }}</p>
                    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                        <a href="#" class="cta-btn">Our Menu</a>
                        <a href="#location" class="cta-btn">{{ __('sentence.location') }}</a>
                    </div>
                </div>

            </div>
        </div> --}}

    </section><!-- /Hero Section -->
    {{-- @dd(Settings::setting('slide.laft')) --}}
    <section>
        <div class="container ">
            <div class="row">
                <div class="col-3 mt-5" data-aos="fade-right">
                    <img src="{{ Storage::url(Settings::setting('slide.laft')) }}" class="img-fluid" alt="laft">
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-12 mb-2" data-aos="fade-up">
                            <img src="{{ Storage::url(Settings::setting('slide.laft_top')) }}" class="img-fluid"
                                alt="laft_top">
                        </div>
                        <div class="col-12 " data-aos="fade-down">
                            <img src="{{ Storage::url(Settings::setting('slide.laft_bottom')) }}" class="img-fluid"
                                alt="laft_bottom">
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-12 mb-2" data-aos="fade-right">
                            <img src="{{ Storage::url(Settings::setting('slide.right_top')) }}" class="img-fluid"
                                alt="right_top">
                        </div>
                        <div class="col-12" data-aos="fade-left">
                            <img src="{{ Storage::url(Settings::setting('slide.right_bottom')) }}" class="img-fluid"
                                alt="right_bottom">
                        </div>

                    </div>
                </div>
                <div class="col-3  mt-5" data-aos="fade-down">
                    <img src="{{ Storage::url(Settings::setting('slide.right')) }}" class="img-fluid" alt="right">
                </div>
            </div>
        </div>
    </section>
    <section id="location" class="menu section bg-transparent">

        <!-- Section Title -->
        <div class="container section-title text-center " data-aos="fade-up">
            <h2>{{ __('sentence.location') }}</h2>
            <p style="color: #E5D5BF">{{ __('sentence.locationtitle') }}</p>
        </div><!-- End Section Title -->


        <div class="container mb-3" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                    <form action="{{ route('location.store') }}" method="post" id="location-form">
                        @csrf
                        <div class="input-group mb-3 text-center">
                            <input type="text" id="location-input"
                                class="form-control form-control-lg location text-center" placeholder="Enter Location"
                                aria-label="Enter Location" aria-describedby="button-addon2" name="location"
                                value="{{ session()->get('current_location') ?? '' }}">
                            <button class="btn btn-outline-orange" type="button" id="location-button">
                                <i class="bi bi-geo-alt flex-shrink-0"></i>
                            </button>
                            <button class="btn btn-outline-orange" type="submit">{{ __('sentence.enter') }}</button>
                        </div>
                    </form>
                </div><!--  Item -->
            </div><!--  Container -->
        </div>

    </section><!-- / Section -->

    <x-user.restaurant :restaurants="$restaurants" />
</x-user>
@push('js')
    <script>
        $(document).ready(function() {
            $('#carouselExampleCaptions').carousel();
        });
    </script>
@endpush
