<li class="offcanvas__menu_li">
    <a class="offcanvas__menu_item {{ request()->is('admin/products') ? 'active' : '' }}" href="/admin/products">
        <div>
            <i class="fa-solid fa-grip me-3"></i>
            {{ __('menu.products') }}
        </div>
    </a>
</li>
<li class="offcanvas__menu_li">
    <a class="offcanvas__menu_item {{ request()->is('admin/categories') ? 'active' : '' }}" href="/admin/categories">
        <div>
            <i class="fa-solid fa-sitemap me-2"></i>
            {{ __('menu.categories') }}
        </div>
    </a>
</li>
<li class="offcanvas__menu_li">
    <a class="offcanvas__menu_item {{ request()->is('admin/promotions') ? 'active' : '' }}" href="/admin/promotions">
        <div>
            <i class="fa-solid fa-star me-2"></i>
            {{ __('menu.promotions') }}
        </div>
    </a>
</li>
<li class="offcanvas__menu_li">
    <a class="offcanvas__menu_item d-flex justify-content-between dropdown {{
        request()->is('admin/discounts') ||
        request()->is('admin/discountCoupons')
        ? 'active' : '' }}" href="#"
       data-bs-toggle="collapse" data-bs-target="#discounts" aria-expanded="false">
        <div>
            <i class="fa-solid fa-tag ms-1 me-2"></i>
            {{ __('menu.discounts') }}
        </div>
        <i class="fa-solid fa-angle-right"></i>
    </a>
    <div class="collapse" id="discounts">
        <ul class="admin-navbar-item-dropdown">
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/discounts') ? 'subactive' : '' }}" href="/admin/discounts">
                    {{ __('menu.discounts') }}
                </a>
            </li>
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/discountCoupons') ? 'subactive' : '' }}" href="/admin/discountCoupons">
                    {{ __('menu.discountCoupons') }}
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="offcanvas__menu_li">
    <a class="offcanvas__menu_item {{ request()->is('admin/customers') ? 'active' : '' }}" href="/admin/customers">
        <div>
            <i class="fa-solid fa-user ms-1 me-2"></i>
            {{ __('menu.users') }}
        </div>
    </a>
</li>
<li class="offcanvas__menu_li">
    <a class="offcanvas__menu_item d-flex justify-content-between dropdown {{
            request()->is('admin/carts') ||
            request()->is('admin/cartStatuses')
            ? 'active' : '' }}" href="#"
       data-bs-toggle="collapse" data-bs-target="#carts" aria-expanded="false">
        <div>
            <i class="fa-solid fa-cart-shopping me-2"></i>
            {{ __('menu.carts') }}
        </div>
        <i class="fa-solid fa-angle-right"></i>
    </a>
    <div class="collapse" id="carts">
        <ul class="admin-navbar-item-dropdown">
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/carts') ? 'subactive' : '' }}"
                   href="/admin/carts">
                    {{__('menu.carts')}}
                </a>
            </li>
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/cartStatuses') ? 'subactive' : '' }}"
                   href="/admin/cartStatuses">
                    {{ __('menu.cartStatuses') }}
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="offcanvas__menu_li">
    <a class="offcanvas__menu_item d-flex justify-content-between dropdown {{
            request()->is('admin/orders') ||
            request()->is('admin/orderStatuses')
            ? 'active' : '' }}" href="#"
       data-bs-toggle="collapse" data-bs-target="#orders" aria-expanded="false">
        <div>
            <i class="fa-solid fa-folder me-2"></i>
            {{ __('menu.orders') }}
        </div>
        <i class="fa-solid fa-angle-right"></i>
    </a>
    <div class="collapse" id="orders">
        <ul class="admin-navbar-item-dropdown">
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/orders') ? 'subactive' : '' }}"
                   href="/admin/orders">
                    {{ __('menu.orders') }}
                </a>
            </li>
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/orderStatuses') ? 'subactive' : '' }}"
                   href="/admin/orderStatuses">
                    {{__('menu.orderStatuses')}}
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="offcanvas__menu_li">
    <a class="offcanvas__menu_item d-flex justify-content-between dropdown {{
            request()->is('admin/returns') ||
            request()->is('admin/returnStatuses')
            ? 'active' : '' }}" href="#"
       data-bs-toggle="collapse" data-bs-target="#returns" aria-expanded="false">
        <div>
            <i class="fa-solid fa-rotate-left me-2"></i>
            {{ __('menu.returns') }}
        </div>
        <i class="fa-solid fa-angle-right"></i>
    </a>
    <div class="collapse" id="returns">
        <ul class="admin-navbar-item-dropdown">
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/returns') ? 'subactive' : '' }}"
                   href="/admin/returns">
                    {{ __('menu.returns') }}
                </a>
            </li>
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/returnStatuses') ? 'subactive' : '' }}"
                   href="/admin/returnStatuses">
                    {{ __('menu.returnStatuses') }}
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="offcanvas__menu_li">
    <a class="offcanvas__menu_item {{ request()->is('admin/cookies') ? 'active' : '' }}" href="/admin/cookies">
        <div>
            <i class="fa-solid fa-cookie-bite me-2"></i>
            {{ __('menu.cookies') }}
        </div>
    </a>
</li>
<li class="offcanvas__menu_li">
    <a class="offcanvas__menu_item {{ request()->is('admin/data_export_import') ? 'active' : '' }}" href="/admin/data_export_import">
        <div>
            <i class="fa-solid fa-file ms-1 me-2"></i>
            {{ __('menu.importExport') }}
        </div>
    </a>
</li>
<li class="offcanvas__menu_li">
    <a class="offcanvas__menu_item d-flex justify-content-between dropdown {{
        request()->is('admin/orders_report') ||
        request()->is('admin/returns_report') ||
        request()->is('admin/carts_report') ||
        request()->is('admin/users_report') ||
        request()->is('admin/user_activities_report') ?
        'active' : '' }}" href="#"
       data-bs-toggle="collapse" data-bs-target="#reports" aria-expanded="false">
        <div>
            <i class="fa-solid fa-id-card-clip me-2"></i>
            {{ __('menu.reports') }}
        </div>
        <i class="fa-solid fa-angle-right"></i>
    </a>
    <div class="collapse" id="reports">
        <ul class="admin-navbar-item-dropdown">
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/orders_report') ? 'subactive' : '' }}"
                   href="/admin/orders_report">
                    {{ __('menu.ordersReport') }}
                </a>
            </li>
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/returns_report') ? 'subactive' : '' }}"
                   href="/admin/returns_report">
                    {{ __('menu.returnsReport') }}
                </a>
            </li>
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/carts_report') ? 'subactive' : '' }}"
                   href="/admin/carts_report">
                    {{ __('menu.cartsReport') }}
                </a>
            </li>
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/users_report') ? 'subactive' : '' }}"
                   href="/admin/users_report">
                    {{ __('menu.usersReport') }}
                </a>
            </li>
            <li class="offcanvas__sub_menu_li ps-4">
                <a class="offcanvas__sub_menu_item {{ request()->is('admin/user_activities_report') ? 'subactive' : '' }}"
                   href="/admin/user_activities_report">
                    {{ __('menu.usersActivitiesReport') }}
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="offcanvas__menu_li">
    <a class="offcanvas__menu_item {{ request()->is('admin/messenger') ? 'active' : '' }}" href="/admin/messenger">
        <div>
            <i class="fa-solid fa-comment me-2"></i>
            {{ __('menu.messenger') }}
        </div>
    </a>
</li>
