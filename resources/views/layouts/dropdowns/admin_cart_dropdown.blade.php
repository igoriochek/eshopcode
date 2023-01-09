<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/carts') ? 'color: #e10000' : '' }}" href="/admin/carts">
        {{__('menu.carts')}}
    </a>
</li>
{{--<a class="dropdown-item" href="/admin/cartItems">Cart Items</a>&nbsp;&nbsp;--}}
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/cartStatuses') ? 'color: #e10000' : '' }}" href="/admin/cartStatuses">
        {{ __('menu.cartStatuses') }}
    </a>
</li>
