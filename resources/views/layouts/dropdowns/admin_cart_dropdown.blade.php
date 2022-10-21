<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/carts') ? 'color: #3BB77E' : '' }}" href="/admin/carts">
        {{__('menu.carts')}}
    </a>
</li>
{{--<a class="dropdown-item" href="/admin/cartItems">Cart Items</a>&nbsp;&nbsp;--}}
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/cartStatuses') ? 'color: #3BB77E' : '' }}" href="/admin/cartStatuses">
        {{ __('menu.cartStatuses') }}
    </a>
</li>
