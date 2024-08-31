<div>
    <section id="about" class="cart_section pb-5 bg-transparent">
        <div class="container section-title aos-init aos-animate mt-4" data-aos="fade-up">
            <h2>{{ __('sentence.cart') }}</h2>
            <p>{{ __('sentence.products') }}</p>
        </div>

        <div class="container">

            <div class="row gy-4">
                <div class="col-lg-8 col-sm-12">
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
                            <tbody class="table_body" style="border-top: 1px solid var(--accent-color);">
                                @forelse (Cart::getContent() as $item)
                                
                                    <tr>
                                        <td class="cart-product-remove text-start ps-4">
                                            <a class="cart-product-remove text-center"
                                                href="{{ url('/cart-destroy/' . $item->id) }}"><i class="bi bi-trash"
                                                    style="color: var(--accent-color);"></i>
                                            </a>
                                        </td>

                                        @if (isset($item->attributes['restaurent']))
                                            @php
                                                $restuarant = App\Models\Restaurant::find(
                                                    $item->attributes['restaurent'],
                                                );
                                            @endphp
                                            <td class="cart-product-image">
                                                @if (isset($item->attributes['product']))
                                                    @php
                                                        $product = $item->attributes['product'];
                                                    @endphp
                                                    <a
                                                        href="{{ route('single.restaurant', ['restaurant' => $restuarant->slug, 'product' => $item->attributes['product']->id]) }}">
                                                        <img src="{{ $product->image ?? '' }}" alt="">
                                                    </a>
                                                @endif
                                            </td>
                                            @if (isset($item->attributes['product']))
                                                <td class="cart-product-info text-center">
                                                    <h4><a
                                                            href="{{ route('single.restaurant', ['restaurant' => $restuarant->slug, 'product' => $item->attributes['product']->id]) }}">{{ $item->name }}</a>
                                                    </h4>
                                                </td>
                                            @else
                                                <td class="cart-product-info text-center">
                                                    <h4><a href="#">{{ $item->attributes['extra']->name }}</a>
                                                    </h4>
                                                </td>
                                            @endif
                                        @endif




                                        <form action="{{ route('cart.update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item->id }}" />
                                            <td class="cart-product-quantity d-flex justify-content-center mt-3">
                                                <div class="text-start d-flex cart_quantity">
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
                                                </div>
                                            </td>
                                        </form>
                                        <td class="cart-product-subtotal text-center">
                                            {{ number_format($item->price * $item->quantity, 2) }} €</td>
                                    </tr>

                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-12 order-2 order-lg-1 content p-md-0" style="height: 226px;">
                    <div class="cart_total_section">
                        <h4 class="ms-3 pt-2" style="">{{ __('sentence.cart') }} {{ __('sentence.total') }}
                        </h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table-responsive" style="width: 100%;">
                            <tbody class="me-2 ms-2">
                                <tr style="height: 40px; ">
                                    <td class="ps-4">{{ __('sentence.cart') }} {{ __('sentence.subtotal') }}</td>
                                    <td>{{ number_format(Cart::getSubTotal(), 2) }} €</td>
                                </tr>
                                <tr style="height: 40px;">
                                    <td class="ps-4">{{ __('sentence.shipping') }} & {{ __('sentence.handling') }}
                                    </td>
                                    <td>$00.00</td>
                                </tr>
                                <tr style="height: 40px;">
                                    <td class="ps-4">{{ __('sentence.vat') }}</td>
                                    <td>$00.00</td>
                                </tr>
                                <tr style="height: 40px;">
                                    <td class="ps-4"><strong>{{ __('sentence.order') }}
                                            {{ __('sentence.total') }}</strong></td>
                                    <td><strong id="order_total_display">{{ number_format(Cart::getTotal(), 2) }}
                                            €</strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="btn-wrapper text-center pe-md-3">
                        @if (Cart::isEmpty())
                            <a href="{{ route('restaurant.home') }}"
                                class="checkout_btn">{{ __('sentence.proceedtocheckout') }}</a>
                        @else
                            <a href="{{ route('restaurant.checkout') }}"
                                class="checkout_btn">{{ __('sentence.proceedtocheckout') }}</a>
                        @endif
                    </div>

                </div>
            </div>
        </div>

    </section>
    @if (Cart::isEmpty())
        <a href="{{ route('restaurant.home') }}" class="checkout_btn">{{ __('sentence.gohome') }}</a>
    @else
        <section id="" class="extra_section pt-1 bg-transparent">
            <div class="container section-title aos-init aos-animate mt-5" data-aos="fade-up">
                <h2>{{ __('sentence.menu') }}</h2>
                <p>{{ __('sentence.estratitle') }}</p>
            </div>
            <div class="container">
                <div class="row gy-4">
                    <div class="col-md-12">
                        <div class="row text-center p-2">
                            @foreach ($extras as $extra)
                            
                                <div class="col-md-2 col-sm-6 d-flex align-items-center subcart2">
                                <x-cart.extra :extra="$extra" :restuarant="$restuarant" :extraBucket="$extraBucket" :prices="$extraPrice"/>
                                </div>
                            @endforeach
                        </div>
                       
                    </div>
                </div>
                
                
            </div>
        </section>
    @endif
</div>
