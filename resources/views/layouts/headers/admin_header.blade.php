<header class="admin-header">
    <div class="admin-header-container">
        <div class="admin-header-top-container">
            <a href="{{ url('/home') }}" class="admin-header-logo">
                <img src="{{ asset('images/Logo.jpg') }}" alt="logo" width="150" class="my-3">
            </a>
            <button class="admin-header-toggle-button" onclick="onClickOpenMenu()">
                <i class="fa-sharp fa-solid fa-bars text-white"></i>
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
            <div class="header__account header__sticky--none">
                <ul class="header__account--wrapper d-flex align-items-center">
                    <li class="header__menu--items account">
                        <a class="header__menu--link text-dark px-0 fs-5" href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                            <span class="d-none d-lg-inline fw-normal">{{ strtok(Auth::user()->name, ' ') }}</span>
                        </a>
                        @include('layouts.dropdowns.user_dropdown')
                    </li>
                </ul>
            </div>
            <ul class="header__top--link d-flex align-items-center">
                <li class="language__currency--list">
                    <a class="language__switcher fs-5" href="javascript:void(0)">
                        <span>
                            @if (app()->getLocale() == 'lt')
                                {{ __('names.lithuanian') }}
                            @elseif (app()->getLocale() == 'ru')
                                {{ __('names.russian') }}
                            @else
                                {{ __('names.english') }}
                            @endif
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="9.797" height="6.05" viewBox="0 0 9.797 6.05">
                            <path d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"></path>
                        </svg>
                    </a>
                    <div class="dropdown__language admin__dropdown__language">
                        @include('layouts.dropdowns.language_dropdown')
                    </div>
                </li>
            </ul>
        </div>
    </div>
</header>

@include('layouts.headers.mobile_admin_header')

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
