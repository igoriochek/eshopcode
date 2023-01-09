<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/discounts') ? 'color: #e10000' : '' }}" href="/admin/discounts">
        {{ __('menu.discounts') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/discountCoupons*') ? 'color: #e10000' : '' }}" href="/admin/discountCoupons">
        {{ __('menu.discountCoupons') }}
    </a>
</li>
