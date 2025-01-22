<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/orders_report*') ? 'active' : '' }}" href="/admin/orders_report">
        <i class="far fa-circle nav-icon"></i>
        <p>{{ __('menu.ordersReport') }}</p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/returns_report*') ? 'active' : '' }}" href="/admin/returns_report">
        <i class="far fa-circle nav-icon"></i>
        <p>{{ __('menu.returnsReport') }}</p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/carts_report*') ? 'active' : '' }}" href="/admin/carts_report">
        <i class="far fa-circle nav-icon"></i>
        <p>{{ __('menu.cartsReport') }}</p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/users_report*') ? 'active' : '' }}" href="/admin/users_report">
        <i class="far fa-circle nav-icon"></i>
        <p>{{ __('menu.usersReport') }}</p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/user_activities_report*') ? 'active' : '' }}" href="/admin/user_activities_report">
        <i class="far fa-circle nav-icon"></i>
        <p>{{ __('menu.usersActivitiesReport') }}</p>
    </a>
</li>

<style>
    .far {
        margin-left: 20px !important;
    }
</style>