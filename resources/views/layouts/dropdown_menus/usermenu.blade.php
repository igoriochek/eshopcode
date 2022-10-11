<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{url('/user/viewcart')}}">
        <img alt="cart-icon" src="{{asset('/images/theme/icons/icon-cart.svg')}}"/>
        @if (!empty($cartItemCount))
            <span class="pro-count blue">{{ $cartItemCount }}</span>
        @endif
    </a>
    <a href="{{url('/user/viewcart')}}">
        <span class="label fs-6 ms-2">
            {{ __('names.cart') }}
        </span>
    </a>
</div>
<div class="header-action-icon-2">
    <a>
        <img class="svgInject" alt="Nest" src="{{asset('/images/theme/icons/icon-user.svg')}}"/>
        <a href="{{ url('/user/userprofile') }}">
            <span class="label fs-6 ms-2">{{ Auth::user()->name }}</span>
        </a>
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
        <ul>
            <li>
                {{ Auth::user()->name }}
            </li>
            <li>
                <a href="{{ url('/user/userprofile') }}"
                   style="color: {{ request()->is('user/userprofile*') ? '#3BB77E' : '' }}">
                    <i class="fi fi-rs-user mr-10"></i>{{__('menu.profile')}}
                </a>
            </li>
            <li>
                <a href="{{ url('/user/rootorders') }}"
                   style="color: {{ request()->is('user/rootorders*') ? '#3BB77E' : '' }}">
                    <i class="fi fi-rs-check mr-10"></i>{{__('menu.orders')}}
                </a>
            </li>
            <li>
                <a href="{{ url('/user/rootoreturns') }}"
                   style="color: {{ request()->is('user/rootoreturnsç*') ? '#3BB77E' : '' }}">
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
        </ul>
    </div>
</div>
