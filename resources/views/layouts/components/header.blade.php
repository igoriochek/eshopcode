<header class="header axil-header header-style-5">
    <div class="axil-header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="header-top-dropdown">
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ strtoupper(app()->getLocale()) }}
                            </button>
                            <ul class="dropdown-menu">
                                @foreach (config('translatable.locales') as $locale)
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/lang'.strtoupper($locale)) }}">
                                            {{ strtoupper($locale) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-12">
                    <div class="header-top-link">
                        <ul class="quick-link">
                            <li>
                                <i class="fa-solid fa-phone me-1 fs-4"></i>
                                <a href="tel:37068629686">+370 686 29686</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start `menu Area  -->
    <div id="axil-sticky-placeholder" style="height: 0px;"></div>
    <div class="axil-mainmenu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-brand">
                    <a href="{{ route('home') }}" class="logo logo-dark" >
                        <img src="{{ asset('images/nutika-logo.jpeg') }}" alt="Nutika" style="max-width: 70px; max-height: 70px">
                    </a>
                    <a href="{{ route('home') }}" class="logo logo-light">
                        <img src="{{ asset('images/nutika-logo.jpeg') }}" alt="Nutika" style="max-width: 70px; max-height: 70px">
                    </a>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            {{-- <a href="{{ route('home') }}" class="logo">
                                <img src="{{ asset('images/nutika-logo.jpeg') }}" alt="Nutika">
                            </a> --}}
                        </div>
                        <ul class="mainmenu">
                            <li>
                                <a href="{{ url('/products') }}" 
                                    class="{{ request()->is('products*') || request()->is('viewproduct*') ? 'active' : '' }}">
                                    {{ __('menu.products') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/rootcategories') }}" 
                                    class="{{ request()->is('rootcategories*') || request()->is('innercategories*') ? 'active' : '' }}">
                                    {{ __('menu.categories') }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/promotions') }}" 
                                    class="{{ request()->is('promotions*') || request()->is('promotion*') ? 'active' : '' }}">
                                    {{ __('menu.promotions') }}
                                </a>
                            </li>
                            @auth
                                <li>
                                    <a href="{{ url('/user/discountCoupons') }}" 
                                        class="{{ request()->is('user/discountCoupons*') ? 'active' : '' }}">
                                        {{ __('menu.discountCoupons') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/user/messenger') }}" 
                                        class="{{ request()->is('user/messenger*') ? 'active' : '' }}">
                                        {{ __('menu.messenger') }}
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <div class="header-action">
                    <ul class="action-list">
                        @auth
                            <li class="shopping-cart">
                                <a href="{{ url('/user/viewcart') }}" class="cart-dropdown-btn">
                                    <span class="cart-count">{{ $cartItemCount ?? 0 }}</span>
                                    <i class="flaticon-shopping-cart"></i>
                                </a>
                            </li>
                        @endauth
                        <li class="my-account">
                            <a href="javascript:void(0)">
                                <i class="flaticon-person"></i>
                            </a>
                            <div class="my-account-dropdown">
                                <span class="title">{{ __('footer.account') }}</span>
                                @auth
                                    <ul>
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
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('menu.logout') }}
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                @else
                                    <a href="{{ route('login') }}" class="axil-btn btn-bg-primary my-2">
                                        {{ __('auth.login') }}
                                    </a>
                                    <div class="reg-footer text-center">{{ __('auth.registerParagraph') }} 
                                        <a href="{{ route('register') }}" class="btn-link">
                                            {{ __('auth.register') }}
                                        </a>
                                    </div>
                                @endauth
                            </div>
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area -->
</header>