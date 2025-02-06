<footer class="footer_widgets">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container contact_us">
                        <h3>{{ __('footer.hours') }}</h3>
                        <p><span>{{ __('footer.monday') }} - {{ __('footer.thursday') }}:</span> 9:00 - 18:00</p>
                        <p><span>{{ __('footer.friday') }}:</span> 9:00 - 16:00</p>
                        <p class="mt-0"><span>{{ __('footer.saturday') }} - {{ __('footer.sunday') }}:</span> {{ __('footer.closed') }}</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>{{ __('footer.menu') }}</h3>
                        <div class="footer_menu">
                            <ul>
                                <li>
                                    <a href="{{ url('/products') }}">{{ __('menu.products') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/rootcategories') }}">{{ __('menu.categories') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/promotions') }}">{{ __('menu.promotions') }}</a>
                                </li>
                                @auth
                                <li>
                                    <a href="{{ url('/user/discountCoupons') }}">{{ __('menu.discountCoupons') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/user/messenger') }}">{{ __('menu.messenger') }}</a>
                                </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="widgets_container widget_app">
                        <div class="footer_logo">
                            <a href="{{ url('/products') }}"><img src="assets/img/logo/logo.png" alt=""></a>
                        </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="https://www.facebook.com/time2.lt"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.instagram.com/time2_lt/"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/timetwo/posts/?feedView=all"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>{{ __('footer.information') }}</h3>
                        <div class="footer_menu">
                            <ul>
                                <li>
                                    <a href="{{ url('/about_us') }}">{{ __('menu.aboutUs') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/termsofservice') }}">{{ __('menu.termsofservice') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/policy') }}">{{ __('menu.policy') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/eu_projects') }}">{{ __('menu.euProjects') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/fbdatadeletion') }}">{{ __('menu.fbDataDeletion') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>{{ __('footer.account') }}</h3>
                        <div class="footer_menu">
                            <ul>
                                @auth
                                <li>
                                    <a href="{{ url('/user/viewcart') }}">{{ __('menu.cart') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/user/rootorders') }}">{{ __('menu.orders') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/user/rootoreturns') }}">{{ __('menu.returns') }}</a>
                                </li>
                                <li>
                                    <a href="{{ url('/user/userprofile') }}">{{ __('menu.profile') }}</a>
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
                                    <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">{{ __('buttons.register') }}</a>
                                </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p class="copyright-text">{{ __('footer.copyright') }}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment">
                        <img src="{{ asset('images/1_Paysera logo for light background.svg') }}" alt="" width="80px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>