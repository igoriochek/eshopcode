<main class="main-wrapper">
    <div class="offcanvas offcanvas-end offcanvas-mobile" id="offcanvasMobileMenu" style="background-image: url(../images/mobile-bg.jpg);">
        <div class="offcanvas-header bg-white">
            <div class="offcanvas-logo">
                <a href="{{ route('home') }}"><h2 class="about-content-02__main-title" data-aos="fade-up" data-aos-duration="1000">LOGO</h2></a>
            </div>
            <button type="button" class="offcanvas-close" data-bs-dismiss="offcanvas"><i class="fal fa-times"></i></button>
        </div>

        <div class="offcanvas-body">
            <nav class="canvas-menu">
                <ul class="offcanvas-menu">
                    @include('layouts.usermenu')
                    <li>
                        <a class="language-toggle" href="#">
                            <span>
                                @if (app()->getLocale() == 'en')
                                    {{ __('English') }}
                                @elseif (app()->getLocale() == 'lt')
                                    {{ __('Lietuvių') }}
                                @elseif (app()->getLocale() == 'ru')
                                    {{ __('Pусский') }}
                                @endif
                            </span>
                        </a>
                        <ul class="sub-menu">
                            @foreach (config('translatable.locales') as $locale)
                                <li>
                                    <a href="/lang/{{ $locale }}"
                                       class="@if (app()->getLocale() == $locale)  @endif">
                                        @if ($locale == 'en')
                                            {{__('English')}}
                                        @elseif ($locale == 'lt')
                                            {{__('Lietuvių')}}
                                        @elseif ($locale == 'ru')
                                            {{__('Pусский')}}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @auth
                        @if (Auth::user()->type == 1)
                            <li>
                                <a href="#">{{__('menu.admin')}}</a>
                                <ul class="sub-menu">
                                    @include('layouts.adminmenu')
                                </ul>
                            </li>
                            <li>
                                <a href="#">{{__('menu.reports')}}</a>
                                <ul class="sub-menu">
                                    @include('layouts.adminreportmenu')
                                </ul>
                            </li>
                        @endif
                        <li>
                            <a href="#">{{ Auth::user()->name }} </a>
                            <ul class="sub-menu">
                                @if( Auth::user()->type == 2 )
                                    <li><a href="/user/userprofile">{{__('menu.userInfo')}}</a></li>
                                    <li><a href="/user/rootorders">{{__('names.myOrders')}}</a></li>
                                    <li><a href="/user/rootoreturns">{{__('names.myReturns')}}</a></li>
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
                    @endauth
                </ul>
            </nav>
        </div>

        @guest
            <div class="offcanvas-user d-lg-none">
                <div class="offcanvas-user__button">
                    <a href="{{ route('login') }}" class="offcanvas-user__login btn btn-secondary btn-hover-secondarys">{{ __('auth.login') }}</a>
                </div>
                <div class="offcanvas-user__button">
                    <a href="{{ route('register') }}" class="offcanvas-user__signup btn btn-primary btn-hover-primary">{{ __('auth.register') }}</a>
                </div>
            </div>
        @endguest
    </div>
</main>
