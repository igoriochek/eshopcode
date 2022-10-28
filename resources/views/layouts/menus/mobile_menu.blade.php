<ul class="offcanvas__menu_ul">
    <li class="offcanvas__menu_li">
        <a class="offcanvas__menu_item {{ request()->is('products*') ? 'active' : '' }}"
           href="{{ url('/products') }}">
            {{ __('menu.products') }}
        </a>
    </li>
    <li class="offcanvas__menu_li">
        <a class="offcanvas__menu_item {{ request()->is('rootcategories*') ? 'active' : '' }}"
           href="{{ url('/rootcategories') }}">
            {{ __('menu.categories') }}
        </a>
    </li>
    <li class="offcanvas__menu_li">
        <a class="offcanvas__menu_item {{ request()->is('promotions*') ? 'active' : '' }}"
           href="{{ url('/promotions') }}">
            {{ __('menu.promotions') }}
        </a>
    </li>
    <li class="offcanvas__menu_li">
        <a class="offcanvas__menu_item {{ request()->is('user/discountCoupons*') ? 'active' : '' }}"
           href="{{ url('/user/discountCoupons') }}">
            {{ __('menu.discountCoupons') }}
        </a>
    </li>
    <li class="offcanvas__menu_li">
        <a class="offcanvas__menu_item {{ request()->is('user/messenger*') ? 'active' : '' }}"
           href="{{ url('/user/messenger') }}">
            {{ __('menu.messenger') }}
        </a>
    </li>
</ul>
