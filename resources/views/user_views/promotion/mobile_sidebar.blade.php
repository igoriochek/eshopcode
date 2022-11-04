<!-- Start offcanvas filter sidebar -->
<div class="offcanvas__filter--sidebar widget__area">
    <button type="button" class="offcanvas__filter--close ms-4" data-offcanvas>
        <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
        </svg>
        <span class="offcanvas__filter--close__text">{{ __('buttons.close') }}</span>
    </button>
    <div class="offcanvas__filter--sidebar__inner">
        <div class="single__widget widget__bg">
            <h2 class="widget__title h3">
                {{ __('menu.promotions') }}
            </h2>
            @include('user_views.promotion.promotion_tree')
        </div>
    </div>
</div>
<!-- End offcanvas filter sidebar -->
