<ul>
    <li class="nav-item me-4">
        <a href="@if (Auth::user()) /user/products @else /products @endif">{{__('menu.products')}}</a>
    </li>
    <li class="nav-item me-4">
        <a href="@if (Auth::user()) /user/rootcategories @else /rootcategories @endif">{{__('menu.categories')}}</a>
    </li>
    <li class="nav-item me-4">
        <a href="@if (Auth::user()) /user/promotions @else /promotions @endif">{{__('menu.promotions')}}</a>
    </li>
    <li class="nav-item me-4">
        <a href="/user/discountCoupons">{{__('menu.discountCoupons')}}</a>
    </li>
    <li class="nav-item me-4">
        <a href="/user/messenger">{{__('menu.messenger')}}</a>
    </li>
</ul>
