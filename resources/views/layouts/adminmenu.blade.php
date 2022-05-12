Admin menu:
<a href="/admin/categories">Categories</a>&nbsp;&nbsp;
<a href="/admin/products">Products</a>&nbsp;&nbsp;
<a href="/admin/carts">Carts</a>&nbsp;&nbsp;
{{--<a href="/admin/cartItems">Cart Items</a>&nbsp;&nbsp;--}}
<a href="/admin/cartStatuses">Cart Statuses</a>&nbsp;&nbsp;
<a href="/admin/discounts">Discounts</a>&nbsp;&nbsp;
<a href="/admin/discountCoupons">DiscountCoupons</a>&nbsp;&nbsp;
<a href="/admin/orders">Orders</a>&nbsp;&nbsp;
{{--<a href="/admin/orderItems">OrderItems</a>&nbsp;&nbsp;--}}
<a href="/admin/orderStatuses">OrderStatuses</a>&nbsp;&nbsp;
<a href="/admin/returns">Returns</a>&nbsp;&nbsp;
<a href="/admin/returnStatuses">ReturnStatuses</a>&nbsp;&nbsp;
<a href="/admin/promotions">Promotions</a>&nbsp;&nbsp;
<a href="/admin/customers">Users</a>&nbsp;
<a href="/admin/messenger">Messenger</a>&nbsp;
{{--<a href="/lang/en">EN</a>&nbsp;--}}
{{--<a href="/lang/lt">LT</a>&nbsp;--}}
{{--<a href="/lang/ru">RU</a>&nbsp;--}}

@foreach (config('translatable.locales') as $locale)
    <a href="/lang/{{ $locale }}"
       class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
        [{{ strtoupper($locale) }}]
    </a>
@endforeach
