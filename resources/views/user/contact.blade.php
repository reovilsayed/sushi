<x-user>
    @push('css')
        {{-- <style>
            #map-nos {
                height: 500px;
                /* Set a height for the map */
                width: 100%;
            }

            .map_name {
                color: #ba321c;
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
                border: 1px solid #ba321c;
            }

            .map_dody tr {
                border: 1px solid #ba321c;
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
                background-color: #ba321c !important;
            }

            .gm-style-iw-d {
                overflow-x: hidden !important;
                max-height: 307px !important;
                scrollbar-width: thin;
                /* makes the scrollbar thinner */
                scrollbar-color: #ba321c #f1f1f1;
            }
        </style> --}}

        <style>
            .accordion {
                --bs-accordion-color: #E4D4BF;
                --bs-accordion-bg: transparent;
                --bs-accordion-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, border-radius 0.15s ease;
                --bs-accordion-border-color: transparent;
                --bs-accordion-border-width: var(--bs-border-width);
                --bs-accordion-border-radius: var(--bs-border-radius);
                --bs-accordion-inner-border-radius: calc(var(--bs-border-radius) -(var(--bs-border-width)));
                --bs-accordion-btn-padding-x: 1.25rem;
                --bs-accordion-btn-padding-y: 1rem;
                --bs-accordion-btn-color: #E4D4BF;
                --bs-accordion-btn-bg: transparent;
                --bs-accordion-btn-icon: url(data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'%3E%3C!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --%3E%3Cstyle%3Esvg%7Bfill:%23e4d48f%7D%3C/style%3E%3Cpath d='M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z' /%3E%3C/svg%3E);
                --bs-accordion-btn-icon-width: 1.25rem;
                --bs-accordion-btn-icon-transform: rotate(-180deg);
                --bs-accordion-btn-icon-transition: transform 0.2s ease-in-out;
                --bs-accordion-btn-active-icon: url(data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 448 512'%3E%3C!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --%3E%3Cstyle%3Esvg%7Bfill:%23e4d48f%7D%3C/style%3E%3Cpath d='M432 256c0 17.7-14.3 32-32 32L48 288c-17.7 0-32-14.3-32-32s14.3-32 32-32l352 0c17.7 0 32 14.3 32 32z' /%3E%3C/svg%3E);
                --bs-accordion-btn-focus-border-color: #86b7fe;
                --bs-accordion-btn-focus-box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
                --bs-accordion-body-padding-x: 1.25rem;
                --bs-accordion-body-padding-y: 1rem;
                --bs-accordion-active-color: #E4D4BF;
                --bs-accordion-active-bg: transparent;
            }

            * {
                font-family: "Montserrat", sans-serif !important;
                font-optical-sizing: auto !important;
                font-style: normal !important;
            }

            .pmclr {
                color: #e4d4bf !important;
            }

            .card_hidden {
                max-height: 180px !important;
            }

            .hidden {
                display: none;
                overflow: none;
            }

            .card-list {
                padding: 30px;
                margin: 10px;
                width: 100%;
                position: relative;
                max-height: 500px !important;
                overflow: hidden;
            }

            .opbg {
                background-color: rgba(0, 0, 0, 0.5) !important;
            }

            .card-header:first-child {
                border-radius: var(--bs-card-inner-border-radius) var(--bs-card-inner-border-radius) 0 0 !important;
            }

            .card-header {
                padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
                margin-bottom: 0;
                color: var(--bs-card-cap-color);
                background-color: var(--bs-card-cap-bg);
                border-bottom: var(--bs-card-border-width) solid var(--bs-card-border-color);
            }

            /* .icon-btn {
                        cursor: pointer;
                        position: absolute;
                        font-size: 20px;
                        top: 0;
                        right: 0;
                        z-index: 9999;
                        font-size: 52px;
                        padding: 10px;
                        transition: transform 0.3s ease !important;
                    } */

            .icon-btn::after {
                flex-shrink: 0 !important;
                width: var(--bs-accordion-btn-icon-width) !important;
                height: var(--bs-accordion-btn-icon-width) !important;
                margin-left: auto !important;
                content: "";
                background-image: var(--bs-accordion-btn-icon) !important;
                background-repeat: no-repeat !important;
                background-size: var(--bs-accordion-btn-icon-width) !important;
                transition: var(--bs-accordion-btn-icon-transition) !important;
            }

            .opbg {
                background-color: rgba(0, 0, 0, 0.05);
                padding: 20px;
                border-radius: 8px;
            }

            .pmclr {
                margin-bottom: 20px;
            }

            .card-header {
                padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
                margin-bottom: 0;
                color: var(--bs-card-cap-color);
                background-color: var(--bs-card-cap-bg);
                border-bottom: var(--bs-card-border-width) solid var(--bs-card-border-color);
            }

            .icons-list {
                display: flex !important;
                gap: 5px !important;
            }

            .icon-btn {
                font-weight: 100;
                cursor: pointer;
                position: absolute;
                top: 0;
                right: 0;
                z-index: 9999;
                font-size: 52px !important;
                padding: 10px;
                transition: transform 0.3s ease !important;
            }

            .icon-btn {
                transform: rotate(180deg) !important;
                /* Rotate the icon to show "+" when active */
            }

            tbody,
            td,
            tfoot,
            th,
            thead,
            tr {
                border-color: inherit !important;
                border-style: solid !important;
                border-width: 0 !important;
            }
        </style>
    @endpush
    <br> <br> <br>
    <!-- Contact Section -->
    <section id="contact" class="contact section bg-transparent">

        <!-- Section Title -->
        {{-- <div class="container section-title" data-aos="fade-up">
            <h2>{{ __('sentence.contact') }}</h2>
            <p>{{ __('sentence.contact') }} {{ __('sentence.us') }}</p>
        </div><!-- End Section Title -->

        <div class="row">
            <div class="col-md-12 p-3 text-center pmclr">
                <h1>RESTAURANTS</h1>
                <h3 class="text-center p-2 p-md-5">Liste</h3>
            </div>
        </div> --}}
        <div class="row pmclr">
            <div class="col-md-6">
                <div id="card-list1" class="card-list opbg mb-5 card_hidden">
                    <div class="card-header">
                        <h3>Central Sushi Dijon</h3>
                        <p class="mb-3">25 Place Darcy <br>21000 DIJON</p>
                        <h4 class="mb-3" style="color: #ba321c!important;">03 80 23 22 00</h4>
                        <div class="icons-list">
                            <span id="icon-btn1" class="icon-btn"
                                onclick="toggleCard('card-list-content1', 'icon-btn1')">+</span>
                        </div>
                    </div>
                    <div id="card-list-content1" class="card-list-content hidden">
                        <p>Horaires d’ouverture</p>
                        <table style="text-align: left; width: 70%;">
                            <tr>
                                <td>Lundi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Mardi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Mercredi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Jeudi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Vendredi</td>
                                <td>18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Samedi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Dimanche</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-3 d-flex justify-content-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2704.535575207828!2d5.0314998!3d47.3234108!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f29d94bd63fdcb%3A0x5c3d38bb2bb2ac71!2s25%20Pl.%20Darcy%2C%2021000%20Dijon%2C%20France!5e0!3m2!1sen!2sae!4v1709789861376!5m2!1sen!2sae"
                    width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        <div class="row pmclr">
            <div class="col-md-6">
                <div id="card-list2" class="card-list opbg mb-5 card_hidden">
                    <div class="card-header">
                        <h3>Central Sushi Besançon</h3>
                        <p class="mb-3">35 Avenue Carnot <br>25000 BESANCON</p>
                        <h4 class="mb-3" style="color: #ba321c!important;">03 70 88 97 00</h4>
                        <div class="icons-list">
                            <span id="icon-btn2" class="icon-btn"
                                onclick="toggleCard('card-list-content2', 'icon-btn2')">+</span>
                        </div>
                    </div>
                    <div id="card-list-content2" class="card-list-content hidden">
                        <p>Horaires d’ouverture</p>
                        <table style="text-align: left; width: 70%;">
                            <tr>
                                <td>Lundi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Mardi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Mercredi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Jeudi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Vendredi</td>
                                <td>18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Samedi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Dimanche</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-3 d-flex justify-content-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2708.535068686864!2d6.028422399999999!3d47.2452395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478d63238af430cd%3A0xdc33127591633489!2s35%20Av.%20Sadi%20Carnot%2C%2025000%20Besan%C3%A7on%2C%20France!5e0!3m2!1sen!2sae!4v1709790005587!5m2!1sen!2sae"
                    width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="row pmclr">
            <div class="col-md-6">
                <div id="card-list3" class="card-list opbg mb-5 card_hidden">
                    <div class="card-header">
                        <h3>Central Sushi Belfort</h3>
                        <p class="mb-3">60 Faubourg de Montbéliard<br>90000 BELFORT</p>
                        <h4 class="mb-3" style="color: #ba321c!important;">03 84 58 67 37</h4>
                        <div class="icons-list">
                            <span id="icon-btn3" class="icon-btn"
                                onclick="toggleCard('card-list-content3', 'icon-btn3')">+</span>
                        </div>
                    </div>
                    <div id="card-list-content3" class="card-list-content hidden">
                        <p>Horaires d’ouverture</p>
                        <table style="text-align: left; width: 70%;">
                            <tr>
                                <td>Lundi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Mardi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Mercredi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Jeudi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Vendredi</td>
                                <td>18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Samedi</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                            <tr>
                                <td>Dimanche</td>
                                <td>11h00 - 15h00 / 18h00 - 23h00</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6 p-3 d-flex justify-content-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2711.8571351266864!2d6.8619278!3d47.6370358!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x479238d2c08706d7%3A0x38004eb2399998e8!2s60%20Faubourg%20de%20Montb%C3%A9liard%2C%2090000%20Belfort%2C%20France!5e0!3m2!1sen!2sae!4v1709790154123!5m2!1sen!2sae"
                    width="400" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

        {{-- <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">
                <div id="map" style="height: 500px; width: 100%;"></div>
            </div>

        </div> --}}

    </section><!-- /Contact Section -->

    @push('js')
        {{-- <script>
            function initMap() {
                const mapStyles = [{
                        "stylers": [{
                                "hue": "#ba321c"
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
                <div style="background-color: #ba321c; padding: 10px; border-radius: 10px;">
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
                <div style="background-color: #ba321c; padding: 10px; border-radius: 10px;">
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
                <div style="background-color: #ba321c; padding: 10px; border-radius: 10px;">
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
        </script> --}}

        <script>
            function initMapNOS() {
                const locations = [{
                        lat: 47.323430,
                        lng: 5.031508
                    }, // New York City
                    {
                        lat: 47.245721,
                        lng: 6.028465
                    }, // Los Angeles
                    {
                        lat: 47.631816,
                        lng: 6.856420
                    } // London
                ];

                const map = new google.maps.Map(document.getElementById('map-nos'), {
                    zoom: 7,
                    center: locations[0]
                });

                locations.forEach((location) => {
                    new google.maps.Marker({
                        position: location,
                        map: map
                    });
                });
            }

            initMapNOS();
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            function toggleCard(contentId, iconId) {
                var content = document.getElementById(contentId);
                var icon = document.getElementById(iconId);

                // Toggle the content visibility with jQuery
                $(content).toggle("slow", function() {
                    // Once the toggle is complete, check if it's visible
                    if ($(content).is(":visible")) {
                        icon.innerHTML = '-'; // Change icon to '-'
                    } else {
                        icon.innerHTML = '+'; // Change icon to '+'
                    }
                });
            }
        </script>
    @endpush

</x-user>
