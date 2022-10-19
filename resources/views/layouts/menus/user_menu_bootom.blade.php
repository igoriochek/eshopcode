<li class="mb-4">
    <i class="fa-solid fa-cart-shopping"></i></i>
    <a class="footer-link" href="{{ url('/user/products') }}">
        {{ __('menu.products') }}
    </a>
</li>
<li class="mb-4">
    <i class="fa-solid fa-briefcase fs-5 me-1"></i>
    <a class="footer-link" href="{{ url('/user/rootcategories') }}">
        {{ __('menu.categories') }}
    </a>
</li>
<li class="mb-4">
    <i class="fa-solid fa-star"></i>
    <a class="footer-link" href="{{ url('/user/promotions') }}">
        {{ __('menu.promotions') }}
    </a>
</li>
<li class="mb-4">
    <i class="fa-solid fa-gift"></i>
    <a class="footer-link" href="{{ url('/user/discountCoupons') }}">
        {{ __('menu.discountCoupons') }}
    </a>
</li>
<li class="mb-4">
    <i class="fa-solid fa-envelope"></i>
    <a class="footer-link"href="{{ url('/user/messenger') }}">
        {{ __('menu.messenger') }}
    </a>
</li>

<li class="mb-4">
    <i class="fa-solid fa-envelope"></i>
    <a class="footer-link"href="{{ url('/termsofservice') }}">
        {{ __('menu.termsofservice') }}
    </a>
</li>

<li class="mb-4">
    <i class="fa-solid fa-envelope"></i>
    <a class="footer-link"href="{{ url('/policy') }}">
        {{ __('menu.policy') }}
    </a>
</li>

{{--                        <li class="mb-4">--}}
{{--                            <a class="footer-link" href="{{ url('/') }}">--}}
{{--                                <i class="fa-solid fa-address-card fs-5 me-1"></i>--}}
{{--                                <span>{{ __('footer.aboutUsTeam') }}</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
