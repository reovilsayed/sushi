@php
    $timeSelect = session()->get('delivery_time');
@endphp
<x-user>
    @push('css')
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('css/menu.css') }}">

        <style>
            .sushibtn {
                padding: 6px 4px !important;
                border: 1px solid var(--accent-color) !important;
                border-radius: 0px;
                color: #ffffff;
            }

            .sushibtn {
                padding: 6px 4px !important;
                border: 1px solid var(--accent-color) !important;
                border-radius: 0px;
                background-color: var(--accent-color);
                color: #ffffff;
            }
        </style>
    @endpush
    <br><br><br>
    {{-- <x-user.about /> --}}
    <section id="menu" class="menu section bg-transparent">

        <!-- Section Title -->
        <div class=" " style="margin-left: 30px; margin-right: 30px;" data-aos="fade-up">
            <div class="row">
                <div class="section-title col-md-4">
                    <h2>{{ __('sentence.menu') }}</h2>
                    <p style="color: var(--default-color)">{{ $restaurant->name }}</p>
                </div>
                <div class="section-title col-md-5">
                    <h2 class="mb-2" style="font-size: 26px;">TAKE AWAY</h2>
                    <h6 style="color: color-mix(in srgb, var(--default-color), transparent 30%); margin-bottom: 0px ;"
                        hidden>
                        Current location : (15 to 20 Minutes)</h6>
                    <button class="text-colour Delivery" data-bs-toggle="modal" data-bs-target="#exampleModal">Choose
                        Delivery _____</button>
                </div>

                <div class="section-title col-md-3">
                    <form id="timeForm" action="{{ route('time_update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <label for="" class="form-content mb-2">Current delay : (15 to 20 Minutes)</label>
                        <select name="TimeOption"
                            class="form-select selectpicker  bg-transparent text-colour delivery-time"
                            data-container="body" onchange="submitTimeForm()">
                            @foreach ($timeSlots as $time)
                                <option value="{{ $time }}"
                                    {{ isset($timeSelect[0]) && $time == $timeSelect[0] ? 'selected' : '' }}>
                                    {{ $time }}</option>
                            @endforeach
                        </select>
                    </form>
                    @if (!Cart::isEmpty())
                        <div class="mt-2 text-end">
                            <a href="{{ route('restaurant.cart', ['slug' => $restaurant->slug]) }}" role="button"
                                class="btn sushibtn p-md-3 goback">
                                Cart <i class="bi bi-chevron-right"></i>
                            </a>
                        </div>
                    @endif


                </div>

            </div>

        </div><!-- End Section Title -->


        <a class="btn btn-sm d-block d-md-none" type="button"
            style="position:fixed;bottom:80px;right:15px;background: #e5d5bf;display: flex; align-items: center; justify-content: center;padding:0 5px;"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class="fs-1 bi bi-list"></i>
        </a>

        {{-- <button class="btn btn-primary d-block d-md-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"
            style="background: transparent; border: none">
            <i class="fs-1 bi bi-list"></i>
        </button> --}}

        <!-- Offcanvas Menu -->
        <!-- Offcanvas Menu -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Categories</h5>
                <!-- Close Button -->
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i
                        class="bi bi-x-lg fs-1"></i></button>
            </div>
            <div class="offcanvas-body" style="background-color: #810707 !important;">
                @foreach ($categories as $category)
                    <div class="accordion" id="accordionExample{{ $category->id }}">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree{{ $category->id }}" aria-expanded="false"
                                    aria-controls="collapseThree" style="color: var(--default-color);">
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


        <div class="container-fluid isotope-layout">
            <div class="row">
                <!-- Sidebar for larger screens -->
                <div class="col-md-3 col-sm-12 d-none d-md-block"
                    style="position: sticky; top: 150px; height: 100vh; overflow-y: auto;">
                    @foreach ($categories as $category)
                        <div class="accordion" id="accordionExample{{ $category->id }}">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree{{ $category->id }}" aria-expanded="false"
                                        aria-controls="collapseThree" style="color: var(--default-color);">
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

                <!-- Main Content Area -->
                <div class="col-md-9 col-sm-12">
                    <div class="row">
                        @foreach ($categories as $category)
                            @foreach ($category->childs as $child)
                                <div class="menu-header text-center" data-aos="fade-up" data-aos-delay="200">
                                    <a id="{{ $child->name }}" href=""
                                        class="h4">{{ $child->name }}</a>
                                    <p class="mt-2 fst-italic">{{ $child->description }}</p>
                                </div>

                                <div class="row">
                                    @foreach ($child->products as $product)
                                        <div class="col-md-3 col-sm-12 col-12">
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
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content " style="background-color: #000">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-colour" id="exampleModalLabel">Enter your shipping address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="input-group text-center">
                        <input type="text" id="map_address_input" name="location" value=""
                            class="form-control form-control-lg location text-center"
                            style="color: #ffffff; border-radius: 0px !important; background-color: black; border: 0px; padding-right: 0;"
                            placeholder="Enter Location" aria-label="Enter Location"
                            aria-describedby="button-addon2">
                        <button class="btn bg-black border-0 btn-outline-orange" style="border-left: 0px"
                            type="button" onclick="getCurrentLocation()" id="location-button">
                            <i class="bi bi-geo-alt fs-4"></i>
                        </button>
                        <button id="checkDZ"class="btn btn-outline-orange"
                            style="background-color: var(--accent-color) !important; border-color: var(--accent-color) !important; color: #ffffff !important;">
                            {{ __('Enter') }}
                        </button>
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
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
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
            </div>
        </div>


        @push('js')
            <script>
                function submitTimeForm() {
                    // Submit the form when an option is selected
                    document.getElementById('timeForm').submit();
                }
            </script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const offcanvasInstance = bootstrap.Offcanvas.getInstance(document.getElementById('offcanvasExample'));

                    document.querySelectorAll('.offcanvas-body a').forEach(item => {
                        item.addEventListener('click', () => {
                            document.querySelector('[data-bs-target="#offcanvasExample"]').click();
                        });
                    });

                    document.querySelectorAll('.category-button').forEach(button => {
                        button.addEventListener('click', () => {
                            const subcategory = button.nextElementSibling;
                            const icon = button.querySelector('i');
                            const isVisible = subcategory.style.display === 'block';
                            subcategory.style.display = isVisible ? 'none' : 'block';
                            icon.classList.toggle('bi-plus-lg', isVisible);
                            icon.classList.toggle('bi-dash-lg', !isVisible);
                        });
                    });
                });
            </script>
        @endpush
</x-user>
