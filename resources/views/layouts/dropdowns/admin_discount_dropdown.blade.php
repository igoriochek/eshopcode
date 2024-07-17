<li class="admin-navbar-subitem">
    <a href="/admin/discounts" class="admin-navbar-sublink {{ request()->is('admin/discounts*') ? 'subactive' : '' }}">
        {{ __('menu.discounts') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a href="/admin/discountCoupons" class="admin-navbar-sublink {{ request()->is('admin/discountCoupons*') ? 'subactive' : '' }}">
        {{ __('menu.discountCoupons') }}
    </a>
</li>
