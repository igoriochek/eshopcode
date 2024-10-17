@extends('layouts.app')

@section('title', __('menu.promotions'))

@section('content')
<section class="tp-shop-area pb-120">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                @include('flash_messages')
            </div>
            <div class="col-xl-9 col-lg-8">
                <div class="tp-shop-main-wrapper">
                    <div class="tp-shop-top mb-45">
                        <div class="row mb-3">
                            <div class="col-xl-6 d-flex mb-3">
                                <div class="tp-shop-top-left d-flex align-items-center ">
                                    <div class="tp-shop-top-result">
                                        <p style="margin-bottom: 0px !important;">
                                            {{ __('names.showing') }}
                                            @if ($promotions->currentPage() !== $promotions->lastPage())
                                            {{ ($promotions->count() * $promotions->currentPage() - $promotions->count() + 1).__('–').($promotions->count() * $promotions->currentPage()) }}
                                            @else
                                            @if ($promotions->total() - $promotions->count() === 0)
                                            {{ $promotions->count() }}
                                            @else
                                            {{ ($promotions->total() - $promotions->count()).__('–').$promotions->total() }}
                                            @endif
                                            @endif
                                            {{ __('names.of') }}
                                            {{ $promotions->total().' '.__('names.entries') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @forelse ($promotions as $promotion)

                    <article class="tp-postbox-item format-image mb-50 transition-3">
                        <div class="tp-postbox-content">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <h5 class="tp-postbox-title pb-2">
                                        {{ $promotion->name }}
                                    </h5>

                                    <div class="tp-category-main-result">
                                        @if (count($promotion->products) > 0)
                                        <p>{{ __('names.showing') }} {{ min(3, count($promotion->products)) }} {{ __('names.of') }} {{ count($promotion->products) }} {{ __('names.entries') }}</p>
                                        <div class="tp-category-main-result-bar">
                                            <span data-width="40%" style="width: 40%;"></span>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div style="text-align: end;">
                                        @if (count($promotion->products) > 3)
                                        <div class="tp-category-main-more">
                                            <a href="{{ route('promotion', ['id' => $promotion->id]) }}" class="btn btn-primary">
                                                {{ __('names.more_for_promotions') }}
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @forelse ($promotion->products as $product)
                                @include('user_views.product.grid_product')
                                @if ($loop->iteration > 2)
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
                    <div class="tp-shop-pagination mt-20">
                        <div class="tp-pagination" style="display: flex; justify-content: center;">
                            {{ $promotions->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="job-overview-wrap bg-light-subtle p-4 sticky-sidebar rounded-custom mt-5 mt-lg-0">
                    <h5 class="tp-shop-widget-title no-border">{{ __('names.promotions') }}</h5>
                    @include('user_views.promotion.promotion_tree')
                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('css')
<style>
    .page-item {
        margin-left: 10px;
        margin-right: 10px;
    }

    .pagination .page-item .page-link {
        padding: 5px 10px;
    }

    .pagination .page-item.active .page-link {
        background-color: #175cff;
    }

    .pagination .page-item .page-link {
        &:hover {
            background-color: #175cff;

        }
    }
</style>
@endpush