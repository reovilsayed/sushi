<x-user>
    <style>
        #location-input:focus {
            outline: none !important;
            box-shadow: none !important;
        }
    </style>

    <section id="hero" class="hero section dark-background bg-transparent">

        <img src="{{ asset('niko/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

        <div class="container">
            <div class="row">
                <div class="col-lg-8 d-flex flex-column align-items-center align-items-lg-start">
                    <h2 class="text-center" data-aos="fade-up" data-aos-delay="100">{{ __('sentence.welcome') }}
                        <span>{{ Settings::setting('site.title') }}</span>
                    </h2>
                    <p data-aos="fade-up" data-aos-delay="200">{{ Settings::setting('site.subtitle')}}</p>
                    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                        {{-- <a href="#" class="cta-btn">Our Menu</a> --}}
                        <a href="#location" class="cta-btn">{{ __('sentence.location') }}</a>
                    </div>
                </div>

            </div>
        </div>

    </section><!-- /Hero Section -->
    {{-- @dd(Settings::setting('slide.laft')) --}}
    <section>
        <div class="container ">
            <div class="row">
              <div class="col-3 mt-5" data-aos="fade-right">
                <img src="{{Storage::url(Settings::setting('slide.laft'))}}" class="img-fluid" alt="laft">
              </div>
              <div class="col-3">
                <div class="row">
                  <div class="col-12" data-aos="fade-up">
                    <img src="{{Storage::url(Settings::setting('slide.laft_top'))}}" class="img-fluid" alt="laft_top">
                  </div>
                  <div class="col-12 " data-aos="fade-down">
                    <img src="{{Storage::url(Settings::setting('slide.laft_bottom'))}}" class="img-fluid" alt="laft_bottom">
                  </div>
                </div>
              </div>
              <div class="col-3">
                <div class="row">
                  <div class="col-12 " data-aos="fade-right">
                    <img src="{{Storage::url(Settings::setting('slide.right_top'))}}" class="img-fluid" alt="right_top">
                  </div>
                  <div class="col-12" data-aos="fade-left">
                    <img src="{{Storage::url(Settings::setting('slide.right_bottom'))}}" class="img-fluid" alt="right_bottom">
                  </div>
          
                </div>
              </div>
              <div class="col-3  mt-5" data-aos="fade-down">
                <img src="{{Storage::url(Settings::setting('slide.right'))}}" class="img-fluid" alt="right">
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

        <div class="container mb-5" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                    <div class="input-group mb-3 text-center">
                        <input type="text" id="location-input"
                            class="form-control form-control-lg location text-center" placeholder="Enter Location"
                            aria-label="Enter Location" aria-describedby="button-addon2">
                        <button class="btn btn-outline-orange" type="button" id="location-button">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                        </button>
                        <button class="btn btn-outline-orange" type="button"
                            id="enter-button">{{ __('sentence.enter') }}</button>
                    </div>
                </div><!--  Item -->
            </div><!--  Container -->
        </div>

    </section><!-- / Section -->

    <x-user.restaurant :restaurants="$restaurants" />
</x-user>
@push('js')
@endpush
