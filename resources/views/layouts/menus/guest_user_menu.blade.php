<div class="header-action mr-20 fs-5">
    <a href="/home">{{__('menu.home')}}</a>&nbsp;&nbsp;
</div>
<div class="header-action mr-20 fs-5">
    <a href="/user/products">{{__('menu.products')}}</a>&nbsp;&nbsp;
</div>
<div class="header-action mr-20 fs-5">
    <a href="/user/rootcategories">{{__('menu.categories')}}</a>&nbsp;&nbsp;
</div>
<div class="header-action mr-20 fs-5">
    <a href="/user/promotions">{{__('menu.promotions')}}</a>&nbsp;&nbsp;
</div>

@auth()
    @if(Auth::user()->type == 2)
        <div class="header-action mr-20 fs-5">
            <a href="/user/discountCoupons">{{__('menu.discountCoupons')}}</a>&nbsp;&nbsp;
        </div>
        <div class="header-action mr-20 fs-5">
            <a href="/user/messenger">{{__('menu.messenger')}}</a>&nbsp;&nbsp;
        </div>
    @endif

@endauth
