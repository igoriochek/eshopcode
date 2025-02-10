@extends('layouts.app')

@section('title', __('menu.promotions'))

@section('content')
<div class="shop_area mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('flash_messages')
            </div>
            <div class="col-lg-9 col-md-12">
                @forelse ($promotions as $promotion)
                <h3 style="margin-bottom: 25px;">{{ $promotion->name }}</h3>
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip"
                            title="3"></button>

                        <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip"
                            title="List"></button>
                    </div>
                    <div class="page_amount">
                        <p>
                            @if(count($promotion->products) >= 3)
                            {{ __('names.showing') . ' 3 ' . __('names.of') . ' ' . count($promotion->products) . ' ' . __('names.lowercaseProducts') }}
                            @else
                            {{ __('names.showing') . ' ' . count($promotion->products) . ' ' . __('names.of') . ' ' . count($promotion->products) . ' ' . __('names.lowercaseProducts') }}
                            @endif
                        </p>
                    </div>
                    <a href="{{ route('promotion', ['id' => $promotion->id]) }}" class="back-button">
                        {{ __('names.more_for_promotions') }}
                    </a>
                </div>
                <div class="row shop_wrapper">
                    @forelse ($promotion->products as $product)
                    @include('user_views.product.product_grid')
                    @if ($loop->iteration > 2)
                    @break
                    @endif
                    @empty
                    <span class="text-muted">{{ __('names.noProducts') }}</span>
                    @endforelse
                </div>
                @empty
                <span class="text-muted">{{ __('names.noPromotions') }}</span>
                @endforelse
                <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        {{ $promotions->onEachSide(1)->links() }}
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