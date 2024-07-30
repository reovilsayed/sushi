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
                <div class="col-lg-4 d-flex align-items-center justify-content-center mt-5 mt-lg-0">
                    <!-- <a href="https://www.youtube.com/watch?v=LXb3EKWsInQ" class="glightbox pulsating-play-btn"></a> -->
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <x-user.about />


    <x-user.restaurant />
</x-user>
