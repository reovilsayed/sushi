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
            color: #e5d5bf !important;
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
    <script src="{{ asset('niko/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('niko/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    {{-- logout  --}}
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCt4M6sXKliR4X6j3l3ubOt8HeXN-CKMMY"></script>

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
</body>

</html>
