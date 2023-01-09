<li class="d-flex justify-content-center align-items-center">
    <a href="/products" style="color: {{ request()->is('products*') || request()->is('viewproduct*') ? '#e10000' : '' }}">{{__('menu.products')}}</a>
</li>
<li class="d-flex justify-content-center align-items-center">
    <a href="/rootcategories" style="color: {{ request()->is('rootcategories') || request()->is('innercategories*') ? '#e10000' : '' }}">{{__('menu.categories')}}</a>
</li>
<li class="d-flex justify-content-center align-items-center">
    <a href="/promotions" style="color: {{ request()->is('promotions') || request()->is('promotion*') ? '#e10000' : '' }}">{{__('menu.promotions')}}</a>
</li>
<li class="d-flex justify-content-center align-items-center">
    <a href="/user/discountCoupons" style="color: {{ request()->is('discountCoupons') ? '#e10000' : '' }}">{{__('menu.discountCoupons')}}</a>
</li>
<li class="d-flex justify-content-center align-items-center">
    <a href="/user/messenger" style="color: {{ request()->is('user/messenger*') ? '#e10000' : '' }}">{{__('menu.messenger')}}</a>
</li>
<li class="d-flex justify-content-center align-items-center">
    <a href="/eu_projects" class="h-50" style="color: {{ request()->is('eu_projects') ? '#e10000' : '' }}">
        @if (App()->getLocale() === 'lt')
            <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" width="80" class="mb-1">
        @else
            <img src="{{ asset('images/eu_projects.jpeg') }}" alt="eu_projects" width="80" class="mb-2 pb-1 mx-2">
        @endif
    </a>
</li>
