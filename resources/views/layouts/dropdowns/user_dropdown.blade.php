<li>
    <a href="{{ url('/user/userprofile') }}"
       style="{{ request()->is('user/userprofile') ? 'color: #3BB77E' : '' }}">
        <i class="fi fi-rs-user mr-10"></i>{{__('menu.profile')}}
    </a>
</li>
<li>
    <a href="{{ url('/user/rootorders') }}"
       style="{{ request()->is('user/rootorders') ? 'color: #3BB77E' : '' }}">
        <i class="fi fi-rs-check mr-10"></i>{{__('menu.orders')}}
    </a>
</li>
<li>
    <a href="{{ url('/user/rootoreturns') }}"
       style="{{ request()->is('user/rootoreturnsç*') ? 'color: #3BB77E' : '' }}">
        <i class="fi fi-rs-arrow-left mr-10"></i>{{__('menu.returns')}}
    </a>
</li>
<li>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fi fi-rs-sign-out mr-10"></i>{{ __('menu.logout') }}
        </a>
    </form>
</li>
