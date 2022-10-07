<header class="header w-100">
    <div class="header-body header-body-bottom-border-fixed box-shadow-none border-top-0">
        <div class="header-top header-top-small-minheight header-top-simple-border-bottom">
            <div class="container">
                <div class="header-row justify-content-between">
                    <div class="header-column col-auto px-0">
                        <div class="header-row">
                            <p class="font-weight-semibold mb-0 d-none d-md-block me-3">
                                <i class="fa-solid fa-location-dot"></i>
                                Vilnius-Kaunas automagistralė A1 23 km
                            </p>
                            <p class="font-weight-semibold mb-0 d-none d-md-block me-3">
                                <i class="fa-solid fa-envelope"></i>
                                dinobalt.info@gmail.com
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
                                            <span class="d-none">{{ $lang = app()->getLocale() }}</span>
                                            <img src="{{ asset("images/$lang.png") }}" alt="{{ app()->getLocale() }}" class="me-1">
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
            <div class="header-row py-2">
                <div class="header-column w-100">
                    <div class="header-row justify-content-between">
                        <div class="header-logo z-index-2 col-lg-2 px-0" style="width: auto; height: auto">
                            <a href="{{ url('/home') }}">
                                <img src="{{ asset("images/nauja2s.png") }}" alt="dinobalt-logo" class="logo" width="90">
                            </a>
                        </div>
                        <div
                            class="header-nav header-nav-line header-nav-top-line header-nav-top-line-with-border justify-content-start"
                            data-sticky-header-style="{'minResolution': 991}"
                            data-sticky-header-style-active="{'margin-left': '105px'}"
                            data-sticky-header-style-deactive="{'margin-left': '0'}" style="margin-left: 0;">
                            <div
                                class="header-nav-main header-nav-main-square header-nav-main-dropdown-no-borders header-nav-main-effect-3 header-nav-main-sub-effect-1 w-100">
                                <nav class="collapse" id="nav">
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
                                            @include('layouts.menus.user_menu')
                                        @endauth
                                    </ul>
                                </nav>
                            </div>
                            <div class="d-flex justify-content-end w-100">
                                <button class="btn header-btn-collapse-nav hamburger-button text-light" data-bs-toggle="collapse" data-bs-target=".header-nav-main nav" aria-expanded="true">
                                    <i class="fas fa-bars"></i>
                                    {{ __('footer.menu') }}
                                </button>
                            </div>
                        </div>
                        <div class="d-flex col-auto pe-0 ps-0 ps-xl-3">
                            <div class="header-nav-features ps-0 ms-1">
                                <div class="header-nav-feature d-inline-flex top-2 ms-2">
                                    @guest
                                        <a href="{{ route('login') }}" role="button"
                                           class="login-button btn btn-primary px-4 py-2">
                                            {{ __('buttons.login') }}
                                        </a>
                                    @endguest
                                    @auth
                                        <a href="#" class="header-nav-features-toggle" role="button"
                                           id="navbarUserDropdown"
                                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-user header-nav-features-icon me-1"></i>
                                            <span class="header-nav-features-name">{{ Auth::user()->name }}</span>
                                        </a>
                                        @include('layouts.dropdowns.user_dropdown')
                                        <a href="{{ url('/user/viewcart') }}" class="header-nav-features-toggle">
                                            <i class="fa-solid fa-bag-shopping header-nav-features-icon"></i>
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
                header.style.top = '-38px';
            else
                header.style.top = '0';
        }
    </script>
@endpush
