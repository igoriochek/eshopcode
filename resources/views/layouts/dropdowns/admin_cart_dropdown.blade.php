<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/carts*') ? 'active' : '' }}" href="/admin/carts">
        <i class="far fa-circle nav-icon"></i>
        <p>{{__('menu.carts')}}</p>
    </a>
</li>
{{--<a class="dropdown-item" href="/admin/cartItems">Cart Items</a>&nbsp;&nbsp;--}}
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/cartStatuses*') ? 'active' : '' }}" href="/admin/cartStatuses">
        <i class="far fa-circle nav-icon"></i>
        <p>{{ __('menu.cartStatuses') }}</p>
    </a>
</li>

<style>
    .far {
        margin-left: 20px !important;
    }
</style>