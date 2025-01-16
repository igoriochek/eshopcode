@extends('layouts.app')

@section('title', $promotion->name ?? __('names.promotion'))
@section('parentTitle', __('menu.promotions'))
@section('parentUrl', url('/promotions'))

@section('content')
<section class="section-shop padding-b-50">
    <div class="container">
        <div class="row mb-minus-24">
            <div class="col-lg-12 mb-5">
                @include('flash_messages')
            </div>
            <div class="col-lg-3 col-12 mb-24">
                <div class="bb-shop-wrap">
                    <div class="bb-sidebar-block">
                        <div class="bb-sidebar-title">
                            <h3>{{ __('names.promotions') }}</h3>
                        </div>
                        @include('user_views.promotion.promotion_tree')
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12 mb-24">
                <div class="bb-shop-pro-inner">
                    <div class="row mb-minus-24">
                        <div class="section-title bb-center" data-aos="fade-up" data-aos-duration="1000"
                            data-aos-delay="200">
                            <div class="section-detail">
                                <h2 class="bb-title">{{ $promotion->name }}</h2>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="bb-pro-list-top">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="bb-bl-btn">
                                            <button type="button" class="grid-btn btn-grid-100 active">
                                                <i class="ri-apps-line"></i>
                                            </button>
                                            <button type="button" class="grid-btn btn-list-100">
                                                <i class="ri-list-unordered"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bb-select-inner">
                                            <a href="{{ route('promotions') }}" class="bb-btn-2">
                                                {{ __('buttons.backToAllPromotions') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @forelse ($products as $product)
                        @include('user_views.product.product_grid')
                        @empty
                        <span class="text-muted">{{ __('names.noProducts') }}</span>
                        @endforelse
                        <div class="col-12">
                            <div class="bb-pro-pagination">
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
                                <div class="bb-pro-pagination">
                                    {{ $products->onEachSide(1)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<style>
    .pagination .page-item.active .page-link {
        background-color: #3d4750 !important;
        color: #fff !important;
        transition: all 0.3s ease-in-out !important;
        width: 32px !important;
        height: 32px !important;
        padding: 0 !important;
        font-weight: 300 !important;
        line-height: 32px !important;
        font-size: 15px !important;
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        text-align: center !important;
        vertical-align: top !important;
        -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        border-radius: 10px !important;
        border: 1px solid #eee !important;
    }

    .pagination .page-item .page-link {

        background: #f8f8fb;
        transition: all 0.3s ease-in-out !important;
        width: 32px !important;
        height: 32px !important;
        padding: 0 !important;
        font-weight: 300 !important;
        line-height: 32px !important;
        font-size: 15px !important;
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        text-align: center !important;
        vertical-align: top !important;
        -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        border-radius: 10px !important;
        border: 1px solid #eee !important;

        &:hover {
            background-color: #3d4750 !important;
            color: #fff !important;
        }
    }
</style>