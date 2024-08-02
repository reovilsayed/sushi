<?php
$restaurants = App\Models\Restaurant::all();
?>
<header id="header" class="header fixed-top">
    <div class="branding d-flex align-items-cente">

        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="{{ route('restaurant.home') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Restaurantly</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('restaurant.home') }}" class="active">Home<br></a></li>

                    <li class="dropdown"><a href="{{ route('user.restaurants') }}"><span>Restaurants</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            @foreach ($restaurants as $restaurant)
                                <li><a
                                        href="{{ route('restaurant.menu', $restaurant->slug) }}">{{ $restaurant->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="{{ route('restaurant.contact') }}">Contact</a></li>
                    <li class="d-xl-none">
                        @auth
                            <a 
                                href="{{ route('user.dashboard') }}" style="color: var(--accent-color)">{{ auth()->user()->name }}</a>
                        @else
                            <a  href="{{ route('login') }}"  style="color: var(--accent-color)">login</a>
                        @endauth
                    </li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <div class="d-xl-flex d-none">

                <a class="fs-4 " href="{{ route('restaurant.cart') }}"><i class="bi bi-bag-check "></i><span
                        class="fw-bold custom-cart  ">{{ Cart::getTotalQuantity() }}</span></a>
                @auth
                    <a class="btn-book-a-table  d-xl-block"
                        href="{{ route('user.dashboard') }}">{{ auth()->user()->name }}</a>
                @else
                    <a class="btn-book-a-table  d-xl-block" href="{{ route('login') }}">login</a>
                @endauth
            </div>
            <div class="d-xl-none">

                <a class="fs-4 " href="{{ route('restaurant.cart') }}"><i class="bi bi-bag-check "></i><span
                        class="fw-bold custom-cart  ">{{ Cart::getTotalQuantity() }}</span></a>

            </div>
        </div>

    </div>

</header>
