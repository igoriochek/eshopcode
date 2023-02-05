<ul class="dropdown-menu" aria-labelledby="navbarUserDropdown">
    <li class="dropdown-header">
        {{ __('names.hello').', '.Auth::user()->name }}
    </li>
    <li>
        <a class="dropdown-item" href="{{ url('/user/userprofile') }}"
           style="color: {{ request()->is('user/userprofile*') ? '#0e9f6e' : '' }}">
            {{__('menu.profile')}}
        </a>
    </li>
    <li>
        <a class="dropdown-item" href="{{ url('/user/rootorders') }}"
           style="color: {{ request()->is('user/rootorders*') ? '#0e9f6e' : '' }}">
            {{__('menu.orders')}}
        </a>
    </li>
    <li>
        <a class="dropdown-item" href="{{ url('/user/rootoreturns') }}"
           style="color: {{ request()->is('user/rootoreturns*') ? '#0e9f6e' : '' }}">
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
