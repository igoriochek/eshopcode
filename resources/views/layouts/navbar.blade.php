<nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ url('/') }}">
            <img src="/images/opatrip-logo.svg" alt="opatrip-logo" width="200px">
        </a>
        <div class="d-flex justify-content-center">
            <ul class="nav navbar-nav menu" style="@guest gap: 50px @endguest @auth gap: 30px @endauth">
                @guest
                    @include('layouts.menus.menu')
                @endguest
                @auth
                    @if (Auth::user()->type == 1)
                        @include('layouts.menus.admin_menu')
                    @else
                        @include('layouts.menus.menu')
                    @endif
                @endauth
            </ul>
        </div>
        <div class="d-flex justify-content-between align-items-center ms-xxl-0" style="gap: 10px">
            @guest
                <a href="{{ url('login') }}" class="navbar-login-button">
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
            <button type="button" class="hamburger-menu-button">
                <i class="fa-solid fa-bars fs-4"></i>
            </button>
        </div>
    </div>
</nav>

<script>
    const menu = document.querySelector('.menu');
    const hamburgerMenuButton = document.querySelector('.hamburger-menu-button');

    hamburgerMenuButton.addEventListener('click', () => {
        menu.classList.toggle('active');
    });
</script>
