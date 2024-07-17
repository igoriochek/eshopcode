<ul class="dropdown-menu dropdown-menu-account" aria-labelledby="navbarUserDropdown">
    <li>
        <a href="{{ url('/user/userprofile') }}" class="dropdown-item"
           style="color: {{ request()->is('user/userprofile*') ? '#0e9f6e' : '' }}">
            {{__('menu.profile')}}
        </a>
    </li>
    <li>
        <a href="{{ url('/user/rootorders') }}" class="dropdown-item"
           style="color: {{ request()->is('user/rootorders*') ? '#0e9f6e' : '' }}">
            {{__('menu.orders')}}
        </a>
    </li>
    <li>
        <a href="{{ url('/user/rootoreturns') }}" class="dropdown-item"
           style="color: {{ request()->is('user/rootoreturns*') ? '#0e9f6e' : '' }}">
            {{__('menu.returns')}}
        </a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <a href="{{ route('logout') }}" class="dropdown-item"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('menu.logout') }}
            </a>
        </form>
    </li>
</ul>
