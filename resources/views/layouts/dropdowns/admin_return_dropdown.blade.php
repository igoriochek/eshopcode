<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/returns') ? 'color: #e10000' : '' }}" href="/admin/returns">
        {{ __('menu.returns') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/returnStatuses') ? 'color: #e10000' : '' }}" href="/admin/returnStatuses">
        {{ __('menu.returnStatuses') }}
    </a>
</li>
