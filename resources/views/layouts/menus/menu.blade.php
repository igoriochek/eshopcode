@guest
    <li class="nav-item d-flex align-items-center justify-content-center">
        <a href="/products" style="color: {{ request()->is('user/products*') ? '#c736c0' : '' }}">
            {{__('menu.products')}}
        </a>
    </li>
    <li class="nav-item d-flex align-items-center justify-content-center">
        <a href="/rootcategories" style="color: {{ request()->is('user/rootcategories*') ? '#c736c0' : '' }}">
            {{__('menu.categories')}}
        </a>
    </li>
    <li class="nav-item d-flex align-items-center justify-content-center">
        <a href="/promotions" style="color: {{ request()->is('user/promotions*') ? '#c736c0' : '' }}">
            {{__('menu.promotions')}}
        </a>
    </li>
    <li class="nav-item d-flex align-items-center justify-content-center">
        <a href="/user/discountCoupons" style="color: {{ request()->is('user/discountCoupons*') ? '#c736c0' : '' }}">
            {{__('menu.discountCoupons')}}
        </a>
    </li>
    <li class="nav-item d-flex align-items-center justify-content-center">
        <a href="/user/messenger" style="color: {{ request()->is('user/messenger*') ? '#c736c0' : '' }}">
            {{__('menu.messenger')}}
        </a>
    </li>
@else
    <li class="nav-item d-flex align-items-center justify-content-center">
        <a href="/user/products" style="color: {{ request()->is('user/products*') ? '#c736c0' : '' }}">
            {{__('menu.products')}}
        </a>
    </li>
    <li class="nav-item d-flex align-items-center justify-content-center">
        <a href="/user/rootcategories" style="color: {{ request()->is('user/rootcategories*') ? '#c736c0' : '' }}">
            {{__('menu.categories')}}
        </a>
    </li>
    <li class="nav-item d-flex align-items-center justify-content-center">
        <a href="/user/promotions" style="color: {{ request()->is('user/promotions*') ? '#c736c0' : '' }}">
            {{__('menu.promotions')}}
        </a>
    </li>
    <li class="nav-item d-flex align-items-center justify-content-center">
        <a href="/user/discountCoupons" style="color: {{ request()->is('user/discountCoupons*') ? '#c736c0' : '' }}">
            {{__('menu.discountCoupons')}}
        </a>
    </li>
    <li class="nav-item d-flex align-items-center justify-content-center">
        <a href="/user/messenger" style="color: {{ request()->is('user/messenger*') ? '#c736c0' : '' }}">
            {{__('menu.messenger')}}
        </a>
    </li>
@endguest
<li class="nav-item d-flex align-items-center justify-content-center">
    <a href="/about" style="color: {{ request()->is('about') ? '#c736c0' : '' }}">
        @if (app()->getLocale() === 'lt')
            <img src="{{ asset('images/es_projektai.jpeg') }}" alt="es_projektai" width="130" />
        @else
            <img src="{{ asset('images/es_projektai_en_ru.jpeg') }}" alt="es_projektai_en_ru" width="130" />
        @endif
    </a>
</li>
<li class="language">
    <div class="d-flex align-items-center">
        <ul class="m-0 p-0" style="list-style: none">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center justify-content-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                    @if (app()->getLocale() == 'lt')
                        <img src="/images/lt-flag.png" alt="lt-flag" width=18 height=13 class="me-1">
                        {{ __('LT') }}
                    @elseif (app()->getLocale() == 'ru')
                        <img src="/images/ru-flag.png" alt="ru-flag" width=18 height=13 class="me-1">
                        {{ __('RU') }}
                    @else
                        <img src="/images/en-flag.png" alt="en-flag" width=18 height=13 class="me-1">
                        {{ __('EN') }}
                    @endif
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @foreach (config('translatable.locales') as $locale)
                        <li>
                            <a class="dropdown-item" href="/lang/{{ $locale }}"
                               class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                {{ strtoupper($locale) }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
</li>


