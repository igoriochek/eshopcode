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
    <li class="nav-item me-4">
        <a href="/about">
            @if (app()->getLocale() === 'lt')
                <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" width="100" height="45">
            @else
                <img src="{{ asset('images/es_projektai_en_ru.jpeg') }}" alt="es_projektai_en_ru" width="100">
            @endif
        </a>
    </li>
</ul>
