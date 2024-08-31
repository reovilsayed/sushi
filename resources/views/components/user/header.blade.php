<?php $restaurantNames = App\Models\Restaurant::latest()->get();?>
@push('css')
@endpush
<header id="header" class="header fixed-top">
    <div class="branding d-flex align-items-cente">

        <div class="container position-relative d-flex align-items-center justify-content-between">

            <a href="{{ route('restaurant.home') }}" class="logo d-flex align-items-center me-auto me-xl-0">

                <img src="{{ Settings::setting('site.logo') ? Storage::url(Settings::setting('site.logo')) : asset('logo/mainLogo.png') }}"
                    alt="" class="img-fluid">

            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('restaurant.home') }}" class="active">{{ __('sentence.home') }}<br></a></li>
                    <li><a href="{{ asset('pdfs/menu-belfort.pdf') }}" target="_blank">{{ __('sentence.themap') }}</a>
                    </li>
                    <li class="dropdown"><a
                            href="{{ route('user.restaurants') }}"><span>{{ __('sentence.restaurants') }}</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            @foreach ($restaurantNames as $restaurant)
                                <li><a
                                        href="{{ route('restaurant.menu', $restaurant->slug) }}">{{ $restaurant->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>

                    <li><a href="{{ route('restaurant.recruitment') }}">{{ __('sentence.recruitment') }}</a></li>
                    <li><a href="{{ route('restaurant.contact') }}">{{ __('sentence.contact') }}</a></li>

                    <li class="d-xl-none">
                        @auth
                            <a href="{{ route('user.dashboard') }}"
                                style="color: var(--accent-color)">{{ __('sentence.dashboard') }}</a>
                        @else
                            <a href="{{ route('login') }}"
                                style="color: var(--accent-color)">{{ __('sentence.login') }}</a>
                        @endauth
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="d-xl-flex d-none">

                <a class="fs-4 " href="{{ route('restaurant.cart') }}"><svg version="1.0"
                        xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 50.000000 50.000000"
                        preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)" fill="#ba321c"
                            stroke="none">
                            <path
                                d="M201 455 c-16 -14 -35 -41 -41 -60 -10 -29 -16 -35 -39 -35 -27 0 -29 -3 -34 -52 -4 -29 -9 -101 -13 -160 l-7 -108 187 0 c185 0 186 0 186 22 0 12 -5 84 -12 160 l-11 138 -29 0 c-24 0 -31 6 -44 40 -19 46 -56 80 -90 80 -12 0 -36 -11 -53 -25z m87 -1 c22 -15 52 -63 52 -84 0 -6 -32 -10 -85 -10 -94 0 -100 6 -68 60 27 47 65 59 101 34z m-142 -139 c-4 -22 -3 -35 4 -35 5 0 10 16 10 35 l0 36 93 -3 92 -3 -2 -33 c-1 -21 3 -32 10 -29 7 2 11 18 9 35 -3 28 -1 32 21 32 24 0 24 -2 31 -107 4 -60 9 -127 12 -151 l6 -42 -177 0 -178 0 6 63 c4 34 9 101 13 150 7 84 8 87 31 87 23 0 25 -3 19 -35z" />
                        </g>
                    </svg><span class="fw-bold custom-cart  ">{{ Cart::getTotalQuantity() }}</span></a>
                @auth
                    <a class="d-xl-block" style="margin: 0 20px;" href="{{ route('user.dashboard') }}">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" height="2.5em" viewBox="0 0 100 100"
                            preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,100.000000) scale(0.200000,-0.200000)" fill="#ba321c"
                                stroke="none">
                                <path
                                    d="M155 456 c-60 -28 -87 -56 -114 -116 -36 -79 -19 -183 42 -249 33 -36 115 -71 167 -71 52 0 134 35 167 71 34 37 63 110 63 159 0 52 -35 134 -71 167 -37 34 -110 63 -159 63 -27 0 -65 -10 -95 -24z m173 -12 c174 -72 174 -316 0 -388 -133 -56 -287 47 -288 192 -1 147 154 253 288 196z" />
                                <path
                                    d="M202 393 c-30 -26 -36 -63 -14 -98 l18 -29 -41 -21 c-36 -18 -40 -24 -43 -62 l-3 -43 131 0 131 0 -3 43 c-3 38 -7 44 -43 62 l-41 21 18 29 c32 52 -2 115 -62 115 -15 0 -37 -8 -48 -17z m95 -29 c15 -24 15 -29 2 -53 -11 -20 -22 -26 -49 -26 -27 0 -38 6 -49 26 -13 24 -13 29 2 53 12 18 26 26 47 26 21 0 35 -8 47 -26z m16 -125 c40 -11 65 -45 54 -73 -5 -13 -26 -16 -117 -16 l-111 0 3 38 c3 32 7 38 38 49 44 15 85 16 133 2z" />
                            </g>
                        </svg>

                    </a>
                @else
                    <a class="" href="{{ route('login') }}" style="margin: 0 20px;"><svg version="1.0"
                            xmlns="http://www.w3.org/2000/svg" height="2.5em" viewBox="0 0 100 100"
                            preserveAspectRatio="xMidYMid meet">
                            <g transform="translate(0.000000,100.000000) scale(0.200000,-0.200000)" fill="#ba321c"
                                stroke="none">
                                <path
                                    d="M155 456 c-60 -28 -87 -56 -114 -116 -36 -79 -19 -183 42 -249 33 -36 115 -71 167 -71 52 0 134 35 167 71 34 37 63 110 63 159 0 52 -35 134 -71 167 -37 34 -110 63 -159 63 -27 0 -65 -10 -95 -24z m173 -12 c174 -72 174 -316 0 -388 -133 -56 -287 47 -288 192 -1 147 154 253 288 196z" />
                                <path
                                    d="M202 393 c-30 -26 -36 -63 -14 -98 l18 -29 -41 -21 c-36 -18 -40 -24 -43 -62 l-3 -43 131 0 131 0 -3 43 c-3 38 -7 44 -43 62 l-41 21 18 29 c32 52 -2 115 -62 115 -15 0 -37 -8 -48 -17z m95 -29 c15 -24 15 -29 2 -53 -11 -20 -22 -26 -49 -26 -27 0 -38 6 -49 26 -13 24 -13 29 2 53 12 18 26 26 47 26 21 0 35 -8 47 -26z m16 -125 c40 -11 65 -45 54 -73 -5 -13 -26 -16 -117 -16 l-111 0 3 38 c3 32 7 38 38 49 44 15 85 16 133 2z" />
                            </g>
                        </svg></a>
                @endauth
            </div>
            <div class="d-xl-none ">

                <a class="fs-4 " href="{{ route('restaurant.cart') }}"><svg version="1.0"
                        xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 50.000000 50.000000"
                        preserveAspectRatio="xMidYMid meet">
                        <g transform="translate(0.000000,50.000000) scale(0.100000,-0.100000)" fill="#ba321c"
                            stroke="none">
                            <path
                                d="M201 455 c-16 -14 -35 -41 -41 -60 -10 -29 -16 -35 -39 -35 -27 0 -29 -3 -34 -52 -4 -29 -9 -101 -13 -160 l-7 -108 187 0 c185 0 186 0 186 22 0 12 -5 84 -12 160 l-11 138 -29 0 c-24 0 -31 6 -44 40 -19 46 -56 80 -90 80 -12 0 -36 -11 -53 -25z m87 -1 c22 -15 52 -63 52 -84 0 -6 -32 -10 -85 -10 -94 0 -100 6 -68 60 27 47 65 59 101 34z m-142 -139 c-4 -22 -3 -35 4 -35 5 0 10 16 10 35 l0 36 93 -3 92 -3 -2 -33 c-1 -21 3 -32 10 -29 7 2 11 18 9 35 -3 28 -1 32 21 32 24 0 24 -2 31 -107 4 -60 9 -127 12 -151 l6 -42 -177 0 -178 0 6 63 c4 34 9 101 13 150 7 84 8 87 31 87 23 0 25 -3 19 -35z" />
                        </g>
                    </svg>
                    <span class="fw-bold custom-cart  ">{{ Cart::getTotalQuantity() }}</span>
                </a>

            </div>
        </div>

    </div>

</header>
