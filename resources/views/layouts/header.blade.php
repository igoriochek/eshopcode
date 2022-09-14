<header class="header w-100">
    <div class="header-body header-body-bottom-border-fixed box-shadow-none border-top-0">
        <div class="header-top header-top-small-minheight header-top-simple-border-bottom">
            <div class="container">
                <div class="header-row justify-content-between">
                    <div class="header-column col-auto px-0">
                        <div class="header-row">
                            <p class="font-weight-semibold text-1 mb-0 d-none d-sm-block d-md-none me-3">
                                <i class="fa-solid fa-phone"></i>
                                +370 xxx xxx xx
                            </p>
                            <p class="font-weight-semibold text-1 mb-0 d-none d-sm-block d-md-none me-3">
                                <i class="fa-solid fa-envelope"></i>
                                mail@example.com
                            </p>
                            <p class="font-weight-semibold text-1 mb-0 d-none d-md-block me-3">
                                <i class="fa-solid fa-phone"></i>
                                +370 xxx xxx xx
                            </p>
                            <p class="font-weight-semibold text-1 mb-0 d-none d-md-block me-3">
                                <i class="fa-solid fa-envelope"></i>
                                mail@example.com
                            </p>
                        </div>
                    </div>
                    <div class="header-column justify-content-end col-auto px-0">
                        <div class="header-row">
                            <nav class="header-nav-top">
                                <ul class="nav nav-pills font-weight-semibold text-2">
                                    <li class="nav-item d-none d-lg-inline-block">
                                        <a href="#"
                                           class="text-decoration-none text-color-default text-color-hover-primary">
                                            {{ __('About') }}
                                        </a>
                                    </li>
                                    <li class="nav-item d-none d-lg-inline-block">
                                        <a href="#"
                                           class="text-decoration-none text-color-default text-color-hover-primary">
                                            {{ __('Contact') }}
                                        </a>
                                    </li>
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
                                        <a href="#" target="_blank" title="Facebook">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li class="social-icons-youtube">
                                        <a href="#" target="_blank" title="YouTube">
                                            <i class="fa-brands fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="social-icons-linkedin">
                                        <a href="#" target="_blank" title="Linkedin">
                                            <i class="fab fa-linkedin-in"></i>
                                        </a>
                                    </li>
                                    <li class="social-icons-instagram">
                                        <a href="#" target="_blank" title="Instagram">
                                            <i class="fa-brands fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="social-icons-tiktok">
                                        <a href="#" target="_blank" title="TikTok">
                                            <i class="fa-brands fa-tiktok"></i>
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
                            <a href="{{ route('home') }}">
                                <h3 class="fw-bold m-0 p-0">{{ config('app.name') }}</h3>
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
                                        <li class="nav-list">
                                            <a class="{{ request()->is('home') ? 'active' : '' }}" href="{{ url('/home') }}">
                                                {{ __('menu.home') }}
                                            </a>
                                        </li>
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
                                            {{ __('Login') }}
                                        </a>
                                    @endguest
                                    @auth
                                        <a href="#" class="header-nav-features-toggle" role="button"
                                           id="navbarUserDropdown"
                                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-user"></i>
                                        </a>
                                        @include('layouts.dropdowns.user_dropdown')
                                        <a href="{{ url('/user/viewcart') }}" class="header-nav-features-toggle">
                                            <i class="fa-solid fa-cart-shopping"></i>
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

        window.innerWidth > 991 ? nav.classList.add('show') : nav.classList.remove('show');
    </script>
@endpush
