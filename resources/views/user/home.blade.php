<x-user>
    <section id="hero" class="hero section dark-background">

        <img src="{{ asset('niko/assets/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">

        <div class="container">
            <div class="row">
                <div class="col-lg-8 d-flex flex-column align-items-center align-items-lg-start">
                    <h2 data-aos="fade-up" data-aos-delay="100">Welcome to <span>Restaurantly</span></h2>
                    <p data-aos="fade-up" data-aos-delay="200">Delivering great food for more than 18 years!</p>
                    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
                        <a href="#menu" class="cta-btn">Our Menu</a>
                        <a href="#book-a-table" class="cta-btn">Book a Table</a>
                    </div>
                </div>
                
            </div>
        </div>

    </section><!-- /Hero Section -->
    <!--  Section -->
    <section id="menu" class="menu section ">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Location</h2>
            <p>Check Our Restaurant Nearby</p>
        </div><!-- End Section Title -->

        <div class="container isotope-layout mb-5" data-default-filter="*" data-layout="masonry"
            data-sort="original-order">
            <div class="isotope-container " data-aos="fade-up" data-aos-delay="200">
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg location" placeholder="Enter Location" aria-label="Enter Location" aria-describedby="button-addon2">
                        <button class="btn btn-outline-orange " type="button" id="button-addon2"><i class="bi bi-geo-alt flex-shrink-0"></i></button>
                    </div>
                </div><!--  Item -->

            </div><!--  Container -->

        </div>

    </section><!-- / Section -->
    <x-user.restaurant :restaurants="$restaurants" />
</x-user>
