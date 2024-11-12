<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/orders*') ? 'active' : '' }}" href="/admin/orders">
        <i class="far fa-circle nav-icon"></i>
        <p>{{ __('menu.orders') }}</p>
    </a>
</li>
{{--<a class="dropdown-item" href="/admin/orderItems">OrderItems</a>&nbsp;&nbsp;--}}
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/orderStatuses*') ? 'active' : '' }}" href="/admin/orderStatuses">
        <i class="far fa-circle nav-icon"></i>
        <p>{{__('menu.orderStatuses')}}</p>
    </a>
</li>

<style>
    .far {
        margin-left: 40px !important;
    }
</style>