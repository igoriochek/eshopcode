<li class="nav-item">
    <a href="/" style="color: {{ request()->is('home') ? '#c736c0' : '' }}">
        {{__('menu.home')}}
    </a>
</li>
@guest
    <li class="nav-item">
        <a href="/products" style="color: {{ request()->is('user/products*') ? '#c736c0' : '' }}">
            {{__('menu.products')}}
        </a>
    </li>
    <li class="nav-item">
        <a href="/rootcategories" style="color: {{ request()->is('user/rootcategories*') ? '#c736c0' : '' }}">
            {{__('menu.categories')}}
        </a>
    </li>
    <li class="nav-item">
        <a href="/promotions" style="color: {{ request()->is('user/promotions*') ? '#c736c0' : '' }}">
            {{__('menu.promotions')}}
        </a>
    </li>
@endguest
@auth
    <li class="nav-item">
        <a href="/user/products" style="color: {{ request()->is('user/products*') ? '#c736c0' : '' }}">
            {{__('menu.products')}}
        </a>
    </li>
    <li class="nav-item">
        <a href="/user/rootcategories" style="color: {{ request()->is('user/rootcategories*') ? '#c736c0' : '' }}">
            {{__('menu.categories')}}
        </a>
    </li>
    <li class="nav-item">
        <a href="/user/promotions" style="color: {{ request()->is('user/promotions*') ? '#c736c0' : '' }}">
            {{__('menu.promotions')}}
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
@endauth
<li class="language">
    <div class="d-flex align-items-center">
        <ul class="m-0 p-0" style="list-style: none">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center justify-content-center" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                    @if (app()->getLocale() == 'lt')
                        <img src="/images/lt-flag.png" alt="lt-flag" style="width: 17px; height: 17px; margin-right: 5px; border-radius: 10px">
                        {{ __('LT') }}
                    @else
                        <img src="/images/en-flag.png" alt="en-flag" style="width: 17px; height: 17px; margin-right: 5px; border-radius: 10px">
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


