<li>
    <a class="{{ request()->is('admin/discounts*') ? 'subactive' : '' }}" href="/admin/discounts">
        {{ __('menu.discounts') }}
    </a>
</li>
<li>
    <a class="{{ request()->is('admin/discountCoupons*') ? 'subactive' : '' }}" href="/admin/discountCoupons">
        {{ __('menu.discountCoupons') }}
    </a>
</li>