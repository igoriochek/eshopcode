<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink {{ request()->is('admin/returns*') ? 'active' : '' }}" href="/admin/returns">
        {{ __('menu.returns') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink {{ request()->is('admin/returnStatuses*') ? 'active' : '' }}" href="/admin/returnStatuses">
        {{ __('menu.returnStatuses') }}
    </a>
</li>
