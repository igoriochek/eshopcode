{{--<header class="header w-100">
    <div class="header-body header-body-bottom-border-fixed box-shadow-none border-top-0">
        <div class="header-top header-top-small-minheight header-top-simple-border-bottom">
            <div class="container">
                <div class="header-row justify-content-between">
                    <div class="header-column col-auto px-0">
                        <div class="header-row">
                            <p class="mb-0 d-none d-md-block">
                                <i class="fa-solid fa-envelope me-1"></i>
                                info@aurintus.lt
                            </p>
                            <span class="mx-3"></span>
                            <p class="mb-0 d-none d-md-block">
                                <i class="fa-solid fa-phone me-1"></i>
                                +370 689 96899
                            </p>
                            <span class="mx-3"></span>
                            <p class="mb-0 d-none d-md-block">
                                <i class="fa-solid fa-location-dot me-1"></i>
                                Karaliaučiaus g. 3-17, LT-06281 Vilnius
                            </p>
                        </div>
                    </div>
                    <div class="header-column justify-content-end col-auto px-0">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills text-2">
                                    <li class="nav-item dropdown nav-item-border">
                                        <a class="nav-link text-uppercase"
                                           href="#" role="button" id="dropdownLanguage" data-bs-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            {{ app()->getLocale() }}
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        @include('layouts.dropdowns.language_dropdown')
                                    </li>
                                </ul>
                                <span class="mx-2"></span>
                                <ul class="header-social-icons social-icons social-icons-clean social-icons-icon-gray">
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
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-container container">
            <div class="header-row py-3">
                <div class="header-column w-100">
                    <div class="header-row justify-content-between">
                        <div class="header-logo z-index-2 col-lg-2 px-0" style="width: auto; height: auto">
                            <a href="{{ url('/home') }}">
                                <img src="{{ asset("images/aurintus_logo.jpg") }}" alt="logo" class="logo" width="160">
                            </a>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <div
                                class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border justify-content-start" style="margin-left: 0;">
                                <div
                                    class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1 w-100">
                                    <nav class="collapse w-100" id="nav">
                                        <ul class="nav nav-pills w-100" id="mainNav">
                                            @guest
                                                @include('layouts.menus.menu')
                                            @endguest
                                            @auth
                                                @include('layouts.menus.user_menu')
                                            @endauth
                                        </ul>
                                    </nav>
                                </div>
                                <div class="d-flex justify-content-end w-100">
                                    <button class="btn header-btn-collapse-nav hamburger-button" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav" aria-expanded="true">
                                        <i class="fas fa-bars"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="d-flex col-auto pe-0 ps-0 ps-xl-3">
                                <div class="header-nav-features ps-0 ms-0">
                                    <div class="header-nav-feature d-inline-flex top-2 ms-2">
                                        @guest
                                            <a href="{{ route('login') }}" role="button"
                                               class="login-button btn px-4 py-2 fw-bold">
                                                {{ __('buttons.login') }}
                                            </a>
                                        @endguest
                                        @auth
                                            <a href="#" class="header-nav-features-toggle" role="button"
                                               id="navbarUserDropdown"
                                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="{{ asset('images/icons/icon-account.png') }}" height="29" alt="icon-account" class="header-nav-features-img">
                                                <span class="d-none d-sm-inline-block" style="font-size: .58em">{{ Auth::user()->name }}</span>
                                            </a>
                                            @include('layouts.dropdowns.user_dropdown')
                                            <a href="{{ url('/user/viewcart') }}" class="header-nav-features-toggle">
                                                <img src="{{ asset('images/icons/icon-cart-big.svg') }}" height="28" alt="icon-cart-big" class="header-nav-features-img">
                                                @if (!empty($cartItemCount))
                                                    <span class="shopping-cart-items">{{ $cartItemCount }}</span>
                                                @endif
                                            </a>
                                        @endauth
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

@push('scripts')
    <script>
        const nav = document.getElementById('nav');
        const maxWidth = 991;

        window.innerWidth > maxWidth && nav.classList.add('show');

        window.addEventListener(
            'resize',
            event => window.innerWidth > maxWidth ? nav.classList.add('show') : nav.classList.remove('show'),
            true
        );

        const header = document.querySelector('.header');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 0) header.style.position = 'relative'
            if (window.scrollY > topbarHeight) header.style.position = 'sticky';
        });

        document.onscroll = () => onStickyNavbar();

        const onStickyNavbar = () => {
            if (document.body.scrollTop > topbarHeight || document.documentElement.scrollTop > topbarHeight)
                header.style.top = '-42px';
            else
                header.style.top = '0';
        }
    </script>
