<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink {{ request()->is('admin/carts*') ? 'active' : '' }}" href="/admin/carts">
        {{__('menu.carts')}}
    </a>
</li>
{{--<a class="dropdown-item" href="/admin/cartItems">Cart Items</a>&nbsp;&nbsp;--}}
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink {{ request()->is('admin/cartStatuses*') ? 'active' : '' }}" href="/admin/cartStatuses">
        {{ __('menu.cartStatuses') }}
    </a>
</li>
