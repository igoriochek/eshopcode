<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/products') ? 'color: #e10000' : '' }}" href="/admin/products">
        {{ __('menu.products') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/product_sizes') ? 'color: #e10000' : '' }}" href="/admin/product_sizes">
        {{ __('menu.productSizes') }}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/paidAccessory') ? 'color: #e10000' : '' }}" href="/admin/paidAccessory">
        {{__('menu.paidAccessories')}}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/freeAccessory') ? 'color: #e10000' : '' }}" href="/admin/freeAccessory">
        {{__('menu.freeAccessories')}}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/productMeat') ? 'color: #e10000' : '' }}" href="/admin/productMeat">
        {{__('menu.product_meat')}}
    </a>
</li>
<li class="admin-navbar-subitem">
    <a class="admin-navbar-sublink" style="{{ request()->is('admin/productSauce') ? 'color: #e10000' : '' }}" href="/admin/productSauce">
        {{__('menu.product_sauce')}}
    </a>
</li>
