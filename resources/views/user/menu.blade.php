<x-user>
    @push('css')
        <style>
            .delivery {
                border: 1px solid var(--accent-color);
                font-weight: bold
            }

            .delivery:hover,
            .delivery:focus,
            .delivery:active,
            .btn:first-child:active {
                border: 1px solid var(--accent-color);
                color: var(--accent-color);
            }


            .delivery-dropdown {
                background: var(--default-color) !important;
                border: 1px solid var(--accent-color);
            }

            .dropdown-item:active {
                background-color: var(--accent-color);
                color: #fff !important;
            }

            #location-input:focus {
                outline: none !important;
                box-shadow: none !important;
            }

            .delivery-time {
                outline: none !important;
                box-shadow: none !important;
                border: 1px solid var(--accent-color);
            }

            .delivery-time:active,
            .delivery-time:hover,
            .delivery-time:focus {
                border: 1px solid var(--accent-color);

            }

            .subcategory-container {
                display: none;
                overflow: hidden;
                transition: all 0.5s ease;
            }

            .category-button i {
                transition: transform 0.5s ease;
            }
            .accordion , .accordion-item{
                background-color: transparent !important;
                border: none !important;
                
            }
            .accordion-button:focus {
                box-shadow: none !important;
            }
            .accordion-button{
                /* background-color: transparent !important; */
                background-color: transparent !important;
            }
            .accordion-collapse{
                padding-left: 40px
            }
        </style>
    @endpush
    <br><br><br>
    {{-- <x-user.about /> --}}
    <section id="menu" class="menu section bg-transparent">

        <!-- Section Title -->
        <div class="container " data-aos="fade-up">
            <div class="row">
                <div class="section-title col-md-4">
                    <h2>{{ __('sentence.menu') }}</h2>
                    <p style="color: var(--default-color)">{{ $restaurant->name }}</p>
                </div>
                <div class="section-title col-md-4">
                    <h2>Choose Delivery</h2>
                    <div class="dropdown">
                        <button class="btn bg-transparent dropdown-toggle mt-2 text-colour delivery" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Choose Delivery Here
                        </button>
                        <ul class="dropdown-menu delivery-dropdown">
                            <li><a class="dropdown-item text-colour" href="#">{{ __('sentence.takeaway') }}</a>
                            </li>
                            <li><button class="dropdown-item text-colour" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">{{ __('sentence.homedelivery') }}</button></li>
                        </ul>
                    </div>
                </div>
                <div class="section-title col-md-4">
                    <h2>Choose Delivery Time</h2>
                    <select
                        name="time_option"class="form-select selectpicker mt-2 bg-transparent text-colour delivery-time fw-bold"
                        data-container="body">
                        @foreach ($timeSlots as $time)
                            <option value="{{ $time }}" class="fw-bold">{{ $time }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

        </div><!-- End Section Title -->

        <div class="container-fluid isotope-layout" data-default-filter="*" data-layout="masonry"
            data-sort="original-order">
            <div class="row">
                {{-- <div class="col-md-2"
                    style="
                            position: -webkit-sticky;
                            position: sticky;
                            top: 150px; /* Adjust as needed */
                            height: 100vh;
                            overflow-y: auto;">
                    @foreach ($categories as $category)
                        <div class="category-container" data-aos="fade-up" data-aos-delay="200">
                            <div class="category">
                                <button class="category-button secondary-colour">
                                    {{ $category->name }}
                                    <i class="bi bi-plus-lg float-end"></i> <!-- Add the icon here -->
                                </button>
                                <div class="subcategory-container" style="display: none;">
                                    @if ($category->childs->count() > 0)
                                        @foreach ($category->childs as $child)
                                            <div class="subcategory">
                                                <a href="#{{ $child->name }}"
                                                    class="subcategory-button">{{ $child->name }}</a>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> --}}
                <div class="col-md-2"  style="
                position: -webkit-sticky;
                position: sticky;
                top: 150px; /* Adjust as needed */
                height: 100vh;
                overflow-y: auto;">
                    @foreach ($categories as $category)
                        <div class="accordion" id="accordionExample{{$category->id}}">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree{{$category->id}}" aria-expanded="false"
                                        aria-controls="collapseThree" style="color: var(--default-color);">
                                        {{ $category->name }}
                                    </button>
                                </h2>
                                @if ($category->childs->count() > 0)
                                @foreach ($category->childs as $child)
                                
                                <div id="collapseThree{{$child->parent_id}}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample{{$child->parent_id}}">
                                    <a href="#{{ $child->name }}" class="accordion-body" style="color: var(--default-color);">
                                        <div>{{ $child->name }}</div>
                                    </a>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    @endforeach


                </div>

                <div class="col-md-10">
                    <div class="row ">
                        @foreach ($categories as $category)
                            @foreach ($category->childs as $child)
                                <div class="menu-header d-flex justify-content-center" data-aos="fade-up"
                                    data-aos-delay="200">
                                    <a id="{{ $child->name }}" href="" class="  h4">{{ $child->name }}</a>
                                    <hr>
                                </div>

                                <div class="row justify-content-center">
                                    @foreach ($child->products as $product)
                                        <div class="col-md-2">
                                            <div class="isotope-container" data-aos="fade-up" data-aos-delay="200">
                                                <div class="card mb-3" style="background: transparent; border:none">
                                                    <div class="card-body">
                                                        <div class="text-center">
                                                            <a
                                                                href="{{ route('single.restaurant', ['restaurant' => $restaurant->slug, 'product' => $product]) }}">
                                                                <img class="img-fluid"
                                                                    src="{{ $product->image ? $product->image : asset('niko/assets/img/menu/lobster-bisque.jpg') }}">
                                                            </a>
                                                            <h4 class="text-colour"
                                                                style="font-family: var(--bs-body-font-family);">
                                                                <a
                                                                    href="{{ route('single.restaurant', ['restaurant' => $restaurant->slug, 'product' => $product]) }}">{{ $product->name }}</a>
                                                            </h4>
                                                            <div class="d-flex gap-3 justify-content-center">
                                                                <h5 class="fw-bold">{{ $product->price }} €</h5>
                                                                @php
                                                                    $productOption = App\Models\ProductOption::where(
                                                                        'product_id',
                                                                        $product->id,
                                                                    )->get();
                                                                @endphp
                                                                @if ($productOption->isNotEmpty())
                                                                    <a href="{{ route('single.restaurant', ['restaurant' => $restaurant->slug, 'product' => $product]) }}"
                                                                        class="fw-bold text-colour"
                                                                        style="background: transparent; border:none">
                                                                        <i
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
                                                                        <button type="submit"
                                                                            class="fw-bold text-colour"
                                                                            style="background: transparent; border:none">
                                                                            <i
                                                                                class="bi bi-plus"></i>{{ __('sentence.add') }}
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @endforeach


                    </div>

                </div>

            </div>


        </div>

    </section>

    <!-- Modal -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content " style="background-color: var(--default-color)">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-colour" id="exampleModalLabel">Enter your shipping address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group  text-center">
                        <input type="text" id="location-input"
                            class="form-control form-control-lg location text-center text-colour"
                            placeholder="Enter Location" aria-label="Enter Location"
                            aria-describedby="button-addon2">
                        <button class="btn btn-outline-orange" type="button" id="location-button">
                            <i class="bi bi-geo-alt flex-shrink-0"></i>
                        </button>
                        <button class="btn btn-outline-orange" type="button"
                            id="home-delivery">{{ __('sentence.enter') }}</button>
                    </div>
                </div><!--  Item -->

            </div>
        </div>
    </div>
    @push('js')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const categoryButtons = document.querySelectorAll('.category-button');

                categoryButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const subcategoryContainer = this.nextElementSibling;
                        const icon = this.querySelector('i');

                        // Toggle display with slide effect
                        if (subcategoryContainer.style.display === 'block') {
                            subcategoryContainer.style.display = 'none';
                            icon.classList.remove('bi-dash-lg');
                            icon.classList.add('bi-plus-lg');
                        } else {
                            subcategoryContainer.style.display = 'block';
                            icon.classList.remove('bi-plus-lg');
                            icon.classList.add('bi-dash-lg');
                        }
                    });
                });
            });
        </script>
    @endpush
</x-user>
