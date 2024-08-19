@php
    $restaurants = App\Models\Restaurant::latest()->take(9)->get();
    $pages = App\Models\Page::select('title', 'slug')->get();
@endphp
<footer id="footer" class="footer bg-transparent">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
                <a href="/" class="logo d-flex align-items-center">
                    <span class="sitename">{{Settings::site_title()}}</span>
                </a>
                <div class="footer-contact ">
                    <p class="mt-3"><strong>{{__('sentence.phone')}}:</strong> <span>{{ Settings::option('phone') }}</span></p>
                    <p><strong>{{__('sentence.email')}}:</strong> <span>{{ Settings::option('email') }}</span></p>
                </div>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="col-lg-4 col-md-3 footer-links">
                <h4>{{__('sentence.usefullinks')}}</h4>
                <ul>
                    <li><a href="#">{{__('sentence.home')}}</a></li>
                    @auth
                        <li><a href="{{ route('user.dashboard') }}">{{__('sentence.dashboard')}}</a></li>
                    @else
                        <li><a href="{{ route('login') }}">{{__('sentence.login')}}</a></li>
                        <li><a href="{{ route('register') }}">{{__('sentence.register')}}</a></li>
                    @endauth
                    @foreach ($pages as $page)
                    <li><a href="{{route('pages.view',$page->slug   )}}">{{$page->title}}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-lg-4 col-md-3 footer-links">
                <h4>{{__('sentence.restaurants')}}</h4>
                <ul>
                  @foreach ($restaurants as $restaurant)
                  <li><a
                          href="{{ route('restaurant.menu', $restaurant->slug) }}">{{ $restaurant->name }}</a>
                  </li>
              @endforeach
                </ul>
            </div>


            {{-- <div class="col-lg-4 col-md-12 footer-newsletter">
                <h4>Our Newsletter</h4>
                <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                <form action="forms/newsletter.php" method="post" class="php-email-form">
                    <div class="newsletter-form"><input type="email" name="email"><input type="submit"
                            value="Subscribe"></div>
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your subscription request has been sent. Thank you!</div>
                </form>
            </div> --}}
        </div>
    </div>

    <div class="container copyright text-center mt-4">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Sushi</strong> <span>All Rights Reserved</span>
        </p>
    </div>

</footer>
