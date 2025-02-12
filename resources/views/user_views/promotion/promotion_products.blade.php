@extends('layouts.app')

@section('title', $promotion->name ?? __('names.promotion'))
@section('parentTitle', __('menu.promotions'))
@section('parentUrl', url('/promotions'))

@section('content')
<div class="shop_area mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('flash_messages')
            </div>
            <div class="col-lg-9 col-md-12">
                <h3 style="margin-bottom: 25px;">{{ $promotion->name }}</h3>
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip"
                            title="3"></button>

                        <button data-role="grid_4" type="button" class=" btn-grid-4" data-bs-toggle="tooltip"
                            title="4"></button>

                        <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip"
                            title="List"></button>
                    </div>
                    <div class="page_amount">
                        <p>
                            {{ __('names.showing') }}
                            @if ($products->currentPage() !== $products->lastPage())
                            {{ $products->count() * $products->currentPage() - $products->count() + 1 . __('–') . $products->count() * $products->currentPage() }}
                            @else
                            @if ($products->total() - $products->count() === 0)
                            {{ $products->count() }}
                            @else
                            {{ $products->total() - $products->count() . __('–') . $products->total() }}
                            @endif
                            @endif
                            {{ __('names.of') }}
                            {{ $products->total() . ' ' . __('names.entries') }}
                        </p>
                    </div>
                    <a href="{{ route('promotions') }}" class="back-button">
                        {{ __('buttons.backToAllPromotions') }}
                    </a>
                </div>
                <div class="row shop_wrapper">
                    @forelse ($products as $product)
                    @include('user_views.product.product_grid')
                    @empty
                    <span class="text-muted">{{ __('names.noProducts') }}</span>
                    @endforelse
                </div>

                <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        {{ $products->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                <aside class="sidebar_widget">
                    <div class="widget_inner">
                        <div class="widget_list widget_categories">
                            <h3>{{ __('names.promotions') }}</h3>
                            @include('user_views.promotion.promotion_tree')
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection