<x-user>



    <!-- product  Section -->
    <section id="about" class="about section bg-transparent">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ ( $product->image) ?  $product->image : asset('niko/image/restaurant.jpg') }}" class="img-fluid about-img" alt="" style="border: none"> 
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

                    <p>
                        {{ $product->description }}
                    </p>
                </div>
            </div>

        </div>

    </section>
</x-user>
