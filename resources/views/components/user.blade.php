<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sushi</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('logo/favicon.jpg') }}" rel="icon">
    <link href="{{ asset('logo/favicon.jpg') }}" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- Vendor CSS Files -->
    @if (session()->get('locale') == 'ar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css"
            integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    @else
        <link href="{{ asset('niko/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    @endif

    <link href="{{ asset('niko/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('niko/assets/vendor/aos/aos.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('niko/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('niko/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    {{-- aos link  --}}
    <link rel="stylesheet" href="{{ asset('aos/aos.css') }}">
    <!-- Main CSS File -->
    <link href="{{ asset('niko/assets/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('niko/custom.css') }}" rel="stylesheet">

    @stack('css')
    <!-- =======================================================
  * Template Name: Restaurantly
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
    <style>
        * {
            font-family: "Montserrat", sans-serif !important;
            font-optical-sizing: auto !important;
            font-style: normal !important;
            /* color: #e5d5bf !important; */
        }

        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-weight: 400
        }

        .fl-success {
            border-left: .8em solid #008607 !important;
            border-right: none !important;
        }

        .fl-content {
            align-items: center !important;
            display: flex !important;
            padding: .75em !important;
            background: black !important;
        }

        .fl-icon {
            display: none !important;
        }

        .fl-main-container .fl-container.fl-success .fl-icon {
            background-color: #008607 !important;
        }

        .fl-main-container .fl-container.fl-success .fl-title {
            color: #ffff !important;
        }

        .fl-main-container .fl-flasher .fl-content.fl-message {
            color: #ffff !important;
        }

        .fl-main-container .fl-container.fl-success .fl-progress-bar {
            background-color: #008607 !important;
        }

        .fl-main-container .fl-container.fl-flasher .fl-message {
            font-size: .875em;
            margin-top: .25em;
            color: #ffffff !important;
        }

        @media (min-width: 412px) and (max-width: 914px) {
            #navmenu ul .mobilNav {
                margin-top: 62px !important;
            }
        }

        @media (min-width: 375px) and (max-width: 667px) {
            #navmenu ul .mobilNav {
                margin-top: 57px !important;
            }
        }

        @media (min-width: 360px) and (max-width: 740px) {
            #navmenu ul .mobilNav {
                margin-top: 57px !important;
            }
        }
    </style>

</head>

