<nav class="pt-10 pb-10 border-bottom bg-white " id="navbar" style="position: sticky; top: 0; z-index: 1000000;">
    <div class="header-bottom header-bottom-bg-color">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('home') }}" class="fs-3 fw-bolder">
                        CONTENTUM
                    </a>
                </div>
                <div class="header-right">
                    <div>
                    </div>
                    @include('layouts.menus.mobilemenu')
                    <div class="header-action-right">
                        <div class="header-action-2">
                            @guest
                                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading me-4">
                                    <nav>
                                        <ul class="d-flex">
                                            @include('layouts.menus.guest_user_menu_top')
                                        </ul>
                                    </nav>
                                </div>
                                @if (Route::has('login'))
                                    <div class="header-action mr-20 fs-5">
                                        <i class="fi fi-rs-sign-in mr-10"></i><a
                                            style="color: {{ request()->is('login*') ? '#3BB77E' : '' }}"
                                            href="{{route('login')}}">{{__('auth.login')}}</a>
                                    </div>
                                @endif
                            @else
                                @auth
                                    <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading me-4">
                                        <nav>
                                            <ul class="d-flex">
                                                @include('layouts.menus.guest_user_menu_top')
                                            </ul>
                                        </nav>
                                    </div>
                                    <div class="header-action-icon-2">
                                        <a class="mini-cart-icon" href="{{url('/user/viewcart')}}">
                                            <img alt="cart-icon" src="{{asset('/images/theme/icons/icon-cart.svg')}}"/>
                                            @if (!empty($cartItemCount))
                                                <span class="pro-count blue">{{ $cartItemCount }}</span>
                                            @endif
                                        </a>
                                        <a href="{{url('/user/viewcart')}}">
                                            <span class="label fs-6 ms-2">
                                                {{ __('names.cart') }}
                                            </span>
                                        </a>
                                    </div>
                                    <div class="header-action-icon-2">
                                        <a>
                                            <img class="svgInject" alt="Nest" src="{{asset('/images/theme/icons/icon-user.svg')}}"/>
                                            <a href="{{ url('/user/userprofile') }}">
                                                <span class="label fs-6 ms-2">{{ Auth::user()->name }}</span>
                                            </a>
                                        </a>
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                            <ul>
                                                @include('layouts.dropdowns.user_dropdown')
                                            </ul>
                                        </div>
                                    </div>
                                @endauth
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('navbars');
        navbar.classList.toggle('shadow-sm', window.scrollY > 34);
    });
</script>
