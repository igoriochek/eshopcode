<nav class="pt-10 pb-10 border-bottom bg-white" id="navbar" style="position: sticky; top: 0; z-index: 1000000;">
    <div class="header-bottom header-bottom-bg-color">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{ route('home') }}" class="fs-3 fw-bolder">
                        CONTENTUM
                    </a>
                </div>
                <div class="header-right">
                    <div>
                    </div>
                    @include('layouts.menus.mobilemenu')
                    <div class="header-action-right">
                        <div class="header-action-2">
                            @guest
                                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading me-4">
                                    <nav>
                                        <ul>
                                            @include('layouts.menus.guest_user_menu_top')
                                        </ul>
                                    </nav>
                                </div>
                                @if (Route::has('login'))
                                    <div class="header-action mr-20 fs-5">
                                        <i class="fi fi-rs-sign-in mr-10"></i><a
                                            style="color: {{ request()->is('login*') ? '#3BB77E' : '' }}"
                                            href="{{route('login')}}">{{__('auth.login')}}</a>
                                    </div>
                                @endif
                            @else
                                @auth
                                    @if (Auth::user()->type==1)
                                        @include('layouts.dropdown_menus.adminmenu')
                                        @include('layouts.dropdown_menus.adminreportmenu')
                                        @include('layouts.dropdown_menus.usermenu')
                                    @elseif (Auth::user()->type == 2)
                                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading me-4">
                                            <nav>
                                                <ul>
                                                    @include('layouts.menus.guest_user_menu_top')
                                                </ul>
                                            </nav>
                                        </div>
                                        @include('layouts.dropdown_menus.usermenu')
                                    @endif
                                @endauth
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>
    window.addEventListener('scroll', () => {
        const navbar = document.getElementById('navbar');
        navbar.classList.toggle('shadow-sm', window.scrollY > 34);
    });
</script>
