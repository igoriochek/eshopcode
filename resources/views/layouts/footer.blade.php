<!-- Start footer section -->
<footer class="footer__section footer__bg">
    <div class="container">
        <div class="main__footer">
            <div class="row ">
                <div class="col-lg-3 col-md-10">
                    <div class="footer__widget">
                        <h2 class="footer__widget--title">
                            {{ __('footer.contactUs') }}
                            <button class="footer__widget--button" aria-label="footer widget button"></button>
                            <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                            </svg>
                        </h2>
                        <ul class="footer__widget--menu footer__widget--inner">
                            <li class="footer__widget--menu__list">
                                <i class="fa-solid fa-location-dot fs-4 me-3 pe-1 text-danger"></i>
                                <span class="footer__widget--menu__text">
                                    Tilžės g. 156, Šiauliai
                                </span>
                            </li>
                            <li class="footer__widget--menu__list">
                                <i class="fa-solid fa-phone fs-4 me-3 text-danger"></i>
                                <span class="footer__widget--menu__text">
                                    +370 603 02602
                                </span>
                            </li>
                            <li class="footer__widget--menu__list">
                                <i class="fa-regular fa-envelope fs-4 me-3 pe-1 text-danger"></i>
                                <span class="footer__widget--menu__text">
                                    sales@lanosus.com
                                </span>
                            </li>
                            <li class="footer__widget--menu__list">
                                <i class="fa-solid fa-clipboard fs-4 me-3 pe-2 text-danger"></i>
                                <span class="footer__widget--menu__text">
                                    304887410
                                </span>
                            </li>
                            <ul class="social__share footer__social d-flex mt-5">
                                <li class="social__share--list">
                                    <a class="social__share--icon__style2" target="_blank" href="{{ route('facebook.login') }}">
                                        <i class="fab fa-facebook-f mt-3"></i>
                                        <span class="visually-hidden">Facebook</span>
                                    </a>
                                </li>
                                <li class="social__share--list">
                                    <a class="social__share--icon__style2" target="_blank" href="{{ route('google.login') }}">
                                        <i class="fa-brands fa-google mt-3"></i>
                                        <span class="visually-hidden">Google</span>
                                    </a>
                                </li>
                                <li class="social__share--list">
                                    <a class="social__share--icon__style2" target="_blank" href="{{ route('twitter.login') }}">
                                        <i class="fa-brands fa-twitter mt-3"></i>
                                        <span class="visually-hidden">Twitter</span>
                                    </a>
                                </li>
                            </ul>
                        </ul>
                    </div>
                </div>
                @auth
                    <div class="col-lg-3 col-md-4">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">
                                {{ __('footer.profile') }}
                                <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                <li class="footer__widget--menu__list">
                                    <a class="footer__widget--menu__text" href="{{ url('/user/viewcart') }}"
                                       style="color: {{ request()->is('user/viewcart') ? '#ED1D24' : '' }}">
                                        {{__('menu.cart')}}
                                    </a>
                                </li>
                                <li class="footer__widget--menu__list">
                                    <a class="footer__widget--menu__text" href="{{ url('/user/rootorders') }}"
                                       style="color: {{ request()->is('user/rootorders') ? '#ED1D24' : '' }}">
                                        {{__('menu.orders')}}
                                    </a>
                                </li>
                                <li class="footer__widget--menu__list">
                                    <a class="footer__widget--menu__text" href="{{ url('/user/rootoreturns') }}"
                                       style="color: {{ request()->is('user/rootoreturns') ? '#ED1D24' : '' }}">
                                        {{__('menu.returns')}}
                                    </a>
                                </li>
                                <li class="footer__widget--menu__list">
                                    <a class="footer__widget--menu__text" href="{{ url('/user/userprofile') }}"
                                       style="color: {{ request()->is('user/userprofile') ? '#ED1D24' : '' }}">
                                        {{__('menu.profile')}}
                                    </a>
                                </li>
                                <li class="footer__widget--menu__list">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <a href="{{ route('logout') }}" class="footer__widget--menu__text"
                                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('menu.logout') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endauth
                <div class="col-lg-3 col-md-4">
                    <div class="footer__widget">
                        <h2 class="footer__widget--title ">
                            {{ __('footer.menu') }}
                            <button class="footer__widget--button" aria-label="footer widget button"></button>
                            <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                            </svg>
                        </h2>
                        <ul class="footer__widget--menu footer__widget--inner">
                            <li class="footer__widget--menu__list">
                                <a class="footer__widget--menu__text" href="{{ url('/products') }}"
                                    style="color: {{ request()->is('products*') ? '#ED1D24' : '' }}">
                                    {{ __('menu.products') }}
                                </a>
                            </li>
                            <li class="footer__widget--menu__list">
                                <a class="footer__widget--menu__text" href="{{ url('/rootcategories') }}"
                                   style="color: {{ request()->is('rootcategories*') ? '#ED1D24' : '' }}">
                                    {{ __('menu.categories') }}
                                </a>
                            </li>
                            <li class="footer__widget--menu__list">
                                <a class="footer__widget--menu__text" href="{{ url('/promotions') }}"
                                   style="color: {{ request()->is('promotions*') ? '#ED1D24' : '' }}">
                                    {{ __('menu.promotions') }}
                                </a>
                            </li>
                            <li class="footer__widget--menu__list">
                                <a class="footer__widget--menu__text" href="{{ url('/user/discountCoupons') }}"
                                   style="color: {{ request()->is('/user/discountCoupons*') ? '#ED1D24' : '' }}">
                                    {{ __('menu.discountCoupons') }}
                                </a>
                            </li>
                            <li class="footer__widget--menu__list">
                                <a class="footer__widget--menu__text" href="{{ url('/user/messenger') }}"
                                   style="color: {{ request()->is('user/messenger*') ? '#ED1D24' : '' }}">
                                    {{ __('menu.messenger') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="footer__widget">
                        <h2 class="footer__widget--title ">
                            {{ __('footer.resources') }}
                            <button class="footer__widget--button" aria-label="footer widget button"></button>
                            <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                            </svg>
                        </h2>
                        <ul class="footer__widget--menu footer__widget--inner">
                            <li class="footer__widget--menu__list">
                                <a class="footer__widget--menu__text" href="{{ url('/termsofservice') }}"
                                   style="color: {{ request()->is('termsofservice') ? '#ED1D24' : '' }}">
                                    {{ __('menu.termsofservice') }}
                                </a>
                            </li>
                            <li class="footer__widget--menu__list">
                                <a class="footer__widget--menu__text" href="{{ url('/policy') }}"
                                   style="color: {{ request()->is('policy') ? '#ED1D24' : '' }}">
                                    {{ __('menu.policy') }}
                                </a>
                            </li>
                            <li class="footer__widget--menu__list">
                                <a class="footer__widget--menu__text" href="{{ url('/about') }}"
                                   style="color: {{ request()->is('about') ? '#ED1D24' : '' }}">
                                    {{ __('menu.about') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__bottom">
        <div class="container">
            <div class="footer__bottom--inenr d-flex justify-content-between align-items-center">
                <div class="footer__logo">
                    <a class="footer__logo--link bg-white p-2 rounded-1" href="index.html">
                        <img class="main__logo--img" src="{{ asset('images/Pilnas.jpg') }}" alt="full_logo" width="250">
                    </a>
                </div>
                <p class="copyright__content pt-3">
                    <span class="text__secondary">© 2022</span>
                    {{ __('footer.copyright') }}
                </p>
                <div class="footer__payment bg-white px-3 py-2 rounded">
                    <img src="{{ asset('images/paysera_logo.png') }}" alt="payment-img" width="60">
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End footer section -->
