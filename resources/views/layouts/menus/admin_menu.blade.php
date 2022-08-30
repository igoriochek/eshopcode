<li class="nav-item d-flex align-items-center me-4">
    <a href="/" style="color: {{ request()->is('home') ? '#c736c0' : '' }}">
        {{__('menu.home')}}
    </a>
</li>
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('menu.admin')}}:
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        @include('layouts.dropdown_menus.admin_dropdown_menu')
    </ul>
</li>
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('menu.reports')}}:
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        @include('layouts.dropdown_menus.admin_dropdown_report_menu')
    </ul>
</li>
