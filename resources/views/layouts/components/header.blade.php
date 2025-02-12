<div class="off_canvars_overlay">

</div>
<div class="offcanvas_menu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="canvas_open">
                    <a href="javascript:void(0)"><i class="icon-menu"></i></a>
                </div>
                <div class="offcanvas_menu_wrapper">
                    <div class="canvas_close">
                        <a href="javascript:void(0)"><i class="icon-x"></i></a>
                    </div>
                    <div class="language_currency text-center">
                        <ul>
                            <li class="language"><a href="#"> {{ strtoupper(app()->getLocale()) }} <i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown_language">
                                    @foreach (config('translatable.locales') as $locale)
                                    <li>
                                        <a href="{{ url('/lang/' . strtolower($locale)) }}">
                                            <img src="{{asset('/images/flag-' . $locale . '.png')}}" alt="{{$locale}}" style="max-width: 15px; height: 10px; display: inline-block; margin-right: 5px;"/>
                                            {{ strtoupper($locale) }}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="call-support">
                        <p>
                            <a href="tel:+37067344854">
                                +370 673 44854
                            </a>
                        </p>
                    </div>
                    <div id="menu" class="text-left ">
                        <ul class="offcanvas_main_menu">
                            <li class="menu-item-has-children">
                                <a href="{{ url('/products') }}">{{ __('menu.products') }}</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ url('/rootcategories') }}">{{ __('menu.categories') }}</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ url('/promotions') }}">{{ __('menu.promotions') }}</a>
                            </li>
                            @auth
                            <li class="menu-item-has-children">
                                <a href="{{ url('/user/discountCoupons') }}">{{ __('menu.discountCoupons') }}</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ url('/user/messenger') }}">{{ __('menu.messenger') }}</a>
                            </li>
                            @endauth
                        </ul>
                    </div>

                    <div class="offcanvas_footer">
                        <span><a href="mailto:info@time2.lt"><i class="fa fa-envelope-o"></i> info@time2.lt</a></span>
                        <ul>
                            <li class="facebook"><a href="https://www.facebook.com/time2.lt"><i class="fa fa-facebook"></i></a></li>
                            <li class="instagram"><a href="https://www.instagram.com/time2_lt/"><i class="fa fa-instagram"></i></a></li>
                            <li class="linkedin"><a href="https://www.linkedin.com/company/timetwo/posts/?feedView=all"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<header>
    <div class="main_header">
        <div class="header_top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-7">
                        <div class="welcome-text">
                            <a href="tel:+37067344854">
                                +370 673 44854
                            </a>
                            <span class="separator">|</span>
                            <a href="mailto:info@time2.lt">
                                info@time2.lt
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="language_currency text-right">
                            <ul>
                                <li class="language"><a href="#"> {{ strtoupper(app()->getLocale()) }} <i class="fa fa-angle-down"></i></a>
                                    <ul class="dropdown_language">
                                        @foreach (config('translatable.locales') as $locale)
                                        <li>
                                            <a href="{{ url('/lang/' . strtolower($locale)) }}">
                                                <img src="{{asset('/images/flag-' . $locale . '.png')}}" alt="{{$locale}}" style="max-width: 15px; height: 10px; display: inline-block; margin-right: 5px;"/>
                                                {{ strtoupper($locale) }}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-4">
                        <div class="logo">
                            <a href="{{ url('/products') }}"><img src="{{ asset('images/time2_logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-6 col-6">
                        <div class="header_right_info">
                            <div class="header_account_area">
                                @auth
                                <div class="header_account-list top_links">
                                    <a href="{{ url('/user/userprofile') }}"><i class="icon-users"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="{{ url('/user/userprofile') }}">{{ __('menu.profile') }}</a></li>
                                        <li><a href="{{ url('/user/rootorders') }}">{{ __('menu.orders') }}</a></li>
                                        <li><a href="{{ url('/user/rootoreturns') }}">{{ __('menu.returns') }}</a></li>
                                        <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="margin-bottom: 0px;">
                                                @csrf
                                                <a href="{{ route('logout') }}"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    {{ __('menu.logout') }}
                                                </a>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                <div class="header_account-list  mini_cart_wrapper">
                                    <a href="javascript:void(0)"><i class="icon-shopping-bag"></i><span
                                            class="item_count">{{ $cartItemCount ?? 0 }}</span></a>
                                    @include('layouts.components.cart_sidebar')
                                </div>
                                @else
                                <div class="header_account-list top_links">
                                    <a href="{{ route('login') }}"><i class="icon-users"></i></a>
                                    <ul class="dropdown_links">
                                        <li><a href="{{ route('register') }}">{{ __('auth.register') }}</a></li>
                                        <li><a href="{{ route('login') }}">{{ __('auth.login') }}</a></li>
                                    </ul>
                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header_bottom sticky-header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="main_menu menu_position">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="{{ url('/products') }}">{{ __('menu.products') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/rootcategories') }}">{{ __('menu.categories') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/promotions') }}">{{ __('menu.promotions') }}</a>
                                    </li>
                                    @auth
                                    <li>
                                        <a href="{{ url('/user/discountCoupons') }}">{{ __('menu.discountCoupons') }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/user/messenger') }}">{{ __('menu.messenger') }}</a>
                                    </li>
                                    @endauth
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<style>
    .offcanvas_footer ul li.instagram a {
        background: #833ab4;
    }

    .offcanvas_footer ul li a {
        align-content: center;
    }

    .canvas_open a {
        align-content: center;
    }

    .canvas_close a {
        align-content: center;
    }
</style>