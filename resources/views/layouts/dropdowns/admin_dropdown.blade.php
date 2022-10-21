<ul class="dropdown-menu" aria-labelledby="navbarUserDropdown">
    <li>
        <a class="dropdown-item" href="{{ url('/user/userprofile') }}"
           style="{{ request()->is('user/userprofile') ? 'color: #3BB77E' : '' }}; font-size: .9rem;">
            <i class="fi fi-rs-user mr-10"></i>
            {{__('menu.profile')}}
        </a>
    </li>
    <li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <a class="dropdown-item" href="{{ route('logout') }}" style="font-size: .9rem;"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fi fi-rs-sign-out mr-10"></i>
                {{ __('menu.logout') }}
            </a>
        </form>
    </li>
</ul>
