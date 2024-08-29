<x-user>
    @push('css')
        <meta name="csrf-token" content="{{ csrf_token() }}">
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

            .disabled-link {
                pointer-events: none;
                cursor: default;
                color: gray;
            }

            .select-hidden {
                display: none;
            }

            .select {
                cursor: pointer;
                position: relative;
                width: 200px;
            }

            .select-styled {
                position: relative;
                /* background-color: #b04332; */
                padding: 10px;
                font-size: 16px;
                color: #fff;
                border: 1px solid #c35443;
            }

            .select-styled:after {
                content: "";
                position: absolute;
                right: 10px;
                top: 50%;
                width: 0;
                height: 0;
                border: 6px solid transparent;
                border-top-color: #fff;
                transform: translateY(-50%);
            }

            .select-styled.active:after {
                border-bottom-color: #fff;
                border-top-color: transparent;
            }

            .select-options {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background-color: #b04332;
                border: 1px solid #c35443;
                border-radius: 4px;
                margin-top: 5px;
                z-index: 9999 !important;
                list-style: none;
                padding: 0;
            }

            .select-options li {
                padding: 10px;
                color: #fff;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .select-options li:hover,
            .select-options li.is-selected {
                background-color: #c35443;
            }
            /* niko  */
            
            .modal-content{
                background-color: var(--default-color);
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
                            <li><a class="dropdown-item text-colour disabled-link"
                                    href="#">{{ __('sentence.takeaway') }}</a></li>

                            </li>
                            <li><button class="dropdown-item text-colour" data-bs-toggle="modal"
                                    data-bs-target="#exampleModaladdress">{{ __('sentence.homedelivery') }}</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="section-title col-md-4">
                    <form id="timeForm" action="{{ route('time_update') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <h2>Choose Delivery Time</h2>
                        <select name="TimeOption"
                            class="form-select selectpicker mt-2 bg-transparent text-colour delivery-time"
                            data-container="body" onchange="submitTimeForm()">
                            @foreach ($timeSlots as $time)
                                <option value="{{ $time }}">{{ $time }}</option>
                            @endforeach
                        </select>
                    </form>
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
                                        <a id="{{ $child->name }}" href=""
                                            class="  h4">{{ $child->name }}</a>
                                        <p class="mt-2 fst-italic">{{ $child->description }}</p>
                                        {{-- <hr> --}}
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
    {{-- <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content " style="background-color: var(--default-color)">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-colour" id="exampleModalLabel">Enter your shipping address</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('location.store') }}" method="post" id="location-form">
                        @csrf
                        <div class="input-group text-center">
                            <input type="text" id="location-input" name="location"
                                value="{{ session()->get('current_location') ?? '' }}"
                                class="form-control form-control-lg location text-center"
                                style="color: var(--accent-color);" placeholder="Enter Location"
                                aria-label="Enter Location" aria-describedby="button-addon2">
                            <button class="btn btn-outline-orange" type="button" id="location-button">
                                <i class="bi bi-geo-alt"></i>
                            </button>
                            <button type="submit" class="btn btn-outline-orange">
                                {{ __('Enter') }}
                            </button>
                        </div>
                    </form>

                </div><!--  Item -->

            </div>
        </div>
    </div> --}}



    <!-- Modal HTML -->
    <div class="modal fade" id="exampleModaladdress" tabindex="-1" aria-labelledby="exampleModaladdress"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" style="">
                <div class="modal-header">
                    <h5 class="modal-title text-colour" id="exampleModalLabel">Entrez votre adresse de livraison</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="pmclr p-2 text-colour" >LIVRAISON</h5>
                    <div class="input-container" style="position: relative;">
                        {{-- here  --}}
                        <div class="input-group text-center">
                            <input type="text" id="map-address-input" name="location"
                                value="{{ session()->get('current_location') ?? '' }}"
                                class="form-control form-control-lg location text-center"
                                style="color: var(--accent-color);" placeholder="Enter Location"
                                aria-label="Enter Location" aria-describedby="button-addon2">
                            <button class="btn btn-outline-orange" onclick="getCurrentLocation()">
                                <i class="bi bi-geo-alt"></i>
                            </button>
                            <button id="checkDZ" class="btn btn-outline-orange">
                                {{ __('Enter') }}
                            </button>
                        </div>
                        {{-- here --}}
                        {{-- <input type="text" id="map-address-input" placeholder="Entrez votre adresse de livraison…"
                            class="form-control"> --}}
                        {{-- <button id="checkDZ" class="btn btn-primary">Entrer</button>
                        <button onclick="getCurrentLocation()" class="btn btn-outline-secondary location-btn">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="1.5em"
                                viewBox="0 0 50.000000 50.000000" preserveAspectRatio="xMidYMid meet">
                                <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)"
                                    fill="var(--primary-color)" stroke="none">
                                    <path
                                        d="M194 461 c-57 -26 -87 -72 -92 -141 -4 -51 0 -63 43 -145 100 -192 125 -199 203 -56 39 71 25 83 -16 15 -15 -26 -37 -59 -50 -73 l-22 -26 -25 30 c-47 56 -115 203 -115 247 0 167 236 193 279 30 14 -50 36 -58 26 -9 -15 68 -45 106 -108 132 -47 20 -73 19 -123 -4z" />
                                    <path
                                        d="M240 383 c-28 -10 -50 -36 -50 -60 0 -12 5 -23 10 -23 6 0 10 8 10 18 0 46 69 59 95 18 30 -46 -18 -101 -65 -76 -28 15 -40 2 -16 -16 37 -27 80 -15 101 27 20 38 19 54 -7 83 -25 26 -54 37 -78 29z" />
                                </g>
                            </svg>
                        </button> --}}
                        <div id="result" class="result-container">
                            <span id="resultText"></span>
                            <button id="closeButton" onclick="closeResult()">X</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Styles -->



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



            {{-- <script>
                document.getElementById('location-button').addEventListener('click', function() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
                    } else {
                        alert("Geolocation is not supported by this browser.");
                    }
                });

                function successCallback(position) {
                    let lat = position.coords.latitude;
                    let lng = position.coords.longitude;

                    // Use a reverse geocoding API like Google Maps or OpenStreetMap to get the address
                    // Example with OpenStreetMap (Nominatim)
                    fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
                        .then(response => response.json())
                        .then(data => {
                            let address = data.display_name;
                            document.getElementById('location-input').value = address;

                            // Save address to session using AJAX
                            saveAddressToSession(address);
                        })
                        .catch(error => console.error('Error with reverse geocoding:', error));
                }

                function errorCallback(error) {
                    console.error('Error with geolocation:', error);
                }

                function saveAddressToSession(address) {
                    // Send the address to the server via AJAX and save it to the session
                    fetch('/save-location', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                location: address
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log('Address saved to session:', data);
                        })
                        .catch(error => console.error('Error saving address to session:', error));
                }
            </script> --}}


            {{-- <script>
                document.getElementById('location-button').addEventListener('click', function() {
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            // Use the latitude and longitude to fetch the address (you may need a geocoding service for this)
                            let lat = position.coords.latitude;
                            let lon = position.coords.longitude;

                            // Example: Using a Geocoding API to get the address (Replace with your own API if needed)
                            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}`)
                                .then(response => response.json())
                                .then(data => {
                                    let address = data.display_name;
                                    document.getElementById('location-input').value = address;
                                    // Optionally, store the address in a hidden field if needed
                                })
                                .catch(error => {
                                    console.error('Error fetching location:', error);
                                });
                        }, function(error) {
                            console.error('Geolocation error:', error);
                        });
                    } else {
                        console.error('Geolocation is not supported by this browser.');
                    }
                });
            </script> --}}


            <script>
                // Function to initialize the map for map-nos div


                $(document).ready(function() {
                    // Fetch Google Maps API key from the server
                    fetch('/get-google-maps-api-key')
                        .then(response => response.text())
                        .then(apiKey => {
                            let key = JSON.parse(apiKey);
                            console.log(JSON.parse(apiKey));
                            // Load Google Maps API with the retrieved API key
                            const script = document.createElement('script');
                            script.src =
                                `https://maps.googleapis.com/maps/api/js?key=${key}&libraries=geometry,places&callback=initMapNOS`;
                            script.async = true;
                            script.defer = true;
                            script.onload = function() {
                                // Now that the Google Maps API is loaded, you can use it

                                // Autocomplete functionality
                                var input = document.getElementById('map-address-input');
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
                                    var address = $('#map-address-input').val();

                                    geocodeAddress(address, function(location) {
                                        var lat = location.lat;
                                        var lng = location.lng;
                                        console.log(location.lat, location.lng);

                                        var point = new google.maps.LatLng(lat, lng);

                                        checkIfPointInAnyZone(point, function(zone) {
                                            if (zone) {
                                                $.ajax({
                                                    url: '/store-in-session',
                                                    method: 'POST',
                                                    data: {
                                                        'method': 'delivery',
                                                        'restaurent': zone.rest_id,
                                                        'address': address,
                                                        _token: '{{ csrf_token() }}'
                                                    },
                                                    success: function(response) {
                                                        console.log(
                                                            'Restaurant name stored in session'
                                                        );
                                                        console.log(zone
                                                            .rest_id);
                                                        window.location.href =
                                                            "/menu";
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
                                document.getElementById('map-address-input').value = results[0].formatted_address;
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
