<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Sushi</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('logo/sushiFav.png') }}" rel="icon">
    <link href="{{ asset('logo/sushiFav.png') }}" rel="apple-touch-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">


    <!-- Vendor CSS Files -->
    <link href="{{ asset('niko/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('niko/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('niko/assets/vendor/aos/aos.css') }}" rel="stylesheet">
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

        .fl-success {
            border-left: .8em solid #008607 !important;
            border-right: none !important;
        }

        .fl-content {
            align-items: center !important;
            display: flex !important;
            padding: .75em !important;
            background: linear-gradient(63deg, rgba(255, 136, 62, 1) 0%, rgba(169, 90, 41, 1) 3%, rgba(133, 71, 32, 1) 5%, rgba(96, 51, 23, 1) 11%, rgba(41, 22, 10, 1) 17%, rgba(0, 0, 0, 1) 23%, rgba(20, 5, 3, 1) 64%, rgba(30, 8, 5, 1) 81%, rgba(50, 14, 8, 1) 85%, rgba(81, 22, 12, 1) 91%, rgba(128, 34, 19, 1) 96%, rgba(186, 50, 28, 1) 100%) !important;
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
    <script src="{{ asset('niko/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    {{-- <script src="{{ asset('niko/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script> --}}
    <script src="{{ asset('niko/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    {{-- logout  --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCt4M6sXKliR4X6j3l3ubOt8HeXN-CKMMY"></script>
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
            const apiKey = 'AIzaSyCt4M6sXKliR4X6j3l3ubOt8HeXN-CKMMY';
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
                                        
                                                window.location.href = "{{url('/')}}/"+ response.restaurant.slug
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
</body>

</html>
