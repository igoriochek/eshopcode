@extends('layouts.app')

@section('title', __('menu.promotions'))

@section('content')
<div class="axil-single-product-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    @include('flash_messages')
                </div>

                <div class="col-lg-3">
                    <div class="axil-shop-sidebar" style="z-index: 1000000">
                        <div class="toggle-list product-categories active">
                            <h6 class="title">{{ __('names.promotions') }}</h6>
                            <div class="shop-submenu">
                            @include('user_views.promotion.promotion_tree')
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="row">
                        @forelse ($promotions as $promotion)
                            <div class="col-12 mb-4">

                                <div class="axil-shop-top mb--40">
                                    <div class="d-flex justify-content-between align-items-center">
                                    <div class="flex-shrink-1">
                                        <a href="{{ route("promotion", ["id" => $promotion->id]) }}" class="axil-btn btn-bg-primary">
                                            {{ __("names.more_for_promotions") }}
                                        </a>
                                    </div>
                                        <div class="flex-grow-1 d-flex flex-column align-items-end">
                                            <h5 class="mb-1">{{ $promotion->name }}</h5>
                                            <span class="filter-results">
                                                {{ __('names.showing') }}
                                                3
                                                {{ __('names.of') }}
                                                {{ count($promotion->products).' '.__('names.entries') }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="d-lg-none">
                                        <button class="product-filter-mobile filter-toggle">
                                            <i class="fas fa-filter"></i>
                                            {{ __('buttons.filter') }}
                                        </button>
                                    </div>
                                </div>

                                <div id="products-collections-filter" class="row justify-content-center">
                                    @forelse ($promotion->products as $product)
                                        @include('user_views.product.product')
                                        @if ($loop->iteration > 2)
                                            @break
                                        @endif
                                    @empty
                                        <span class="text-muted">{{ __('names.noProducts') }}</span>
                                    @endforelse
                                </div>
                            </div>
                        @empty
                            <span class="text-muted">{{ __('names.noPromotions') }}</span>
                        @endforelse
                    </div>

                    <div class="text-center pt--20">
                        {{ $promotions->onEachSide(1)->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .axil-shop-sidebar .product-categories ul li a::before {
            content: none !important;
        }

        .filter-results{
            margin: 0;
        }

        a {
            color: #666666;

            &:hover, &:focus {
                color: #a10909;
            }
        }

        .active {
            color: #a10909;
        }
    </style>
@endpush