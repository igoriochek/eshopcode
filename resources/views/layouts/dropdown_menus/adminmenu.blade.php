<div class="header-action-icon-2">
    <a>
        <img class="svgInject" alt="Nest" src="{{asset('/images/theme/icons/icon-4.svg')}}"/>
        <a href="page-account.html"><span class="lable ml-0">{{__('menu.adminmenu')}}</span></a>
    </a>
    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
        <ul>
            <li><a href="/admin/categories">{{__('menu.categories')}}</a>&nbsp;&nbsp;</li>
            <li><a href="/admin/products">{{__('menu.products')}}</a>&nbsp;&nbsp;</li>
            <li><a href="/admin/carts">{{__('menu.carts')}}</a>&nbsp;&nbsp;</li>
            {{--<a href="/admin/cartItems">Cart Items</a>&nbsp;&nbsp;--}}
            <li><a href="/admin/cartStatuses">{{__('menu.cartStatuses')}}</a>&nbsp;&nbsp;</li>
            <li><a href="/admin/discounts">{{__('menu.discounts')}}</a>&nbsp;&nbsp;</li>
            <li><a href="/admin/discountCoupons">{{__('menu.discountCoupons')}}</a>&nbsp;&nbsp;</li>
            <li><a href="/admin/orders">{{__('menu.orders')}}</a>&nbsp;&nbsp;</li>
            {{--<a href="/admin/orderItems">OrderItems</a>&nbsp;&nbsp;--}}
            <li><a href="/admin/orderStatuses">{{__('menu.orderStatuses')}}</a>&nbsp;&nbsp;</li>
            <li><a href="/admin/returns">{{__('menu.returns')}}</a>&nbsp;&nbsp;</li>
            <li><a href="/admin/returnStatuses">{{__('menu.returnStatuses')}}</a>&nbsp;&nbsp;</li>
            <li><a href="/admin/promotions">{{__('menu.promotions')}}</a>&nbsp;&nbsp;</li>
            <li><a href="/admin/customers">{{__('menu.users')}}</a>&nbsp;</li>
            <li><a href="/admin/messenger">{{__('menu.messenger')}}</a>&nbsp;</li>
            <li><a href="/admin/cookies">{{__('menu.cookies')}}</a>&nbsp;&nbsp;</li>
            <li><a href="/admin/data_export_import">{{__('menu.importExport')}}</a>&nbsp;&nbsp;</li>
        </ul>
    </div>
</div>

{{--@foreach (config('translatable.locales') as $locale)--}}
{{--    <a class="dropdown-item" href="/lang/{{ $locale }}"--}}
{{--       class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">--}}
{{--        [{{ strtoupper($locale) }}]--}}
{{--    </a>--}}
{{--@endforeach--}}
