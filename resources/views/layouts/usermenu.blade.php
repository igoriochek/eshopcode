{{__('menu.usermenu')}}:
<a href="/user/rootcategories">Categories</a>&nbsp;&nbsp;
<a href="/user/categorytree">Categories Tree</a>&nbsp;&nbsp;
{{--<a href="/user/discounts">Discounts</a>&nbsp;&nbsp;--}}
<a href="/user/promotions">Promotions</a>&nbsp;&nbsp;
<a href="/user/products">Products</a>&nbsp;&nbsp;
<a href="/user/viewcart">Cart</a>&nbsp;&nbsp;
<a href="/user/rootorders">Orders</a>&nbsp;&nbsp;
<a href="/user/rootoreturns">Returns</a>&nbsp;&nbsp;
<a href="/user/discountCoupons">DiscountCoupons</a>&nbsp;&nbsp;
<a href="/user/messenger">Messenger</a>&nbsp;&nbsp;
<a href="/user/userprofile">User info</a>&nbsp;
{{--<a href="/lang/en">EN</a>&nbsp;&nbsp;--}}
{{--<a href="/lang/lt">LT</a>&nbsp;&nbsp;--}}
{{--<a href="/lang/ru">RU</a>&nbsp;&nbsp;--}}


@foreach (config('translatable.locales') as $locale)
    <a href="/lang/{{ $locale }}"
       class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
        [{{ strtoupper($locale) }}]
    </a>
@endforeach
