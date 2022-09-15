<header>
    <div id="top_line">
        <div class="container">
            <div class="row">
                <div class="col-6"><i class="icon-phone"></i><strong>+37060000000</strong>
                    <span id ="opening"><i class=" icon-clock-1 "></i>{{__('footer.workHours')}}</span>
                </div>
                <div class="col-6">
                    <ul id="top_links">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('auth.login') }}</a></li>
                            @endif
                                @if (Route::has('register'))<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('auth.register') }}</a></li>
                                @endif
                        @else
                            @auth
                                @if ( Auth::user()->type == 1 )
                                @elseif( Auth::user()->type == 2 )
                                @endif
                            @endauth
                                <li>
                                @if (Auth::user()->type == 1)
                                    <li class="dropdown dropdown-mini">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">{{__('menu.admin')}}:<a/>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                @include('layouts.adminmenu')
                                            </ul>
                                    </li>
                                    <li class="dropdown dropdown-mini">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">{{__('menu.reports')}}:<a/>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                @include('layouts.adminreportmenu')
                                            </ul>
                                    </li>
                                @endif
                                    <li class="dropdown dropdown-mini">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @if( Auth::user()->type == 2 )
                                                <a class="dropdown-item" href="/user/userprofile">{{__('menu.userInfo')}}</a>
                                            @endif
                                                <li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                        @csrf
                                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                                           onclick="event.preventDefault();
                                                           document.getElementById('logout-form').submit();">{{ __('menu.logout') }}
                                                        </a>
                                                    </form>
                                                </li>
                                        </ul>
                                    </li>
                                </li>
                        @endguest
                            <li id="social_top" style="opacity: 1">
                                <a href="#0"><i class="icon-facebook"></i>
                                </a>
                                <a href="#0"><i class="icon-instagram"></i>
                                </a>
                            </li>
                    </ul>
                </div>
            </div><!-- End row -->
        </div><!-- End container-->
    </div><!-- End top line-->
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="logo_home">
                    <h1><a href="../">LOGO</a></h1>
                </div>
            </div>
            <nav class="col-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                    @guest
                        <ul class="d-flex justify-content-evenly">
                            <li class="nav-item"><a href="../" >{{__('menu.home')}}</a></li>
                            <li class="nav-item"><a href="/home" >{{__('menu.products')}}</a></li>
                            <li class="nav-item"><a href="/home" >{{__('menu.categories')}}</a></li>
                            <li class="nav-item"><a href="/home" >{{__('menu.promotions')}}</a></li>
                        </ul>
                    @else
                        <ul>
                            <li><a href="/home" >{{ __('names.dashboard') }} </a></li>
                            <li><a href="/user/products" class="show-submenu">{{__('menu.products')}}</a></li>
                            <li class="submenu">
                                <a href="/user/rootcategories" class="show-submenu">{{__('menu.categories')}}<i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li class="third-level"><a href="/user/innercategories/1">Keshawn D&#039;Amore<strong class="badge badge-danger"></strong></a>
                                        <ul>
                                            <li><a href="/user/innercategories/16">Ms. Marietta Waelchi DDS</a></li>
                                            <li><a href="/user/innercategories/19">Mrs. Corene Volkman MD</a></li>
                                        </ul>
                                    </li>
                                    <li class="third-level"><a href="/user/innercategories/2">Hazle Parker II<strong class="badge badge-danger"></strong></a>
                                        <ul>
                                            <li class="third-level"><a href="/user/innercategories/10">Velda Dibbert<strong class="badge badge-danger"></strong></a>
                                                <ul>
                                                    <li><a href="/user/innercategories/15">Dr.Gianni CollinsIV</a></li>
                                                    <li><a href="/user/innercategories/17">Hudson Hettinger</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="/user/innercategories/11">Jermaine Lynch III</a></li>
                                            <li><a href="/user/innercategories/18">Clementine Cummerata</a></li>
                                        </ul>
                                    </li>
                                    <li class="third-level"><a href="/user/innercategories/3">Marc Doyle IV<strong class="badge badge-danger"></strong></a>
                                        <ul>
                                            <li><a href="/user/innercategories/8">Rae Sawayn</a></li>
                                            <li><a href="/user/innercategories/12">Marshall Reinger</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/user/innercategories/4">Delilah Cronin</a></li>
                                    <li class="third-level"><a href="/user/innercategories/5">Santa Walker DDS<strong class="badge badge-danger"></strong></a>
                                        <ul>
                                            <li class="third-level"><a href="/user/innercategories/9">Elta Crist DVM<strong class="badge badge-danger"></strong></a>
                                                <ul>
                                                    <li><a href="/user/innercategories/14">Cydney Lynch</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="/user/innercategories/21">Dr. Roscoe Legros</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="/user/promotions" class="show-submenu">{{__('menu.promotions')}}<i class="icon-down-open-mini"></i></a>
                                <ul>
                                    <li><a href="/user/promotion/1">Prof.Moshe Funk</a>
                                    <li><a href="/user/promotion/2">Dorian Kihn</a>
                                    <li><a href="/user/promotion/3">David Zboncak</a>
                                    <li><a href="/user/promotion/4">Leanne Pollich DVM</a>
                                    <li><a href="/user/promotion/5">Miss Kayli Hintz DDS</a>
                                    <li><a href="/user/promotion/6">Terrell Auer</a>
                                    <li><a href="/user/promotion/7">Oma Thiel</a>
                                    <li><a href="/user/promotion/8">Mrs.Fanny Oberbrunnner DDS</a>
                                    <li><a href="/user/promotion/9">Eldred Reichel</a>
                                    <li><a href="/user/promotion/10">Jacklyn Thiel</a>
                                </ul>
                            </li>
                            <li><a href="/user/discountCoupons" class="show-submenu">{{__('menu.discountCoupons')}}</a></li>
                            <li><a href="/user/rootorders" class="show-submenu">{{__('menu.orders')}}</a></li>
                            <li><a href="/user/rootoreturns" class="show-submenu">{{__('menu.returns')}}</a></li>
                            <li><a href="/user/messenger" class="show-submenu">{{__('menu.messenger')}}</a></li>
                        </ul>
                </div><!-- End main-menu -->
                <ul id="top_tools" >
                    <li>
                        <a href="/user/viewcart"><i class="icon_bag_alt"></i><strong>{{__('menu.cart')}}</strong></a>
                    </li>
                </ul>
            </nav>
            @endguest
        </div>
    </div><!-- container -->
</header><!-- End Header -->
