<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/orders') ? 'color: #e10000' : '' }}" href="/admin/orders">
        {{ __('menu.orders') }}
    </a>
</li>
{{--<a class="dropdown-item" href="/admin/orderItems">OrderItems</a>&nbsp;&nbsp;--}}
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/orderStatuses') ? 'color: #e10000' : '' }}" href="/admin/orderStatuses">
        {{__('menu.orderStatuses')}}
    </a>
</li>
