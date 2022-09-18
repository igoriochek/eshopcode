<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/jquery-ui.css')}}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset("vendor/cookie-consent/css/cookie-consent.css")}}">


    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Vendor CSS (Bootstrap & Icon Font) -->
    <link rel="stylesheet" href={{asset("css/vendor/fontawesome-all.min.css")}}>
    <link rel="stylesheet" href={{asset("css/vendor/edumall-icon.css")}}>
    <link rel="stylesheet" href={{asset("css/vendor/bootstrap.min.css")}}>

    <!-- Plugins CSS (All Plugins Files) -->
    <link rel="stylesheet" href={{asset("css/plugins/aos.css")}}>
    <link rel="stylesheet" href={{asset("css/plugins/swiper-bundle.min.css")}}>
    <link rel="stylesheet" href={{asset("css/plugins/perfect-scrollbar.css")}}>
    <link rel="stylesheet" href={{asset("css/plugins/jquery.powertip.min.css")}}>
    <link rel="stylesheet" href={{asset("css/plugins/glightbox.min.css")}}>
    <link rel="stylesheet" href={{asset("css/plugins/flatpickr.min.css")}}>
    <link rel="stylesheet" href={{asset("css/plugins/ion.rangeSlider.min.css")}}>
    <link rel="stylesheet" href={{asset("css/plugins/select2.min.css")}}>


    <link rel="stylesheet" href={{asset("css/style.css")}}>



