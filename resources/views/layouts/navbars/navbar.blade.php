<nav class="navbar navbar-expand-lg navbar-light bg-white shadow">
    <div class="container">
        <a class="navbar-brand fw-bold d-none d-sm-block" href="{{ url('/') }}">
            <img src="/images/bonatrip.png" alt="opatrip-logo" width="200px">
        </a>
        <a class="navbar-brand fw-bold d-block d-sm-none" href="{{ url('/') }}">
            <img src="/opatrip-logo-favicon.png" alt="opatrip-logo" width="50px">
        </a>
        <div class="d-flex justify-content-center">
            <ul class="nav navbar-nav menu" style="@guest gap: 50px @endguest @auth gap: 30px @endauth">
                @guest
                    @include('layouts.menus.menu')
                @endguest
                @auth
                    @include('layouts.menus.menu')
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
                    <i class="fa-solid fa-cart-shopping fs-4"></i>
                    @if (!empty($cartItemCount))
                        <span class="shopping-cart-items">{{ $cartItemCount }}</span>
                    @endif
                </a>
                <li class="dropdown" style="list-style: none;">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-icon" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa-solid fa-user fs-4"></i>
                    </a>
                    @include('layouts.dropdowns.account_dropdown')
                </li>
            @endauth
            <a href="#" class="hamburger-menu-button">
                <i class="fa-solid fa-bars fs-4"></i>
            </a>
        </div>
    </div>
</nav>

<script>
    const hamburgerMenuButton = document.querySelector('.hamburger-menu-button');
    const menu = document.querySelector('.menu');

    hamburgerMenuButton.addEventListener('click', () => menu.classList.toggle('active'));

    const navbar = document.querySelector('.navbar');
    const topbarHeight = 45;

    window.addEventListener('scroll', () => {
        if (window.scrollY > 0) navbar.style.position = 'relative'
        if (window.scrollY > topbarHeight) navbar.style.position = 'sticky';
    });

    document.onscroll = () => navbar.style.top = '0';
</script>
