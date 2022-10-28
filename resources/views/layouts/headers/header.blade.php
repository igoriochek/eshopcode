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
                                        {{ __('names.lithuanian') }}
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
                                    {{ __('names.lithuanian') }}
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
</header>
