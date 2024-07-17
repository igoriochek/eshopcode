<li class="admin-navbar-subitem">
    <a href="/admin/returns" class="admin-navbar-sublink {{ request()->is('admin/returns*') ? 'active' : '' }}">
        {{ __('menu.returns') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a href="/admin/returnStatuses" class="admin-navbar-sublink {{ request()->is('admin/returnStatuses*') ? 'active' : '' }}">
        {{ __('menu.returnStatuses') }}
    </a>
</li>
