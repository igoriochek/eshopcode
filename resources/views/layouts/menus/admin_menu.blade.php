<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/products*') ? 'active' : '' }}" href="/admin/products">
        <i class="fa-solid fa-grip"></i>
        <p>
            {{ __('menu.products') }}
        </p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link  {{ request()->is('admin/categories*') ? 'active' : '' }}" href="/admin/categories">
        <i class="fa-solid fa-sitemap"></i>
        <p>
            {{ __('menu.categories') }}
        </p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link  {{ request()->is('admin/promotions*') ? 'active' : '' }}" href="/admin/promotions">
        <i class="fa-solid fa-star"></i>
        <p>
            {{ __('menu.promotions') }}
        </p>
    </a>
</li>
<li
    class="nav-item {{ request()->is('admin/discounts*') || request()->is('admin/discountCoupons*')
        ? 'menu-is-opening menu-open'
        : '' }}">
    <a class="nav-link {{ request()->is('admin/discounts*') || request()->is('admin/discountCoupons*') ? 'active' : '' }}"
        href="#" data-bs-toggle="collapse" data-bs-target="#discounts" aria-expanded="false">
        <i class="fa-solid fa-tag"></i>
        <p>
            {{ __('menu.discounts') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @include('layouts.dropdowns.admin_discount_dropdown')
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link  {{ request()->is('admin/customers*') ? 'active' : '' }}" href="/admin/customers">
        <i class="fa-solid fa-user"></i>
        <p>
            {{ __('menu.users') }}
        </p>
    </a>
</li>
<li
    class="nav-item {{ request()->is('admin/carts*') || request()->is('admin/cartStatuses*') ? 'menu-is-opening menu-open' : '' }}">
    <a class="nav-link {{ request()->is('admin/carts*') || request()->is('admin/cartStatuses*') ? 'active' : '' }}"
        href="#" data-bs-toggle="collapse" data-bs-target="#carts" aria-expanded="false">
        <i class="fa-solid fa-cart-shopping"></i>
        <p>
            {{ __('menu.carts') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @include('layouts.dropdowns.admin_cart_dropdown')
    </ul>
</li>
<li
    class="nav-item {{ request()->is('admin/orders*') || request()->is('admin/orderStatuses*') ? 'menu-is-opening menu-open' : '' }}">
    <a class="nav-link {{ request()->is('admin/orders*') || request()->is('admin/orderStatuses*') ? 'active' : '' }}"
        href="#" data-bs-toggle="collapse" data-bs-target="#orders" aria-expanded="false">
        <i class="fa-solid fa-folder"></i>
        <p>
            {{ __('menu.orders') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @include('layouts.dropdowns.admin_order_dropdown')
    </ul>
</li>
<li
    class="nav-item {{ request()->is('admin/returns*') || request()->is('admin/returnStatuses*') ? 'menu-is-opening menu-open' : '' }}">
    <a class="nav-link {{ request()->is('admin/returns*') || request()->is('admin/returnStatuses*') ? 'active' : '' }}"
        href="#" data-bs-toggle="collapse" data-bs-target="#returns" aria-expanded="false">
        <i class="fa-solid fa-rotate-left"></i>
        <p>
            {{ __('menu.returns') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @include('layouts.dropdowns.admin_return_dropdown')
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/cookies*') ? 'active' : '' }}" href="/admin/cookies">
        <i class="fa-solid fa-cookie-bite"></i>
        <p>
            {{ __('menu.cookies') }}
        </p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/data_export_import*') ? 'active' : '' }}"
        href="/admin/data_export_import">
        <i class="fa-solid fa-file"></i>
        <p>
            {{ __('menu.importExport') }}
        </p>
    </a>
</li>
<li
    class="nav-item {{ request()->is('admin/orders_report') ||
    request()->is('admin/returns_report') ||
    request()->is('admin/carts_report') ||
    request()->is('admin/users_report') ||
    request()->is('admin/user_activities_report')
        ? 'menu-is-opening menu-open'
        : '' }}">
    <a class="nav-link {{ request()->is('admin/orders_report') ||
    request()->is('admin/returns_report') ||
    request()->is('admin/carts_report') ||
    request()->is('admin/users_report') ||
    request()->is('admin/user_activities_report')
        ? 'active'
        : '' }}"
        href="#" data-bs-toggle="collapse" data-bs-target="#reports" aria-expanded="false">
        <i class="fa-solid fa-id-card-clip"></i>
        <p>
            {{ __('menu.reports') }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @include('layouts.dropdowns.admin_report_dropdown')
    </ul>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/statistics*') ? 'active' : '' }}" href="/admin/statistics">
        <i class="fa-solid fa-chart-simple"></i>
        <p>
            {{ __('menu.statistics') }}
        </p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/logs*') ? 'active' : '' }}" href="/admin/logs">
        <i class="fa-regular fa-rectangle-list ms-3"></i>
        <p>
            {{ __('names.userLogs') }}
        </p>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->is('admin/messenger*') ? 'active' : '' }}" href="/admin/messenger">
        <i class="fa-solid fa-comment"></i>
        <p>
            {{ __('menu.messenger') }}
        </p>
    </a>
</li>

<style>
    .fa-solid {
        margin-left: 12px;
    }

    .item {
        padding: 9px 10px 9px 35px;
        width: 100%;
    }

    .dropdown-item {
        padding: 0px 0px 0px 45px;
    }

    .dropdown-item:hover {
        background-color: white !important;
    }

    .sidebar ul .nav-link {
        font-size: 1.6rem;
        line-height: 20px;
    }
</style>
