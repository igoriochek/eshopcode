<li>
    <a class="{{ request()->is('admin/carts*') ? 'active' : '' }}" href="/admin/carts">
        {{__('menu.carts')}}
    </a>
</li>
{{--<a class="dropdown-item" href="/admin/cartItems">Cart Items</a>&nbsp;&nbsp;--}}
<li>
    <a class="{{ request()->is('admin/cartStatuses*') ? 'active' : '' }}" href="/admin/cartStatuses">
        {{ __('menu.cartStatuses') }}
    </a>
</li>
