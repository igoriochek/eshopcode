<div class="offcanvas-overlay"></div>

<div id="offcanvas-mobile-menu" class="offcanvas offcanvas-mobile-menu">
    <div class="mb-4 pb-4 text-end">
        <button class="offcanvas-close">×</button>
    </div>
    <nav class="offcanvas-menu">
        <ul>
            <li>
                <a href="{{ url('/productComplex') }}">{{ __('menu.productComplex') }}</a>
            </li>
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
    </nav>
</div>

<header>
    <div class="header-top border-bottom ht-nav-br-bottom bg-light py-10 d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <nav class="header-top-nav">
                        <ul class="d-flex justify-content-start align-items-center">
                            <li>
                                <a href="tel:37068629686">
                                    <i class="fa-solid fa-phone me-1 fs-4"></i> +370 686 29686</a>
                                <span class="separator">|</span>
                            </li>
                            <li>
                                <a href="mailto:info@consultusmagnus.com">
                                    <i class="fa-solid fa-envelope me-1 fs-4"></i>info@consultusmagnus.com</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-6">
                    <nav class="header-top-nav">
                        <ul class="d-flex justify-content-end align-items-center">
                            <li>
                                <a href="#" role="button" id="dropdown3" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">{{ strtoupper(app()->getLocale()) }} <i class="ion ion-ios-arrow-down"></i></a>
                                <ul class="topnav-submenu dropdown-menu" aria-labelledby="dropdown3">
                                    @foreach (config('translatable.locales') as $locale)
                                    <li>
                                        <a href="{{ url('/lang/' . strtolower($locale)) }}">
                                            {{ strtoupper($locale) }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <nav id="sticky" class="header-middle nav-style3 py-3rem">
        <div class="container">
            <div class="row align-items-center d-lg-none">
                <div class="col-4">
                    <nav class="header-top-nav d-flex align-items-center">
                        @auth
                        <ul>
                            <li class="me-4">
                                <a href="#" role="button" id="dropdown4" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" viewBox="0 0 512 512">
                                        <path d="M256 48C148.5 48 60.1 129.5 49.2 234.1c-.8 7.2-1.2 14.5-1.2 21.9 0 7.4.4 14.7 1.2 21.9C60.1 382.5 148.5 464 256 464c114.9 0 208-93.1 208-208S370.9 48 256 48zm135.8 326.1c-22.7-8.6-59.5-21.2-82.4-28-2.4-.7-2.7-.9-2.7-10.7 0-8.1 3.3-16.3 6.6-23.3 3.6-7.5 7.7-20.2 9.2-31.6 4.2-4.9 10-14.5 13.6-32.9 3.2-16.2 1.7-22.1-.4-27.6-.2-.6-.5-1.2-.6-1.7-.8-3.8.3-23.5 3.1-38.8 1.9-10.5-.5-32.8-14.9-51.3-9.1-11.7-26.6-26-58.5-28h-17.5c-31.4 2-48.8 16.3-58 28-14.5 18.5-16.9 40.8-15 51.3 2.8 15.3 3.9 35 3.1 38.8-.2.7-.4 1.2-.6 1.8-2.1 5.5-3.7 11.4-.4 27.6 3.7 18.4 9.4 28 13.6 32.9 1.5 11.4 5.7 24 9.2 31.6 2.6 5.5 3.8 13 3.8 23.6 0 9.9-.4 10-2.6 10.7-23.7 7-58.9 19.4-80 27.8C91.6 341.4 76 299.9 76 256c0-48.1 18.7-93.3 52.7-127.3S207.9 76 256 76c48.1 0 93.3 18.7 127.3 52.7S436 207.9 436 256c0 43.9-15.6 85.4-44.2 118.1z" fill="black" />
                                    </svg></a>
                                <ul class="topnav-submenu dropdown-menu" aria-labelledby="dropdown4">
                                    <li>
                                        <a href="{{ url('/user/userprofile') }}">
                                            {{ __('menu.profile') }}
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
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="form-item">
                                            @csrf
                                            <a href="{{ route('logout') }}" class="form-item-a"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('menu.logout') }}
                                            </a>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <div class="cart-block position-relative">
                            <a href="{{ url('/user/viewcart') }}">
                                <span class="position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2.25em" height="2.25em" viewBox="0 0 512 512">
                                        <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M80 176a16 16 0 0 0-16 16v216c0 30.24 25.76 56 56 56h272c30.24 0 56-24.51 56-54.75V192a16 16 0 0 0-16-16Zm80 0v-32a96 96 0 0 1 96-96h0a96 96 0 0 1 96 96v32" />
                                    </svg>
                                    <span class="badge badge-light cb1">{{ $cartItemCount ?? 0 }}</span>
                                </span>
                            </a>
                        </div>
                        @else
                        <div class="cart-block d-inline-block position-relative">
                            <a href="{{ route('login') }}" class="btn btn-primary rounded mt-5 mt-sm-0" style="color: white;">
                                {{ __('auth.login') }}
                            </a>
                        </div>
                        @endauth
                    </nav>
                </div>
                <div class="col-4 text-center">
                    <div class="logo mt-3 mb-2rem">
                        <a href="{{ url('/products') }}"><img src="assets/img/logo/logo-dark.jpg" alt="logo"></a>
                    </div>
                </div>
                <div class="col-4 text-end">
                    <div class="mobile-menu-toggle">
                        <a href="#offcanvas-mobile-menu" class="offcanvas-toggle">
                            <svg viewBox="0 0 800 600">
                                <path
                                    d="M300,220 C300,220 520,220 540,220 C740,220 640,540 520,420 C440,340 300,200 300,200"
                                    id="top"
                                    style="stroke: black;"></path>
                                <path d="M300,320 L540,320" id="middle" style="stroke: black;"></path>
                                <path
                                    d="M300,210 C300,210 520,210 540,210 C740,210 640,530 520,410 C440,330 300,190 300,190"
                                    id="bottom" transform="translate(480, 320) scale(1, -1) translate(-480, -318) "
                                    style="stroke: black;">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center position-relative d-none d-lg-flex">
                <div class="col-lg-2 d-none d-lg-block">
                    <div class="logo">
                        <a href="{{ url('/products') }}"><img src="assets/img/logo/logo-dark.jpg" alt="logo"></a>
                    </div>
                </div>
                <div class="col-lg-8 position-static">
                    <ul class="main-menu d-flex">
                        <li class="menu-item">
                            <a href="{{ url('/productComplex') }}">{{ __('menu.productComplex') }}</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('/products') }}">{{ __('menu.products') }}</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('/rootcategories') }}">{{ __('menu.categories') }}</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('/promotions') }}">{{ __('menu.promotions') }}</a>
                        </li>
                        @auth
                        <li class="menu-item">
                            <a href="{{ url('/user/discountCoupons') }}">{{ __('menu.discountCoupons') }}</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ url('/user/messenger') }}">{{ __('menu.messenger') }}</a>
                        </li>
                        @endauth
                    </ul>
                </div>
                <div class="col-lg-2 text-end">
                    <ul class="main-menu">
                        @auth
                        <li class="cart-block d-inline-block position-relative">
                            <a href="{{ url('/user/viewcart') }}">
                                <span class="position-relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="2.25em" height="2.25em" viewBox="0 0 512 512">
                                        <path fill="none" stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M80 176a16 16 0 0 0-16 16v216c0 30.24 25.76 56 56 56h272c30.24 0 56-24.51 56-54.75V192a16 16 0 0 0-16-16Zm80 0v-32a96 96 0 0 1 96-96h0a96 96 0 0 1 96 96v32" />
                                    </svg>
                                    <span class="badge badge-primary cb1" style="right: -8px; bottom: -5px;">{{ $cartItemCount ?? 0 }}</span>
                                </span>
                            </a>
                        </li>
                        <li class="d-inline-block position-relative">
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="2.5em" height="2.5em" viewBox="0 0 512 512">
                                    <path d="M256 48C148.5 48 60.1 129.5 49.2 234.1c-.8 7.2-1.2 14.5-1.2 21.9 0 7.4.4 14.7 1.2 21.9C60.1 382.5 148.5 464 256 464c114.9 0 208-93.1 208-208S370.9 48 256 48zm135.8 326.1c-22.7-8.6-59.5-21.2-82.4-28-2.4-.7-2.7-.9-2.7-10.7 0-8.1 3.3-16.3 6.6-23.3 3.6-7.5 7.7-20.2 9.2-31.6 4.2-4.9 10-14.5 13.6-32.9 3.2-16.2 1.7-22.1-.4-27.6-.2-.6-.5-1.2-.6-1.7-.8-3.8.3-23.5 3.1-38.8 1.9-10.5-.5-32.8-14.9-51.3-9.1-11.7-26.6-26-58.5-28h-17.5c-31.4 2-48.8 16.3-58 28-14.5 18.5-16.9 40.8-15 51.3 2.8 15.3 3.9 35 3.1 38.8-.2.7-.4 1.2-.6 1.8-2.1 5.5-3.7 11.4-.4 27.6 3.7 18.4 9.4 28 13.6 32.9 1.5 11.4 5.7 24 9.2 31.6 2.6 5.5 3.8 13 3.8 23.6 0 9.9-.4 10-2.6 10.7-23.7 7-58.9 19.4-80 27.8C91.6 341.4 76 299.9 76 256c0-48.1 18.7-93.3 52.7-127.3S207.9 76 256 76c48.1 0 93.3 18.7 127.3 52.7S436 207.9 436 256c0 43.9-15.6 85.4-44.2 118.1z" fill="black" />
                                </svg>
                                <i class="ion-ios-arrow-down" style="color: black;"></i></a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('/user/userprofile') }}">
                                        {{ __('menu.profile') }}
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
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="form-item">
                                        @csrf
                                        <a href="{{ route('logout') }}" class="form-item-a"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('menu.logout') }}
                                        </a>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @else
                        <li class="cart-block d-inline-block position-relative">
                            <a href="{{ route('login') }}" class="btn btn-primary rounded mt-5 mt-sm-0" style="color: white;">
                                {{ __('auth.login') }}
                            </a>
                        </li>
                        @endauth
                        <ul>
                </div>
            </div>
        </div>
    </nav>
</header>


<style>
    .topnav-submenu {
        right: 0px !important;
    }

    .menu-item {
        display: flex;
        align-items: center;
    }

    .form-item {
        text-align: left;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
    }

    .form-item:hover {
        padding-left: 10px;
        color: #0090f0 !important;
    }

    .form-item-a {
        display: flex;
    }

    .form-item-a:hover {
        display: flex;
        color: #0090f0 !important;
    }
</style>