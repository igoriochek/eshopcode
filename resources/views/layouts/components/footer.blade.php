<div class="footer-area">
    <div class="footer-top section-space-y-axis-100 text-lavender"
        data-bg-image="{{ asset('template/images/background-img/1-4-1920x419.png') }}"
        style="background-image: url({{ asset('template/images/background-img/1-4-1920x419.png') }});">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-4">
                    <div class="widget-item">
                        <div class="footer-logo pb-4">
                            <a href="{{ route('home') }}" class="header-logo">
                                <img src="{{ asset('images/1343915950.png') }}" alt="{{ config('app.name') }}"
                                    style="max-width: 200px">
                            </a>
                        </div>
                        <p class="short-desc mb-2"></p>
                        <div class="widget-contact-info pb-2">
                            <ul>
                                <li>
                                    Bajorų g.7A, Jakų k. Klaipėdos raj.
                                </li>
                                <li>
                                    <a href="mailto:info@jodesta.lt">info@jodesta.lt</a>
                                </li>
                                <li>
                                    <a href="tel:+37061670903">+37061670903</a>
                                </li>
                            </ul>
                        </div>
                        <div class="payment-method">
                            <a href="javascript:void(0)">
                                <img src="{{ asset('images/2_Paysera logo for dark background.svg') }}" alt="Paysera"
                                    style="max-width: 100px">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 pt-8 pt-lg-0">
                    <div class="widget-item">
                        <h3 class="widget-title mb-5">{{ __('footer.account') }}</h3>
                        <ul class="widget-list-item">
                            @auth
                                <li>
                                    <i class="fa fa-chevron-right"></i>
                                    <a href="{{ url('/user/viewcart') }}">
                                        {{ __('menu.cart') }}
                                    </a>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-right"></i>
                                    <a href="{{ url('/user/rootorders') }}">
                                        {{ __('menu.orders') }}
                                    </a>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-right"></i>
                                    <a href="{{ url('/user/rootoreturns') }}">
                                        {{ __('menu.returns') }}
                                    </a>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-right"></i>
                                    <a href="{{ url('/user/userprofile') }}">
                                        {{ __('menu.profile') }}
                                    </a>
                                </li>
                                <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <i class="fa fa-chevron-right"></i>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('menu.logout') }}
                                        </a>
                                    </form>
                                </li>
                            @else
                                <li>
                                    <i class="fa fa-chevron-right"></i>
                                    <a href="{{ route('login') }}">
                                        {{ __('buttons.login') }}
                                    </a>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-right"></i>
                                    <a href="{{ route('register') }}">
                                        {{ __('buttons.register') }}
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 pt-8 pt-lg-0">
                    <div class="widget-item">
                        <h3 class="widget-title mb-5">{{ __('footer.menu') }}</h3>
                        <ul class="widget-list-item">
                            <li>
                                <i class="fa fa-chevron-right"></i>
                                <a href="{{ url('/products') }}">
                                    {{ __('menu.products') }}
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-chevron-right"></i>
                                <a href="{{ url('/rootcategories') }}">
                                    {{ __('menu.categories') }}
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-chevron-right"></i>
                                <a href="{{ url('/promotions') }}">
                                    {{ __('menu.promotions') }}
                                </a>
                            </li>
                            @auth
                                <li>
                                    <i class="fa fa-chevron-right"></i>
                                    <a href="{{ url('/user/discountCoupons') }}">
                                        {{ __('menu.discountCoupons') }}
                                    </a>
                                </li>
                                <li>
                                    <i class="fa fa-chevron-right"></i>
                                    <a href="{{ url('/user/messenger') }}">
                                        {{ __('menu.messenger') }}
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 pt-8 pt-lg-0">
                    <div class="widget-item">
                        <h3 class="widget-title mb-5">{{ __('footer.information') }}</h3>
                        <ul class="widget-list-item">
                            <li>
                                <i class="fa fa-chevron-right"></i>
                                <a href="{{ url('/about_us') }}">
                                    {{ __('menu.aboutUs') }}
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-chevron-right"></i>
                                <a href="{{ url('/termsofservice') }}">
                                    {{ __('menu.termsofservice') }}
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-chevron-right"></i>
                                <a href="{{ url('/policy') }}">
                                    {{ __('menu.policy') }}
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-chevron-right"></i>
                                <a href="{{ url('/eu_projects') }}">
                                    {{ __('menu.euProjects') }}
                                </a>
                            </li>
                            <li>
                                <i class="fa fa-chevron-right"></i>
                                <a href="{{ url('/fbdatadeletion') }}">
                                    {{ __('menu.fbDataDeletion') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom bg-midnight-express py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright">
                        <span class="copyright-text">{{ __('footer.copyright') }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
