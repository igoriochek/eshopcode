<li>
    <a href="@if(Auth::user()) /user/products @else /products @endif">{{__('menu.products')}}</a>
</li>
<li>
    <a href="@if(Auth::user()) /user/rootcategories @else /rootcategories @endif">{{__('menu.categories')}}</a>
</li>
<li>
    <a href="@if(Auth::user()) /user/promotions @else /promotions @endif">{{__('menu.promotions')}}</a>
</li>
<li>
    <a href="/user/discountCoupons">{{__('menu.discountCoupons')}}</a>
</li>
<li>
    <a href="/user/messenger">{{__('menu.messenger')}}</a>
</li>
{{--<li>--}}
{{--    <a href="{{ url('/termsofservice') }}">{{ __('menu.termsofservice') }}</a>--}}
{{--</li>--}}
{{--<li>--}}
{{--    <a href="{{ url('/policy') }}">{{ __('menu.policy') }}</a>--}}
{{--</li>--}}
