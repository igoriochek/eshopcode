<li class="nav-item me-4">
    <a href="@if (Auth::user()) /user/products @else /products @endif"><span>{{__('menu.products')}}</span></a>
</li>
<li class="nav-item me-4">
    <a href="@if (Auth::user()) /user/categorytree @else /categorytree @endif"><span>{{__('menu.categories')}}</span></a>
</li>
<li class="nav-item me-4">
    <a href="@if (Auth::user()) /user/promotions @else /promotions @endif"><span>{{__('menu.promotions')}}</span></a>
</li>
<li class="nav-item me-4">
    <a href="/user/discountCoupons"><span>{{__('menu.discountCoupons')}}</span></a>
</li>
<li class="nav-item me-4">
    <a href="/user/messenger"><span>{{__('menu.messenger')}}</span></a>
</li>
