<li class="nav-item me-4">
    <a href="@if (Auth::user()) /user/products @else /products @endif"><span>{{__('menu.products')}}</span></a>
</li>
<li class="nav-item me-4">
    <a href="@if (Auth::user()) /user/rootcategories @else /rootcategories @endif"><span>{{__('menu.categories')}}</span></a>
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
<li class="nav-item me-4">
    <a href="/eu_projects" style="padding: 21px 0 0 10px;">
        <img src="../images/es_projektai_small.jpeg" alt="ES projektai" style="width: 100px !important; max-width: none;">
    </a>
</li>
