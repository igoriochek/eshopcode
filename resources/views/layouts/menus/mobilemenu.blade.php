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
<div class="mobile-header-active mobile-header-wrapper-style">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-top">
            <div class="mobile-header-logo">
                <a href="{{ route('home') }}">
                    <div style="height: 70px; width: 120px; overflow: hidden;">
                        <img src="{{ asset('/images/logo.jpeg') }}" alt="logo" style="width: 100%; height: 100%; object-fit: cover">
                    </div>
                </a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-clos text-white">
                    <i class="icon-top"></i>
                    <i class="icon-bottom"></i>
                </button>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="mobile-menu-wrap mobile-header-border">
                <!-- mobile menu start -->
                <nav>
                    <ul class="mobile-menu font-heading">
                        <li class="menu-item">
                            <a href="/products" style="color: {{ request()->is('products*') || request()->is('viewproduct*') ? '#e10000' : '' }}">{{__('menu.products')}}</a>&nbsp;&nbsp;
                        </li>
                        <li class="menu-item">
                            <a href="/rootcategories" style="color: {{ request()->is('rootcategories*') || request()->is('innercategories*') ? '#e10000' : '' }}">{{__('menu.categories')}}</a>&nbsp;&nbsp;
                        </li>
                        <li class="menu-item">
                            <a href="/promotions" style="color: {{ request()->is('promotions*') || request()->is('promotion*') ? '#e10000' : '' }}">{{__('menu.promotions')}}</a>&nbsp;&nbsp;
                        </li>
                        <li class="menu-item">
                            <a href="/user/discountCoupons" style="color: {{ request()->is('discountCoupons') ? '#e10000' : '' }}">{{__('menu.discountCoupons')}}</a>&nbsp;&nbsp;
                        </li>
                        <li class="menu-item">
                            <a href="/user/messenger" style="color: {{ request()->is('messenger*') ? '#e10000' : '' }}">{{__('menu.messenger')}}</a>&nbsp;&nbsp;
                        </li>
                        <li class="menu-item">
                            <a href="/eu_projects" style="color: {{ request()->is('eu_projects') ? '#e10000' : '' }}">{{ __('menu.euProjects') }}</a>&nbsp;&nbsp;
                        </li>
                        <div style="height: 30px"></div>
                        @auth
                            <li class="menu-item">
                                <a href="{{ url('/user/viewcart') }}" style="color: {{ request()->is('user/viewcart*') ? '#e10000' : '' }}">
                                    <img alt="cart-icon" src="{{ asset('/images/theme/icons/icon-cart.svg') }}" width="15" class="me-1" />
                                    @if (!empty($cartItemCount))
                                        <span class="pro-count blue">({{ $cartItemCount }})</span>
                                    @endif
                                    {{__('names.cart')}}
                                </a>
                                <a href="{{url('/user/viewcart')}}"><span class="lable"></span></a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ url('/user/userprofile') }}"
                                   style="color: {{ request()->is('user/userprofile*') ? '#e10000' : '' }}">
                                    <i class="fi fi-rs-user mr-10"></i>{{__('menu.profile')}}
                                </a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="{{ url('/user/rootorders') }}"
                                           style="color: {{ request()->is('user/rootorders*') ? '#e10000' : '' }}">
                                            <i class="fi fi-rs-check mr-10"></i>{{__('menu.orders')}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/user/rootoreturns') }}"
                                           style="color: {{ request()->is('user/rootoreturnsç*') ? '#e10000' : '' }}">
                                            <i class="fi fi-rs-arrow-left mr-10"></i>{{__('menu.returns')}}
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="menu-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fi fi-rs-sign-out mr-10"></i>{{ __('menu.logout') }}
                                    </a>
                                </form>
                            </li>
                        @else
                            @if (Route::has('login'))
                                <li class="menu-item">
                                    <a href="{{ route('login') }}" style="color: {{ request()->is('login*') ? '#e10000' : '' }}">
                                        <i class="fi fi-rs-sign-in text-muted"></i>
                                        {{ __('auth.login') }}
                                    </a>
                                </li>
                            @endif
                        @endauth
                        <div style="height: 10px"></div>
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-social-icon mb-50 mt-40">
                <h6 class="mb-15">{{__('names.followUs')}}</h6>
                <div class="d-flex">
                    <a href="https://www.facebook.com/krims.lt" target="__blank">
                        <img src="{{ asset('/images/theme/icons/icon-facebook-white.svg') }}" alt="facebook"/>
                    </a>
{{--                    <a href="{{ route('google.login') }}" class="d-flex justify-content-center align-items-center">--}}
{{--                        <i class="fa-brands fa-google text-white" style="font-size: .8em"></i>--}}
{{--                    </a>--}}
{{--                    <a href="{{ route('twitter.login') }}">--}}
{{--                        <img src="{{ asset('/images/theme/icons/icon-twitter-white.svg') }}" alt="twitter"/>--}}
{{--                    </a>--}}
                </div>
            </div>
        </div>
    </div>
</div>
<!--End header-->