{{--    <!-- Style CSS -->--}}
{{--    <link rel="stylesheet" href="{{asset("css/style.css")}}>--}}
    @stack('css')
    @livewireStyles
</head>
<body>

{{--<div>--}}
{{--    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--        <div class="container">--}}
{{--            <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                {{ config('app.name', 'Laravel') }}--}}
{{--            </a>--}}
{{--            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}
{{--            <ul class="navbar-nav">--}}
{{--                <!-- Authentication Links -->--}}
{{--                @guest--}}
{{--                    @if (Route::has('login'))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}

{{--                    @if (Route::has('register'))--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                        </li>--}}
{{--                    @endif--}}
{{--                @else--}}
{{--                    @auth--}}
{{--                        @if ( Auth::user()->type == 1 )--}}
{{--                            @include('layouts.adminmenu')---}}

{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">{{__('menu.admin')}}:<a/>--}}
{{--                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                        @include('layouts.adminmenu')--}}
{{--                                    </ul>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">{{__('menu.reports')}}:<a/>--}}
{{--                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                        @include('layouts.adminreportmenu')--}}
{{--                                    </ul>--}}
{{--                            </li>--}}
{{--                        @elseif( Auth::user()->type == 2 )--}}
{{--                            @include('layouts.usermenu')--}}
{{--                        @endif--}}

{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">{{__('messages.chooselang')}}:<a/>--}}
{{--                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                        @foreach (config('translatable.locales') as $locale)--}}
{{--                                           <li> <a class="dropdown-item"  href="/lang/{{ $locale }}"--}}
{{--                                               class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">--}}
{{--                                                [{{ strtoupper($locale) }}]--}}
{{--                                            </a>--}}
{{--                                           </li>--}}
{{--                                        @endforeach--}}
{{--                                    </ul>--}}
{{--                            </li>--}}
{{--                    @endauth--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">--}}
{{--                            {{ Auth::user()->name }}--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item" href="#">Link1</a>--}}
{{--                            </li>--}}
{{--                            @auth--}}
{{--                                @if ( Auth::user()->type == 1 )--}}
{{--                                    @include('layouts.adminmenu')--}}
{{--                                @elseif( Auth::user()->type == 2 )--}}
{{--                                    @include('layouts.usermenu')--}}
{{--                                @endif--}}
{{--                            @endauth--}}
{{--                            @if( Auth::user()->type == 2 )--}}
{{--                                <li><a class="dropdown-item" href="/user/userprofile">{{__('menu.userInfo')}}</a>&nbsp;</li>--}}
{{--                            @endif--}}
{{--                            <li>--}}
{{--                                <form id="logout-form" action="{{ route('logout') }}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                         document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('menu.logout') }}--}}
{{--                                    </a>--}}
{{--                                </form>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}

{{--                @endguest--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--    <main class="py-4">--}}
{{--        @yield('content')--}}
{{--    </main>--}}
{{--</div>--}}


<main class="main-wrapper">

    <!-- Header start -->
    <div class="header-section header-sticky">
        <!-- Header Main Start -->
        <div class="header-main">
            <div class="container">
                <!-- Header Main Wrapper Start -->
                <div class="header-main-wrapper">

                    <!-- Header Logo Start -->
                    <div class="header-logo">
                        <a class="header-logo__logo" href="index-main.html"><img src="{{asset("images/dark-logo.png")}}" width="296" height="64" alt="Logo"></a>
                    </div>
                    <!-- Header Logo End -->

                    <!-- Header Category Menu Start -->
                    <div class="header-category-menu d-none d-xl-block">
                        @guest
                            @include('layouts.guestmenu')
                        @endguest
                        @auth
                                                @if ( Auth::user()->type == 1 )
                                                    @include('layouts.adminmenu')

{{--                                                    <li class="nav-item dropdown">--}}
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">{{__('menu.admin')}}:<a/>
                                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                @include('layouts.adminmenu')
                                                            </ul>
{{--                                                    </li>--}}
{{--                                                    <li class="nav-item dropdown">--}}
                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">{{__('menu.reports')}}:<a/>
                                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                @include('layouts.adminreportmenu')
                                                            </ul>
{{--                                                    </li>--}}
                                                @elseif( Auth::user()->type == 2 )
                                                    @include('layouts.usermenu')
                                                @endif

{{--                                                    <li class="nav-item dropdown">--}}
{{--                                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">{{__('messages.chooselang')}}:<a/>--}}
{{--                                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
{{--                                                                @foreach (config('translatable.locales') as $locale)--}}
{{--                                                                   <li> <a class="dropdown-item"  href="/lang/{{ $locale }}"--}}
{{--                                                                       class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">--}}
{{--                                                                        [{{ strtoupper($locale) }}]--}}
{{--                                                                    </a>--}}
{{--                                                                   </li>--}}
{{--                                                                @endforeach--}}
{{--                                                            </ul>--}}
{{--                                                    </li>--}}
                                            @endauth


{{--                        <a href="#" class="header-category-toggle">--}}
{{--                            <div class="header-category-toggle__icon">--}}
{{--                                <svg width="18px" height="18px" viewBox="0 0 18 18" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">--}}
{{--                                    <g stroke="none" stroke-width="1" fill-rule="evenodd">--}}
{{--                                        <path d="M2,14 C3.1045695,14 4,14.8954305 4,16 C4,17.1045695 3.1045695,18 2,18 C0.8954305,18 0,17.1045695 0,16 C0,14.8954305 0.8954305,14 2,14 Z M9,14 C10.1045695,14 11,14.8954305 11,16 C11,17.1045695 10.1045695,18 9,18 C7.8954305,18 7,17.1045695 7,16 C7,14.8954305 7.8954305,14 9,14 Z M16,14 C17.1045695,14 18,14.8954305 18,16 C18,17.1045695 17.1045695,18 16,18 C14.8954305,18 14,17.1045695 14,16 C14,14.8954305 14.8954305,14 16,14 Z M2,7 C3.1045695,7 4,7.8954305 4,9 C4,10.1045695 3.1045695,11 2,11 C0.8954305,11 0,10.1045695 0,9 C0,7.8954305 0.8954305,7 2,7 Z M9,7 C10.1045695,7 11,7.8954305 11,9 C11,10.1045695 10.1045695,11 9,11 C7.8954305,11 7,10.1045695 7,9 C7,7.8954305 7.8954305,7 9,7 Z M16,7 C17.1045695,7 18,7.8954305 18,9 C18,10.1045695 17.1045695,11 16,11 C14.8954305,11 14,10.1045695 14,9 C14,7.8954305 14.8954305,7 16,7 Z M2,0 C3.1045695,0 4,0.8954305 4,2 C4,3.1045695 3.1045695,4 2,4 C0.8954305,4 0,3.1045695 0,2 C0,0.8954305 0.8954305,0 2,0 Z M9,0 C10.1045695,0 11,0.8954305 11,2 C11,3.1045695 10.1045695,4 9,4 C7.8954305,4 7,3.1045695 7,2 C7,0.8954305 7.8954305,0 9,0 Z M16,0 C17.1045695,0 18,0.8954305 18,2 C18,3.1045695 17.1045695,4 16,4 C14.8954305,4 14,3.1045695 14,2 C14,0.8954305 14.8954305,0 16,0 Z"></path>--}}
{{--                                    </g>--}}
{{--                                </svg>--}}
{{--                            </div>--}}
{{--                            <div class="header-category-toggle__text">Category</div>--}}
{{--                        </a>--}}

{{--                        <div class="header-category-dropdown-wrap">--}}
{{--                            <ul class="header-category-dropdown">--}}
{{--                                <li>--}}
{{--                                    <a href="shop-left-sidebar.html"> Design <span class="toggle-sub-menu"></span></a>--}}

{{--                                    <ul class="sub-categories children">--}}
{{--                                        <li><a href="shop-left-sidebar.html">All Business</a></li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#">Communications<span class="toggle-sub-menu"></span></a>--}}

{{--                                            <ul class="course-list children">--}}
{{--                                                <li>--}}
{{--                                                    <a class="categories-course" href="shop-single-list-left-sidebar.html">--}}
{{--                                                        <div class="categories-course__thumbnail">--}}
{{--                                                            <img src="assets/images/courses/courses-1.jpg" alt="Course" width="62" height="50">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="categories-course__caption">--}}
{{--                                                            <h5 class="categories-course__title">Illustrator 2020 MasterClass</h5>--}}
{{--                                                            <div class="categories-course__price">--}}
{{--                                                                <span class="categories-course__sale-price">$22.00</span>--}}
{{--                                                                <span class="categories-course__regular-price">$30.00</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a class="categories-course" href="shop-single-list-left-sidebar.html">--}}
{{--                                                        <div class="categories-course__thumbnail">--}}
{{--                                                            <img src="assets/images/courses/courses-2.jpg" alt="Course" width="62" height="50">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="categories-course__caption">--}}
{{--                                                            <h5 class="categories-course__title">Illustrator 2020 MasterClass</h5>--}}
{{--                                                            <div class="categories-course__price">--}}
{{--                                                                <span class="categories-course__sale-price">$22.00</span>--}}
{{--                                                                <span class="categories-course__regular-price">$30.00</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a class="categories-course" href="shop-single-list-left-sidebar.html">--}}
{{--                                                        <div class="categories-course__thumbnail">--}}
{{--                                                            <img src="assets/images/courses/courses-3.jpg" alt="Course" width="62" height="50">--}}
{{--                                                        </div>--}}
{{--                                                        <div class="categories-course__caption">--}}
{{--                                                            <h5 class="categories-course__title">Illustrator 2020 MasterClass</h5>--}}
{{--                                                            <div class="categories-course__price">--}}
{{--                                                                <span class="categories-course__sale-price">$22.00</span>--}}
{{--                                                                <span class="categories-course__regular-price">$30.00</span>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </li>--}}
{{--                                        <li><a href="shop-left-sidebar.html">Entrepreneurship</a></li>--}}
{{--                                        <li><a href="shop-left-sidebar.html">Finance</a></li>--}}
{{--                                        <li><a href="shop-left-sidebar.html">Management</a></li>--}}
{{--                                        <li><a href="shop-left-sidebar.html">Sales</a></li>--}}
{{--                                        <li><a href="shop-left-sidebar.html">Strategy &amp; Analytics</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li><a href="shop-left-sidebar.html">Business</a></li>--}}
{{--                                <li><a href="shop-left-sidebar.html">Data Science</a></li>--}}
{{--                                <li><a href="shop-left-sidebar.html">Development</a></li>--}}
{{--                                <li><a href="shop-left-sidebar.html">Finance</a></li>--}}
{{--                                <li><a href="shop-left-sidebar.html">Health &amp; Fitness</a></li>--}}
{{--                                <li><a href="shop-left-sidebar.html">Lifestyle</a></li>--}}
{{--                                <li><a href="shop-left-sidebar.html">Marketing</a></li>--}}
{{--                                <li><a href="shop-left-sidebar.html">Music</a></li>--}}
{{--                                <li><a href="shop-left-sidebar.html">Personal Development</a></li>--}}
{{--                                <li><a href="shop-left-sidebar.html">Photography</a></li>--}}
{{--                                <li><a href="shop-left-sidebar.html">Teaching &amp; Academics</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                    <!-- Header Category Menu End -->

                    <!-- Header Inner Start -->
                    <div class="header-inner">

                        <!-- Header Navigation Start -->
                        <div class="header-navigation d-none d-xl-block">
                            <nav class="menu-primary">
                                <ul class="menu-primary__container">
                                    <li>
                                        <span>{{__("messages.chooselang")}}</span>

                                        <ul class="mega-menu">
                                            <li>
                                                <!-- Mega Menu Content Start -->
                                                <div class="mega-menu-content">
                                                    <div class="row">
                                                        <div class="col-xl-3">
                                                            <div class="menu-content-list">
                                                                @foreach (config('translatable.locales') as $locale)
                                                                   <a class="menu-content-list__link"  href="/lang/{{ $locale }}">
                                                                        [{{ strtoupper($locale) }}]
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Mega Menu Content Start -->
                                            </li>
                                        </ul>




                                    </li>
{{--                                    <li><a href="become-an-instructor.html"><span>Become an Instructor</span></a></li>--}}
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Navigation End -->

{{--                        <!-- Header Mini Cart Start -->--}}
{{--                        <div class="header-action">--}}
{{--                            <a href="#" class="header-action__btn">--}}
{{--                                <i class="far fa-shopping-cart"></i>--}}
{{--                                <span class="header-action__number">3</span>--}}
{{--                            </a>--}}

{{--                            <!-- Header Mini Cart Start -->--}}
{{--                            <div class="header-mini-cart">--}}

{{--                                <!-- Header Mini Cart Product List Start -->--}}
{{--                                <ul class="header-mini-cart__product-list ">--}}
{{--                                    <li class="header-mini-cart__item">--}}
{{--                                        <a href="#" class="header-mini-cart__close"></a>--}}
{{--                                        <div class="header-mini-cart__thumbnail">--}}
{{--                                            <a href="shop-single-list-left-sidebar.html"><img src="assets/images/product/product-1.png" alt="Product" width="80" height="93"></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="header-mini-cart__caption">--}}
{{--                                            <h3 class="header-mini-cart__name"><a href="shop-single-list-left-sidebar.html">Awesome for Websites</a></h3>--}}
{{--                                            <span class="header-mini-cart__quantity">1 × <strong class="amount">$49</strong><span class="separator">.00</span></span>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="header-mini-cart__item">--}}
{{--                                        <a href="#" class="header-mini-cart__close"></a>--}}
{{--                                        <div class="header-mini-cart__thumbnail">--}}
{{--                                            <a href="shop-single-list-left-sidebar.html"><img src="assets/images/product/product-2.png" alt="Product" width="80" height="93"></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="header-mini-cart__caption">--}}
{{--                                            <h3 class="header-mini-cart__name"> <a href="shop-single-list-left-sidebar.html">Awesome for Websites</a></h3>--}}
{{--                                            <span class="header-mini-cart__quantity">1 × <strong class="amount">$49</strong><span class="separator">.00</span></span>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                    <li class="header-mini-cart__item">--}}
{{--                                        <a href="#" class="header-mini-cart__close"></a>--}}
{{--                                        <div class="header-mini-cart__thumbnail">--}}
{{--                                            <a href="shop-single-list-left-sidebar.html"><img src="assets/images/product/product-3.png" alt="Product" width="80" height="93"></a>--}}
{{--                                        </div>--}}
{{--                                        <div class="header-mini-cart__caption">--}}
{{--                                            <h3 class="header-mini-cart__name"> <a href="shop-single-list-left-sidebar.html">Awesome for Websites</a></h3>--}}
{{--                                            <span class="header-mini-cart__quantity">1 × <strong class="amount">$49</strong><span class="separator">.00</span></span>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <!-- Header Mini Cart Product List End -->--}}

{{--                                <div class="header-mini-cart__footer">--}}
{{--                                    <div class="header-mini-cart__total">--}}
{{--                                        <p class="header-mini-cart__label">Total:</p>--}}
{{--                                        <p class="header-mini-cart__value">$445<span class="separator">.99</span></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="header-mini-cart__btn">--}}
{{--                                        <a href="cart.html" class="btn btn-primary btn-hover-secondary">View cart</a>--}}
{{--                                        <a href="checkout.html" class="btn btn-primary btn-hover-secondary">Checkout</a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                            <!-- Header Mini Cart End -->--}}

{{--                        </div>--}}
{{--                        <!-- Header Mini Cart End -->--}}

                        <!-- Header User Button Start -->

                        <div class="header-user d-none d-lg-flex">
                            @guest
                            <div class="header-user__button">
                                <button onclick="location.href='{{route("login")}}'" class="header-user__login">Log In</button>
                            </div>
                            <div class="header-user__button">
                                <button onclick="location.href='{{route("register")}}'" class="header-user__signup btn btn-primary btn-hover-primary">Sign Up</button>
                            </div>
                            @endguest
                        </div>
                        <!-- Header User Button End -->

                        <!-- Header Mobile Toggle Start -->
                        <div class="header-toggle">
                            <button class="header-toggle__btn d-xl-none" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMobileMenu">
                                <span class="line">Login</span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </button>
                            <button class="header-toggle__btn search-open d-flex d-md-none">
                                <span class="dots"></span>
                                <span class="dots"></span>
                                <span class="dots"></span>
                            </button>
                        </div>
                        <!-- Header Mobile Toggle End -->

                        @auth
                            <li class="nav-item dropdown">
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                                                        {{ Auth::user()->name }}
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li>
                                                            <a class="dropdown-item" href="#">Link1</a>
                                                        </li>
{{--                                                        @auth--}}
{{--                                                            @if ( Auth::user()->type == 1 )--}}
{{--                                                                @include('layouts.adminmenu')--}}
{{--                                                            @elseif( Auth::user()->type == 2 )--}}
{{--                                                                @include('layouts.usermenu')--}}
{{--                                                            @endif--}}
{{--                                                        @endauth--}}
                                                        @if( Auth::user()->type == 2 )
                                                            <li><a class="dropdown-item" href="/user/userprofile">{{__('menu.userInfo')}}</a>&nbsp;</li>
                                                        @endif
                                                        <li>
                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                                @csrf
                                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                                   onclick="event.preventDefault();
                                                                                     document.getElementById('logout-form').submit();">
                                                                    {{ __('menu.logout') }}
                                                                </a>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                        @endauth
                    </div>
                    <!-- Header Inner End -->

                </div>
                <!-- Header Main Wrapper End -->
            </div>
        </div>
        <!-- Header Main End -->

    </div>
    <!-- Header End -->

    <div class="categories-section section-padding-02 mb-10">
        <main class="container">
            @yield('content')
        </main>
    </div>

    <!-- Footer Start -->
    <div class="footer-section footer-bg-1">

        <!-- Footer Widget Area Start -->
        <div class="footer-widget-area section-padding-01">
            <div class="container">
                <div class="row gy-6">
                    <div class="col-lg-8">
                        <div class="row gy-6">

                            <div class="col-sm-4">
                                <!-- Footer Widget Start -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">About</h4>

                                    <ul class="footer-widget__link">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="course-grid-left-sidebar.html">Courses</a></li>
                                        <li><a href="instructors.html">Instructor</a></li>
                                        <li><a href="event-grid-sidebar.html">Events</a></li>
                                        <li><a href="become-an-instructor.html">Become A Teacher</a></li>
                                    </ul>
                                </div>
                                <!-- Footer Widget End -->
                            </div>
                            <div class="col-sm-4">
                                <!-- Footer Widget Start -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">Links</h4>

                                    <ul class="footer-widget__link">
                                        <li><a href="blog-grid-left-sidebar.html">News & Blogs</a></li>
                                        <li><a href="#">Library</a></li>
                                        <li><a href="#">Gallery</a></li>
                                        <li><a href="#">Partners</a></li>
                                        <li><a href="#">Career</a></li>
                                    </ul>
                                </div>
                                <!-- Footer Widget End -->
                            </div>
                            <div class="col-sm-4">
                                <!-- Footer Widget Start -->
                                <div class="footer-widget">
                                    <h4 class="footer-widget__title">Support</h4>

                                    <ul class="footer-widget__link">
                                        <li><a href="#">Documentation</a></li>
                                        <li><a href="faqs.html">FAQs</a></li>
                                        <li><a href="#">Forum</a></li>
                                        <li><a href="#">Sitemap</a></li>
                                    </ul>
                                </div>
                                <!-- Footer Widget End -->
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4">
                        <!-- Footer Widget Start -->
                        <div class="footer-widget text-center">
                            <a href="#" class="footer-widget__logo"><img src="assets/images/dark-logo.png" alt="Logo" width="150" height="32"></a>
                            <div class="footer-widget__social">
                                <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a>
                            </div>
                            <p class="footer-widget__copyright">&copy; 2022 <span> EduMall </span> Made with <i class="fa fa-heart"></i> by <a href="https://1.envato.market/c/417168/275988/4415?subId1=hastheme&subId2=demo&subId3=https%3A%2F%2Fthemeforest.net%2Fuser%2Fbootxperts%2Fportfolio&u=https%3A%2F%2Fthemeforest.net%2Fuser%2Fbootxperts%2Fportfolio">BootXperts</a></p>
                            <ul class="footer-widget__link flex-row gap-8 justify-content-center">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                        <!-- Footer Widget End -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Widget Area End -->

    </div>
    <!-- Footer End -->

    <!--Back To Start-->
    <button id="backBtn" class="back-to-top backBtn">
        <i class="arrow-top fal fa-long-arrow-up"></i>
        <i class="arrow-bottom fal fa-long-arrow-up"></i>
    </button>
    <!--Back To End-->


</main>




<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
{{--<script src="{{ asset('js/app.js') }}"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.1/nouislider.min.js"></script>--}}

<!-- JS Vendor, Plugins & Activation Script Files -->

<!-- Vendors JS -->
{{--<script src="{{asset("js/vendor/modernizr-3.11.7.min.js")}}"></script>--}}

{{--<script src="{{asset("js/vendor/jquery-migrate-3.3.2.min.js")}}"></script>--}}
{{--<script src="{{asset("js/vendor/bootstrap.bundle.min.js")}}"></script>--}}

<!-- Plugins JS -->
{{--<script src="{{asset("js/plugins/aos.js")}}"></script>--}}
{{--<script src="{{asset("js/plugins/parallax.js")}}"></script>--}}
{{--<script src="{{asset("js/plugins/swiper-bundle.min.js")}}"></script>--}}
{{--<script src="{{asset("js/plugins/perfect-scrollbar.min.js")}}"></script>--}}
{{--<script src="{{asset("js/plugins/jquery.powertip.min.js")}}"></script>--}}
{{--<script src="{{asset("js/plugins/nice-select.min.js")}}"></script>--}}
{{--<script src="{{asset("js/plugins/glightbox.min.js")}}"></script>--}}
{{--<script src="{{asset("js/plugins/jquery.sticky-kit.min.js")}}"></script>--}}
{{--<script src="{{asset("js/plugins/imagesloaded.pkgd.min.js")}}"></script>--}}
{{--<script src="{{asset("js/plugins/masonry.pkgd.min.js")}}"></script>--}}
{{--<script src="{{asset("js/plugins/flatpickr.js")}}"></script>--}}
{{--<script src="{{asset("js/plugins/range-slider.js")}}"></script>--}}
{{--<script src="{{asset("js/plugins/select2.min.js")}}"></script>--}}


{{--<!-- Activation JS -->--}}
{{--<script src="{{asset("js/main.js")}}"></script>--}}

<script>

    $(document).ready(function() {
        $('#categories').DataTable(
            {
                "language" :
                    {
                        "emptyTable": "No data available in table",
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                        "infoEmpty": "Showing 0 to 0 of 0 entries",
                        "infoFiltered": "(filtered from _MAX_ total entries)",
                        "infoThousands": ",",
                        "lengthMenu": "Show _MENU_ entries",
                        "loadingRecords": "Loading...",
                        "processing": "Processing...",
                        "search": "Search:",
                        "zeroRecords": "No matching records found",
                        "thousands": ",",
                        "paginate": {
                            "first": "Pirmas",
                            "previous": "&laquo;&nbsp;{{__("pagination.previous")}}",
                            "next": "{{__("pagination.next") }}&nbsp;&raquo;",
                            "last": "Paskutinis"
                        },
                        "aria": {
                            "sortAscending": ": activate to sort column ascending",
                            "sortDescending": ": activate to sort column descending"
                        },
                        "autoFill": {
                            "cancel": "Cancel",
                            "fill": "Fill all cells with <i>%d<\/i>",
                            "fillHorizontal": "Fill cells horizontally",
                            "fillVertical": "Fill cells vertically"
                        },
                        "buttons": {
                            "collection": "Collection <span class='ui-button-icon-primary ui-icon ui-icon-triangle-1-s'\/>",
                            "colvis": "Column Visibility",
                            "colvisRestore": "Restore visibility",
                            "copy": "Copy",
                            "copyKeys": "Press ctrl or u2318 + C to copy the table data to your system clipboard.<br><br>To cancel, click this message or press escape.",
                            "copySuccess": {
                                "1": "Copied 1 row to clipboard",
                                "_": "Copied %d rows to clipboard"
                            },
                            "copyTitle": "Copy to Clipboard",
                            "csv": "CSV",
                            "excel": "Excel",
                            "pageLength": {
                                "-1": "Show all rows",
                                "_": "Show %d rows"
                            },
                            "pdf": "PDF",
                            "print": "Print",
                            "updateState": "Update",
                            "stateRestore": "State %d",
                            "savedStates": "Saved States",
                            "renameState": "Rename",
                            "removeState": "Remove",
                            "removeAllStates": "Remove All States",
                            "createState": "Create State"
                        },
                        "searchBuilder": {
                            "add": "Add Condition",
                            "button": {
                                "0": "Search Builder",
                                "_": "Search Builder (%d)"
                            },
                            "clearAll": "Clear All",
                            "condition": "Condition",
                            "conditions": {
                                "date": {
                                    "after": "After",
                                    "before": "Before",
                                    "between": "Between",
                                    "empty": "Empty",
                                    "equals": "Equals",
                                    "not": "Not",
                                    "notBetween": "Not Between",
                                    "notEmpty": "Not Empty"
                                },
                                "number": {
                                    "between": "Between",
                                    "empty": "Empty",
                                    "equals": "Equals",
                                    "gt": "Greater Than",
                                    "gte": "Greater Than Equal To",
                                    "lt": "Less Than",
                                    "lte": "Less Than Equal To",
                                    "not": "Not",
                                    "notBetween": "Not Between",
                                    "notEmpty": "Not Empty"
                                },
                                "string": {
                                    "contains": "Contains",
                                    "empty": "Empty",
                                    "endsWith": "Ends With",
                                    "equals": "Equals",
                                    "not": "Not",
                                    "notEmpty": "Not Empty",
                                    "startsWith": "Starts With",
                                    "notContains": "Does Not Contain",
                                    "notStarts": "Does Not Start With",
                                    "notEnds": "Does Not End With"
                                },
                                "array": {
                                    "without": "Without",
                                    "notEmpty": "Not Empty",
                                    "not": "Not",
                                    "contains": "Contains",
                                    "empty": "Empty",
                                    "equals": "Equals"
                                }
                            },
                            "data": "Data",
                            "deleteTitle": "Delete filtering rule",
                            "leftTitle": "Outdent Criteria",
                            "logicAnd": "And",
                            "logicOr": "Or",
                            "rightTitle": "Indent Criteria",
                            "title": {
                                "0": "Search Builder",
                                "_": "Search Builder (%d)"
                            },
                            "value": "Value"
                        },
                        "searchPanes": {
                            "clearMessage": "Clear All",
                            "collapse": {
                                "0": "SearchPanes",
                                "_": "SearchPanes (%d)"
                            },
                            "count": "{total}",
                            "countFiltered": "{shown} ({total})",
                            "emptyPanes": "No SearchPanes",
                            "loadMessage": "Loading SearchPanes",
                            "title": "Filters Active - %d",
                            "showMessage": "Show All",
                            "collapseMessage": "Collapse All"
                        },
                        "select": {
                            "cells": {
                                "1": "1 cell selected",
                                "_": "%d cells selected"
                            },
                            "columns": {
                                "1": "1 column selected",
                                "_": "%d columns selected"
                            }
                        },
                        "datetime": {
                            "previous": "Previous",
                            "next": "Next",
                            "hours": "Hour",
                            "minutes": "Minute",
                            "seconds": "Second",
                            "unknown": "-",
                            "amPm": [
                                "am",
                                "pm"
                            ],
                            "weekdays": [
                                "Sun",
                                "Mon",
                                "Tue",
                                "Wed",
                                "Thu",
                                "Fri",
                                "Sat"
                            ],
                            "months": [
                                "January",
                                "February",
                                "March",
                                "April",
                                "May",
                                "June",
                                "July",
                                "August",
                                "September",
                                "October",
                                "November",
                                "December"
                            ]
                        },
                        "editor": {
                            "close": "Close",
                            "create": {
                                "button": "New",
                                "title": "Create new entry",
                                "submit": "Create"
                            },
                            "edit": {
                                "button": "Edit",
                                "title": "Edit Entry",
                                "submit": "Update"
                            },
                            "remove": {
                                "button": "Delete",
                                "title": "Delete",
                                "submit": "Delete",
                                "confirm": {
                                    "_": "Are you sure you wish to delete %d rows?",
                                    "1": "Are you sure you wish to delete 1 row?"
                                }
                            },
                            "error": {
                                "system": "A system error has occurred (<a target=\"\\\" rel=\"nofollow\" href=\"\\\">More information<\/a>)."
                            },
                            "multi": {
                                "title": "Multiple Values",
                                "info": "The selected items contain different values for this input. To edit and set all items for this input to the same value, click or tap here, otherwise they will retain their individual values.",
                                "restore": "Undo Changes",
                                "noMulti": "This input can be edited individually, but not part of a group. "
                            }
                        },
                        "stateRestore": {
                            "renameTitle": "Rename State",
                            "renameLabel": "New Name for %s:",
                            "renameButton": "Rename",
                            "removeTitle": "Remove State",
                            "removeSubmit": "Remove",
                            "removeJoiner": " and ",
                            "removeError": "Failed to remove state.",
                            "removeConfirm": "Are you sure you want to remove %s?",
                            "emptyStates": "No saved states",
                            "emptyError": "Name cannot be empty.",
                            "duplicateError": "A state with this name already exists.",
                            "creationModal": {
                                "toggleLabel": "Includes:",
                                "title": "Create New State",
                                "select": "Select",
                                "searchBuilder": "SearchBuilder",
                                "search": "Search",
                                "scroller": "Scroll Position",
                                "paging": "Paging",
                                "order": "Sorting",
                                "name": "Name:",
                                "columns": {
                                    "visible": "Column Visibility",
                                    "search": "Column Search"
                                },
                                "button": "Create"
                            }
                        }
                    }
            }
        );
    });

    $( function() {
        $( "#start" ).datepicker();
    } );

    $( function() {
        $( "#finish" ).datepicker();
    } );



</script>

@stack('scripts')
@livewireScripts
</body>
</html>
