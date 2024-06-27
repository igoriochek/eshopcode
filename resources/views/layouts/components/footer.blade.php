<footer class="axil-footer-area footer-style-2">
    <!-- Start Footer Top Area  -->
    <div class="footer-top separator-top">
        <div class="container">
            <div class="row">
                <!-- Start Single Widget  -->
                <div class="col-lg-3 col-sm-6">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">Support</h5>
                        <div class="inner">
                            <p>	Veisiejų g. 12-40, <br>
                            LT-66241 Druskininkai
                            </p>
                            <ul class="support-list-item">
                                <li><a href="mailto:example@domain.com"><i class="fal fa-envelope-open"></i> example@domain.com</a></li>
                                <li><a href="tel:+37068629686"><i class="fal fa-phone-alt"></i> +370 686 29686</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-lg-3 col-sm-6">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">{{ __('footer.information') }}</h5>
                        <div class="inner">
                            <ul>
                                <li>
                                    <a href="{{ url('/about_us') }}" class="{{ request()->is('about_us') ? 'active' : '' }}">
                                        {{ __('menu.aboutUs') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/termsofservice') }}" class="{{ request()->is('termsofservice') ? 'active' : '' }}">
                                        {{ __('menu.termsofservice') }}
                                    </a>
                                </li>   
                                <li>
                                    <a href="{{ url('/policy') }}" class="{{ request()->is('termsofservice') ? 'active' : '' }}">
                                        {{ __('menu.policy') }}
                                    </a>
                                </li>   
                                <li>
                                    <a href="{{ url('/eu_projects') }}" class="{{ request()->is('eu_projects') ? 'active' : '' }}">
                                        {{ __('menu.euProjects') }}
                                    </a>
                                </li>   
                                <li>
                                    <a href="{{ url('/fbdatadeletion') }}" class="{{ request()->is('fbdatadeletion') ? 'active' : '' }}">
                                        {{ __('menu.fbDataDeletion') }}
                                    </a>
                                </li>   
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-lg-3 col-sm-6">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">{{ __('footer.menu') }}</h5>
                        <div class="inner">
                            <ul>
                                <li>
                                    <a href="{{ url('/products') }}">
                                        {{ __('menu.products') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/rootcategories') }}">
                                        {{ __('menu.categories') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/promotions') }}">
                                        {{ __('menu.promotions') }}
                                    </a>
                                </li>
                                @auth
                                    <li>
                                        <a href="{{ url('/user/discountCoupons') }}">
                                            {{ __('menu.discountCoupons') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/user/messenger') }}">
                                            {{ __('menu.messenger') }}
                                        </a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
                <!-- Start Single Widget  -->
                <div class="col-lg-3 col-sm-6">
                    <div class="axil-footer-widget">
                        <h5 class="widget-title">{{ __('footer.account') }}</h5>
                        <div class="inner">
                            <ul>
                                @auth
                                    <li>
                                        <a href="{{ url('/user/viewcart') }}">
                                            {{ __('menu.cart') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/user/rootorders') }}">
                                            {{ __('menu.orders') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/user/rootoreturns') }}">
                                            {{ __('menu.returns') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/user/userprofile') }}">
                                            {{ __('menu.profile') }}
                                        </a>
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('menu.logout') }}
                                            </a>
                                        </form>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('login') }}">
                                            {{ __('buttons.login') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register') }}">
                                            {{ __('buttons.register') }}
                                        </a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Single Widget  -->
            </div>
        </div>
    </div>
    <!-- End Footer Top Area  -->
    <!-- Start Copyright Area  -->
    <div class="copyright-area copyright-default separator-top">
        <div class="container">
            <div class="row align-items-center">
                {{-- <div class="col-xl-4">
                    <div class="social-share">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-discord"></i></a>
                    </div>
                </div> --}}
                <div class="col-xl-6 col-lg-12">
                    <div class="copyright-left d-flex flex-wrap justify-content-center justify-content-lg-start">
                        <ul class="quick-link">
                            <li>{{ __('footer.copyright') }}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12">
                    <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">
                        <span class="card-text">{{ __('footer.acceptPayments') }}</span>
                        <ul class="payment-icons-bottom quick-link">
                            <li>
                                <img src="{{ asset('images/1_Paysera logo for light background.svg') }}" alt="image" width="80px">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright Area  -->
</footer>