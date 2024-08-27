<div class="isotope-container" data-aos="fade-up" data-aos-delay="200">
    <div class="card mb-3" style="background: transparent; border:none">
        <div class="card-body">
            <div class="text-center product-hover">
                <a
                    href="{{ route('single.restaurant', ['restaurant' => $restaurant->slug, 'product' => $product]) }}">
                    <img class="img-fluid"
                        src="{{ $product->image ? $product->image : asset('niko/assets/img/menu/lobster-bisque.jpg') }}">
                </a>
                <h4 class="fs-6" style="font-family: var(--bs-body-font-family); ">
                    <a href="{{ route('single.restaurant', ['restaurant' => $restaurant->slug, 'product' => $product]) }}"
                        style="color: #e5d5bf !important;">{{ $product->name }}</a>
                </h4>
                <div class="d-flex gap-3 justify-content-center">
                    <div class="price-container">
                        <h5 class="fw-bold price">{{ $product->price }} €
                        </h5>

                        @php
                            $productOption = App\Models\ProductOption::where('product_id', $product->id)->get();
                        @endphp

                        @if ($productOption->isNotEmpty())
                            <a href="{{ route('single.restaurant', ['restaurant' => $restaurant->slug, 'product' => $product]) }}"
                                class="fw-bold text-colour add-button btn" style="background:#e5d5bf; ">
                                <i class="bi bi-plus"></i>{{ __('sentence.add') }}
                            </a>
                        @else
                            <form action="{{ route('cart.store') }}" method="post" class="add-button">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="restaurent_id" value="{{ $restaurant->id }}">
                                <button type="submit" class="fw-bold text-colour btn" style="background:#e5d5bf; ">
                                    <i class="bi bi-plus"></i>{{ __('sentence.add') }}</button>
                            </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>