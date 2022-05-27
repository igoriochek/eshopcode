{{__('menu.adminmenu')}}:
<li><a class="dropdown-item" href="/admin/categories">{{__('menu.categories')}}</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/products">{{__('menu.products')}}</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/carts">{{__('menu.carts')}}</a>&nbsp;&nbsp;</li>
{{--<a class="dropdown-item" href="/admin/cartItems">Cart Items</a>&nbsp;&nbsp;--}}
<li><a class="dropdown-item" href="/admin/cartStatuses">{{__('menu.cartStatuses')}}</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/discounts">{{__('menu.discounts')}}</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/discountCoupons">{{__('menu.discountCoupons')}}</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/orders">{{__('menu.orders')}}</a>&nbsp;&nbsp;</li>
{{--<a class="dropdown-item" href="/admin/orderItems">OrderItems</a>&nbsp;&nbsp;--}}
<li><a class="dropdown-item" href="/admin/orderStatuses">{{__('menu.orderStatuses')}}</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/returns">{{__('menu.returns')}}</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/returnStatuses">{{__('menu.returnStatuses')}}</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/promotions">{{__('menu.promotions')}}</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/customers">{{__('menu.users')}}</a>&nbsp;</li>
<li><a class="dropdown-item" href="/admin/messenger">{{__('menu.messenger')}}</a>&nbsp;</li>
<li><a class="dropdown-item" href="/admin/cookies">{{__('menu.cookies')}}</a>&nbsp;&nbsp;</li>
<li><a class="dropdown-item" href="/admin/data_export_import">{{__('menu.importExport')}}</a>&nbsp;&nbsp;</li>


{{--@foreach (config('translatable.locales') as $locale)--}}
{{--    <a class="dropdown-item" href="/lang/{{ $locale }}"--}}
{{--       class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">--}}
{{--        [{{ strtoupper($locale) }}]--}}
{{--    </a>--}}
{{--@endforeach--}}
