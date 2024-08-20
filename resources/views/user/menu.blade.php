<x-user>
    @push('css')
    @endpush
    <br><br><br>
    {{-- <x-user.about /> --}}
    <section id="menu" class="menu section bg-transparent">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('sentence.menu') }}</h2>
            <p>{{ $restaurant->name }}</p>
        </div><!-- End Section Title -->

        <div class="container-fluid isotope-layout" data-default-filter="*" data-layout="masonry"
            data-sort="original-order">
            <div class="row">
                <div class="col-md-2"
                    style="
                            position: -webkit-sticky;
                            position: sticky;
                            top: 150px; /* Adjust as needed */
                            height: 100vh;
                            overflow-y: auto;">
                    @foreach ($categories as $category)
                        <div class="category-container" data-aos="fade-up" data-aos-delay="200">
                            <div class="category">
                                <button class="category-button secondary-colour ">{{ $category->name }}</button>
                                <div class="subcategory-container ">
                                    @if ($category->childs->count() > 0)
                                        @foreach ($category->childs as $child)
                                            <hr>
                                            <div class="subcategory">
                                                <a href="#{{ $child->name }}" class="subcategory-button"
                                                    style="">{{ $child->name }}</a>
                                            </div>
                                        @endforeach
                                    @endif


                                </div>
                            </div>
                            <hr>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-9">
                    <div class="row">
                        @foreach ($categories as $category)
                            @foreach ($category->childs as $child)
                                <div class="menu-header text-center" data-aos="fade-up" data-aos-delay="200">
                                    <a id="{{ $child->name }}" href=""
                                        class="text-colour h4">{{ $child->name }}</a>
                                    <hr>
                                </div>

                                @foreach ($child->products as $product)
                                    <div class="col-md-3">
                                        <div class="isotope-container" data-aos="fade-up" data-aos-delay="200">
                                            <div class="card mb-3" style="background: transparent; border:none">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <a
                                                            href="{{ route('single.restaurant', ['restaurant' => $restaurant->slug, 'product' => $product]) }}"><img
                                                                class="img-fluid"
                                                                src="{{ $product->image ? $product->image : asset('niko/assets/img/menu/lobster-bisque.jpg') }}"></a>

                                                        <h4 class="text-colour "
                                                            style="font-family: var(--bs-body-font-family);"><a
                                                                href="{{ route('single.restaurant', ['restaurant' => $restaurant->slug, 'product' => $product]) }}">{{ $product->name }}</a>
                                                        </h4>
                                                        <div class="d-flex gap-3 justify-content-center">
                                                            <h5 class="fw-bold ">{{ $product->price }} €</h5>
                                                            @php
                                                                $productOption = App\Models\ProductOption::where(
                                                                    'product_id',
                                                                    $product->id,
                                                                )->get();
                                                            @endphp
                                                            @if ($productOption->isNotEmpty())
                                                            <a href="{{ route('single.restaurant', ['restaurant' => $restaurant->slug, 'product' => $product]) }}"  class="fw-bold text-colour"
                                                                style="background: transparent; border:none"><i
                                                                    class="bi bi-plus"></i>{{ __('sentence.add') }}
                                                            </a>
                                                            @else
                                                                <form action="{{ route('cart.store') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="quantity"
                                                                        value="1">
                                                                    <input type="hidden" name="product_id"
                                                                        value="{{ $product->id }}">
                                                                    <input type="hidden" name="restaurent_id"
                                                                        value="{{ $restaurant->id }}">
                                                                    <button type="submit" class="fw-bold text-colour"
                                                                        style="background: transparent; border:none"><i
                                                                            class="bi bi-plus"></i>{{ __('sentence.add') }}
                                                                    </button>
                                                                </form>
                                                            @endif


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-12 menu-item isotope-item ">
                                            <img src="{{ asset('niko/assets/img/menu/lobster-bisque.jpg') }}"
                                                class="menu-img" alt="">
                                            <div class="menu-content">
                                                <a href="{{route('single.restaurant',['restaurant'=>$restaurant->slug,'product'=>$product])}}">{{$product->name}}</a><span>{{$product->price}}€</span>
                                            </div>
                                            <div class="menu-ingredients">
                                                {{$product->allergenes}}
                                            </div>
                                        </div><!-- Menu Item --> --}}

                                        </div>

                                    </div>
                                @endforeach
                            @endforeach
                        @endforeach


                    </div>

                </div>

            </div>


        </div>

    </section>

    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const categoryButtons = document.querySelectorAll('.category-button');
                const subcategoryButtons = document.querySelectorAll('.subcategory-button');

                categoryButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const subcategoryContainer = this.nextElementSibling;
                        if (subcategoryContainer.style.display === 'block') {
                            subcategoryContainer.style.display = 'none';
                        } else {
                            subcategoryContainer.style.display = 'block';
                        }
                    });
                });

            });
        </script>
    @endpush
</x-user>
