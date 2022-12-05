<ul class="offcanvas__menu_ul">
    <li class="offcanvas__menu_li">
        <a class="offcanvas__menu_item {{ request()->is('products*') ? 'active' : '' }}"
           href="{{ url('/products') }}">
            {{ __('menu.products') }}
        </a>
    </li>
    <li class="offcanvas__menu_li">
        <a class="offcanvas__menu_item {{ request()->is('rootcategories*') ? 'active' : '' }}"
           href="{{ url('/rootcategories') }}">
            {{ __('menu.categories') }}
        </a>
    </li>
    <li class="offcanvas__menu_li">
        <a class="offcanvas__menu_item {{ request()->is('promotions*') ? 'active' : '' }}"
           href="{{ url('/promotions') }}">
            {{ __('menu.promotions') }}
        </a>
    </li>
    <li class="offcanvas__menu_li">
        <a class="offcanvas__menu_item {{ request()->is('discountCoupons*') ? 'active' : '' }}"
           href="{{ url("/{$role}/discountCoupons") }}">
            {{ __('menu.discountCoupons') }}
        </a>
    </li>
    <li class="offcanvas__menu_li">
        <a class="offcanvas__menu_item {{ request()->is('messenger*') ? 'active' : '' }}"
           href="{{ url("/{$role}/messenger") }}">
            {{ __('menu.messenger') }}
        </a>
    </li>
    <li class="offcanvas__menu_li">
        <a class="offcanvas__menu_item {{ request()->is('about') ? 'active' : '' }}"
           href="{{ url('/about') }}">
            @if (app()->getLocale() == 'lt')
                <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projekts" width="85">
            @else
                <img src="{{ asset('images/eu_projects.jpeg') }}" alt="eu_projects" width="120">
            @endif
        </a>
    </li>
</ul>
