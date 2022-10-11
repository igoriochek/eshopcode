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
                <a href="{{ route('home') }}" class="fs-3 fw-bolder py-2">
                    CONTENTUM
                </a>
            </div>
            <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                <button class="close-style search-close">
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
                            <a href="@if(Auth::user()) /user/products @else /products @endif">{{__('menu.products')}}</a>&nbsp;&nbsp;
                        </li>
                        <li class="menu-item">
                            <a href="@if(Auth::user()) /user/rootcategories @else /rootcategories @endif">{{__('menu.categories')}}</a>&nbsp;&nbsp;
                        </li>
                        <li class="menu-item">
                            <a href="@if(Auth::user()) /user/promotions @else /promotions @endif">{{__('menu.promotions')}}</a>&nbsp;&nbsp;
                        </li>
                        <li class="menu-item">
                            <a href="/user/discountCoupons">{{__('menu.discountCoupons')}}</a>&nbsp;&nbsp;
                        </li>
                        <li class="menu-item">
                            <a href="/user/messenger">{{__('menu.messenger')}}</a>&nbsp;&nbsp;
                        </li>
                        <div style="height: 20px"></div>
                        @auth
                            @if (Auth::user()->type==1)
                                <li class="menu-item-has-children">
                                    <a href="{{url('/admin/customers')}}">{{__('menu.adminmenu')}}</a>
                                    <ul class="dropdown">
                                        <li><a href="/admin/categories">{{__('menu.categories')}}</a>&nbsp;&nbsp;</li>
                                        <li><a href="/admin/products">{{__('menu.products')}}</a>&nbsp;&nbsp;</li>
                                        <li><a href="/admin/carts">{{__('menu.carts')}}</a>&nbsp;&nbsp;</li>
                                        <li><a href="/admin/cartStatuses">{{__('menu.cartStatuses')}}</a>&nbsp;&nbsp;
                                        </li>
                                        <li><a href="/admin/discounts">{{__('menu.discounts')}}</a>&nbsp;&nbsp;</li>
                                        <li><a href="/admin/discountCoupons">{{__('menu.discountCoupons')}}</a>&nbsp;&nbsp;
                                        </li>
                                        <li><a href="/admin/orders">{{__('menu.orders')}}</a>&nbsp;&nbsp;</li>
                                        <li><a href="/admin/orderStatuses">{{__('menu.orderStatuses')}}</a>&nbsp;&nbsp;
                                        </li>
                                        <li><a href="/admin/returns">{{__('menu.returns')}}</a>&nbsp;&nbsp;</li>
                                        <li><a href="/admin/returnStatuses">{{__('menu.returnStatuses')}}</a>&nbsp;&nbsp;
                                        </li>
                                        <li><a href="/admin/promotions">{{__('menu.promotions')}}</a>&nbsp;&nbsp;</li>
                                        <li><a href="/admin/customers">{{__('menu.users')}}</a>&nbsp;</li>
                                        <li><a href="/admin/messenger">{{__('menu.messenger')}}</a>&nbsp;</li>
                                        <li><a href="/admin/cookies">{{__('menu.cookies')}}</a>&nbsp;&nbsp;</li>
                                        <li><a href="/admin/data_export_import">{{__('menu.importExport')}}</a>&nbsp;&nbsp;
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children">
                                    <a href="{{url('/admin/users_report')}}">{{__('menu.reports')}}</a>
                                    <ul class="dropdown">
                                        <li><a href="/admin/orders_report">{{__('menu.ordersReport')}}</a></li>
                                        <li><a href="/admin/returns_report">{{__('menu.returnsReport')}}</a></li>
                                        <li><a href="/admin/carts_report">{{__('menu.cartsReport')}}</a></li>
                                        <li><a href="/admin/users_report">{{__('menu.usersReport')}}</a></li>
                                        <li>
                                            <a href="/admin/user_activities_report">{{__('menu.usersActivitiesReport')}}</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
                            <li class="menu-item">
                                <a href="{{ url('/user/viewcart') }}">
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
                                   style="color: {{ request()->is('user/userprofile*') ? '#3BB77E' : '' }}">
                                    <i class="fi fi-rs-user mr-10"></i>{{__('menu.profile')}}
                                </a>
                                <ul class="dropdown">
                                    <li>
                                        <a href="{{ url('/user/rootorders') }}"
                                           style="color: {{ request()->is('user/rootorders*') ? '#3BB77E' : '' }}">
                                            <i class="fi fi-rs-check mr-10"></i>{{__('menu.orders')}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/user/rootoreturns') }}"
                                           style="color: {{ request()->is('user/rootoreturnsç*') ? '#3BB77E' : '' }}">
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
                        @endauth
                    </ul>
                </nav>
                <!-- mobile menu end -->
            </div>
            <div class="mobile-social-icon mb-50 mt-40">
                <h6 class="mb-15">{{__('names.followUs')}}</h6>
                <a href="#"><img src="{{asset('/images/theme/icons/icon-facebook-white.svg')}}" alt="facebook"/></a>
                <a href="#"><img src="{{asset('/images/theme/icons/icon-twitter-white.svg')}}" alt="twitter"/></a>
                <a href="#"><img src="{{asset('/images/theme/icons/icon-instagram-white.svg')}}" alt="instagram"/></a>
                <a href="#"><img src="{{asset('/images/theme/icons/icon-pinterest-white.svg')}}" alt="pinterest"/></a>
                <a href="#"><img src="{{asset('/images/theme/icons/icon-youtube-white.svg')}}" alt="youtube"/></a>
            </div>
        </div>
    </div>
</div>
<!--End header-->
