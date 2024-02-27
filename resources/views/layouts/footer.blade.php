<footer class="footer" style="border-top: 1px solid #010717; background-image: linear-gradient(rgba(0, 0, 0, .7),rgba(0, 0, 0, .7)) , url({{ asset('images/old-carousel-18077124.jpg') }}); background-position: center;background-size: cover;">
    <div class="container pb-4">
        <div class="row py-4 my-5">
            <div class="col-md-6 @auth col-lg-4 @else col-lg-4 @endauth mb-5 mb-lg-0 ps-1 @auth ps-3 @else ps-5 @endauth">
                <h3 class="text-uppercase" style="color: #ffa600; font-family: 'Times New Roman', sans-serif">
                    {{ __('footer.contactUs') }}
                </h3>
                <ul class="list list-unstyled pt-3">
                    <li class="pb-4">
                        <i class="fa-solid fa-location-dot fs-5 me-3"></i>
                        <b>{{ __('footer.address') }}:</b>&nbsp;
                        <a target="_blank" class="contant-link" href="https://www.google.com/maps/place/Vaduvos+g.+7,+02301+Vilnius/data=!4m2!3m1!1s0x46dd935ea4468a75:0x2720080368757e72?sa=X&ved=2ahUKEwiti-exntCDAxXiS_EDHc_GAEcQ8gF6BAgSEAA">
                            Vaduvos g. 7, LT-02304 Vilnius
                        </a>
                    </li>
                    <li class="pb-4">
                        <i class="fa-solid fa-phone fs-5 me-2 pe-1"></i>
                        <b>{{ __('footer.phone') }}:</b>&nbsp;
                        <a class="contant-link" href="tel:+37065939993">+370 659 39993</a>
                    </li>
                    <li class="pb-4">
                        <i class="fa-regular fa-envelope fs-5 me-2 pe-1"></i>
                        <b>{{ __('footer.email') }}:</b>&nbsp;
                        <a class="contant-link" href="mailto:info@biliardas.com">info@biliardas.com</a>
                    </li>
                    <li class="pb-4">
                        <i class="fa-solid fa-clipboard fs-5 me-3"></i>
                        <b>{{ __('footer.reg_code') }}:</b>&nbsp;123369025
                    </li>
                    <li class="pb-4">
                        <i class="fa-solid fa-file-invoice fs-5 me-3"></i>
                        <b>{{ __('footer.vat_code') }}:</b>&nbsp;LT233690219
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
            <div class="col-md-6 @auth col-lg-2 @else col-lg-4 @endauth mb-5 mb-lg-0 ps-1 @auth ps-3 @else ps-5 @endauth">
                <h3 class="text-uppercase" style="color: #ffa600; font-family: 'Times New Roman', sans-serif">
                    {{ __('footer.menu') }}
                </h3>
                <ul class="list list-unstyled mb-0 footer-links">
                    <li class="nav-list">
                        <a class="{{ request()->is('products*') ? 'active' : '' }}" href="{{ url('/products') }}">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            {{ __('menu.products') }}
                        </a>
                    </li>
                    <li class="nav-list">
                        <a class="{{ request()->is('rootcategories*') ? 'active' : '' }}" href="{{ url('/rootcategories') }}">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            {{ __('menu.categories') }}
                        </a>
                    </li>
                    <li class="nav-list">
                        <a class="{{ request()->is('promotions*') ? 'active' : '' }}" href="{{ url('/promotions') }}">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            {{ __('menu.promotions') }}
                        </a>
                    </li>
                    <li class="nav-list">
                        <a class="{{ request()->is('user/discountCoupons*') ? 'active' : '' }}" href="{{ url('/user/discountCoupons') }}">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            {{ __('menu.discountCoupons') }}
                        </a>
                    </li>
                    <li class="nav-list">
                        <a class="{{ request()->is('user/messenger*') ? 'active' : '' }}" href="{{ url('/user/messenger') }}">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            {{ __('menu.messenger') }}
                        </a>
                    </li>
                    <li class="nav-list">
                        <a class="{{ request()->is('termsofservice') ? 'active' : '' }}" href="{{ url('/termsofservice') }}">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            {{ __('menu.termsofservice') }}
                        </a>
                    </li>
                    <li class="nav-list">
                        <a class="{{ request()->is('policy') ? 'active' : '' }}" href="{{ url('/policy') }}">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            {{ __('menu.policy') }}
                        </a>
                    </li>
                    <li class="nav-list">
                        <a class="{{ request()->is('eu_projects') ? 'active' : '' }}" href="{{ url('/eu_projects') }}">
                            <i class="fa-solid fa-angle-right me-2"></i>
                            {{ __('menu.euProjects') }}
                        </a>
                    </li>
                </ul>
            </div>
            @auth
                <div class="col-md-6 @auth col-lg-3 @else col-lg-4 @endauth mb-5 mb-lg-0 ps-1 @auth ps-3 @else ps-5 @endauth">
                    <h3 class="text-uppercase" style="color: #ffa600; font-family: 'Times New Roman', sans-serif">
                        {{ __('footer.profile') }}
                    </h3>
                    <ul class="list list-unstyled mb-0 footer-links">
                        <li class="mb-0">
                            <a href="{{ url('/user/viewcart') }}">
                                <i class="fa-solid fa-angle-right me-2"></i>
                                {{__('menu.cart')}}
                            </a>
                        </li>
                        <li class="mb-0">
                            <a href="{{ url('/user/rootorders') }}">
                                <i class="fa-solid fa-angle-right me-2"></i>
                                {{__('menu.orders')}}
                            </a>
                        </li>
                        <li class="mb-0">
                            <a href="{{ url('/user/rootoreturns') }}">
                                <i class="fa-solid fa-angle-right me-2"></i>
                                {{__('menu.returns')}}
                            </a>
                        </li>
                        <li class="mb-0">
                            <a href="{{ url('/user/userprofile') }}">
                                <i class="fa-solid fa-angle-right me-2"></i>
                                {{__('menu.profile')}}
                            </a>
                        </li>
                        <li class="mb-0">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-angle-right me-2"></i>
                                    {{ __('menu.logout') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            <div class="col-md-6 @auth col-lg-3 @else col-lg-4 @endauth mb-5 mb-lg-0">
                <h3 class="text-uppercase" style="color: #ffa600; font-family: 'Times New Roman', sans-serif">
                    {{ __('footer.safe_payment') }}
                </h3>
                <div class="d-flex mt-4 mb-4 mb-md-0">
                    <img src="{{ asset('images/320px-Paysera_logo.png') }}" alt="Paysera" class="logo_footer" width="180">
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-footer" style="background-color: #111">
        <div class="container">
            <div class="footer-copyright py-4">
                <div class="row align-items-center justify-content-md-between">
                    <div class="col-12 col-md-auto text-center text-md-start">
                        <p class="mb-0">© 2023 IĮ "E. Mikucko firma"</p>
                    </div>
                    <div class="col-12 col-md-auto">
                        <div class="d-flex justify-content-center justify-content-md-end">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
