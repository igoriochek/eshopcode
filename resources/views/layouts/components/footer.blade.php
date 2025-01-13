<!-- <footer>
    <div class="address py-6rem bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-7 col-md-4 my-3">
                    <div class="address-widget">
                        <div class="media">
                            <span class="address-icon">
                                <i class="ion-ios-location-outline"></i>
                            </span>
                            <div class="media-body">
                                <h4 class="title">Liepų g. 83, Klaipėda</h4>
                                <p class="text">{{ __('footer.address') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-5 col-md-4 my-3">
                    <div class="address-widget">
                        <div class="media">
                            <span class="address-icon">
                                <i class="ion-ios-email-outline"></i>
                            </span>
                            <div class="media-body">
                                <h4 class="title" style="text-transform: lowercase;"><a href="mailto:info@lordvisuals.lt">info@lordvisuals.lt</a></h4>
                                <p class="text">{{ __('footer.email') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 my-3">
                    <div class="address-widget">
                        <div class="media">
                            <span class="address-icon">
                                <i class="ion-ios-telephone-outline"></i>
                            </span>
                            <div class="media-body">
                                <h4 class="title"><a href="tel:+37060564062"> +370 605 64062</a></h4>
                                <p class="text">{{ __('footer.phone') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom pb-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-4 mb-5">
                    <div class="footer-widget">
                        <div class="border-bottom cbb1 mb-3rem">
                            <div class="section-title pb-4 pb-md-4 position-relative">
                                <h2 class="title">{{ __('footer.information') }}</h2>
                            </div>
                        </div>
                        <ul class="footer-menu">
                            <li>
                                <a href="{{ url('/about_us') }}">
                                    {{ __('menu.aboutUs') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/termsofservice') }}">
                                    {{ __('menu.termsofservice') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/policy') }}">
                                    {{ __('menu.policy') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/eu_projects') }}">
                                    {{ __('menu.euProjects') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/fbdatadeletion') }}">
                                    {{ __('menu.fbDataDeletion') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 mb-5">
                    <div class="footer-widget">
                        <div class="border-bottom cbb1 mb-3rem">
                            <div class="section-title pb-4 pb-md-4 position-relative">
                                <h2 class="title">{{ __('footer.menu') }}</h2>
                            </div>
                        </div>
                        <ul class="footer-menu">
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
                <div class="col-12 col-sm-6 col-lg-4 mb-5">
                    <div class="footer-widget">
                        <div class="border-bottom cbb1 mb-3rem">
                            <div class="section-title pb-4 pb-md-4 position-relative">
                                <h2 class="title">{{ __('footer.account') }}</h2>
                            </div>
                        </div>
                        <ul class="footer-menu">
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
        </div>
    </div>
    <div class="coppy-right pt-2rem pb-2rem bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="text-center text-md-start">
                        <p class="copyright-text mb-3 mb-md-0">
                            {{ __('footer.copyright') }}
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="text-center text-md-end">
                        <img src="{{ asset('images/1_Paysera logo for light background.svg') }}" alt="image" width="80px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
    .section-title .title, .section-title2 .title {
        text-transform: none !important;
    }

    .address-widget .title {
        text-transform: none !important;
    }
</style> -->

<footer class="bb-footer margin-t-50">
    <div class="footer-container">
        <div class="footer-top padding-tb-50">
            <div class="container">
                <div class="row m-minus-991" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    <div class="col-sm-12 col-lg-3 bb-footer-info">
                        <div class="bb-footer-widget">
                            <h4 class="bb-footer-heading">{{ __('footer.menu') }}</h4>
                            <div class="bb-footer-links bb-footer-dropdown">
                                <ul class="align-items-center">
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/products') }}">{{ __('menu.products') }}</a>
                                    </li>
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/rootcategories') }}">{{ __('menu.categories') }}</a>
                                    </li>
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/promotions') }}">{{ __('menu.promotions') }}</a>
                                    </li>
                                    @auth
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/user/discountCoupons') }}">{{ __('menu.discountCoupons') }}</a>
                                    </li>
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/user/messenger') }}">{{ __('menu.messenger') }}</a>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 bb-footer-account">
                        <div class="bb-footer-widget">
                            <h4 class="bb-footer-heading">{{ __('footer.information') }}</h4>
                            <div class="bb-footer-links bb-footer-dropdown">
                                <ul class="align-items-center">
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/about_us') }}">{{ __('menu.aboutUs') }}</a>
                                    </li>
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/termsofservice') }}">{{ __('menu.termsofservice') }}</a>
                                    </li>
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/policy') }}">{{ __('menu.policy') }}</a>
                                    </li>
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/eu_projects') }}">{{ __('menu.euProjects') }}</a>
                                    </li>
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/fbdatadeletion') }}">{{ __('menu.fbDataDeletion') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 bb-footer-service">
                        <div class="bb-footer-widget">
                            <h4 class="bb-footer-heading">{{ __('footer.account') }}</h4>
                            <div class="bb-footer-links bb-footer-dropdown">
                                <ul class="align-items-center">
                                    @auth
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/user/viewcart') }}">{{ __('menu.cart') }}</a>
                                    </li>
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/user/rootorders') }}">{{ __('menu.orders') }}</a>
                                    </li>
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/user/rootoreturns') }}">{{ __('menu.returns') }}</a>
                                    </li>
                                    <li class="bb-footer-link">
                                        <a href="{{ url('/user/userprofile') }}">{{ __('menu.profile') }}</a>
                                    </li>
                                    <li class="bb-footer-link">
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('menu.logout') }}
                                            </a>
                                        </form>
                                    </li>
                                    @else
                                    <li class="bb-footer-link">
                                        <a href="{{ route('login') }}">{{ __('buttons.login') }}</a>
                                    </li>
                                    <li class="bb-footer-link">
                                        <a href="{{ route('register') }}">{{ __('buttons.register') }}</a>
                                    </li>
                                    @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-3 bb-footer-cont-social">
                        <div class="bb-footer-contact">
                            <div class="bb-footer-widget">
                                <h4 class="bb-footer-heading">Contact</h4>
                                <div class="bb-footer-links bb-footer-dropdown">
                                    <ul class="align-items-center">
                                        <li class="bb-footer-link bb-foo-location">
                                            <span class="mt-15px">
                                                <i class="ri-map-pin-line"></i>
                                            </span>
                                            <p>J. Jasinskio g. 10, Vilnius </p>
                                        </li>
                                        <li class="bb-footer-link bb-foo-call">
                                            <span>
                                                <i class="ri-whatsapp-line"></i>
                                            </span>
                                            <a href="tel:+37064777121">
                                                +370 647 77121
                                            </a>
                                        </li>
                                        <li class="bb-footer-link bb-foo-mail">
                                            <span>
                                                <i class="ri-mail-line"></i>
                                            </span>
                                            <a href="mailto:grasale.kavine@gmail.com">grasale.kavine@gmail.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="bb-footer-social">
                            <div class="bb-footer-widget">
                                <div class="bb-footer-links bb-footer-dropdown">
                                    <ul class="align-items-center">
                                        <li class="bb-footer-link">
                                            <a href="https://www.facebook.com/profile.php?id=100063663756238"><i class="ri-facebook-fill"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="bb-bottom-info">
                        <div class="footer-copy">
                            <div class="footer-bottom-copy ">
                                <div class="bb-copy">
                                    {{ __('footer.copyright') }}
                                </div>
                            </div>
                        </div>
                        <div class="footer-bottom-right">
                            <div class="footer-bottom-payment d-flex justify-content-center">
                                <div class="payment-link">
                                    <img src="{{ asset('images/1_Paysera logo for light background.svg') }}" alt="image" width="80px">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>