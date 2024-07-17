<ul class="dropdown-menu" aria-labelledby="navbarUserDropdown">
    <li>
        <a href="{{ url('/user/userprofile') }}" class="dropdown-item"
           style="color: {{ request()->is('user/userprofile*') ? '#a10909' : '' }}; font-size: .9rem;">
           {{__('menu.profile')}}
        </a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <a href="{{ route('logout') }}" class="dropdown-item" style="font-size: .9rem;"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               {{ __('menu.logout') }}
            </a>
        </form>
    </li>
</ul>
