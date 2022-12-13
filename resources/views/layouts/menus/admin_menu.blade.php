<li class="menu-item-has-children admin-navbar-item">
    <a class="admin-navbar-link" style="{{ request()->is('admin/products') ? 'color: #3BB77E' : '' }}" href="/admin/products">
        <i class="fa-solid fa-grip"></i>
        {{ __('menu.products') }}
    </a>
</li>
<li class="menu-item-has-children admin-navbar-item">
    <a class="admin-navbar-link" style="{{ request()->is('admin/categories') ? 'color: #3BB77E' : '' }}" href="/admin/categories">
        <i class="fa-solid fa-sitemap"></i>
        {{ __('menu.categories') }}
    </a>
</li>
<li class="menu-item-has-children admin-navbar-item">
    <a class="admin-navbar-link" style="{{ request()->is('admin/promotions') ? 'color: #3BB77E' : '' }}" href="/admin/promotions">
        <i class="fa-solid fa-star"></i>
        {{ __('menu.promotions') }}
    </a>
</li>
<li class="menu-item-has-children admin-navbar-item">
    <a class="admin-navbar-link" style="{{
        request()->is('admin/discounts') ||
        request()->is('admin/discountCoupons')
        ? 'color: #3BB77E' : '' }}" href="#">
        <i class="fa-solid fa-tag"></i>
        {{ __('menu.discounts') }}
    </a>
    <ul class="admin-navbar-item-dropdown dropdown">
        @include('layouts.dropdowns.admin_discount_dropdown')
    </ul>
</li>
<li class="menu-item-has-children admin-navbar-item">
    <a class="admin-navbar-link" style="{{ request()->is('admin/customers') ? 'color: #3BB77E' : '' }}" href="/admin/customers">
        <i class="fa-solid fa-user"></i>
        {{ __('menu.users') }}
    </a>
</li>
<li class="menu-item-has-children admin-navbar-item">
    <a class="admin-navbar-link" style="{{
            request()->is('admin/carts') ||
            request()->is('admin/cartStatuses')
            ? 'color: #3BB77E' : '' }}" href="#">
        <i class="fa-solid fa-cart-shopping"></i>
        {{ __('menu.carts') }}
    </a>
    <ul class="admin-navbar-item-dropdown dropdown">
        @include('layouts.dropdowns.admin_cart_dropdown')
    </ul>
</li>
<li class="menu-item-has-children admin-navbar-item">
    <a class="admin-navbar-link" style="{{
            request()->is('admin/orders') ||
            request()->is('admin/orderStatuses')
            ? 'color: #3BB77E' : '' }}" href="#">
        <i class="fa-solid fa-folder"></i>
        {{ __('menu.orders') }}
    </a>
    <ul class="admin-navbar-item-dropdown dropdown">
        @include('layouts.dropdowns.admin_order_dropdown')
    </ul>
</li>
<li class="menu-item-has-children admin-navbar-item">
    <a class="admin-navbar-link" style="{{
            request()->is('admin/returns') ||
            request()->is('admin/returnStatuses')
            ? 'color: #3BB77E' : '' }}" href="#">
        <i class="fa-solid fa-rotate-left"></i>
        {{ __('menu.returns') }}
    </a>
    <ul class="admin-navbar-item-dropdown dropdown">
        @include('layouts.dropdowns.admin_return_dropdown')
    </ul>
</li>
<li class="menu-item-has-children admin-navbar-item">
    <a class="admin-navbar-link" style="{{ request()->is('admin/cookies') ? 'color: #3BB77E' : '' }}" href="/admin/cookies">
        <i class="fa-solid fa-cookie-bite"></i>
        {{ __('menu.cookies') }}
    </a>
</li>
<li class="menu-item-has-children admin-navbar-item">
    <a class="admin-navbar-link" style="{{ request()->is('admin/data_export_import') ? 'color: #3BB77E' : '' }}" href="/admin/data_export_import">
        <i class="fa-solid fa-file"></i>
        {{ __('menu.importExport') }}
    </a>
</li>
<li class="menu-item-has-children admin-navbar-item">
    <a class="admin-navbar-link" style="{{
        request()->is('admin/orders_report') ||
        request()->is('admin/returns_report') ||
        request()->is('admin/carts_report') ||
        request()->is('admin/users_report') ||
        request()->is('admin/user_activities_report') ?
        'color: #3BB77E' : '' }}" href="#">
        <i class="fa-solid fa-id-card-clip"></i>
        {{ __('menu.reports') }}
    </a>
    <ul class="admin-navbar-item-dropdown dropdown">
        @include('layouts.dropdowns.admin_report_dropdown')
    </ul>
</li>
<li class="menu-item-has-children admin-navbar-item">
    <a class="admin-navbar-link" style="{{ request()->is('admin/messenger*') ? 'color: #3BB77E' : '' }}" href="/admin/messenger">
        <i class="fa-solid fa-comment"></i>
        {{ __('menu.messenger') }}
    </a>
</li>
<li class="menu-item" style="height: 50px"></li>
<li class="menu-item-has-children admin-navbar-item d-lg-none">
    <a href="#"
       style="{{ request()->is('user/userprofile*') ? 'color: #3BB77E' : '' }}">
        <i class="fi fi-rs-user mr-10"></i>{{__('menu.profile')}}
    </a>
    <ul class="admin-navbar-item-dropdown dropdown">
        <li class="admin-navbar-subitem">
            <a class="admin-navbar-sublink" href="{{ url('/user/userprofile') }}"
               style="{{ request()->is('user/userprofile') ? 'color: #3BB77E' : '' }}; font-size: .9rem;">
                <i class="fi fi-rs-user mr-10"></i>
                {{__('menu.profile')}}
            </a>
        </li>
        <li class="admin-navbar-subitem">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <a class="admin-navbar-sublink" href="{{ route('logout') }}" style="font-size: .9rem;"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fi fi-rs-sign-out mr-10"></i>
                    {{ __('menu.logout') }}
                </a>
            </form>
        </li>
    </ul>
</li>
<li class="menu-item-has-children admin-navbar-item d-lg-none">
    <a href="#">
        <i class="fa-solid fa-language"></i>
        {{ __('messages.chooselang') }}
    </a>
    <ul class="admin-navbar-item-dropdown dropdown">
        @foreach (config('translatable.locales') as $locale)
            <li class="admin-navbar-subitem">
                <a class="admin-navbar-sublink" href="/lang/{{ $locale }}"
                   class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                    <img src="{{asset('/images/theme/flag-' . $locale . '.png')}}" alt="{{$locale}}" width="20" class="me-1"/>
                    {{ strtoupper($locale) }}
                </a>
            </li>
        @endforeach
    </ul>
</li>