@endpush--}}

<header class="header__section">
    <div class="header__topbar border-bottom">
        <div class="container">
            <div class="header__topbar--inner d-flex align-items-center justify-content-between">
                <ul class="header__topbar--info d-none d-lg-flex">
                    <li class="header__info--list">
                        <a class="header__info--link fs-5" href="#">
                            <i class="fa-solid fa-envelope me-1 text-danger"></i>
                            Email Address
                        </a>
                    </li>
                    <li class="header__info--list">
                        <a class="header__info--link fs-5" href="#">
                            <i class="fa-solid fa-phone me-1 text-danger"></i>
                            Phone Number
                        </a>
                    </li>
                    <li class="header__info--list">
                        <a class="header__info--link fs-5" href="#">
                            <i class="fa-solid fa-location-dot me-1 text-danger"></i>
                            Address
                        </a>
                    </li>
                </ul>
                <div class="header__top--right d-flex align-items-center">
                    <ul class="header__top--link d-flex align-items-center">
                        <li class="language__currency--list">
                            <a class="language__switcher" href="javascript:void(0)">
                                <span>
                                    @if (app()->getLocale() == 'lt')
                                        {{ __('names.english') }}
                                    @elseif (app()->getLocale() == 'ru')
                                        {{ __('names.russian') }}
                                    @else
                                        {{ __('names.english') }}
                                    @endif
                                </span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.797" height="6.05" viewBox="0 0 9.797 6.05">
                                    <path d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"></path>
                                </svg>
                            </a>
                            <div class="dropdown__language">
                                @include('layouts.dropdowns.language_dropdown')
                            </div>
                        </li>
                    </ul>
                    <ul class="social__share d-flex">
                        <li class="social__share--list">
                            <a class="social__share--icon" target="_blank" href="{{ route('facebook.login') }}">
                                <i class="fab fa-facebook-f"></i>
                                <span class="visually-hidden">Facebook</span>
                            </a>
                        </li>
                        <li class="social__share--list">
                            <a class="social__share--icon" target="_blank" href="{{ route('google.login') }}">
                                <i class="fa-brands fa-google"></i>
                                <span class="visually-hidden">Google</span>
                            </a>
                        </li>
                        <li class="social__share--list">
                            <a class="social__share--icon" target="_blank" href="{{ route('twitter.login') }}">
                                <i class="fa-brands fa-twitter"></i>
                                <span class="visually-hidden">Twitter</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main__header header__sticky">
        <div class="container">
            <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                <div class="offcanvas__header--menu__open ">
                    <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas="">
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"></path></svg>
                        <span class="visually-hidden">Offcanvas Menu Open</span>
                    </a>
                </div>
                <div class="main__logo">
                    <a class="main__logo--link" href="{{ url('/') }}">
                        {{--<img class="main__logo--img" src="{{ asset('') }}" alt="logo-img">--}}
                        <h1 class="text-danger" style="font-size: 3rem">LANOSUS</h1>
                    </a>
                </div>
                <div class="header__menu d-none d-lg-block header__sticky--block">
                    <nav class="header__menu--navigation">
                        <ul class="header__menu--wrapper d-flex">
                            @include('layouts.menus.menu')
                        </ul>
                    </nav>
                </div>
                <div class="header__account header__sticky--none">
                    <ul class="header__account--wrapper d-flex align-items-center">
                        @guest
                            <li class="header__account--items d-none d-md-block">
                                <button class="contact__form--btn primary__btn" type="submit" style="height: 3.7rem; line-height: 3.7rem; padding: 0 2rem">
                                    <a href="{{ route('login') }}" role="button" class="text-white">
                                        {{ __('buttons.login') }}
                                    </a>
                                </button>
                            </li>
                        @else
                            <li class="header__menu--items account">
                                <a class="header__menu--link text-dark" href="{{ url('/user/userprofile') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="d-none d-lg-inline fw-normal">{{ strtok(Auth::user()->name, ' ') }}</span>
                                </a>
                                @include('layouts.dropdowns.user_dropdown')
                            </li>
                        @endif
                        <li class="header__account--items header__minicart--items">
                            <a class="header__account--btn minicart__open--btn" href="{{ url('/user/viewcart') }}" data-offcanvas="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.706" height="22.534" viewBox="0 0 14.706 13.534">
                                    <g transform="translate(0 0)">
                                        <g>
                                            <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                            <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                            <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                        </g>
                                    </g>
                                </svg>
                                @if (!empty($cartItemCount))
                                    <span class="items__count">{{ $cartItemCount }}</span>
                                @endif
                                <span class="minicart__btn--text">
                                    {{ __('menu.cart') }}
                                    <br>
                                    <span class="minicart__btn--text__price">€{{ $cartSum ?? '0.00' }}</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="header__account header__sticky--block">
                    <ul class="header__account--wrapper d-flex align-items-center">
                        @guest
                            <li class="header__account--items d-none d-md-block">
                                <button class="contact__form--btn primary__btn" type="submit" style="height: 3.7rem; line-height: 3.7rem; padding: 0 2rem">
                                    <a href="{{ route('login') }}" role="button" class="text-white">
                                        {{ __('buttons.login') }}
                                    </a>
                                </button>
                            </li>
                        @else
                            <li class="header__menu--items account">
                                <a class="header__menu--link text-dark" href="{{ url('/user/userprofile') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                    <span class="d-none d-lg-inline fw-normal">{{ strtok(Auth::user()->name, ' ') }}</span>
                                </a>
                                @include('layouts.dropdowns.user_dropdown')
                            </li>
                        @endif
                        <li class="header__account--items header__minicart--items">
                            <a class="header__account--btn minicart__open--btn" href="{{ url('/user/viewcart') }}" data-offcanvas="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.706" height="22.534" viewBox="0 0 14.706 13.534">
                                    <g transform="translate(0 0)">
                                        <g>
                                            <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                            <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                            <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                        </g>
                                    </g>
                                </svg>
                                @if (!empty($cartItemCount))
                                    <span class="items__count">{{ $cartItemCount }}</span>
                                @endif
                                <span class="minicart__btn--text">
                                    {{ __('menu.cart') }}
                                    <br>
                                    <span class="minicart__btn--text__price">€{{ $cartSum ?? '0.00' }}</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Offcanvas header menu -->
    <div class="offcanvas__header">
        <div class="offcanvas__inner">
            <div class="offcanvas__logo">
                <a class="offcanvas__logo_link" href="{{ url('/') }}">
                    {{--<img src="{{ asset('') }}" alt="logo" width="158" height="36">--}}
                    <h1 class="text-danger" style="font-size: 3rem">LANOSUS</h1>
                </a>
                <button class="offcanvas__close--btn" data-offcanvas="">close</button>
            </div>
            <nav class="offcanvas__menu">
                @include('layouts.menus.mobile_menu')
                @auth
                    <div class="offcanvas__account--items">
                        <a class="offcanvas__account--items__btn d-flex align-items-center" href="{{ route('login') }}">
                                <span class="offcanvas__account--items__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"></path><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path></svg>
                                </span>
                            <span class="offcanvas__account--items__label">{{ __('buttons.login') }}</span>
                        </a>
                    </div>
                @endauth
                <div class="offcanvas__account--wrapper d-flex mt-5">
                    <div class="language__currency--list">
                        <a class="offcanvas__language--switcher" href="javascript:void(0)">
                            <span>
                                @if (app()->getLocale() == 'lt')
                                    {{ __('names.english') }}
                                @elseif (app()->getLocale() == 'ru')
                                    {{ __('names.russian') }}
                                @else
                                    {{ __('names.english') }}
                                @endif
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="9.797" height="6.05" viewBox="0 0 9.797 6.05">
                                <path d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"></path>
                            </svg>
                        </a>
                        <div class="offcanvas__dropdown--language">
                            @include('layouts.dropdowns.language_dropdown')
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- End Offcanvas header menu -->

    <!-- Start Offcanvas stikcy toolbar -->
    <div class="offcanvas__stikcy--toolbar">
        <ul class="d-flex justify-content-between">
            <li class="offcanvas__stikcy--toolbar__list">
                <a class="offcanvas__stikcy--toolbar__btn" href="index.html">
                    <span class="offcanvas__stikcy--toolbar__icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="21.51" height="21.443" viewBox="0 0 22 17"><path fill="currentColor" d="M20.9141 7.93359c.1406.11719.2109.26953.2109.45703 0 .14063-.0469.25782-.1406.35157l-.3516.42187c-.1172.14063-.2578.21094-.4219.21094-.1406 0-.2578-.04688-.3515-.14062l-.9844-.77344V15c0 .3047-.1172.5625-.3516.7734-.2109.2344-.4687.3516-.7734.3516h-4.5c-.3047 0-.5742-.1172-.8086-.3516-.2109-.2109-.3164-.4687-.3164-.7734v-3.6562h-2.25V15c0 .3047-.11719.5625-.35156.7734-.21094.2344-.46875.3516-.77344.3516h-4.5c-.30469 0-.57422-.1172-.80859-.3516-.21094-.2109-.31641-.4687-.31641-.7734V8.46094l-.94922.77344c-.11719.09374-.24609.14062-.38672.14062-.16406 0-.30468-.07031-.42187-.21094l-.35157-.42187C.921875 8.625.875 8.50781.875 8.39062c0-.1875.070312-.33984.21094-.45703L9.73438.832031C10.1094.527344 10.5312.375 11 .375s.8906.152344 1.2656.457031l8.6485 7.101559zm-3.7266 6.50391V7.05469L11 1.99219l-6.1875 5.0625v7.38281h3.375v-3.6563c0-.3046.10547-.5624.31641-.7734.23437-.23436.5039-.35155.80859-.35155h3.375c.3047 0 .5625.11719.7734.35155.2344.211.3516.4688.3516.7734v3.6563h3.375z"></path></svg>
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Home</span>
                </a>
            </li>
            <li class="offcanvas__stikcy--toolbar__list">
                <a class="offcanvas__stikcy--toolbar__btn" href="shop.html">
                    <span class="offcanvas__stikcy--toolbar__icon">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="18.51" height="17.443" viewBox="0 0 448 512"><path d="M416 32H32A32 32 0 0 0 0 64v384a32 32 0 0 0 32 32h384a32 32 0 0 0 32-32V64a32 32 0 0 0-32-32zm-16 48v152H248V80zm-200 0v152H48V80zM48 432V280h152v152zm200 0V280h152v152z"></path></svg>
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Shop</span>
                </a>
            </li>
            <li class="offcanvas__stikcy--toolbar__list ">
                <a class="offcanvas__stikcy--toolbar__btn search__open--btn" href="javascript:void(0)" data-offcanvas="">
                        <span class="offcanvas__stikcy--toolbar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Search</span>
                </a>
            </li>
            <li class="offcanvas__stikcy--toolbar__list">
                <a class="offcanvas__stikcy--toolbar__btn minicart__open--btn" href="javascript:void(0)" data-offcanvas="">
                        <span class="offcanvas__stikcy--toolbar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22.706" height="22.534" viewBox="0 0 14.706 13.534">
                                <g transform="translate(0 0)">
                                  <g>
                                    <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                    <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                    <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                  </g>
                                </g>
                            </svg>
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Cart</span>
                    <span class="items__count">3</span>
                </a>
            </li>
            <li class="offcanvas__stikcy--toolbar__list">
                <a class="offcanvas__stikcy--toolbar__btn" href="wishlist.html">
                        <span class="offcanvas__stikcy--toolbar__icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Wishlist</span>
                    <span class="items__count">3</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- End Offcanvas stikcy toolbar -->

    <!-- Start serch box area -->
    <div class="predictive__search--box ">
        <div class="predictive__search--box__inner">
            <h2 class="predictive__search--title">Search Products</h2>
            <form class="predictive__search--form" action="#">
                <label>
                    <input class="predictive__search--input" placeholder="Search Here" type="text">
                </label>
                <button class="predictive__search--button text-white" aria-label="search button"><svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="30.51" height="25.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>  </button>
            </form>
        </div>
        <button class="predictive__search--close__btn" aria-label="search close" data-offcanvas="">
            <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51" height="30.443" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path></svg>
        </button>
    </div>
    <!-- End serch box area -->

</header>
