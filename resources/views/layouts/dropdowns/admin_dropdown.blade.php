<ul class="dropdown-menu" aria-labelledby="navbarUserDropdown">
    <li>
        <a class="dropdown-item" href="{{ url('/user/userprofile') }}"
           style="color: {{ request()->is('user/userprofile*') ? '#a10909' : '' }}; font-size: 1.5rem;">
            {{__('menu.profile')}}
        </a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <a class="dropdown-item" href="{{ route('logout') }}" style="font-size: 1.5rem;"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('menu.logout') }}
            </a>
        </form>
    </li>
</ul>
