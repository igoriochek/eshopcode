<li class="nav-item">
    <a href="{{ route('discountCoupons.index') }}"
       class="nav-link {{ Request::is('discountCoupons*') ? 'active' : '' }}">
        <p>Discount Coupons</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('promotions.index') }}"
       class="nav-link {{ Request::is('promotions*') ? 'active' : '' }}">
        <p>Promotions</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('products.index') }}"
       class="nav-link {{ Request::is('products*') ? 'active' : '' }}">
        <p>Products</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('customers.index') }}"
       class="nav-link {{ Request::is('customers*') ? 'active' : '' }}">
        <p>Customers</p>
    </a>
</li>


