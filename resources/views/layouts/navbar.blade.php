<nav class="pt-10 pb-10">
    <div class="header-middle d-none d-lg-block">
        <div class="container">
            <div class="header-wrap">
                <div class="logo logo-width-1">
                    <a href="{{route('home')}}"><img src="{{asset('/images/theme/logo.svg')}}" alt="logo"/></a>
                </div>
                <div class="header-right">
                    <div>
                    </div>
                    <div class="header-action-right">
                        <div class="header-action-2">
                            <div class="header-action mr-20 fs-5">
                                <a href="/home">{{__('menu.home')}}</a>&nbsp;&nbsp;
                            </div>
                            <div class="header-action mr-20 fs-5">
                                <a href="/user/products">{{__('menu.products')}}</a>&nbsp;&nbsp;
                            </div>
                            <div class="header-action mr-20 fs-5">
                                <a href="/user/rootcategories">{{__('menu.categories')}}</a>&nbsp;&nbsp;
                            </div>
                            <div class="header-action mr-20 fs-5">
                                <a href="/user/promotions">{{__('menu.promotions')}}</a>&nbsp;&nbsp;
                            </div>

                            @guest
                                @if (Route::has('login'))
                                    <div class="header-action mr-20 fs-5">
                                        <i class="fi fi-rs-sign-in mr-10"></i><a
                                            style="color: {{ request()->is('login*') ? '#3BB77E' : '' }}"
                                            href="{{route('login')}}">{{__('auth.login')}}</a>
                                    </div>
                                @endif

{{--                                @if (Route::has('register'))--}}
{{--                                    <div class="header-action fs-4">--}}
{{--                                        <i class="fi fi-rs-apps-add mr-10"></i><a--}}
{{--                                            style="color: {{ request()->is('register*') ? '#3BB77E' : '' }}"--}}
{{--                                            href="{{route('register')}}">{{__('auth.register')}}</a>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
                            @else
                                <div class="header-action mr-20 fs-5">
                                    <a href="/user/discountCoupons">{{__('menu.discountCoupons')}}</a>&nbsp;&nbsp;
                                </div>
                                <div class="header-action mr-20 fs-5">
                                    <a href="/user/messenger">{{__('menu.messenger')}}</a>&nbsp;&nbsp;
                                </div>
                                @auth
                                    @if (Auth::user()->type==1)
                                        @include('layouts.dropdown_menus.adminmenu')
                                        @include('layouts.dropdown_menus.adminreportmenu')
                                        @include('layouts.dropdown_menus.usermenu')
                                    @elseif (Auth::user()->type == 2)
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
