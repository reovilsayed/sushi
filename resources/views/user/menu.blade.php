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

        <button class="btn btn-primary d-block d-md-none" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample"
            style="background: transparent; border: none">
            <i class="fs-1 bi bi-list"></i>
        </button>

        <!-- Offcanvas Menu -->
        <!-- Offcanvas Menu -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Categories</h5>
                <!-- Close Button -->
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"><i class="bi bi-x-lg fs-1"></i></button>
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
                                        <a href="#{{ $child->id }}" class="accordion-body"
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

                                <div class="row justify-content-center">
                                    @foreach ($child->products as $product)
                                        <div class="col-md-2 col-sm-6 col-12">
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
            <div class="modal-content " style="background-color: var(--default-color)">
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
            <script>
                // Function to initialize the map for map-nos div


                $(document).ready(function() {
                    // Fetch Google Maps API key from the server
                    fetch('/get-google-maps-api-key')
                        .then(response => response.text())
                        .then(apiKey => {
                            let key = JSON.parse(apiKey);

                            // Load Google Maps API with the retrieved API key
                            const script = document.createElement('script');
                            script.src =
                                `https://maps.googleapis.com/maps/api/js?key=${key}&libraries=geometry,places&callback=initMapNOS`;
                            script.async = true;
                            script.defer = true;
                            script.onload = function() {
                                // Now that the Google Maps API is loaded, you can use it

                                // Autocomplete functionality
                                var input = document.getElementById('map_address_input');

                                var options = {
                                    componentRestrictions: {
                                        country: 'fr'
                                    }
                                };


                                var autocomplete = new google.maps.places.Autocomplete(input, options);

                                // Fetch the current location when the document is ready
                                // Function to geocode an address
                                function geocodeAddress(address, callback) {
                                    var geocoder = new google.maps.Geocoder();
                                    geocoder.geocode({
                                        'address': address
                                    }, function(results, status) {
                                        if (status === 'OK') {
                                            callback({
                                                lat: results[0].geometry.location.lat(),
                                                lng: results[0].geometry.location.lng()
                                            });
                                        } else {
                                            alert('Select Correct Address');
                                        }
                                    });
                                }
                                console.log(geocodeAddress);

                                function checkIfPointInAnyZone(point, callback) {
                                    var xhr = new XMLHttpRequest();
                                    xhr.open('GET', '/zones', true);
                                    xhr.onload = function() {
                                        var zones = JSON.parse(xhr.responseText);
                                        for (var i = 0; i < zones.length; i++) {
                                            var zone = zones[i];
                                            var polygon = new google.maps.Polygon({
                                                paths: zone.coordinates.map(coord => ({
                                                    lat: coord.lat,
                                                    lng: coord.lng
                                                }))
                                            });
                                            if (google.maps.geometry.poly.containsLocation(point, polygon)) {
                                                callback(zone);
                                                return;
                                            }
                                        }
                                        callback(null);
                                    };
                                    xhr.send();
                                }

                                // Your other code here
                                $('#checkDZ').click(function() {
                                    var address = $('#map_address_input').val();

                                    geocodeAddress(address, function(location) {
                                        var lat = location.lat;
                                        var lng = location.lng;

                                        var point = new google.maps.LatLng(lat, lng);

                                        checkIfPointInAnyZone(point, function(zone) {
                                            if (zone) {
                                                $.ajax({
                                                    url: '/store-in-session',
                                                    method: 'POST',
                                                    data: {
                                                        'method': 'delivery',
                                                        'restaurant': zone
                                                            .restaurant_id,
                                                        'address': address,
                                                        _token: '{{ csrf_token() }}' // Ensure you have CSRF token included
                                                    },
                                                    success: function(response) {
                                                        console.log(
                                                            'Restaurant name stored in session'
                                                        );
                                                        console.log(zone
                                                            .restaurant_id);
                                                        window.location.href =
                                                            "/menu"; // Redirect to the menu page
                                                    },
                                                    error: function(jqXHR,
                                                        textStatus, errorThrown
                                                    ) {
                                                        alert(
                                                            'An error occurred. Please try again.'
                                                        );
                                                    }
                                                });
                                            } else {
                                                alert(
                                                    'Nous ne pouvons pas délivrer cette adresse, veuillez sélectionner un restaurant pour retirer votre commande'
                                                );
                                            }
                                        });

                                    });
                                });
                            };

                            // Append the script to the document head
                            document.head.appendChild(script);
                        });
                });

                // Function to get address from latitude and longitude
                function getAddressFromLatLng(lat, lng) {
                    var geocoder = new google.maps.Geocoder();
                    var latlng = {
                        lat: parseFloat(lat),
                        lng: parseFloat(lng)
                    };

                    geocoder.geocode({
                        'location': latlng
                    }, function(results, status) {
                        if (status === 'OK') {
                            if (results[0]) {
                                document.getElementById('map_address_input').value = results[0].formatted_address;
                            } else {
                                alert('No results found');
                            }
                        } else {
                            alert('Geocoder failed due to: ' + status);
                        }
                    });
                }

                // Function to get the current location of the user
                function getCurrentLocation() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            var latitude = position.coords.latitude;
                            var longitude = position.coords.longitude;

                            getAddressFromLatLng(latitude, longitude);
                        }, function(error) {
                            alert('Error occurred. Error code: ' + error.code);
                        });
                    } else {
                        alert("Geolocation is not supported by this browser.");
                    }
                }
            </script>
        @endpush
</x-user>
