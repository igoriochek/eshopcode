<li class="nav-item dropdown me-2">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('menu.admin')}}:
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        @include('layouts.dropdowns.admin_menu_dropdown')
    </ul>
</li>
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{__('menu.reports')}}:
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        @include('layouts.dropdowns.admin_report_dropdown')
    </ul>
</li>
