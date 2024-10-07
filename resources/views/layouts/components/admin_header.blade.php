<header class="admin-header" style="position: fixed; width: 100%;">
    <div class="admin-header-container">
        <div class="admin-header-top-container">
            <a href="{{ url('/home') }}" class="admin-header-logo">
                <img src="{{ asset('images/nutika-logo.jpeg') }}" alt="Nutika" class="logo"
                style="max-width: 60px; max-height: 60px; z-index: -111"
                >
            </a>
            <button class="admin-header-toggle-button" onclick="onClickOpenMenu()" style="background: #3577f0;">
                <i class="fa-sharp fa-solid fa-bars text-white"></i>
            </button>
        </div>
        <hr class="admin-header-hr">

        <div class="admin-header-center-container">
            <div class="nav nav-tabs" role="tablist">
                @include('layouts.menus.admin_menu')
            </div>
        </div>

        <hr class="admin-header-hr">
        <div class="admin-header-bottom-container">
            <a href="#" role="button"
               id="navbarUserDropdown"
               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('images/icons/icon-account.png') }}" height="30" width="30" alt="icon-account" class="admin-header-account-icon">
                <span class="admin-header-account-name">{{ Auth::user()->name }}</span>
            </a>
            @include('layouts.dropdowns.admin_dropdown')
            <ul class="nav nav-pills">
                <li class="nav-item dropdown nav-item-border">
                    <a class="text-uppercase"
                       href="#" role="button" id="dropdownLanguage" data-bs-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">
                        {{ app()->getLocale() }}
                        <i class="fas fa-angle-down"></i>
                    </a>
                    @include('layouts.dropdowns.language_dropdown')
                </li>
            </ul>
        </div>
    </div>
</header>

@push('css')
    <style>
        #header-responsive {
            position: fixed;
            z-index: 1030;
            top: 0;
            padding: 15px;
            background: #fff;
            overflow-x: hidden;
        }
        @media (max-width: 992px) {
            #header-responsive {
                height: 60px;
                width: 100%;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            body {
                padding-top: 60px;
            }
        }
    </style>
@endpush


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
