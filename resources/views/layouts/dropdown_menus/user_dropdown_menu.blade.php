<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
    <li class="dropdown-header">
        {{ Auth::user()->name }}
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
        <a class="dropdown-item" href="{{ url('/user/userprofile') }}"
           style="color: {{ request()->is('user/userprofile*') ? '#c736c0' : '' }}">
            {{__('menu.profile')}}
        </a>
    </li>
    <li>
        <a class="dropdown-item" href="{{ url('/user/rootorders') }}"
           style="color: {{ request()->is('user/rootorders*') ? '#c736c0' : '' }}">
            {{__('menu.orders')}}
        </a>
    </li>
    <li>
        <a class="dropdown-item" href="{{ url('/user/rootoreturns') }}"
           style="color: {{ request()->is('user/rootoreturnsç*') ? '#c736c0' : '' }}">
            {{__('menu.returns')}}
        </a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('menu.logout') }}
            </a>
        </form>
    </li>
</ul>
