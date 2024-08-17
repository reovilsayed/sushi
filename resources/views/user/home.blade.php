<x-user>

    <section id="hero" class="hero section dark-background bg-transparent">

        <img src="{{ asset('niko/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

        <div class="container">
            <div class="row">
                <div class="col-lg-8 d-flex flex-column align-items-center align-items-lg-start">
                    <h2 data-aos="fade-up" data-aos-delay="100">{{__('sentence.welcome')}} <span>{{Settings::site_title()}}</span></h2>
                    <p data-aos="fade-up" data-aos-delay="200">{{__('sentence.sitesubtitle')}}</p>
                    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                        {{-- <a href="#" class="cta-btn">Our Menu</a> --}}
                        <a href="#location" class="cta-btn">{{__('sentence.location')}}</a>
                    </div>
                </div>

            </div>
        </div>

    </section><!-- /Hero Section -->
    <section id="location" class="menu section bg-transparent">

        <!-- Section Title -->
        <div class="container section-title text-center " data-aos="fade-up">
            <h2 >{{__('sentence.location')}}</h2>
            <p>{{__('sentence.locationtitle')}}</p>
        </div><!-- End Section Title -->
    
        <div class="container mb-5" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-6">
                    <div class="input-group mb-3 text-center">
                        <input type="text" id="location-input" class="form-control form-control-lg location text-center"
                            placeholder="Enter Location" aria-label="Enter Location" aria-describedby="button-addon2">
                        <button class="btn btn-outline-orange" type="button" id="location-button">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                        </button>
                        <button class="btn btn-outline-orange" type="button" id="enter-button">{{__('sentence.enter')}}</button>
                    </div>
                </div><!--  Item -->
            </div><!--  Container -->
        </div>
    
    </section><!-- / Section -->
    
    <x-user.restaurant :restaurants="$restaurants" />
</x-user>
@push('js')
@endpush
