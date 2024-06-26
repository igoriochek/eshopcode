<footer class="footer">
    <div class="container">
        <div class="row py-4 my-5">
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-4 text-color-light mb-3">{{ __('footer.contactInfo') }}</h5>
                <ul class="list list-unstyled">
                    <li class="pb-1 mb-2">
                        <span
                            class="d-block font-weight-normal line-height-1 text-color-light">
                            {{ __('footer.address') }}
                        </span>
                        Latvių g. 19A-7, LT-08113 Vilnius
                    </li>
                    <li class="pb-1 mb-2">
                        <span class="d-block font-weight-normal line-height-1 text-color-light">
                            {{ __('footer.phone') }}
                        </span>
                        <a href="tel:+1234567890">+37052310857</a>
                    </li>
                    <li class="pb-1 mb-2">
                        <span class="d-block font-weight-normal line-height-1 text-color-light">
                            {{ __('footer.mobilePhone') }}
                        </span>
                        <a href="tel:+1234567890">+37068789142</a>
                    </li>
                    <li class="pb-1 mb-2">
                        <span class="d-block font-weight-normal line-height-1 text-color-light">
                            {{ __('footer.email') }}
                        </span>
                        <a href="mailto:mail@example.com">info@eshopbilan.eu</a>
                    </li>

                    <li class="pb-1 mb-2">
                        <span
                            class="d-block font-weight-normal line-height-1 text-color-light">
                            {{ __('footer.companycode') }}
                        </span>
                        125690535
                    </li>
                    <li class="pb-1 mb-2">
                        <span
                            class="d-block font-weight-normal line-height-1 text-color-light">
                            {{ __('footer.vatcode') }}
                        </span>
                        LT256905314
                    </li>
{{--                    <li class="pb-1 mb-2">--}}
{{--                        <span--}}
{{--                            class="d-block font-weight-normal line-height-1 text-color-light">--}}
{{--                            {{ __('footer.ac') }}--}}
{{--                        </span>--}}
{{--                        LT53 3500 0100 0156 4853--}}
{{--                    </li>--}}
                </ul>
                <ul class="social-icons social-icons-clean-with-border social-icons-medium">
                    <li class="social-icons-facebook">
                        <a href="{{ route('facebook.login') }}" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="social-icons-google">
                        <a href="{{ route('google.login') }}" target="_blank" title="Google">
                            <i class="fa-brands fa-google"></i>
                        </a>
                    </li>
                    <li class="social-icons-twitter">
                        <a href="{{ route('twitter.login') }}" target="_blank" title="Twitter">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-4 text-color-light mb-3">{{ __('footer.menu') }}</h5>
                <ul class="list list-unstyled mb-0 footer-links">
                    @guest
                        @include('layouts.menus.menu')
                    @endguest
                    @auth
                        @include('layouts.menus.user_menu')
                    @endauth
                        <li class="nav-list">
                            <a class="{{ request()->is('about_us') ? 'active' : '' }}" href="{{ url('/about_us') }}">
                                {{ __('menu.aboutUs') }}
                            </a>
                        </li>
                        <li class="nav-list">
                            <a class="{{ request()->is('termsofservice') ? 'active' : '' }}" href="{{ url('/termsofservice') }}">
                                {{ __('menu.termsofservice') }}
                            </a>
                        </li>
                        <li class="nav-list">
                            <a class="{{ request()->is('termsofservice') ? 'active' : '' }}" href="{{ url('/policy') }}">
                                {{ __('menu.policy') }}
                            </a>
                        </li>
                        <li class="nav-list">
                            <a class="{{ request()->is('eu_projects') ? 'active' : '' }}" href="{{ url('/eu_projects') }}">
                                {{ __('menu.euProjects') }}
                            </a>
                        </li>
                </ul>
            </div>
            @auth
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-4 text-color-light mb-3">{{ __('footer.profile') }}</h5>
                <ul class="list list-unstyled mb-0 footer-links">
                    <li class="mb-0">
                        <a href="{{ url('/user/viewcart') }}">
                            {{__('menu.cart')}}
                        </a>
                    </li>
                    <li class="mb-0">
                        <a href="{{ url('/user/rootorders') }}">
                            {{__('menu.orders')}}
                        </a>
                    </li>
                    <li class="mb-0">
                        <a href="{{ url('/user/rootoreturns') }}">
                            {{__('menu.returns')}}
                        </a>
                    </li>
                    <li class="mb-0">
                        <a href="{{ url('/user/userprofile') }}">
                            {{__('menu.profile')}}
                        </a>
                    </li>
                    <li class="mb-0">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('menu.logout') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
            @endauth
        </div>
    </div>
    <div class="container">
        <div class="footer-copyright pt-4 pb-5">
            <div class="row align-items-center justify-content-md-between">
                <div class="col-12 col-md-auto text-center text-md-start mb-2 mb-md-0">
                    <p class="mb-0">{{ __('footer.copyright') }}</p>
                </div>
                <div class="col-12 col-md-auto">
                    <div class="payment-cc justify-content-center justify-content-md-end">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
