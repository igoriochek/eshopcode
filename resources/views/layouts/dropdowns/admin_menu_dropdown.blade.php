<li>
    <a class="dropdown-item {{ request()->is('admin/categories*') ? 'active' : '' }}" href="/admin/categories">
        {{ __('menu.categories') }}
    </a>
</li>
<li>
    <a class="dropdown-item {{ request()->is('admin/products*') ? 'active' : '' }}" href="/admin/products">
        {{ __('menu.products') }}
    </a>
</li>
<li>
    <a class="dropdown-item {{ request()->is('admin/carts*') ? 'active' : '' }}" href="/admin/carts">
        {{__('menu.carts')}}
    </a>
</li>
{{--<a class="dropdown-item" href="/admin/cartItems">Cart Items</a>&nbsp;&nbsp;--}}
<li>
    <a class="dropdown-item {{ request()->is('admin/cartStatuses*') ? 'active' : '' }}" href="/admin/cartStatuses">
        {{ __('menu.cartStatuses') }}
    </a>
</li>
<li>
    <a class="dropdown-item {{ request()->is('admin/discounts*') ? 'active' : '' }}" href="/admin/discounts">
        {{ __('menu.discounts') }}
    </a>
</li>
<li>
    <a class="dropdown-item {{ request()->is('admin/discountCoupons*') ? 'active' : '' }}" href="/admin/discountCoupons">
        {{ __('menu.discountCoupons') }}
    </a>
</li>
<li>
    <a class="dropdown-item {{ request()->is('admin/orders*') ? 'active' : '' }}" href="/admin/orders">
        {{ __('menu.orders') }}
    </a>
</li>
{{--<a class="dropdown-item" href="/admin/orderItems">OrderItems</a>&nbsp;&nbsp;--}}
<li>
    <a class="dropdown-item {{ request()->is('admin/orderStatuses*') ? 'active' : '' }}" href="/admin/orderStatuses">
        {{__('menu.orderStatuses')}}
    </a>
</li>
<li>
    <a class="dropdown-item {{ request()->is('admin/returns*') ? 'active' : '' }}" href="/admin/returns">
        {{ __('menu.returns') }}
    </a>
</li>
<li>
    <a class="dropdown-item {{ request()->is('admin/returnStatuses*') ? 'active' : '' }}" href="/admin/returnStatuses">
        {{ __('menu.returnStatuses') }}
    </a>
</li>
<li>
    <a class="dropdown-item {{ request()->is('admin/promotions*') ? 'active' : '' }}" href="/admin/promotions">
        {{ __('menu.promotions') }}
    </a>
</li>
<li>
    <a class="dropdown-item {{ request()->is('admin/customers*') ? 'active' : '' }}" href="/admin/customers">
        {{ __('menu.users') }}
    </a>
</li>
<li>
    <a class="dropdown-item {{ request()->is('admin/messenger*') ? 'active' : '' }}" href="/admin/messenger">
        {{ __('menu.messenger') }}
    </a>
</li>
<li>
    <a class="dropdown-item {{ request()->is('admin/cookies*') ? 'active' : '' }}" href="/admin/cookies">
        {{ __('menu.cookies') }}
    </a>
</li>
<li>
    <a class="dropdown-item {{ request()->is('admin/data_export_import*') ? 'active' : '' }}" href="/admin/data_export_import">
        {{ __('menu.importExport') }}
    </a>
</li>
