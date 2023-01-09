<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/orders_report') ? 'color: #e10000' : '' }}"
       href="/admin/orders_report">
        {{ __('menu.ordersReport') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/returns_report') ? 'color: #e10000' : '' }}"
       href="/admin/returns_report">
        {{ __('menu.returnsReport') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/carts_report') ? 'color: #e10000' : '' }}"
       href="/admin/carts_report">
        {{ __('menu.cartsReport') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/users_report') ? 'color: #e10000' : '' }}"
       href="/admin/users_report">
        {{ __('menu.usersReport') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/users_activities_report') ? 'color: #e10000' : '' }}"
       href="/admin/user_activities_report">
        {{ __('menu.usersActivitiesReport') }}
    </a>
</li>
