<main class="main-wrapper">
    <div class="header-top-02 d-none d-sm-block">
        <div class="container">

            <!-- Header Top Bar Wrapper Start -->
            <div class="header-top-bar-wrap d-sm-flex justify-content-between">

                <div class="header-top-bar-wrap__info">
                    <ul class="header-top-bar-wrap__info-list header-top-bar-wrap__info-list-02">
                        <li><a href="tel:+8819906886"><i class="fas fa-phone"></i> <span class="info-text">PHONE</span></a>
                        </li>
                        <li><a href="mailto:agency@example.com"><i class="far fa-envelope"></i> <span class="info-text">EMAIL</span></a>
                        </li>
                    </ul>
                </div>

                <div class="header-top-bar-wrap__info d-sm-flex">

                    <div class="header-top-bar-wrap__language">
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
                        <ul class="language-dropdown">
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
                    </div>

                    @guest
                        <ul class="header-top-bar-wrap__info-list header-top-bar-wrap__info-list-03 d-none d-lg-flex">
                            @if (Route::has('login'))
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('login') }}">{{ __('auth.login') }}</a></li>
                            @endif
                            @if (Route::has('register'))
                                <li class="nav-item"><a class="nav-link"
                                                        href="{{ route('register') }}">{{ __('auth.register') }}</a>
                                </li>
                            @endif
                        </ul>
                    @else
                        @if (Auth::user()->type == 1)
                            <div class="header-top-bar-wrap__language">
                                <a class="language-toggle" href="#">{{__('menu.admin')}}</a>
                                <ul class="language-dropdown">
                                    @include('layouts.menus.adminmenu')
                                </ul>
                            </div>
                            <div class="header-top-bar-wrap__language">
                                <a class="language-toggle" href="#">{{__('menu.reports')}}</a>
                                <ul class="language-dropdown">
                                    @include('layouts.menus.adminreportmenu')
                                </ul>
                            </div>

                        @endif
                        <div class="header-top-bar-wrap__language">
                            <a class="language-toggle" href="#">{{ Auth::user()->name }}</a>
                            <ul class="language-dropdown">
                                @if( Auth::user()->type == 2 )
                                    <li><a href="/user/userprofile">{{__('menu.userInfo')}}</a></li>
                                    <li><a href="/user/rootorders">{{__('names.myOrders')}}</a></li>
                                    <li><a href="/user/rootoreturns">{{__('names.myReturns')}}</a></li>
                                @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <li><a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">{{ __('menu.logout') }}
                                        </a></li>
                                </form>
                            </ul>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</main>
