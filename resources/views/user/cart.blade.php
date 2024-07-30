<x-user>
    @push('css')
        <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    @endpush
    <div class="container main_cart">
        <div class="row">
            <div class="col-md-8">
                
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>

    <section id="about" class="cart_section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-8 order-1 order-lg-2">
                    
                </div>
                <div class="col-lg-4 order-2 order-lg-1 content">
                    <h3>This is About Part </h3>
                    {{-- <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et
                        dolore
                        magna aliqua.
                    </p> --}}
                    <ul>
                        <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.</span>
                        </li>
                        <li><i class="bi bi-check2-all"></i> <span>Duis aute irure dolor in reprehenderit in
                                voluptate
                                velit.</span></li>
                        <li><i class="bi bi-check2-all"></i> <span>Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis
                                aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore
                                eu fugiat nulla
                                pariatur.</span></li>
                    </ul>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                        reprehenderit in
                        voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident
                    </p>
                </div>
            </div>

        </div>

    </section>
</x-user>
