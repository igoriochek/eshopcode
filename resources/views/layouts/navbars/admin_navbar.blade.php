<nav class="pt-10 pb-10 border-bottom bg-white d-block d-lg-none" id="navbar" style="position: sticky; top: 0; z-index: 1000">
    <div class="header-bottom header-bottom-bg-color">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('home') }}" class="fs-3 fw-bolder">
                        CONTENTUM
                    </a>
                </div>
                <div class="container d-flex justify-content-end">
                    <div class="header-wrap">
                        <div class="header-action-icon-2 d-block d-xl-none">
                            <div class="burger-icon burger-icon-white">
                                <span class="burger-icon-top"></span>
                                <span class="burger-icon-mid"></span>
                                <span class="burger-icon-bottom"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
<header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner admin-header-container pb-2">
            <div class="mobile-header-top admin-header-top-container">
                <div class="mobile-header-logo">
                    <a href="{{ route('home') }}" class="fs-3 fw-bolder py-2">
                        CONTENTUM
                    </a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit d-block d-lg-none">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area admin-header-center-container">
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <div style="height: 20px"></div>
                            @auth
                                @if (Auth::user()->type==1)
                                    @include('layouts.menus.admin_menu')
                                @endif
                            @endauth
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
            </div>
            <div class="admin-header-bottom-container d-none d-lg-flex">
                <a href="#" class="admin-header-account-dropdown" role="button"
                   id="navbarUserDropdown"
                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="admin-header-account-icon" alt="account-icon" src="{{asset('/images/theme/icons/icon-user.svg')}}"/>
                    <span class="admin-header-account-name">
                        {{ Auth::user()->name }}
                        <i class="fas fa-angle-down"></i>
                    </span>
                </a>
                @include('layouts.dropdowns.admin_dropdown')
                <ul class="nav nav-pills">
                    <li class="nav-item dropdown nav-item-border">
                        <a class="nav-link text-uppercase admin-navbar-language-dropdown"
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
    </div>
</header>

@push('scripts')
    <script>
        const maxWidth = 991;
        const adminHeader = document.querySelector('.mobile-header-active');

        if (window.innerWidth > maxWidth) {
            adminHeader.classList.add('sidebar-visible');
            adminHeader.classList.add('admin-header');
        }

        window.addEventListener(
            'resize',
            event => {
                if (window.innerWidth > maxWidth) {
                    adminHeader.classList.add('sidebar-visible');
                    adminHeader.classList.add('admin-header');
                } else {
                    adminHeader.classList.remove('sidebar-visible');
                    adminHeader.classList.remove('admin-header');
                }
            },
            true
        );
    </script>
@endpush
