<li class="admin-navbar-item">
    <a class="admin-navbar-link fs-5 {{ request()->is('admin/products') ? 'active' : '' }}" href="/admin/products">
        <div>
            <i class="fa-solid fa-grip fs-5 ms-0"></i>
            {{ __('menu.products') }}
        </div>
    </a>
</li>
<li class="admin-navbar-item">
    <a class="admin-navbar-link fs-5 {{ request()->is('admin/categories') ? 'active' : '' }}" href="/admin/categories">
        <div>
            <i class="fa-solid fa-sitemap fs-5 ms-0"></i>
            {{ __('menu.categories') }}
        </div>
    </a>
</li>
<li class="admin-navbar-item">
    <a class="admin-navbar-link fs-5 {{ request()->is('admin/promotions') ? 'active' : '' }}" href="/admin/promotions">
        <div>
            <i class="fa-solid fa-star fs-5 ms-0"></i>
            {{ __('menu.promotions') }}
        </div>
    </a>
</li>
<li class="admin-navbar-item">
    <a class="admin-navbar-link dropdown fs-5 {{
        request()->is('admin/discounts') ||
        request()->is('admin/discountCoupons')
        ? 'active' : '' }}" href="#"
            data-bs-toggle="collapse" data-bs-target="#discounts" aria-expanded="false">
        <div>
            <i class="fa-solid fa-tag fs-5 ms-0"></i>
            {{ __('menu.discounts') }}
        </div>
        <i class="fa-solid fa-angle-right"></i>
    </a>
    <div class="collapse" id="discounts">
        <ul class="admin-navbar-item-dropdown">
            @include('layouts.dropdowns.admin_discount_dropdown')
        </ul>
    </div>
</li>
<li class="admin-navbar-item">
    <a class="admin-navbar-link fs-5 {{ request()->is('admin/customers') ? 'active' : '' }}" href="/admin/customers">
        <div>
            <i class="fa-solid fa-user fs-5 ms-0"></i>
            {{ __('menu.users') }}
        </div>
    </a>
</li>
<li class="admin-navbar-item">
    <a class="admin-navbar-link dropdown fs-5 {{
            request()->is('admin/carts') ||
            request()->is('admin/cartStatuses')
            ? 'active' : '' }}" href="#"
       data-bs-toggle="collapse" data-bs-target="#carts" aria-expanded="false">
        <div>
            <i class="fa-solid fa-cart-shopping fs-5 ms-0"></i>
            {{ __('menu.carts') }}
        </div>
        <i class="fa-solid fa-angle-right"></i>
    </a>
    <div class="collapse" id="carts">
        <ul class="admin-navbar-item-dropdown">
            @include('layouts.dropdowns.admin_cart_dropdown')
        </ul>
    </div>
</li>
<li class="admin-navbar-item">
    <a class="admin-navbar-link dropdown fs-5 {{
            request()->is('admin/orders') ||
            request()->is('admin/orderStatuses')
            ? 'active' : '' }}" href="#"
       data-bs-toggle="collapse" data-bs-target="#orders" aria-expanded="false">
        <div>
            <i class="fa-solid fa-folder fs-5 ms-0"></i>
            {{ __('menu.orders') }}
        </div>
        <i class="fa-solid fa-angle-right"></i>
    </a>
    <div class="collapse" id="orders">
        <ul class="admin-navbar-item-dropdown">
            @include('layouts.dropdowns.admin_order_dropdown')
        </ul>
    </div>
</li>
<li class="admin-navbar-item">
    <a class="admin-navbar-link dropdown fs-5 {{
            request()->is('admin/returns') ||
            request()->is('admin/returnStatuses')
            ? 'active' : '' }}" href="#"
       data-bs-toggle="collapse" data-bs-target="#returns" aria-expanded="false">
        <div>
            <i class="fa-solid fa-rotate-left fs-5 ms-0"></i>
            {{ __('menu.returns') }}
        </div>
        <i class="fa-solid fa-angle-right"></i>
    </a>
    <div class="collapse" id="returns">
        <ul class="admin-navbar-item-dropdown">
            @include('layouts.dropdowns.admin_return_dropdown')
        </ul>
    </div>
</li>
<li class="admin-navbar-item">
    <a class="admin-navbar-link fs-5 {{ request()->is('admin/cookies') ? 'active' : '' }}" href="/admin/cookies">
        <div>
            <i class="fa-solid fa-cookie-bite fs-5 ms-0"></i>
            {{ __('menu.cookies') }}
        </div>
    </a>
</li>
<li class="admin-navbar-item">
    <a class="admin-navbar-link fs-5 {{ request()->is('admin/data_export_import') ? 'active' : '' }}" href="/admin/data_export_import">
        <div>
            <i class="fa-solid fa-file fs-5 ms-0"></i>
            {{ __('menu.importExport') }}
        </div>
    </a>
</li>
<li class="admin-navbar-item">
    <a class="admin-navbar-link dropdown fs-5 {{
        request()->is('admin/orders_report') ||
        request()->is('admin/returns_report') ||
        request()->is('admin/carts_report') ||
        request()->is('admin/users_report') ||
        request()->is('admin/user_activities_report') ?
        'active' : '' }}" href="#"
            data-bs-toggle="collapse" data-bs-target="#reports" aria-expanded="false">
        <div>
            <i class="fa-solid fa-id-card-clip fs-5 ms-0"></i>
            {{ __('menu.reports') }}
        </div>
        <i class="fa-solid fa-angle-right"></i>
    </a>
    <div class="collapse" id="reports">
        <ul class="admin-navbar-item-dropdown">
            @include('layouts.dropdowns.admin_report_dropdown')
        </ul>
    </div>
</li>
<li class="admin-navbar-item">
    <a class="admin-navbar-link fs-5 {{ request()->is('admin/messenger') ? 'active' : '' }}" href="/admin/messenger">
        <div>
            <i class="fa-solid fa-comment fs-5 ms-0"></i>
            {{ __('menu.messenger') }}
        </div>
    </a>
</li>
