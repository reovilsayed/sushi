<x-user>

    

    <!-- product  Section -->
    <section id="about" class="about section ">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ asset('niko/image/restaurant.jpg') }}" class="img-fluid about-img" alt="">
                </div>
                <div class="col-lg-6 order-2 order-lg-1 content">
                    <h3>{{ $product->name }}</h3>
                    <p class="fst-italic">
                        COMPOSITION | {{ $product->composition }}
                    </p>
                    <p class="fst-italic">
                        Allergenes | {{ $product->allergenes }}
                    </p>

                    <div class="price mb-5">
                        <h2>{{ $product->price }}€</h2>
                        <div class="my-4">
                            <!-- Add to Cart -->
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="restaurent_id" value="{{ $restaurant->id }}">
                                <button type="submit" class="btn-orange">ADD TO CART</button>
                            </form>
                            {{-- <a href="#" class="btn-orange">Add To Cart</a> --}}
                        </div>
                    </div>
                    <hr>
                    <div class="price mb-3 d-flex gap-5">
                        <div class="d-flex gap-3">
                            <p class="">A EMPORTER :</p>

                            <!-- Button trigger modal -->
                            <a href="javascript:void()" type="button" class=" location-button" data-bs-toggle="modal"
                                data-bs-target="#locationModal">
                                Choose delivery
                            </a>
                        </div>
                        <div class="d-flex gap-3">
                            <p class="">Time :</p>

                            <!-- Button trigger modal -->
                            <a href="javascript:void()" type="button" class="location-button" data-bs-toggle="modal"
                                data-bs-target="#timeModal">
                                Choose Time
                            </a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="locationModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content"
                                    style="background: black; border : 1px solid var(--accent-color)">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-colour" id="exampleModalLabel">Location</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body mb-2">

                                        <div class="input-group mb-3">
                                            <input type="text " class="form-control location "
                                                placeholder="Enter Location" aria-label="Enter Location"
                                                aria-describedby="button-addon2" style="color: var(--accent-color)">
                                            <button class="btn btn-outline-orange" type="button"
                                                id="button-addon2">Location</button>
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="timeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content"
                                    style="background: black; border : 1px solid var(--accent-color)">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-colour" id="exampleModalLabel">Time</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body mb-2">
                                        {{-- <div class="input-group mb-3">
                                            <input type="text " class="form-control location "
                                                placeholder="Enter Location" aria-label="Enter Location"
                                                aria-describedby="button-addon2" style="color: var(--accent-color)">
                                            <button class="btn btn-outline-orange" type="button"
                                                id="button-addon2">Location</button>
                                        </div> --}}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                    <hr>
                    
                    <p>
                        Recipe cannot be modified. Dish prepared to order. Keep refrigerated. Consume within 24 hours.
                    </p>
                </div>
            </div>

        </div>

    </section>
</x-user>
