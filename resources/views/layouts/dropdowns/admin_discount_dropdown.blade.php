<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/discounts*') ? 'active' : '' }}" href="/admin/discounts">
        <i class="far fa-circle nav-icon"></i>
        <p>{{ __('menu.discounts') }}</p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/discountCoupons*') ? 'active' : '' }}" href="/admin/discountCoupons">
        <i class="far fa-circle nav-icon"></i>
        <p>{{ __('menu.discountCoupons') }}</p>
    </a>
</li>

<style>
    .far {
        margin-left: 20px !important;
    }
</style>