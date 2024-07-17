<li class="nav-list">
    <a href="{{ url('/products') }}" class="{{ request()->is('products*') ? 'active' : '' }}">
        {{ __('menu.products') }}
    </a>
</li>
<li class="nav-list">
    <a href="{{ url('/rootcategories') }}" class="{{ request()->is('rootcategories*') ? 'active' : '' }}">
        {{ __('menu.categories') }}
    </a>
</li>
<li class="nav-list">
    <a href="{{ url('/promotions') }}" class="{{ request()->is('promotions*') ? 'active' : '' }}">
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

{{--<li class="nav-list">--}}
{{--    <a href="{{ url('/termsofservice') }}" class="{{ request()->is('user/termsofservice*') ? 'active' : '' }}">--}}
{{--        {{ __('menu.termsofservice') }}--}}
{{--    </a>--}}
{{--</li>--}}
{{--<li class="nav-list">--}}
{{--    <a href="{{ url('/policy') }}" class="{{ request()->is('user/policy*') ? 'active' : '' }}">--}}
{{--        {{ __('menu.policy') }}--}}
{{--    </a>--}}
{{--</li>--}}

