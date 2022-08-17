<li class="nav-item">
    @guest
        <a href="/" style="color: {{ request()->is('home') ? '#c736c0' : '' }}">
            {{__('menu.home')}}
        </a>
    @endguest
    @auth
        <a href="/home" style="color: {{ request()->is('home') ? '#c736c0' : '' }}">
            {{__('menu.home')}}
        </a>
    @endauth
</li>
<li class="nav-item">
    <a href="/user/rootcategories" style="color: {{ request()->is('user/rootcategories*') ? '#c736c0' : '' }}">
        {{__('menu.categories')}}
    </a>
</li>
{{--<li class="nav-item">
    <a href="/user/categorytree" style="color: {{ request()->is('user/categorytree*') ? '#c736c0' : '' }}">
        {{__('menu.categoriesTree')}}
    </a>
</li>--}}
<li class="nav-item">
    <a href="/user/promotions" style="color: {{ request()->is('user/promotions*') ? '#c736c0' : '' }}">
        {{__('menu.promotions')}}
    </a>
</li>
<li class="nav-item">
    <a href="/user/products" style="color: {{ request()->is('user/products*') ? '#c736c0' : '' }}">
        {{__('menu.products')}}
    </a>
</li>
<li class="nav-item">
    <a href="/user/discountCoupons" style="color: {{ request()->is('user/discountCoupons*') ? '#c736c0' : '' }}">
        {{__('menu.discountCoupons')}}
    </a>
</li>
<li class="nav-item">
    <a href="/user/messenger" style="color: {{ request()->is('user/messenger*') ? '#c736c0' : '' }}">
        {{__('menu.messenger')}}
    </a>
</li>



