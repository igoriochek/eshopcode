Admin menu:
<li><a class="dropdown-item" href="/admin/categories">Categories</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/products">Products</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/carts">Carts</a>&nbsp;&nbsp;</li>
{{--<a class="dropdown-item" href="/admin/cartItems">Cart Items</a>&nbsp;&nbsp;--}}
<li><a class="dropdown-item" href="/admin/cartStatuses">Cart Statuses</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/discounts">Discounts</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/discountCoupons">DiscountCoupons</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/orders">Orders</a>&nbsp;&nbsp;</li>
{{--<a class="dropdown-item" href="/admin/orderItems">OrderItems</a>&nbsp;&nbsp;--}}
<li><a class="dropdown-item" href="/admin/orderStatuses">OrderStatuses</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/returns">Returns</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/returnStatuses">ReturnStatuses</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/promotions">Promotions</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/customers">Users</a>&nbsp;</li>
<li><a class="dropdown-item" href="/admin/messenger">Messenger</a>&nbsp;</li>
<li><a class="dropdown-item" href="/admin/cookies">Cookies</a>&nbsp;&nbsp;</li>


{{--@foreach (config('translatable.locales') as $locale)--}}
{{--    <a class="dropdown-item" href="/lang/{{ $locale }}"--}}
{{--       class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">--}}
{{--        [{{ strtoupper($locale) }}]--}}
{{--    </a>--}}
{{--@endforeach--}}
