<x-user>
    @push('css')
        <style>
            .delivery {
                border: 1px solid var(--accent-color);
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

            .accordion,
            .accordion-item {
                background-color: transparent !important;
                border: none !important;

            }

            .accordion-button:focus {

                outline: none !important;
                box-shadow: none !important;
            }

            .accordion-button {
                /* background-color: transparent !important; */
                background-color: transparent !important;
            }

            .accordion-collapse {
                padding-left: 40px
            }

            .accordion-button::after {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round'%3e%3cpath d='M2 5L8 11L14 5'/%3e%3c/svg%3e");
            }

            .accordion-button:not(.collapsed)::after {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='none' stroke='%23ffffff' stroke-linecap='round' stroke-linejoin='round'%3e%3cpath d='M2 5L8 11L14 5'/%3e%3c/svg%3e");
            }

            .price-container {
                position: relative;
                display: inline-block;
            }


            .price {
                opacity: 1;
                visibility: visible;
                position: relative;
                top: 20px;
                transition: top .4s cubic-bezier(0.215, 0.610, 0.355, 1);
            }

            .add-button {
                opacity: 0;
                visibility: hidden;
                position: relative;
                top: 10px;
                transition: top .5s cubic-bezier(0.215, 0.610, 0.355, 1);

            }

            .product-hover:hover .price {
                top: -10px;
                opacity: 0;
                visibility: hidden;
            }


            .product-hover:hover .add-button {
                top: -10px;
                opacity: 1;
                visibility: visible;
            }

            .btn-close {
                background-image: url('data:image/svg+xml,%3csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%23ffffff"%3e%3cpath d="M14.293 7.293a1 1 0 0 1 1.414 0L19 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414L20.414 12l3.293 3.293a1 1 0 0 1-1.414 1.414L19 13.414l-3.293 3.293a1 1 0 0 1-1.414-1.414L17.586 12l-3.293-3.293a1 1 0 0 1 0-1.414z"/%3e%3c/svg%3e');
                background-size: contain;
                background-position: calc(50% - 10px);
            }

            .btn-close:focus {
                box-shadow: none !important;
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
                        <ul class="dropdown-menu delivery-dropdown" style="width: 216px !important;">
                            <li><a class="dropdown-item text-colour" href="#">{{ __('sentence.takeaway') }}</a>
                            </li>
                            <li><button class="dropdown-item text-colour" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">{{ __('sentence.homedelivery') }}</button></li>
                        </ul>
                    </div>
                </div>
                <div class="section-title col-md-4">
                    <h2>Choose Delivery Time</h2>
                    <select name="time_option"class="form-select selectpicker mt-2 bg-transparent text-colour delivery-time ''" data-container="body">
                        @foreach ($timeSlots as $time)
                            <option value="{{ $time }}" class="''">{{ $time }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

        </div><!-- End Section Title -->


        <a class="btn btn-sm d-block d-md-none" type="button" style="position:fixed;bottom:80px;right:15px;background: #e5d5bf;display: flex; align-items: center; justify-content: center;padding:0 5px;"
    data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
    <i class="fs-1 bi bi-list"></i>
</a>

        <button class="btn btn-primary d-block d-md-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"
            style="background: transparent; border: none">
            <i class="fs-1 bi bi-list"></i>
        </button>


        <div class="container-fluid isotope-layout" data-default-filter="*" data-layout="masonry"
            data-sort="original-order">
            <div class="row">

                <div class="col-md-2 d-none d-md-block "
                    style="
                    position: -webkit-sticky;
                    position: sticky;
                    top: 150px; /* Adjust as needed */
                    height: 100vh;
                    overflow-y: auto;">
                    @foreach ($categories as $category)
                        <div class="accordion" id="accordionExample{{ $category->id }}">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed ''" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapseThree{{ $category->id }}"
                                        aria-expanded="false" aria-controls="collapseThree"
                                        style="color: var(--default-color);">
                                        {{ $category->name }}
                                    </button>
                                </h2>
                                @if ($category->childs->count() > 0)
                                    @foreach ($category->childs as $child)
                                        <div id="collapseThree{{ $child->parent_id }}"
                                            class="accordion-collapse collapse"
                                            data-bs-parent="#accordionExample{{ $child->parent_id }}">
                                            <a href="#{{ $child->name }}" class="accordion-body"
                                                style="color: var(--default-color);">
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
                                <div class="menu-header text-center" data-aos="fade-up" data-aos-delay="200">
                                <div class="menu-header text-center" data-aos="fade-up" data-aos-delay="200">
                                    <a id="{{ $child->name }}" href="" class="  h4">{{ $child->name }}</a>
                                    <p class="mt-2">{{ $child->description }}</p>
                                    <hr>
                                </div>

                                <div class="row justify-content-center">
                                    @foreach ($child->products as $product)
                                        <div class="col-md-2">
                                            <x-viewProduct.product :restaurant="$restaurant" :product="$product" />
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
                            placeholder="Enter Location" aria-label="Enter Location" aria-describedby="button-addon2">
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

    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel" style="background: rgba(0, 0, 0, 0.5)">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel" style="background: rgba(0, 0, 0, 0.5)">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            @foreach ($categories as $category)
                <div class="accordion" id="accordionExample{{ $category->id }}">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree{{ $category->id }}"
                                aria-expanded="false" aria-controls="collapseThree"
                                style="color: var(--default-color);">
                                {{ $category->name }}
                            </button>
                        </h2>
                        @if ($category->childs->count() > 0)
                            @foreach ($category->childs as $child)
                                <div id="collapseThree{{ $child->parent_id }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample{{ $child->parent_id }}">
                                    <a href="#{{ $child->name }}" class="accordion-body"
                                        style="color: var(--default-color);">
                                        <div>{{ $child->name }}</div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            @endforeach
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
