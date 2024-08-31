<x-user>


    <section id="hero" class="hero section dark-background bg-transparent">
        <div id="carouselExampleDark" class="carousel carousel-dark slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $index => $slider)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}" data-bs-interval="10000">
                        <img src="{{ Storage::url($slider->image) }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->heading }}</h5>
                            <p>{{ $slider->title }}</p>
                        </div>
                    </div>
                @endforeach



            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </section><!-- /Hero Section -->

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
