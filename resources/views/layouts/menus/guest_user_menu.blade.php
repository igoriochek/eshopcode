<div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading me-4">
    <nav>
        <ul>
            <li>
                <a href="@if(Auth::user()) /user/products @else /products @endif">{{__('menu.products')}}</a>&nbsp;&nbsp;
            </li>
            <li>
                <a href="@if(Auth::user()) /user/rootcategories @else /rootcategories @endif">{{__('menu.categories')}}</a>&nbsp;&nbsp;
            </li>
            <li>
                <a href="@if(Auth::user()) /user/promotions @else /promotions @endif">{{__('menu.promotions')}}</a>&nbsp;&nbsp;
            </li>
            <li>
                <a href="/user/discountCoupons">{{__('menu.discountCoupons')}}</a>&nbsp;&nbsp;
            </li>
            <li>
                <a href="/user/messenger">{{__('menu.messenger')}}</a>&nbsp;&nbsp;
            </li>
        </ul>
    </nav>
</div>
