@extends('layouts.app')

@section('title', __('menu.promotions'))

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
                        @forelse ($promotions as $promotion)
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
                                            <span style="display: flex; align-items: center;">
                                                @if(count($promotion->products) >= 3)
                                                {{ __('names.showing') . ' 3 ' . __('names.of') . ' ' . count($promotion->products) . ' ' . __('names.lowercaseProducts') }}
                                                @else
                                                {{ __('names.showing') . ' ' . count($promotion->products) . ' ' . __('names.of') . ' ' . count($promotion->products) . ' ' . __('names.lowercaseProducts') }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bb-select-inner">
                                            <a href="{{ route('promotion', ['id' => $promotion->id]) }}" class="bb-btn-2">
                                                {{ __('names.more_for_promotions') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @forelse ($promotion->products as $product)
                        @include('user_views.product.product_grid')
                        @if ($loop->iteration > 2)
                        @break
                        @endif
                        @empty
                        <span class="text-muted">{{ __('names.noProducts') }}</span>
                        @endforelse

                        @empty
                        <span class="text-muted">{{ __('names.noPromotions') }}</span>
                        @endforelse
                        <div class="col-12">
                            <div class="bb-pro-pagination">
                                <p>
                                    {{ __('names.showing') }}
                                    @if ($promotions->currentPage() !== $promotions->lastPage())
                                    {{ $promotions->count() * $promotions->currentPage() - $promotions->count() + 1 . __('–') . $promotions->count() * $promotions->currentPage() }}
                                    @else
                                    @if ($promotions->total() - $promotions->count() === 0)
                                    {{ $promotions->count() }}
                                    @else
                                    {{ $promotions->total() - $promotions->count() . __('–') . $promotions->total() }}
                                    @endif
                                    @endif
                                    {{ __('names.of') }}
                                    {{ $promotions->total() . ' ' . __('names.entries') }}
                                </p>
                                <div class="bb-pro-pagination">
                                    {{ $promotions->onEachSide(1)->links() }}
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
    .showing {
        text-transform: lowercase;
    }

    .showing::first-letter {
        text-transform: capitalize;
    }

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