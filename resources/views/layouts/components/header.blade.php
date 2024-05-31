<header class="main-header-area">
    <div class="header-top border-bottom d-none d-lg-block">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="header-top-left">
                        <ul class="dropdown-wrap text-matterhorn">
                            <li class="dropdown">
                                <button class="btn btn-link dropdown-toggle ht-btn" type="button" id="languageButton"
                                    data-bs-toggle="dropdown" aria-label="language" aria-expanded="false">
                                    {{ strtoupper(config('app.locale')) }}
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="languageButton">
                                    @foreach (config('translatable.locales') as $locale)
                                        <li>
                                            <a class="dropdown-item" href="javascript:void(0)"
                                                onclick="changeLanguage('{{ strtoupper($locale) }}')">
                                                {{ strtoupper($locale) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <i class="fa-solid fa-phone"></i>
                                <a href="tel:+37061670903">+37061670903</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                    <div class="header-top-right text-matterhorn">
                        <p class="shipping mb-0"><span></span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle header-sticky py-6 py-lg-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="header-middle-wrap position-relative">

                        <a href="{{ route('home') }}" class="header-logo">
                            <img src="{{ asset('images/1343915950.png') }}" alt="{{ config('app.name') }}"
                                style="max-width: 140px">
                        </a>

                        <div class="main-menu d-none d-lg-block">
                            <nav class="main-nav">
                                <ul>
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
                        </div>
                        <div class="header-right">
                            <ul>
                                <li class="dropdown d-none d-lg-block">
                                    <button class="btn btn-link dropdown-toggle ht-btn p-0" type="button"
                                        id="settingButton" data-bs-toggle="dropdown" aria-label="setting"
                                        aria-expanded="false">
                                        <i class="pe-7s-user"></i>
                                    </button>
                                    <ul class="dropdown-menu right-side" aria-labelledby="settingButton">
                                        @auth
                                            <li>
                                                <a class="dropdown-item" href="{{ url('/user/userprofile') }}"
                                                    style="color: {{ request()->is('user/userprofile*') ? '#0989FF' : '' }}">
                                                    {{ __('menu.profile') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ url('/user/rootorders') }}"
                                                    style="color: {{ request()->is('user/rootorders*') ||
                                                    request()->is('user/vieworder*') ||
                                                    request()->is('user/cancelorder*') ||
                                                    request()->is('user/returnorder*')
                                                        ? '#0989FF'
                                                        : '' }}">
                                                    {{ __('menu.orders') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ url('/user/rootoreturns') }}"
                                                    style="color: {{ request()->is('user/rootoreturns*') || request()->is('user/viewreturn*') ? '#a10909' : '' }}">
                                                    {{ __('menu.returns') }}
                                                </a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        {{ __('menu.logout') }}
                                                    </a>
                                                </form>
                                            </li>
                                        @else
                                            <li>
                                                <a class="dropdown-item" href="{{ route('login') }}">
                                                    {{ __('auth.login') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="{{ route('register') }}">
                                                    {{ __('auth.register') }}
                                                </a>
                                            </li>
                                        @endauth
                                    </ul>
                                </li>
                                @auth
                                    <li class="minicart-wrap me-3 me-lg-0">
                                        <a href="{{ url('/user/viewcart') }}" class="minicart-btn">
                                            <i class="pe-7s-shopbag"></i>
                                            <span class="quantity">{{ $cartItemCount ?? 0 }}</span>
                                        </a>
                                    </li>
                                @endauth
                                <li class="mobile-menu_wrap d-block d-lg-none">
                                    <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                        <i class="pe-7s-menu"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu_wrapper" id="mobileMenu">
        <div class="tromic-offcanvas-body">
            <div class="inner-body">
                <div class="tromic-offcanvas-top">
                    <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                </div>
                <div class="offcanvas-user-info text-center px-6 pb-5">
                    <div class=" text-silver">
                        <p class="shipping mb-0"><span class="text-primary"></span>
                        </p>
                    </div>
                    <ul class="dropdown-wrap justify-content-center text-silver">
                        <li class="dropdown dropup">
                            <button class="btn btn-link dropdown-toggle ht-btn" type="button" id="languageButtonTwo"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ strtoupper(config('app.locale')) }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="languageButtonTwo">
                                @foreach (config('translatable.locales') as $locale)
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)"
                                            onclick="changeLanguage('{{ strtoupper($locale) }}')">
                                            {{ strtoupper($locale) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="dropdown dropup">
                            <button class="btn btn-link dropdown-toggle p-0" type="button" id="settingButtonTwo"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="pe-7s-users"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="settingButtonTwo">
                                @auth
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/user/userprofile') }}"
                                            style="color: {{ request()->is('user/userprofile*') ? '#0989FF' : '' }}">
                                            {{ __('menu.profile') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/user/rootorders') }}"
                                            style="color: {{ request()->is('user/rootorders*') ||
                                            request()->is('user/vieworder*') ||
                                            request()->is('user/cancelorder*') ||
                                            request()->is('user/returnorder*')
                                                ? '#0989FF'
                                                : '' }}">
                                            {{ __('menu.orders') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/user/rootoreturns') }}"
                                            style="color: {{ request()->is('user/rootoreturns*') || request()->is('user/viewreturn*') ? '#a10909' : '' }}">
                                            {{ __('menu.returns') }}
                                        </a>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                {{ __('menu.logout') }}
                                            </a>
                                        </form>
                                    </li>
                                @else
                                    <li>
                                        <a class="dropdown-item" href="{{ route('login') }}">
                                            {{ __('auth.login') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('register') }}">
                                            {{ __('auth.register') }}
                                        </a>
                                    </li>
                                @endauth
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="offcanvas-menu_area">
                    <nav class="offcanvas-navigation">
                        <ul class="mobile-menu">
                            <li>
                                <a href="{{ url('/products') }}"
                                    class="{{ request()->is('products*') || request()->is('viewproduct*') ? 'active' : '' }}">
                                    <span class="mm-text">{{ __('menu.products') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/rootcategories') }}"
                                    class="{{ request()->is('rootcategories*') || request()->is('innercategories*') ? 'active' : '' }}">
                                    <span class="mm-text">{{ __('menu.categories') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/promotions') }}"
                                    class="{{ request()->is('promotions*') || request()->is('promotion*') ? 'active' : '' }}">
                                    <span class="mm-text">{{ __('menu.promotions') }}</span>
                                </a>
                            </li>
                            @auth
                                <li>
                                    <a href="{{ url('/user/discountCoupons') }}"
                                        class="{{ request()->is('user/discountCoupons*') ? 'active' : '' }}">
                                        <span class="mm-text">{{ __('menu.discountCoupons') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/user/messenger') }}"
                                        class="{{ request()->is('user/messenger*') ? 'active' : '' }}">
                                        <span class="mm-text">{{ __('menu.messenger') }}</span>
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="global-overlay"></div>
</header>

<script>
    const changeLanguage = locale => {
        const currentUrl = window.location.origin;
        window.location.href = `${currentUrl}/lang/${locale.toLowerCase()}`
    }
</script>
