<nav class="main-header navbar navbar-expand navbar-light" style="height: 56.8px;">
    <ul class="navbar-nav">
        <li class="nav-item" style=>
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars" style="font-size: 2rem;"></i></a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4"
    style="display: flex !important; flex-direction: column !important;">

    <a href="{{ url('/home') }}" class="brand-link"
        style="height: 56.8px;display: flex;justify-content: left;align-items: center;">
        <span class="brand-text font-weight-light">
            {{ config('app.name', __('Grasalė')) }}
        </span>
    </a>

    <div class="sidebar">
        <nav>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @include('layouts.menus.admin_menu')
            </ul>
        </nav>
    </div>


    <div class="admin-header-bottom-container"
        style="display: flex; justify-content: space-between; margin-bottom: 40px;">
        <a href="#" role="button" id="navbarUserDropdown" aria-haspopup="true" aria-expanded="false"
            style="color: #c2c7d0;">
            <i height="30" width="30" class="fa-solid fa-user"></i>
            <span class="admin-header-account-name">{{ Auth::user()->name }}</span>
        </a>
        @include('layouts.dropdowns.admin_dropdown')
        <ul class="nav nav-pills" style="margin-right: 15px;">
            <li class="nav-item dropdown nav-item-border">
                <a class="text-uppercase" href="#" role="button" id="dropdownLanguage" aria-haspopup="true"
                    aria-expanded="false" style="color: #c2c7d0;">
                    {{ app()->getLocale() }}
                    <i class="fas fa-angle-down"></i>
                </a>
                @include('layouts.dropdowns.language_dropdown')
            </li>
        </ul>
    </div>
</aside>


@push('scripts')
    <script>
        var adminDropdown = document.getElementById('adminDropdown');
        var languageDropdown = document.getElementById('languageDropdown');

        var adminDropdownButton = document.getElementById('navbarUserDropdown');
        var languageDropdownButton = document.getElementById('dropdownLanguage');

        adminDropdownButton.addEventListener('click', event => {
            adminDropdown.classList.toggle('show-admin');
        });

        languageDropdownButton.addEventListener('click', event => {
            languageDropdown.classList.toggle('show-language');
        });
    </script>
@endpush
