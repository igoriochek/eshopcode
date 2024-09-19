@extends('layouts.app')

@section('title', __('menu.promotions'))

@section('content')

    <section class="shop-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    @include('flash_messages')
                </div>
                <div class="col-xl-3 col-lg-4 order-lg-1 order-2 pt-10 pt-lg-0">
                    <div class="sidebar-area style-2">
                        <div class="widgets-area mb-9">
                            <h2 class="widgets-title mb-5">{{ __('names.promotions') }}</h2>
                            @include('user_views.promotion.promotion_tree')
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 order-lg-2 order-1">
                    <div class="product-topbar">
                        <ul>
                            <li class="page-count">
                                {{ __('names.showing') }}
                                <span>
                                    @if ($promotions->currentPage() !== $promotions->lastPage())
                                        {{ $promotions->count() * $promotions->currentPage() - $promotions->count() + 1 . __('–') . $promotions->count() * $promotions->currentPage() }}
                                    @else
                                        @if ($promotions->total() - $promotions->count() === 0)
                                            {{ $promotions->count() }}
                                        @else
                                            {{ $promotions->total() - $promotions->count() . __('–') . $promotions->total() }}
                                        @endif
                                    @endif
                                </span>
                                {{ __('names.of') }}
                                <span>{{ $promotions->total() }}</span>
                                {{ __('names.entries') }}
                            </li>
                        </ul>
                    </div>
                    @forelse ($promotions as $promotion)
                        <article class="tp-postbox-item format-image mb-50 transition-3" style="padding-top: 25px;">
                            <div class="tp-postbox-content">
                                <h5 class="tp-postbox-title pb-1">
                                    {{ $promotion->name }}
                                </h5>
                                <div class="tp-category-main-result mb-1">
                                    <p class="mb-1">{{ __('names.showing') }}
                                        {{ count($promotion->products) }} {{ __('names.entries') }}</p>
                                </div>
                                <div class="row">
                                    @forelse ($promotion->products as $product)
                                        @include('user_views.product.grid_product')
                                        @if ($loop->iteration > 2)
                                            @if (count($promotion->products) > 3)
                                                <div class="tp-category-main-more text-center mt-5"
                                                    style="margin-bottom: 2rem">
                                                    <a href="{{ route('promotion', ['id' => $promotion->id]) }}"
                                                        class="">
                                                        <button class="btn btn-custom-size lg-size btn-primary"
                                                            style="width: auto; padding: 0px 15px">{{ __('names.more_for_promotions') }}</button>
                                                    </a>
                                                </div>
                                            @endif
                                        @break
                                    @endif
                                @empty
                                    <span class="text-muted">{{ __('names.noProducts') }}</span>
                                @endforelse
                            </div>
                        </div>
                    </article>
                @empty
                    <span class="text-muted">{{ __('names.noPromotions') }}</span>
                @endforelse
            </div>
        </div>
    </div>
</section>
@endsection

<style>
.btn-custom-size.xl-size {
    width: 290px;
    height: 50px;
    line-height: 50px;
    font-size: 16px;
}
</style>
