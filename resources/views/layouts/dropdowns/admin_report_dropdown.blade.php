<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/orders_report') ? 'color: #3BB77E' : '' }}"
       href="/admin/orders_report">
        {{ __('menu.ordersReport') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/returns_report') ? 'color: #3BB77E' : '' }}"
       href="/admin/returns_report">
        {{ __('menu.returnsReport') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/carts_report') ? 'color: #3BB77E' : '' }}"
       href="/admin/carts_report">
        {{ __('menu.cartsReport') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/users_report') ? 'color: #3BB77E' : '' }}"
       href="/admin/users_report">
        {{ __('menu.usersReport') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/users_activities_report') ? 'color: #3BB77E' : '' }}"
       href="/admin/user_activities_report">
        {{ __('menu.usersActivitiesReport') }}
    </a>
</li>
