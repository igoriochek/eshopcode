<div class="navbar-area shadow-sm">
    <div class="mobile-responsive-nav">
        <div class="container">
            <div class="mobile-responsive-menu">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        <img src="{{ asset('images/CM_logo.png') }}" alt="CM_logo" style="width: 90%">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="desktop-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/CM_logo.png') }}" alt="CM_logo" style="width: 80%">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent" style="display: block;">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a href="{{ url('/products') }}" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
                                {{ __('menu.products') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/rootcategories') }}" class="nav-link {{ request()->is('rootcategories*') ? 'active' : '' }}">
                                {{ __('menu.categories') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/promotions') }}" class="nav-link {{ request()->is('promotions*') ? 'active' : '' }}">
                                {{ __('menu.promotions') }}
                            </a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/user/discountCoupons*') }}" class="nav-link {{ request()->is('user/discountCoupons**') ? 'active' : '' }}">
                                    {{ __('menu.discountCoupons') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/user/messenger*') }}" class="nav-link {{ request()->is('user/messenger**') ? 'active' : '' }}">
                                    {{ __('menu.messenger') }}
                                </a>
                            </li>
                        @endauth
                    </ul>

                    <div class="others-options">
                        @guest
                            <a href="{{ route('login') }}" class="default-btn style5 mt-1">{{ __('buttons.login') }}</a>
                        @endguest
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
                                <a href="{{ url('/user/userprofile') }}" class="nav-btn">
                                    <div class="icon">
                                        <img src="{{ asset('images/icons/icon-account.png') }}" alt="icon-account" height="20">
                                    </div>
                                    {{ auth()->user()->name }}
                                </a>
                            </div>
                        @endauth
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu" style="top: -40px">
                <div class="others-options justify-content-center align-items-center">
                    @guest
                        <a href="{{ route('login') }}" class="default-btn style5 py-2" style="transform: translateY(-3px)">
                            {{ __('buttons.login') }}
                        </a>
                    @endguest
                    @auth
                        <div class="option-item">
                            <a href="{{ url('/user/viewcart') }}" class="nav-btn">
                                <div class="icon">
                                    <img src="{{ asset('template/images/icon/cart-icon.svg') }}" alt="icon" class="mb-1">
                                    <span>{{ $cartItemCount }}</span>
                                </div>
                            </a>
                        </div>
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

        &:hover, &:focus {
           color: #fa2837; 
        }
    }
</style>