<body class="index-page body-colour">

    <x-user.header />

    <main class="main">

        {{ $slot }}

        {{-- <x-user.extra/> --}}
    </main>

    <x-user.footer />

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('niko/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    {{-- <script src="{{ asset('niko/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script> --}}
    <script src="{{ asset('niko/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    {{-- logout  --}}
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}"></script>
    {{-- aos link  --}}
    <link rel="stylesheet" href="{{ asset('aos/aos.js') }}">
    <!-- Main JS File -->
    <script src="{{ asset('niko/assets/js/main.js') }}"></script>
    <script>
        $('.logout-trigger').click(() => $('#logout-form').submit());
    </script>
    <script>
        let userLatitude = null;
        let userLongitude = null;


        document.getElementById('location-button').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(success, error);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        });

        function success(position) {
            userLatitude = position.coords.latitude;
            userLongitude = position.coords.longitude;

            // Call the Google Maps Geocoding API to get the address
            const apiKey = "{{ env('GOOGLE_MAPS_API_KEY') }}";
            const geocodeUrl =
                `https://maps.googleapis.com/maps/api/geocode/json?latlng=${userLatitude},${userLongitude}&key=${apiKey}`;

            fetch(geocodeUrl)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'OK') {
                        const address = data.results[0].formatted_address;
                        document.getElementById('location-input').value = address;
                    } else {
                        alert('Unable to retrieve address.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function error() {
            alert("Unable to retrieve your location.");
        }


        document.getElementById('enter-button').addEventListener('click', function() {
            if (userLatitude !== null && userLongitude !== null) {

                fetch('/check-location', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            latitude: userLatitude,
                            longitude: userLongitude
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.href = data.redirect_url;
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                alert("Please click the location icon to get your current location first.");
            }
        });
    </script>


    @stack('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const lazyImage = entry.target;
                        lazyImage.src = lazyImage.dataset.src;
                        lazyImage.onload = function() {
                            lazyImage.removeAttribute("data-src");
                            lazyImage.removeAttribute("loading");
                        };
                        observer.unobserve(lazyImage);
                    }
                });
            });

            lazyImages.forEach(function(lazyImage) {
                imageObserver.observe(lazyImage);
            });
        });
    </script>




    {{-- <script>
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
                                country: 'ae'
                            }
                        };


                        var autocomplete = new google.maps.places.Autocomplete(input, options);
                        autocomplete.addListener('place_changed', function () {
                    var place = autocomplete.getPlace();
                    var addressComponents = place.address_components;

                    // Loop through address components and get the city and postal code
                    var city = '';
                    var postalCode = '';

                    for (var i = 0; i < addressComponents.length; i++) {
                        var component = addressComponents[i];

                        if (component.types.includes('locality')) {
                            city = component.long_name;
                        }

                        if (component.types.includes('postal_code')) {
                            postalCode = component.long_name;
                        }
                    }

                    // Fill the city and postal code fields
                    $('input[name="city"]').val(city);
                    $('input[name="post_code"]').val(postalCode);
                });
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

                                                window.location.href =
                                                    "{{ url('/') }}/menu/" +
                                                    response.restaurant
                                                    .slug
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
    </script> --}}


    <script>
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
                        // Autocomplete functionality restricted to Dubai
                        var input = document.getElementById('map_address_input');
                        var options = {
                            componentRestrictions: {
                                country: 'ae' // United Arab Emirates
                            }
                        };

                        var autocomplete = new google.maps.places.Autocomplete(input, options);

                        autocomplete.addListener('place_changed', function() {
                            var place = autocomplete.getPlace();
                            var addressComponents = place.address_components;

                            var city = '';
                            var postalCode = '';
                            for (var i = 0; i < addressComponents.length; i++) {
                                var component = addressComponents[i];
                                if (component.types.includes('locality')) {
                                    city = component.long_name;
                                }
                                if (component.types.includes('postal_code')) {
                                    postalCode = component.long_name;
                                }
                            }

                            // Fill city and postal code fields if needed
                            $('input[name="city"]').val(city);
                            $('input[name="post_code"]').val(postalCode);
                        });

                        // Geocode an address function
                        function geocodeAddress(address, callback) {
                            var geocoder = new google.maps.Geocoder();
                            geocoder.geocode({
                                'address': address
                            }, function(results, status) {
                                if (status === 'OK') {
                                    callback(results[0].formatted_address);
                                } else {
                                    alert('Select Correct Address');
                                }
                            });
                        }

                        // Get user's current location using Geolocation API
                        window.getCurrentLocation = function() {
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition(function(position) {
                                    var lat = position.coords.latitude;
                                    var lng = position.coords.longitude;
                                    var latlng = {
                                        lat: lat,
                                        lng: lng
                                    };

                                    // Use reverse geocoding to get address from lat, lng
                                    var geocoder = new google.maps.Geocoder();
                                    geocoder.geocode({
                                        'location': latlng
                                    }, function(results, status) {
                                        if (status === 'OK') {
                                            if (results[0]) {
                                                $('#map_address_input').val(results[0]
                                                    .formatted_address);
                                            } else {
                                                alert('No results found');
                                            }
                                        } else {
                                            alert('Geocoder failed due to: ' + status);
                                        }
                                    });
                                }, function() {
                                    alert(
                                        'Geolocation failed. Please enable location services.'
                                        );
                                });
                            } else {
                                alert('Geolocation is not supported by this browser.');
                            }
                        };

                        // Handle the 'Check' button for storing the location
                        $('#checkDZ').click(function() {
                            var address = $('#map_address_input').val();

                            geocodeAddress(address, function(location) {
                                // Store only the location address in the session
                                $.ajax({
                                    url: '{{ route('store_in_session') }}',
                                    method: 'POST',
                                    data: {
                                        'method': 'delivery',
                                        'address': location, // Save the formatted address
                                        _token: '{{ csrf_token() }}' // Ensure you have CSRF token included
                                    },
                                    success: function(response) {
                                        window.location.reload();
                                    },
                                    error: function(jqXHR, textStatus,
                                        errorThrown) {
                                        alert(
                                            'An error occurred. Please try again.'
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
    </script>
</body>

</html>
