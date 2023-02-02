<header class="header w-100">
    <div class="header-body header-body-bottom-border-fixed box-shadow-none border-top-0">
        <div class="header-top header-top-small-minheight header-top-simple-border-bottom">
            <div class="container">
                <div class="header-row justify-content-between">
                    <div class="header-column col-auto px-0">
                        <div class="header-row">
                            <p class="font-weight-semibold mb-0 d-none d-sm-block d-md-none me-3">
                                <i class="fa-solid fa-phone"></i>
                                +37052310857
                            </p>
                            <p class="font-weight-semibold mb-0 d-none d-sm-block d-md-none me-3">
                                <i class="fa-solid fa-envelope"></i>
                                info@eshopbilan.eu
                            </p>
                            <p class="font-weight-semibold mb-0 d-none d-md-block me-3">
                                <i class="fa-solid fa-phone"></i>
                                +37052310857
                            </p>
                            <p class="font-weight-semibold mb-0 d-none d-md-block me-3">
                                <i class="fa-solid fa-envelope"></i>
                                info@eshopbilan.eu
                            </p>
                        </div>
                    </div>
                    <div class="header-column justify-content-end col-auto px-0">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills font-weight-semibold text-2">
                                    <li class="nav-item dropdown nav-item-border">
                                        <a class="nav-link text-color-default text-color-hover-primary text-uppercase"
                                           href="#" role="button" id="dropdownLanguage" data-bs-toggle="dropdown"
                                           aria-haspopup="true" aria-expanded="false">
                                            {{ app()->getLocale() }}
                                            <i class="fas fa-angle-down"></i>
                                        </a>
                                        @include('layouts.dropdowns.language_dropdown')
                                    </li>
                                </ul>
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
            <div class="header-row pt-1">
                <div class="header-column w-100">
                    <div class="header-row justify-content-between">
                        <div class="header-logo z-index-2 col-lg-2 px-0" style="width: auto; height: auto">
                            <a href="{{ url('/home') }}">
                                <h1 class="me-2">Bilan</h1>
{{--                                <img src="{{asset("images/buhalteres-logo-web.svg")}}" alt="buhalterės.lt logotipas" class="logo" width="260.86px" height="45px">--}}
                            </a>
                        </div>
                        <div
                            class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border justify-content-start"
                            data-sticky-header-style="{'minResolution': 991}"
                            data-sticky-header-style-active="{'margin-left': '105px'}"
                            data-sticky-header-style-deactive="{'margin-left': '0'}" style="margin-left: 0;">
                            <div
                                class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1 w-100">
                                <nav class="collapse w-100" id="nav">
                                    <ul class="nav nav-pills w-100" id="mainNav">
                                        {{--                                        <li class="nav-list">--}}
                                        {{--                                            <a class="{{ request()->is('home') ? 'active' : '' }}" href="{{ url('/home') }}">--}}
                                        {{--                                                {{ __('menu.home') }}--}}
                                        {{--                                            </a>--}}
                                        {{--                                        </li>--}}
                                        @guest
                                            @include('layouts.menus.menutop')
                                        @else
                                            @include('layouts.menus.user_menu')
                                        @endauth
                                        <div class="d-none d-md-inline-block ms-4">
                                            <a href="/eu_projects" style="color: {{ request()->is('about') ? '#c736c0' : '' }}">
                                                @if (app()->getLocale() === 'lt')
                                                    <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" width="125" height="55" />
                                                @else
                                                    <img src="{{ asset('images/eu_projects.jpeg') }}" alt="es_projektai_en_ru" width="130" />
                                                @endif
                                            </a>
                                        </div>
                                        <li class="nav-list d-inline-block d-md-none">
                                            <a class="{{ request()->is('eu_projects') ? 'active' : '' }}" href="{{ url('/eu_projects') }}">
                                                {{ __('menu.euProjects') }}
                                            </a>
                                        </li>
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
                            <div class="header-nav-features ps-0 ms-1">
                                <div class="header-nav-feature d-inline-flex top-2 ms-2">
                                    @guest
                                        <a href="{{ route('login') }}" role="button"
                                           class="login-button btn btn-primary btn-rounded px-4 py-2 fw-bold text-uppercase">
                                            {{ __('buttons.login') }}
                                        </a>
                                    @endguest
                                    @auth
                                        <a href="#" class="header-nav-features-toggle" role="button"
                                           id="navbarUserDropdown"
                                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{ asset('images/icons/icon-account.png') }}" height="37" alt="icon-account" class="header-nav-features-img">
                                        </a>
                                        @include('layouts.dropdowns.user_dropdown')
                                        <a href="{{ url('/user/viewcart') }}" class="header-nav-features-toggle">
                                            <img src="{{ asset('images/icons/icon-cart-big.svg') }}" height="35" alt="icon-cart-big" class="header-nav-features-img">
                                            @if (!empty($cartItemCount))
                                                <span class="shopping-cart-items">{{ $cartItemCount }}</span>
                                            @endif
                                        </a>
                                        {{--<div class="header-nav-features-dropdown show" id="headerTopCartDropdown">
                                            <ol class="mini-products-list">
                                                <li class="item">

                                                </li>
                                            </ol>
                                        </div>--}}
                                    @endauth
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
@endpush
