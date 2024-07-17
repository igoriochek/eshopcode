<li class="nav-list">
    <a href="{{ url('/user/products') }}" class="{{ request()->is('user/products*') ? 'active' : '' }}">
        {{ __('menu.products') }}
    </a>
</li>
<li class="nav-list">
    <a href="{{ url('/user/rootcategories') }}" class="{{ request()->is('user/rootcategories*') ? 'active' : '' }}">
        {{ __('menu.categories') }}
    </a>
</li>
<li class="nav-list">
    <a href="{{ url('/user/promotions') }}" class="{{ request()->is('user/promotions*') ? 'active' : '' }}">
        {{ __('menu.promotions') }}
    </a>
</li>
<li class="nav-list">
    <a href="{{ url('/user/discountCoupons') }}" class="{{ request()->is('user/discountCoupons*') ? 'active' : '' }}">
        {{ __('menu.discountCoupons') }}
    </a>
</li>
<li class="nav-list">
    <a href="{{ url('/user/messenger') }}" class="{{ request()->is('user/messenger*') ? 'active' : '' }}">
        {{ __('menu.messenger') }}
    </a>
</li>
