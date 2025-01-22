<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/returns*') ? 'active' : '' }}" href="/admin/returns">
        <i class="far fa-circle nav-icon"></i>
        <p>{{ __('menu.returns') }}</p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/returnStatuses*') ? 'active' : '' }}" href="/admin/returnStatuses">
        <i class="far fa-circle nav-icon"></i>
        <p>{{ __('menu.returnStatuses') }}</p>
    </a>
</li>

<style>
    .far {
        margin-left: 20px !important;
    }
</style>