
    <a class="item {{ request()->is('admin/products*') ? 'active' : '' }}" href="/admin/products">
        <i class="fa-solid fa-grip"></i>
        {{ __('menu.products') }}
    </a>

    <a class="item {{ request()->is('admin/categories*') ? 'active' : '' }}" href="/admin/categories">
        <i class="fa-solid fa-sitemap"></i>
        {{ __('menu.categories') }}
    </a>

    <a class="item {{ request()->is('admin/promotions*') ? 'active' : '' }}" href="/admin/promotions">
        <i class="fa-solid fa-star"></i>
        {{ __('menu.promotions') }}
    </a>

    <a class="item dropdown {{
        request()->is('admin/discounts*') ||
        request()->is('admin/discountCoupons*')
        ? 'active' : '' }}" href="#"
            data-bs-toggle="collapse" data-bs-target="#discounts" aria-expanded="false">
        <i class="fa-solid fa-tag"></i>
        {{ __('menu.discounts') }} >
    </a>
    <div class="dropdown-item collapse" id="discounts">
        <ul>
            @include('layouts.dropdowns.admin_discount_dropdown')
        </ul>
    </div>

    <a class="item dropdown {{ request()->is('admin/customers*') ? 'active' : '' }}" href="/admin/customers">
        <i class="fa-solid fa-user"></i>
        {{ __('menu.users') }}
    </a>

    <a class="item dropdown {{
            request()->is('admin/carts*') ||
            request()->is('admin/cartStatuses*')
            ? 'active' : '' }}" href="#"
       data-bs-toggle="collapse" data-bs-target="#carts" aria-expanded="false">
        <i class="fa-solid fa-cart-shopping"></i>
        {{ __('menu.carts') }} >
    </a>
    <div class="dropdown-item collapse" id="carts">
        <ul class="">
            @include('layouts.dropdowns.admin_cart_dropdown')
        </ul>
    </div>
    <a class="item dropdown {{
            request()->is('admin/orders*') ||
            request()->is('admin/orderStatuses*')
            ? 'active' : '' }}" href="#"
       data-bs-toggle="collapse" data-bs-target="#orders" aria-expanded="false">
        <i class="fa-solid fa-folder"></i>
        {{ __('menu.orders') }} >
    </a>
    <div class="dropdown-item collapse" id="orders">
        <ul class="">
            @include('layouts.dropdowns.admin_order_dropdown')
        </ul>
    </div>

    <a class="item dropdown {{
            request()->is('admin/returns*') ||
            request()->is('admin/returnStatuses*')
            ? 'active' : '' }}" href="#"
       data-bs-toggle="collapse" data-bs-target="#returns" aria-expanded="false">
        <i class="fa-solid fa-rotate-left"></i>
        {{ __('menu.returns') }} >
    </a>
    <div class="dropdown-item collapse" id="returns">
        <ul class="">
            @include('layouts.dropdowns.admin_return_dropdown')
        </ul>
    </div>

    <a class="item {{ request()->is('admin/cookies*') ? 'active' : '' }}" href="/admin/cookies">
        <i class="fa-solid fa-cookie-bite"></i>
        {{ __('menu.cookies') }}
    </a>
    <a class="item {{ request()->is('admin/data_export_import*') ? 'active' : '' }}" href="/admin/data_export_import">
        <i class="fa-solid fa-file"></i>
        {{ __('menu.importExport') }}
    </a>

    <a class="item dropdown {{
        request()->is('admin/orders_report') ||
        request()->is('admin/returns_report') ||
        request()->is('admin/carts_report') ||
        request()->is('admin/users_report') ||
        request()->is('admin/user_activities_report') ?
        'active' : '' }}" href="#"
            data-bs-toggle="collapse" data-bs-target="#reports" aria-expanded="false">
        <i class="fa-solid fa-id-card-clip"></i>
        {{ __('menu.reports') }} >
    </a>
    <div class="dropdown-item collapse" id="reports">
        <ul class="">
            @include('layouts.dropdowns.admin_report_dropdown')
        </ul>
    </div>

    <a class="item {{ request()->is('admin/messenger*') ? 'active' : '' }}" href="/admin/messenger">
        <i class="fa-solid fa-comment"></i>
        {{ __('menu.messenger') }}
    </a>

    <style>
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

    </style>