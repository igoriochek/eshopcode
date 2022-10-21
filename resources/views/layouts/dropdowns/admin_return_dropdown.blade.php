<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/returns') ? 'color: #3BB77E' : '' }}" href="/admin/returns">
        {{ __('menu.returns') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/returnStatuses') ? 'color: #3BB77E' : '' }}" href="/admin/returnStatuses">
        {{ __('menu.returnStatuses') }}
    </a>
</li>
