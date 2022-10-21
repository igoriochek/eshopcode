<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/discounts') ? 'color: #3BB77E' : '' }}" href="/admin/discounts">
        {{ __('menu.discounts') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/discountCoupons*') ? 'color: #3BB77E' : '' }}" href="/admin/discountCoupons">
        {{ __('menu.discountCoupons') }}
    </a>
</li>
