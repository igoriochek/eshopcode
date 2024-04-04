@extends('layouts.app')

@section('title', __('menu.promotions'))

@section('content')
    <div class="shop-area ptb-70">
        <div class="container">
            <div class="row gap-5 gap-lg-0">
                <div class="col-lg-9">
                    <div class="row">
                        @forelse ($promotions as $promotion)
                            <div class="col-12 mb-4">
                                <div class="shop-top-shorting-area">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="shop-shorting-left-content">
                                                <ul>
                                                    <li>
                                                        <h5 class="mb-1">{{ $promotion->name }}</h5>
                                                        <p>
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
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="shop-shorting-right-content">
                                                <ul>
                                                    <li>
                                                        <a href="{{ route("promotion", ["id" => $promotion->id]) }}" class="default-btn style5">
                                                            {{ __("names.more_for_promotions") }}
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
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
                    <div class="default-pagination mt-20">
                        {{ $promotions->onEachSide(1)->links() }}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <div class="single-shop-sidebar-widget color-and-item">
                            <h3>{{ __('names.promotions') }}</h3>
                            @include('user_views.promotion.promotion_tree')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
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