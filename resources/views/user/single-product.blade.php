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

                    <div class="price mb-5">
                        <h2>{{ $product->price }}€</h2>
                        <div class="my-4">
                            <!-- Add to Cart -->
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="restaurent_id" value="{{ $restaurant->id }}">
                                <button type="submit" class="btn-orange">ADD TO CART</a>
                            </form>
                            {{-- <a href="#" class="btn-orange">Add To Cart</a> --}}
                        </div>
                    </div>
                    
                    <hr>
                    <ul>
                        <li><span class="text-colour">ALLERGENS</span></li>
                        @foreach ($product->allergenes as $allergene)
                        <li><i class="bi bi-check2-all"></i> <span>{{$allergene}}</span></li>    
                        @endforeach
                        
                        
                    </ul>
                    <p>
                        Recipe cannot be modified. Dish prepared to order. Keep refrigerated. Consume within 24 hours.
                    </p>
                </div>
            </div>

        </div>

    </section>
</x-user>
