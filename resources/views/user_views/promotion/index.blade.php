@extends('layouts.app')

@section('title', __('menu.promotions'))

@section('content')
<div class="product-tab bg-white pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5">
                @include('flash_messages')
            </div>
            <div class="col-lg-9">
                @forelse ($promotions as $promotion)
                <h1 class="mb-5">{{ $promotion->name }}</h1>
                <div class="grid-nav-wraper bg-light mb-5">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <nav class="shop-grid-nav">
                                <ul class="nav nav-pills align-items-center" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab-{{ $promotion->id }}" data-bs-toggle="pill"
                                            href="#pills-home-{{ $promotion->id }}" role="tab" aria-controls="pills-home-{{ $promotion->id }}"
                                            aria-selected="true"><i class="ion-grid"></i></a>
                                    </li>
                                    <li class="nav-item mr-0">
                                        <a class="nav-link" id="pills-profile-tab-{{ $promotion->id }}" data-bs-toggle="pill"
                                            href="#pills-profile-{{ $promotion->id }}" role="tab" aria-controls="pills-profile-{{ $promotion->id }}"
                                            aria-selected="false"><i class="ion-android-menu"></i></a>
                                    </li>
                                    <li> <span class="total-products text-capitalize">
                                            {{ __('names.showing') . ' 3 ' . __('names.of') . ' ' . count($promotion->products) . ' ' . __('names.products') }}</span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="shop-grid-button d-flex align-items-center justify-content-end">
                                <a href="{{ route('promotion', ['id' => $promotion->id]) }}" class="btn btn-primary btn-block rounded" style="color: white !important;">
                                    {{ __('names.more_for_promotions') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product-tab-nav end -->
                <div class="tab-content" id="pills-tabContent">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active" id="pills-home-{{ $promotion->id }}" role="tabpanel"
                        aria-labelledby="pills-home-tab-{{ $promotion->id }}">
                        <div class="row">
                            @forelse ($promotion->products as $product)
                            @include('user_views.product.product_grid')
                            @if ($loop->iteration > 2)
                            @break
                            @endif
                            @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                        </div>
                    </div>
                    <!-- second tab-pane -->
                    <div class="tab-pane fade" id="pills-profile-{{ $promotion->id }}" role="tabpanel"
                        aria-labelledby="pills-profile-tab-{{ $promotion->id }}">
                        <div class="grid-list-wrapper overflow-hidden">
                            @forelse ($promotion->products as $product)
                            @include('user_views.product.product_list')
                            @if ($loop->iteration > 2)
                            @break
                            @endif
                            @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                        </div>
                    </div>
                </div>
                @empty
                <span class="text-muted">{{ __('names.noPromotions') }}</span>
                @endforelse
                <nav class="pagination-section bg-light my-5">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-6 text-center text-sm-start  mb-3 mb-sm-0">
                            <p class="text">{{ __('names.showing') }}
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
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="pagination justify-content-center justify-content-sm-end">
                                {{ $promotions->onEachSide(1)->links() }}
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-lg-3">
                <aside class="left-sidebar">
                    <div class="product-widget pt-3rem mb-3rem">
                        <h3 class="title">{{ __('names.promotions') }}</h3>
                        <div class="shop-submenu">
                            @include('user_views.promotion.promotion_tree')
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection