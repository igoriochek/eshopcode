<div class="navbar-area shadow-sm">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/CM_logo.png') }}" alt="CM_logo" style="width: 90%">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{ asset('images/CM_logo.png') }}" alt="CM_logo" style="width: 80%">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent" style="display: block;">
                    <ul class="navbar-nav me-auto mt-2">
                        <li class="nav-item">
                            <a href="{{ url('/products') }}"
                                class="nav-link {{ request()->is('products*') || request()->is('viewproduct*') ? 'active' : '' }}">
                                {{ __('menu.products') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/rootcategories') }}"
                                class="nav-link {{ request()->is('rootcategories*') || request()->is('innercategories*') ? 'active' : '' }}">
                                {{ __('menu.categories') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/promotions') }}"
                                class="nav-link {{ request()->is('promotions*') || request()->is('promotion*') ? 'active' : '' }}">
                                {{ __('menu.promotions') }}
                            </a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/user/discountCoupons') }}"
                                    class="nav-link {{ request()->is('user/discountCoupons*') ? 'active' : '' }}">
                                    {{ __('menu.discountCoupons') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/user/messenger') }}"
                                    class="nav-link {{ request()->is('user/messenger*') ? 'active' : '' }}">
                                    {{ __('menu.messenger') }}
                                </a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a href="{{ url('/eu_projects') }}" class="nav-link">
                                <img src="{{ asset('images/Picture1.jpg') }}" alt="es_projektai" width="120px"
                                    style="transform: translateY(-4px)">
                            </a>
                        </li>
                    </ul>

                    <div class="others-options">
                        @auth
                            <div class="option-item">
                                <a href="{{ url('/user/viewcart') }}" class="nav-btn">
                                    <div class="icon">
                                        <img src="{{ asset('template/images/icon/cart-icon.svg') }}" alt="icon-cart">
                                        <span>{{ $cartItemCount }}</span>
                                    </div>
                                    {{ __('menu.cart') }}
                                </a>
                            </div>
                            <div class="option-item">
                                <div class="dropdown">
                                    <button class="btn dropdown-toggle d-flex justify-content-center align-items-center"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="icon me-2">
                                            <img src="{{ asset('images/icons/icon-account.png') }}" alt="icon-account"
                                                height="20">
                                        </div>
                                        {{ auth()->user()->name }}
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/user/userprofile') }}"
                                                style="color: {{ request()->is('user/userprofile*') ? '#a10909' : '' }}">
                                                {{ __('menu.profile') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/user/rootorders') }}"
                                                style="color: {{ request()->is('user/rootorders*') ||
                                                request()->is('user/vieworder*') ||
                                                request()->is('user/cancelorder*') ||
                                                request()->is('user/returnorder*')
                                                    ? '#a10909'
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
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="default-btn style5 mt-1">{{ __('buttons.login') }}</a>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu" style="top: -45px">
                <div class="others-options justify-content-center align-items-center">
                    @auth
                        <div class="option-item">
                            <a href="{{ url('/user/viewcart') }}" class="nav-btn">
                                <div class="icon">
                                    <img src="{{ asset('template/images/icon/cart-icon.svg') }}" alt="icon"
                                        class="mb-0" height="25">
                                    <span style="background: #a10909">{{ $cartItemCount }}</span>
                                </div>
                            </a>
                        </div>
                        <div class="option-item">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle d-flex justify-content-center align-items-center"
                                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="icon me-2">
                                        <img src="{{ asset('images/icons/icon-account.png') }}" alt="icon-account"
                                            height="30">
                                    </div>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/user/userprofile') }}"
                                            style="color: {{ request()->is('user/userprofile*') ? '#a10909' : '' }}">
                                            {{ __('menu.profile') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ url('/user/rootorders') }}"
                                            style="color: {{ request()->is('user/rootorders*') ||
                                            request()->is('user/vieworder*') ||
                                            request()->is('user/cancelorder*') ||
                                            request()->is('user/returnorder*')
                                                ? '#a10909'
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
                                </ul>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="default-btn style5 py-2 mt-1 mt-lg-0"
                            style="transform: translateY(-3px)">
                            {{ __('buttons.login') }}
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .nav-btn-account {
        margin-left: 10px;
        color: #111111;
        transition: all ease .5s;

        &:hover,
        &:focus {
            color: #fa2837;
        }
    }
</style>
