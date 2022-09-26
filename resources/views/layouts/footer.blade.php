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
                        Konstitucijos pr. 7, Vilnius, Verslo centras „Europa“, 12 aukštas, LT-09308
                    </li>
                    <li class="pb-1 mb-2">
                        <span class="d-block font-weight-normal line-height-1 text-color-light">
                            {{ __('footer.phone') }}
                        </span>
                        <a href="tel:+1234567890">+370 653 333 30</a>
                    </li>
                    <li class="pb-1 mb-2">
                        <span class="d-block font-weight-normal line-height-1 text-color-light">
                            {{ __('Viber, Whatsapp') }}
                        </span>
                        +370 685 777 77
                    </li>
                    <li class="pb-1 mb-2">
                        <span class="d-block font-weight-normal line-height-1 text-color-light">
                            {{ __('footer.email') }}
                        </span>
                        <a href="mailto:mail@example.com">info@buhalteres.lt</a>
                    </li>
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
                <h5 class="text-4 text-color-light mb-3">{{ __('footer.browse') }}</h5>
                <ul class="list list-unstyled mb-0 footer-links">
                    @guest
                        @include('layouts.menus.menu')
                    @endguest
                    @auth
                        @include('layouts.menus.user_menu')
                    @endauth
                </ul>
            </div>
            @auth
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-4 text-color-light mb-3">{{ __('footer.personal') }}</h5>
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
                        <i class="fab fa-cc-visa"></i>
                        <i class="fab fa-cc-paypal"></i>
                        <i class="fab fa-cc-stripe"></i>
                        <i class="fab fa-cc-mastercard"></i>
                        <i class="fab fa-cc-apple-pay"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
