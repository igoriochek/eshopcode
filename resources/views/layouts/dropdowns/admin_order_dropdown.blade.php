<li>
    <a class="{{ request()->is('admin/orders*') ? 'active' : '' }}" href="/admin/orders">
        {{ __('menu.orders') }}
    </a>
</li>
{{--<a class="dropdown-item" href="/admin/orderItems">OrderItems</a>&nbsp;&nbsp;--}}
<li>
    <a class="{{ request()->is('admin/orderStatuses*') ? 'active' : '' }}" href="/admin/orderStatuses">
        {{__('menu.orderStatuses')}}
    </a>
</li>
