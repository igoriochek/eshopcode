<nav class="main-header navbar navbar-expand navbar-light" style="height: 56.8px;">
    <ul class="navbar-nav">
        <li class="nav-item" style=>
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars" style="font-size: 2rem;"></i></a>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4" style="display: flex !important; flex-direction: column !important;">

    <a href="{{ url('/home') }}" class="brand-link" style="height: 56.8px;display: flex;justify-content: left;align-items: center;">
        <img src="{{ asset('images/nutika-logo.jpeg') }}" alt="logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">LORD-UK</span>
    </a>

    <div class="sidebar">
        <nav class="mt-5">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                @include('layouts.menus.admin_menu')
            </ul>
        </nav>
    </div>


    <div class="admin-header-bottom-container" style="display: flex; justify-content: space-between; margin-bottom: 40px;">
        <a href="#" role="button"
            id="navbarUserDropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #c2c7d0;">
            <i height="30" width="30" class="fa-solid fa-user"></i>
            <span class="admin-header-account-name">{{ Auth::user()->name }}</span>
        </a>
        @include('layouts.dropdowns.admin_dropdown')
        <ul class="nav nav-pills" style="margin-right: 15px;">
            <li class="nav-item dropdown nav-item-border">
                <a class="text-uppercase"
                    href="#" role="button" id="dropdownLanguage" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" style="color: #c2c7d0;">
                    {{ app()->getLocale() }}
                    <i class="fas fa-angle-down"></i>
                </a>
                @include('layouts.dropdowns.language_dropdown')
            </li>
        </ul>
    </div>

</aside>

@push('css')
<style>
    .main-sidebar {
        display: flex !important;
        flex-direction: column !important;
    }

    #header-responsive {
        position: fixed;
        z-index: 1030;
        top: 0;
        padding: 15px;
        background: #fff;
        overflow-x: hidden;
    }

    body {
        font-size: 1.3rem !important;
    }

    .sidebar ul .nav-link {
        color: #666;
        font-size: 1.6rem;
        line-height: 20px;
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