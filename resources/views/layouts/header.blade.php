<header class="header w-100">
    <div class="header-body header-body-bottom-border-fixed box-shadow-none border-top-0">
        <div class="header-top header-top-small-minheight header-top-simple-border-bottom">
            <div class="container">
                <div class="header-row justify-content-between">
                    <div class="header-column col-auto px-0">
                        <div class="header-row">
                            <p class="font-weight-semibold mb-0 d-none d-sm-block d-md-none me-3">
                                <i class="fa-solid fa-phone"></i>
                                +370 653 333 30
                            </p>
                            <p class="font-weight-semibold mb-0 d-none d-sm-block d-md-none me-3">
                                <i class="fa-solid fa-envelope"></i>
                                info@buhalteres.lt
                            </p>
                            <p class="font-weight-semibold mb-0 d-none d-md-block me-3">
                                <i class="fa-solid fa-phone"></i>
                                +370 653 333 30
                            </p>
                            <p class="font-weight-semibold mb-0 d-none d-md-block me-3">
                                <i class="fa-solid fa-envelope"></i>
                                info@buhalteres.lt
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
                                        <a href="{{ route('facebook.login') }}" target="_blank" title="Twitter">
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
            <div class="header-row py-2">
                <div class="header-column w-100">
                    <div class="header-row justify-content-between">
                        <div class="header-logo z-index-2 col-lg-2 px-0" style="width: auto; height: auto">
                            <a href="{{ url('/home') }}">
                                <img src="{{asset("images/buhalteres-logo-web.svg")}}" alt="buhalterės.lt logotipas" class="logo" width="260.86px" height="45px">
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
                                            @include('layouts.menus.menu')
                                        @endguest
                                        @auth
                                            @if (Auth::user()->type === 1)
                                                @include('layouts.menus.admin_menu')
                                            @elseif (Auth::user()->type === 2)
                                                @include('layouts.menus.user_menu')
                                            @endif
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
    </script>
@endpush
