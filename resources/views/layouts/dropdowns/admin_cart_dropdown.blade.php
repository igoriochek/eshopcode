<li class="admin-navbar-subitem">
    <a href="/admin/carts" class="admin-navbar-sublink {{ request()->is('admin/carts*') ? 'active' : '' }}">
        {{__('menu.carts')}}
    </a>
</li>
{{--<a href="/admin/cartItems" class="dropdown-item">Cart Items</a>&nbsp;&nbsp;--}}
<li class="admin-navbar-subitem">
    <a href="/admin/cartStatuses" class="admin-navbar-sublink {{ request()->is('admin/cartStatuses*') ? 'active' : '' }}">
        {{ __('menu.cartStatuses') }}
    </a>
</li>
