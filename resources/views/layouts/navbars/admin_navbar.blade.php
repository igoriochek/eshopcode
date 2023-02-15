<header class="admin-header">
    <div class="admin-header-container">
        <div class="admin-header-top-container">
            <a href="{{ url('/') }}" class="admin-header-logo">
                <img src="{{ asset('images/logo.jpeg') }}" alt="logo" width="190px" class="logo">
            </a>
            <button class="admin-header-toggle-button" onclick="onClickOpenMenu()">
                <i class="fa-sharp fa-solid fa-bars text-white fs-6"></i>
            </button>
        </div>
        <hr class="admin-header-hr">
        <div class="admin-header-center-container">
            <ul class="admin-navbar">
                @include('layouts.menus.admin_menu')
            </ul>
        </div>
        <hr class="admin-header-hr">
        <div class="admin-header-bottom-container">
            <a href="#" class="admin-header-account-dropdown" role="button"
               id="navbarUserDropdown"
               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="admin-header-account-name">{{ Auth::user()->name }}</span>
            </a>
            @include('layouts.dropdowns.account_dropdown')
            <ul class="nav nav-pills">
                <li class="nav-item dropdown nav-item-border">
                    <a class="nav-link text-uppercase admin-navbar-language-dropdown"
                       href="#" role="button" id="dropdownLanguage" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        @if (app()->getLocale() == 'lt')
                            <img src="/images/lt-flag.png" alt="lt-flag" style="width: 24px; height: 17px; margin-right: 5px">
                        @elseif (app()->getLocale() == 'en')
                            <img src="/images/en-flag.png" alt="en-flag" style="width: 24px; height: 17px; margin-right: 5px">
                        @elseif (app()->getLocale() == 'ru')
                            <img src="/images/ru-flag.svg" alt="en-flag" style="width: 24px; height: 17px; margin-right: 5px;">
                        @endif
                        {{ app()->getLocale() }}
                        <i class="fas fa-angle-down ms-1"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow-centered min-width-0" aria-labelledby="dropdownCurrency" style="min-width: 3rem;">
                        @foreach (config('translatable.locales') as $locale)
                            <a class="dropdown-item" href="/lang/{{ $locale }}" style="font-size: .9rem;">
                                {{ strtoupper($locale) }}
                            </a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>

@push('scripts')
    <script>
        const maxWidth = 991;

        const adminHeaderContainer = document.querySelector('.admin-header-container');
        const adminHeaderCenter = document.querySelector('.admin-header-center-container');
        const adminHeaderBottom = document.querySelector('.admin-header-bottom-container');
        const hrs = document.querySelectorAll('.admin-header-hr');

        if (window.innerWidth < maxWidth) {
            adminHeaderContainer.classList.add('container');
            adminHeaderCenter.classList.add('hide');
            adminHeaderBottom.classList.add('hide');
            hrs.forEach(hr => hr.classList.add('hide'))
        }
        window.addEventListener(
            'resize',
            event => {
                if (window.innerWidth < maxWidth) {
                    adminHeaderContainer.classList.add('container');
                    adminHeaderCenter.classList.add('hide');
                    adminHeaderBottom.classList.add('hide');
                    hrs.forEach(hr => hr.classList.add('hide'))
                } else {
                    adminHeaderContainer.classList.remove('container');
                    adminHeaderCenter.classList.remove('hide');
                    adminHeaderBottom.classList.remove('hide');
                    hrs.forEach(hr => hr.classList.remove('hide'))
                }
            },
            true
        );
        const onClickOpenMenu = () => {
            adminHeaderCenter.classList.toggle('hide');
            adminHeaderBottom.classList.toggle('hide');
            hrs.forEach(hr => hr.classList.toggle('hide'))
        }
    </script>
@endpush
