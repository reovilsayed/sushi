<style>
    .dropdown {
        height: 100%;
        width: 200px;
        position: fixed;
        z-index: 1;
        top: 0;
        left: 0;
        overflow-x: hidden;
    }

    .dropdown a,
    .dropdown-btn {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        /* color: #0a0000; */
        display: block;
        border: none;
        background: none;
        width: 100%;
        cursor: pointer;
        outline: none;
    }

    .dropdown-btn :hover {
        color: #111AE9;
    }

    .dropdown-item:hover {
        color: #111AE9;
    }

    .dropdown-container {
        margin: 1px;

    }

    .dropdown-container a img {
        /* padding: 1px;
        border: solid rgb(167, 171, 175) 1px; */
        margin-right: 10px;
    }

    .dropdown-container {
        margin: 1px;
        /* box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px; */
    }

    .drop-item-active {
        color: #111AE9;
        background-color: #F3F5F5 !important;
        width: 100%;
        /* color: #fff !important; */
    }
</style>

<div class="nav_inner">
    <ul class="nav_list">


        <x-sidenav.nav name="{{ __('sentence.dashboard') }}" :active="request()->is('admin') ? 'menu-active' : ''" :href="route('dashboard')" :icon="[asset('images/homepage-icon.svg'), asset('images/homepage-icon-white.svg')]" />
        <x-sidenav.nav name="{{ __('sentence.restaurants') }}" :active="request()->is('admin/restaurant') ? 'menu-active' : ''" :href="route('admin.restaurants')" :icon="[asset('images/restaurant-dark.svg'), asset('images/restaurant-white.svg')]" />
        <li class="dropdown">

            <a href="javascript:void(0)" class="dropdown-btn">
                <i class="mb-2 icon1">
                    <img src="{{ asset('images/fmcg-products-icon.svg') }}" alt="">
                    <img src="{{ asset('images/fmcg-products-icon-white.svg') }}" alt="">
                </i>
                <span class="">{{ __('sentence.products') }} <i class="fa fa-caret-down text-dark ms-2 " id="updownicon"></i></span>

            </a>
            <ul class="dropdown-container border-rounded mt-2"
                style="@if (request()->route()->getName() == 'suppliers.index' || request()->route()->getName() == 'categories.index') display:block @elseif(request()->route()->getName() == 'products.index' ||
                        request()->route()->getName() == 'generics.index' ||
                        request()->route()->getName() == 'units.index') display:block  @else display:none @endif">

                <li
                    class="dropdown-item {{ request()->route()->getName() == 'products.index' ? 'drop-item-active' : '' }}">

                    <a href="{{ route('products.index') }}" class="mb-1" style="padding-left: 0px;">
                        <img src="{{ asset('images/fmcg-products-icon.svg') }}" alt="" style="width: 16px">
                        {{ __('sentence.products') }}
                    </a>
                </li>


                <li
                    class="dropdown-item {{ request()->route()->getName() == 'categories.index' ? 'drop-item-active' : '' }}">
                    <a href="{{ route('categories.index') }}" class="mb-1" style="padding-left: 0px;">
                        <img src="{{ asset('images/category-icon.svg') }}" alt="" style="width: 16px">
                        {{ __('sentence.category') }}
                    </a>
                </li>
            </ul>
        </li>
        <x-sidenav.nav name="{{ __('sentence.customer') }}" :active="request()->is('customers') ? 'menu-active' : ''" :href="route('customers.index')" :icon="[asset('images/users_3914283.svg'), asset('images/users_3914283.svg')]" />

        <x-sidenav.nav name="{{ __('sentence.order') }}" :active="request()->is('orders/list') ? 'menu-active' : ''" :href="route('orders.index')" :icon="[asset('images/orders-icon.svg'), asset('images/orders-icon-white.svg')]" />
        <x-sidenav.nav name="{{ __('sentence.report') }}" :active="request()->is('reports') ? 'menu-active' : ''" :href="route('reports.index')" :icon="[asset('images/chart-icon.svg'), asset('images/chart-icon.svg')]" />
        <x-sidenav.nav name="{{ __('sentence.settings') }}" :active="request()->is('admin/settings') ? 'menu-active' : ''" :href="route('settings.index')" :icon="[asset('images/setting-icon.svg'), asset('images/setting-icon-white.svg')]" />
        <x-sidenav.nav name="{{ __('sentence.pages') }}" :active="request()->is('admin/pages') ? 'menu-active' : ''" :href="route('admin.pages')" :icon="[asset('images/page-dark.svg'), asset('images/page-white.svg')]" />
        


        <li>
            <a href="#" class="logout-trigger">
                <i>
                    <img src={{ asset('images/nav7.png') }} alt="" />
                    <img src={{ asset('images/nav7_hov.png') }} alt="" />
                </i>

                <span>{{ __('sentence.logout') }}</span>
            </a>
        </li>


    </ul>
</div>

<script>
    var dropdown = document.getElementsByClassName("dropdown-btn");
    var updown = document.getElementById("updownicon");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
                // updown.classList.remove("fa-caret-down");
                updown.classList.add("fa-caret-up");

            } else {
                dropdownContent.style.display = "block";
                // updown.classList.remove("fa-caret-up");
                // updown.classList.add(" fa-caret-down");
            }
        });
    }
</script>
