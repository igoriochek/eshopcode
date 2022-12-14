<li class="nav-list @if (app()->getLocale() == 'lt') mt-0 mt-lg-2 @endif">
    <a class="{{ request()->is('products*') || request()->is('viewproduct*') ? 'active' : '' }}" href="{{ url('/products') }}">
        {{ __('menu.products') }}
    </a>
</li>
<li class="nav-list @if (app()->getLocale() == 'lt') mt-0 mt-lg-2 @endif">
    <a class="{{ request()->is('rootcategories*') || request()->is('innercategories*') ? 'active' : '' }}" href="{{ url('/rootcategories') }}">
        {{ __('menu.categories') }}
    </a>
</li>
<li class="nav-list @if (app()->getLocale() == 'lt') mt-0 mt-lg-2 @endif">
    <a class="{{ request()->is('promotions*') || request()->is('promotion*') ? 'active' : '' }}" href="{{ url('/promotions') }}">
        {{ __('menu.promotions') }}
    </a>
</li>
<li class="nav-list @if (app()->getLocale() == 'lt') mt-0 mt-lg-2 @endif">
    <a class="{{ request()->is('user/discountCoupons') ? 'active' : '' }}" href="{{ url('/user/discountCoupons') }}">
        {{ __('menu.discountCoupons') }}
    </a>
</li>
<li class="nav-list @if (app()->getLocale() == 'lt') mt-0 mt-lg-2 @endif">
    <a class="{{ request()->is('user/messenger*') ? 'active' : '' }}" href="{{ url('/user/messenger') }}">
        {{ __('menu.messenger') }}
    </a>
</li>
<li class="nav-list px-2 py-2 py-lg-0">
    <a class="{{ request()->is('eu_projects') ? 'active' : '' }}" href="{{ url('/eu_projects') }}">
        @if (app()->getLocale() == 'lt')
            <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" width="100">
        @else
            <img src="{{ asset('images/eu_projects.jpeg') }}" alt="eu_projects" width="95">
        @endif
    </a>
</li>

