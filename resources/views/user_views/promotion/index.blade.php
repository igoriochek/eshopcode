@extends('layouts.app')

@section('content')
    @include('page_header', [
    'secondPageLink' => 'promotions',
    'secondPageName' => __('names.promotions'),
    'hasThirdPage' => false
])
    <div class="container mb-30 mt-30" style="transform: none;">
        <div class="row" style="transform: none;">
            <div class="col-xl-9 col-lg-8 col-md-7 col-12 order-md-0 order-1">
                    @forelse ($promotions as $promotion)
                        @if (!$loop->first) <hr class="my-5"> @endif
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <h4 class="mb-2">{{ $promotion->name ?? __('names.promotion') }}</h4>
                            </div>
                            @if (count($promotion->products) > 3)
                                <div class="sort-by-product-area">
                                    <div class="sort-by-cover w-100">
                                        <a class="btn btn-primary w-100 border-0" href="{{ route("promotion", ["id" => $promotion->id]) }}">
                                            {{ __("names.more_for_promotions") }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="row product-grid">
                                @forelse($promotion->products as $product)
                                    @include('user_views.product.product')
                                    @if ($loop->iteration > 2)
                                        @break
                                    @endif
                                    <!--end product card-->
                                @empty
                                    <span class="text-muted">{{ __('names.noProducts') }}</span>
                                @endforelse
                            </div>
                    @empty
                        <span class="text-muted mt-1">{{ __('names.noPromotions') }}</span>
                    @endforelse
                    <!--product grid-->
                    <div class="pagination-area mt-20 mb-20 d-flex justify-content-center">
                        {{ $promotions->onEachSide(1)->links() }}
                    </div>
                </div>
            @if (count($promotions) > 0)
                <div class="col-xl-3 col-lg-4 col-md-5 col-12 primary-sidebar sticky-sidebar order-md-1 order-0" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                    <!-- Product sidebar Widget -->
                    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                        <div class="sidebar-widget widget-category-2 mb-30">
                            <h5 class="section-title style-1 mb-30">
                                {{ __('names.promotions') }}
                            </h5>
                            @include('user_views.promotion.promotion_tree')
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
