<li class="admin-navbar-subitem">
    <a href="/admin/orders" class="admin-navbar-sublink {{ request()->is('admin/orders*') ? 'active' : '' }}">
        {{ __('menu.orders') }}
    </a>
</li>
{{--<a href="/admin/orderItems" class="dropdown-item">OrderItems</a>&nbsp;&nbsp;--}}
<li class="admin-navbar-subitem">
    <a href="/admin/orderStatuses" class="admin-navbar-sublink {{ request()->is('admin/orderStatuses*') ? 'active' : '' }}">
        {{__('menu.orderStatuses')}}
    </a>
</li>
