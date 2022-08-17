<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="navbar-nav">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif

                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                @auth
                    @if ( Auth::user()->type == 1 )
                        {{--                            @include('layouts.adminmenu')---}}

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('menu.admin')}}
                                :<a/>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @include('layouts.dropdown_menus.adminmenu')
                                </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">{{__('menu.reports')}}:<a/>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @include('layouts.dropdown_menus.adminreportmenu')
                                </ul>
                        </li>
                    @elseif( Auth::user()->type == 2 )
                        @include('layouts.menu')
                    @endif

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">{{__('messages.chooselang')}}:<a/>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                @foreach (config('translatable.locales') as $locale)
                                    <li><a class="dropdown-item" href="/lang/{{ $locale }}"
                                           class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                            [{{ strtoupper($locale) }}]
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                    </li>
                @endauth
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        {{--                            <li>--}}
                        {{--                                <a class="dropdown-item" href="#">Link1</a>--}}
                        {{--                            </li>--}}
                        {{--                            @auth--}}
                        {{--                                @if ( Auth::user()->type == 1 )--}}
                        {{--                                    @include('layouts.adminmenu')--}}
                        {{--                                @elseif( Auth::user()->type == 2 )--}}
                        {{--                                    @include('layouts.usermenu')--}}
                        {{--                                @endif--}}
                        {{--                            @endauth--}}
                        @if( Auth::user()->type == 2 )
                            <li><a class="dropdown-item" href="/user/userprofile">{{__('menu.userInfo')}}</a>&nbsp;</li>
                        @endif
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                    {{ __('menu.logout') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            @endguest
        </ul>
    </div>
</nav>
