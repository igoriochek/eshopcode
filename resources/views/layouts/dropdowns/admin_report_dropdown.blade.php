<li class="dropdown-submenu">
    <a class="dropdown-item" href="/admin/orders_report" style="color: {{ request()->is('admin/orders_report*') ? '#0088CC' : '' }}">
        {{ __('menu.ordersReport') }}
    </a>
</li>
<li class="dropdown-submenu">
    <a class="dropdown-item" href="/admin/returns_report" style="color: {{ request()->is('admin/returns_report*') ? '#0088CC' : '' }}">
        {{ __('menu.returnsReport') }}
    </a>
</li>
<li class="dropdown-submenu">
    <a class="dropdown-item" href="/admin/carts_report" style="color: {{ request()->is('admin/carts_report*') ? '#0088CC' : '' }}">
        {{ __('menu.cartsReport') }}
    </a>
</li>
<li class="dropdown-submenu">
    <a class="dropdown-item" href="/admin/users_report" style="color: {{ request()->is('admin/users_report*') ? '#0088CC' : '' }}">
        {{ __('menu.usersReport') }}
    </a>
</li>
<li class="dropdown-submenu">
    <a class="dropdown-item" href="/admin/user_activities_report" style="color: {{ request()->is('admin/user_activities_report*') ? '#0088CC' : '' }}">
        {{ __('menu.usersActivitiesReport') }}
    </a>
</li>
