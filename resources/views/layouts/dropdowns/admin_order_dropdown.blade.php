<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/orders') ? 'color: #3BB77E' : '' }}" href="/admin/orders">
        {{ __('menu.orders') }}
    </a>
</li>
{{--<a class="dropdown-item" href="/admin/orderItems">OrderItems</a>&nbsp;&nbsp;--}}
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/orderStatuses') ? 'color: #3BB77E' : '' }}" href="/admin/orderStatuses">
        {{__('menu.orderStatuses')}}
    </a>
</li>
