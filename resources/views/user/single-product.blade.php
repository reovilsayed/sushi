<x-user>
    @push('css')
        <style>
            #option-select:focus{
                box-shadow: none !important;
                outline: none !important;
            }
        </style>
    @endpush
    <br><br><br>
    <!-- product  Section -->
    <section id="about" class="about section bg-transparent">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ $product->image ? $product->image : asset('niko/image/restaurant.jpg') }}"
                        class="img-fluid about-img" alt="" style="border: none">
                </div>
                <div class="col-lg-6 order-2 order-lg-1 content">
                    <h3>{{ $product->name }}</h3>

                    <p class="fst-italic">{{ $product->composition }}</p>
                    <p class="fst-italic">
                        {{ __('sentence.allergenes') }} | {{ $product->allergenes }}
                    </p>
                    <form action="{{ route('cart.store') }}" method="post">
                        @csrf
                        <div class="price mb-5">
                            <div class="row">
                                <h2 class="col-md-2" id="product-price">{{ number_format($product->price, 2) }}€</h2>
                                @if ($productOption->isNotEmpty())
                                    <div class="col-md-6 ms-2">
                                        <select class="form-select selectpicker  mb-3 text-colour"
                                            style="border: 1px solid var(--accent-color); background-color: color-mix( var(--background-color), transparent 50%);"
                                            name="option_id" id="option-select" required>
                                            {{-- <option selected value="">{{ __('sentence.otherOptions') }}</option> --}}
                                            @foreach ($productOption as $option)
                                                <option value="{{ $option->id }}" data-price="{{ $option->option_price }}">{{ $option->option_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif
                            </div>
                            <div class="my-4">
                                <!-- Add to Cart -->
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="restaurent_id" value="{{ $restaurant->id }}">
                                <button type="submit" class="btn-orange"
                                    style="">{{ __('sentence.addtocart') }}</button>

                            </div>
                        </div>
                    </form>
                    <p>{{ $product->description }}</p>
                </div>
            </div>

        </div>

    </section>

    @push('js')
        <script>
            document.getElementById('option-select').addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                const price = selectedOption.getAttribute('data-price');

                if (price) {
                    document.getElementById('product-price').textContent = parseFloat(price).toFixed(2) + '€';
                } else {
                    // Fallback to the original product price if no option is selected
                    document.getElementById('product-price').textContent = '{{ number_format($product->price, 2) }}€';
                }
            });
        </script>
    @endpush
</x-user>
