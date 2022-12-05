<li class="header__menu--items">
    <a class="header__menu--link text-center {{ request()->is('products*') ? 'active' : '' }}"
       href="{{ url('/products') }}">
        {{ __('menu.products') }}
    </a>
</li>
<li class="header__menu--items">
    <a class="header__menu--link text-center {{ request()->is('rootcategories*') ? 'active' : '' }}"
       href="{{ url('/rootcategories') }}">
        {{ __('menu.categories') }}
    </a>
</li>
<li class="header__menu--items">
    <a class="header__menu--link text-center {{ request()->is('promotions*') ? 'active' : '' }}"
       href="{{ url('/promotions') }}">
        {{ __('menu.promotions') }}
    </a>
</li>
<li class="header__menu--items">
    <a class="header__menu--link text-center {{ request()->is('discountCoupons*') ? 'active' : '' }}"
       href="{{ url("/{$role}/discountCoupons") }}">
        {{ __('menu.discountCoupons') }}
    </a>
</li>
<li class="header__menu--items">
    <a class="header__menu--link text-center {{ request()->is('messenger*') ? 'active' : '' }}"
       href="{{ url("/{$role}/messenger") }}">
        {{ __('menu.messenger') }}
    </a>
</li>
<li class="header__menu--items">
    <a class="header__menu--link text-center {{ request()->is('about') ? 'active' : '' }}"
       href="{{ url('/about') }}">
        @if (app()->getLocale() == 'lt')
            <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projekts" width="80" style="border-radius: 10px">
        @else
            <img src="{{ asset('images/eu_projects.jpeg') }}" alt="eu_projects" width="100" style="border-radius: 10px">
        @endif
    </a>
</li>

