<header>
    <div id="top_line">
        <div class="container">
            <div class="row">
                <div class="col-6"><i class="icon-phone"></i><strong>+37060000000</strong>
                    <span id ="opening"><i class=" icon-clock-1 "></i>{{__('footer.workHours')}}</span>
                </div>
                <div class="col-6">
                    <ul id="top_links" class="mb-2">
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
                                                <li><a href="/user/rootorders" class="dropdown-item">{{__('names.myOrders')}}</a></li>
                                                <li><a href="/user/rootoreturns" class="dropdown-item">{{__('names.myReturns')}}</a></li>
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
                    <h1 class="m-0"><a href="../">LOGO</a></h1>
                </div>
            </div>
            <nav class="col-9">
                <a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="javascript:void(0);"><span>Menu mobile</span></a>
                <div class="main-menu">
                    <a href="#" class="open_close" id="close_in"><i class="icon_set_1_icon-77"></i></a>
                    @guest
                        @include('layouts.menus.guestmenu')
                    @else
                        @include('layouts.menus.logedmenu')
                </div><!-- End main-menu -->
            </nav>
            @endguest
        </div>
    </div><!-- container -->
</header><!-- End Header -->
