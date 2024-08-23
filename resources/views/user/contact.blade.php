<x-user>
    @push('css')
        <style>
            #map-nos {
                height: 500px;
                /* Set a height for the map */
                width: 100%;
            }

            .map_name {
                color: #ff883e;
                font-family: inherit;
                font-size: x-large;
                letter-spacing: 2px;
            }

            .map_address {
                color: white !important;
                font-size: 16px;
                font-family: math;
                margin-bottom: 5px;
            }

            .map_phone {
                color: white !important;
                font-size: 16px;
                font-family: math;
                margin-bottom: 5px;
            }

            .map_table {
                width: 312px !important;
            }

            .map_dody {
                border: 1px solid #ff883e;
            }

            .map_dody tr {
                border: 1px solid #ff883e;
            }

            .map_day {
                margin-left: 50px;
            }

            .gm-style-iw-c {
                padding-inline-end: 0px !important;
                padding-bottom: 0px !important;
                padding-top: 0px !important;
                max-width: 648px !important;
                max-height: 332px !important;
                min-width: 0px !important;
                background-color: #ff883e !important;
            }

            .gm-style-iw-d {
                overflow-x: hidden !important;
                max-height: 307px !important;
                scrollbar-width: thin;
                /* makes the scrollbar thinner */
                scrollbar-color: #ff883e #f1f1f1;
            }
        </style>
    @endpush
    <br> <br> <br>
    <!-- Contact Section -->
    <section id="contact" class="contact section bg-transparent">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('sentence.contact') }}</h2>
            <p>{{ __('sentence.contact') }} {{ __('sentence.us') }}</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div id="map" style="height: 500px; width: 100%;"></div>
            </div>

        </div>

    </section><!-- /Contact Section -->

    @push('js')
        <script>
            function initMap() {
                const mapStyles = [{
                        "stylers": [{
                                "hue": "#ff883e"
                            },
                            {
                                "saturation": 50
                            },
                            {
                                "lightness": -10
                            }
                        ]
                    },
                    {
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#333333"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                            "color": "#0088cc"
                        }]
                    }
                ];

                const locations = [{
                        lat: 47.631498,
                        lng: 6.856458,
                        address: `
                <div style="background-color: #ff883e; padding: 10px; border-radius: 10px;">
                    <h3 class="map_name" style="color: white;">Central Sushi Belfort</h3>
                    <p class="map_address" style="color: white;">60 Faubourg de Montbéliard 90000 BELFORT</p>
                    <p class="map_phone" style="color: white;">03 84 58 67 37</p>
                    <h3 style="color: white; font-size: 21px;font-family: math;margin-top: 10px;">Horaires d’ouverture</h3>
                    <div class="row" style="width: 340px; color: white;">
                        <div class="col-md-2"><p class="map_address">Lundi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Mardi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Mercredi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Jeudi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Vendredi</p></div>
                        <div class="col-md-10"><p class="map_day">18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Samedi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Dimanche</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                    </div>
                </div>
                `
                    },
                    {
                        lat: 47.2452395,
                        lng: 6.0284224,
                        address: `
                <div style="background-color: #ff883e; padding: 10px; border-radius: 10px;">
                    <h3 class="map_name" style="color: white;">Central Sushi Besançon</h3>
                    <p class="map_address" style="color: white;">35 Avenue Carnot 25000 BESANCON</p>
                    <p class="map_phone" style="color: white;">03 70 88 97 00</p>
                    <h3 style="color: white; font-size: 21px;font-family: math;margin-top: 10px;">Horaires d’ouverture</h3>
                    <div class="row" style="width: 340px; color: white;">
                        <div class="col-md-2"><p class="map_address">Lundi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Mardi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Mercredi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Jeudi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Vendredi</p></div>
                        <div class="col-md-10"><p class="map_day">18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Samedi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Dimanche</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                    </div>
                </div>
                `
                    },
                    {
                        lat: 47.3234108,
                        lng: 5.0314998,
                        address: `
                <div style="background-color: #ff883e; padding: 10px; border-radius: 10px;">
                    <h3 class="map_name" style="color: white;">Central Sushi Dijon</h3>
                    <p class="map_address" style="color: white;">25 Place Darcy 21000 DIJON</p>
                    <p class="map_phone" style="color: white;">03 80 23 22 00</p>
                    <h3 style="color: white; font-size: 21px;font-family: math;margin-top: 10px;">Horaires d’ouverture</h3>
                    <div class="row" style="width: 340px; color: white;">
                        <div class="col-md-2"><p class="map_address">Lundi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Mardi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Mercredi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Jeudi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Vendredi</p></div>
                        <div class="col-md-10"><p class="map_day">18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Samedi</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                        <div class="col-md-2"><p class="map_address">Dimanche</p></div>
                        <div class="col-md-10"><p class="map_day">11h00 - 15h00 / 18h00 - 23h00</p></div>
                    </div>
                </div>
                `
                    }
                ];

                const map = new google.maps.Map(document.getElementById("map"), {
                    zoom: 7,
                    center: {
                        lat: 47.4,
                        lng: 6.0
                    },
                    styles: mapStyles
                });

                locations.forEach(location => {
                    const marker = new google.maps.Marker({
                        position: location,
                        map: map
                    });

                    const infoWindow = new google.maps.InfoWindow({
                        content: location.address
                    });

                    marker.addListener('click', () => {
                        infoWindow.open(map, marker);
                    });
                });
            }

            google.maps.event.addDomListener(window, 'load', initMap);
        </script>
    @endpush

</x-user>
