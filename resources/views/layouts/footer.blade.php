<footer class="footer">
    <div class="container">
        <div class="row py-4 my-5">
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-4 text-color-light mb-3">{{ __('Contant Info') }}</h5>
                <ul class="list list-unstyled">
                    <li class="pb-1 mb-2">
                        <span
                            class="d-block font-weight-normal line-height-1 text-color-light">{{ __('Address') }}</span>
                        1234 Street Name, City, State, LT
                    </li>
                    <li class="pb-1 mb-2">
                        <span class="d-block font-weight-normal line-height-1 text-color-light">{{ __('Phone') }}</span>
                        <a href="tel:+1234567890">+370 xxx xxx xx</a>
                    </li>
                    <li class="pb-1 mb-2">
                        <span class="d-block font-weight-normal line-height-1 text-color-light">{{ __('Email') }}</span>
                        <a href="mailto:mail@example.com">mail@example.com</a>
                    </li>
                    <li class="pb-1 mb-2">
                        <span
                            class="d-block font-weight-normal line-height-1 text-color-light">{{ __('Working Days/Hours') }}</span>
                        Mon - Sun / 9:00AM - 8:00PM
                    </li>
                </ul>
                <ul class="social-icons social-icons-clean-with-border social-icons-medium">
                    <li class="social-icons-facebook">
                        <a href="#" target="_blank" title="Facebook">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li class="social-icons-youtube">
                        <a href="#" target="_blank" title="YouTube">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </li>
                    <li class="social-icons-linkedin">
                        <a href="#" target="_blank" title="Linkedin">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li class="social-icons-instagram">
                        <a href="#" target="_blank" title="Instagram">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li class="social-icons-tiktok">
                        <a href="#" target="_blank" title="TikTok">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-4 text-color-light mb-3">{{ __('Customer Service') }}</h5>
                <ul class="list list-unstyled mb-0 footer-links">
                    <li class="mb-0">
                        <a href="contact-us-1.html">{{ __('Help & FAQs') }}</a>
                    </li>
                    <li class="mb-0">
                        <a href="services.html">{{ __('Order Tracking') }}</a>
                    </li>
                    <li class="mb-0">
                        <a href="#">{{ __('Shipping & Delivery') }}</a>
                    </li>
                    <li class="mb-0">
                        <a href="about-us-1.html">{{ __('Careers') }}</a>
                    </li>
                    <li class="mb-0">
                        <a href="#">{{ __('About Us') }}</a>
                    </li>
                    <li class="mb-0">
                        <a href="#">{{ __('Corporate Sales') }}</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-4 text-color-light mb-3">{{ __('Browse') }}</h5>
                <ul class="list list-unstyled mb-0 footer-links">
                    @guest
                        @include('layouts.menus.menu')
                    @endguest
                    @auth
                        @include('layouts.menus.user_menu')
                    @endauth
                </ul>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0">
                <h5 class="text-4 text-color-light mb-3">{{ __('Personal') }}</h5>
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
        </div>
    </div>
    <div class="container">
        <div class="footer-copyright pt-4 pb-5">
            <div class="row align-items-center justify-content-md-between">
                <div class="col-12 col-md-auto text-center text-md-start mb-2 mb-md-0">
                    <p class="mb-0">{{ __('Buhalteriai © 2022. All Rights Reserved') }}</p>
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
