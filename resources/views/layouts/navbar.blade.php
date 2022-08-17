<nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/home') }}">
            <img src="/images/opatrip-logo.svg" alt="opatrip-logo" width="200px">
        </a>
        <div class="navbar-collapse collapse justify-content-end justify-content-lg-center">
            <ul class="nav navbar-nav justify-content-end" style="gap: 30px">
                @guest
                    @include('layouts.menu')
                @endguest
                @auth
                    @if (Auth::user()->type == 1)
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('menu.admin')}}:
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @include('layouts.dropdown_menus.adminmenu')
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{__('menu.reports')}}:
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @include('layouts.dropdown_menus.adminreportmenu')
                            </ul>
                        </li>
                    @else
                        @include('layouts.menu')
                    @endif
                @endauth
            </ul>
        </div>
        <div class="d-flex justify-content-between align-items-center ms-5 ms-xxl-0" style="gap: 10px">
            @guest
                <a href="{{ url('login') }}" class="navbar-login-button">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    {{ __('menu.login') }}
                </a>
            @endguest
            @auth
                <a href="{{ url('/user/viewcart') }}" class="navbar-icon">
                    <i class="fa-solid fa-cart-shopping fs-5"></i>
                    @if (!empty($cartItemCount))
                        <span class="shopping-cart-items">{{ $cartItemCount }}</span>
                    @endif
                </a>
                <li class="nav-item dropdown" style="list-style: none;">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-icon" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-user fs-5"></i>
                    </a>
                    @include('layouts.dropdown_menus.user_dropdown_menu')
                </li>
            @endauth
        </div>
    </div>
</nav>
