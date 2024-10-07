<li>
    <a class="{{ request()->is('admin/returns*') ? 'active' : '' }}" href="/admin/returns">
        {{ __('menu.returns') }}
    </a>
</li>
<li>
    <a class="{{ request()->is('admin/returnStatuses*') ? 'active' : '' }}" href="/admin/returnStatuses">
        {{ __('menu.returnStatuses') }}
    </a>
</li>
