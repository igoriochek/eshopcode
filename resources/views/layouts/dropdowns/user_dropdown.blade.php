<ul class="header__sub--menu @if (Auth::user()->type == 1) admin__header__sub--menu @endif">
    <li class="header__sub--menu__items">
        <a class="header__sub--menu__link @if (Auth::user()->type == 1) fs-5 @endif" href="{{ url('/user/userprofile') }}"
           style="color: {{ request()->is('user/userprofile*') ? '#ED1D24' : '' }}">
            {{__('menu.profile')}}
        </a>
    </li>
    @if (Auth::user()->type == 2)
        <li class="header__sub--menu__items">
            <a class="header__sub--menu__link" href="{{ url('/user/rootorders') }}"
               style="color: {{ request()->is('user/rootorders*') ? '#ED1D24' : '' }}">
                {{__('menu.orders')}}
            </a>
        </li>
        <li class="header__sub--menu__items">
            <a class="header__sub--menu__link" href="{{ url('/user/rootoreturns') }}"
               style="color: {{ request()->is('user/rootoreturns*') ? '#ED1D24' : '' }}">
                {{__('menu.returns')}}
            </a>
        </li>
    @endif
    <li><hr class="dropdown-divider"></li>
    <li class="header__sub--menu__items">
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <a class="header__sub--menu__link @if (Auth::user()->type == 1) fs-5 @endif" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('menu.logout') }}
            </a>
        </form>
    </li>
</ul>
