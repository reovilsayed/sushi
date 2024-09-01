@php
    $firstItem = Cart::getContent()->first();
    $restaurant = $firstItem ? App\Models\Restaurant::find($firstItem->attributes->restaurent) : null;
@endphp
<div>
    @push('css')
        <style>
            .sushibtn {
                padding: 4px 3px !important;
                border: 1px solid #ff883e !important;
                border-radius: 0px;
                color: #ffffff;
            }

            .sushibtn {
                padding: 4px 3px !important;
                border: 1px solid #ff883e !important;
                border-radius: 0px;
                background-color: #ff883e;
                color: #ffffff;
            }
        </style>
    @endpush
    <section id="about" class="cart_section pb-5 bg-transparent">
        <div class="container section-title aos-init aos-animate pb-2 mt-4" data-aos="fade-up">
            <div class="">
                <a href="{{ route('restaurant.menu', ['slug' => $restaurant->slug]) }}" role="button"
                    class="btn sushibtn p-md-3 goback"> <i class="bi bi-chevron-left"></i> Back</a>

                <a href="{{ route('restaurant.menu', ['slug' => $restaurant->slug]) }}" role="button"
                    class="btn sushibtn p-md-3 goback"> Menu <i class="bi bi-chevron-right"></i></a>
            </div>

            {{-- <h2>{{ __('sentence.cart') }}</h2> --}}
            <p style="color: #ffffff">PANIER</p>
        </div>
        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-12 col-sm-12">
                    <div class="table-responsive">
                        <table class="cart_table  table-responsive">
                            {{-- <thead class="table_head text-dark">
                                <th class="cart-product-remove" style="padding-left:20px;">{{ __('sentence.remove') }}
                                </th>
                                <th class="cart-product-image">{{ __('sentence.image') }}</th>
                                <th class="cart-product-info text-center">{{ __('sentence.name') }}</th>
                                <th class="cart-product-quantity text-center">{{ __('sentence.quantity') }}</th>
                                <th class="cart-product-subtotal text-center">{{ __('sentence.subtotal') }}</th>
                            </thead> --}}
                            <tbody class="table_body">
                                @forelse (Cart::getContent() as $item)
                                    @if (isset($item->attributes['product']))
                                        <tr>
                                            @if (isset($item->attributes['restaurent']))
                                                @php
                                                    $restuarant = App\Models\Restaurant::find(
                                                        $item->attributes['restaurent'],
                                                    );
                                                @endphp
                                                <td class="cart-product-image">
                                                    @php
                                                        $product = $item->attributes['product'];
                                                    @endphp
                                                    <a
                                                        href="{{ route('single.restaurant', ['restaurant' => $restuarant->slug, 'product' => $item->attributes['product']->id]) }}">
                                                        <img src="{{ $product->image ?? '' }}" alt="">
                                                    </a>

                                                </td>

                                                <td class="cart-product-info text-center">
                                                    <h4><a class="fw-lighter fs-4"
                                                            href="{{ route('single.restaurant', ['restaurant' => $restuarant->slug, 'product' => $item->attributes['product']->id]) }}"
                                                            style="color: #ffffff !important;">{{ $item->name }}</a>
                                                    </h4>
                                                </td>
                                            @endif
                                            <td class="cart-product-quantity d-flex justify-content-center mt-3">
                                                {{-- <div class="text-start d-flex cart_quantity">
                                                <div class="cart_quantity_item">

                                                    <input type="text" value="{{ $item->quantity }}"
                                                        name="quantity" class="text-center"
                                                        style="width: 100% !important; height: 100% !important; background-color: transparent !important;  border: 0 !important;outline: none; color:var(--heading-color);">
                                                </div>
                                                <div class="cart_quantity_item1">
                                                    <button type="submit" class="update_btn"><i
                                                            class="bi bi-pencil"></i>
                                                    </button>
                                                </div>
                                            </div> --}}
                                                <form id="update-cart-form-{{ $item->id }}" method="post">
                                                    <div class="cart-product-quantity d-flex justify-content-center">
                                                        <div class="cart-plus-minus" style="border: 0px !important;">
                                                            <button class="dec decrease-btn qtybutton"
                                                                style="border: 0px !important;"
                                                                onclick="event.preventDefault(); updateQuantity('{{ $item->id }}', -1);">-</button>

                                                            <input type="text" value="{{ $item->quantity }}"
                                                                name="quantity" class="cart-plus-minus-box"
                                                                id="product_quantity_{{ $item->id }}" min="1"
                                                                placeholder="0" data-price="{{ $item->price }}"
                                                                data-name="{{ $item->name }}" readonly>

                                                            <button class="inc increase-btn qtybutton"
                                                                style="border: 0px !important;"
                                                                onclick="event.preventDefault(); updateQuantity('{{ $item->id }}', 1);">+</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                            <td class="cart-product-subtotal text-center">
                                                {{ number_format($item->price * $item->quantity, 2) }} €

                                                <a class="cart-product-remove text-center d-block mt-2"
                                                    style="color: #ff883e !important;"
                                                    href="{{ url('/cart-destroy/' . $item->id) }}">Supprimer
                                                </a>
                                            </td>
                                        </tr>
                                    @endif

                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
    @if (Cart::isEmpty())
        <a href="{{ route('restaurant.home') }}" class="checkout_btn">{{ __('sentence.gohome') }}</a>
    @else
        <section id="" class="extra_section pt-1 bg-transparent">
            {{-- <div class="container section-title aos-init aos-animate mt-5" data-aos="fade-up">
                <h2 style="color: #ff883e!important;">{{ __('sentence.menu') }}</h2>
                <p style="color: #ff883e!important;">{{ __('sentence.estratitle') }}</p>
            </div> --}}
            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="row text-center p-2">
                            @foreach ($extras as $extra)
                                <div class="col-md-2 col-sm-6 d-flex align-items-center subcart2">
                                    <x-cart.extra :extra="$extra" :restuarant="$restuarant" :extraBucket="$extraBucket"
                                        :prices="$extraPrice" />
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>


            </div>
        </section>
    @endif
</div>
@push('js')
    <script>
        function updateQuantity(productId, change) {
            // Get the current quantity
            let quantityInput = document.getElementById(`product_quantity_${productId}`);
            let currentQuantity = parseInt(quantityInput.value);

            // Calculate the new quantity
            let newQuantity = currentQuantity + change;
            if (newQuantity < 1) return; // Ensure the quantity doesn't go below 1

            // Update the quantity input field with the new value
            quantityInput.value = newQuantity;

            // Send an AJAX request to update the cart
            $.ajax({
                url: "{{ route('cart.update') }}", // Replace with your route
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId,
                    quantity: newQuantity,
                },
                success: function(response) {
                    location.reload();
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    // Handle the error
                }
            });
        }
    </script>
@endpush
