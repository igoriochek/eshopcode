@extends('layouts.app')

@section('title', $maincategory->name ?? __('names.category'))
@section('parentTitle', __('menu.categories'))
@section('parentUrl', url('/rootcategories'))

@section('content')
<div class="product-tab bg-white pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5">
                @include('flash_messages')
            </div>
            <div class="col-lg-9">
                <div class="grid-nav-wraper bg-light mb-5">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <nav class="shop-grid-nav">
                                <ul class="nav nav-pills align-items-center" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                            href="#pills-home" role="tab" aria-controls="pills-home"
                                            aria-selected="true"><i class="ion-grid"></i></a>
                                    </li>
                                    <li class="nav-item mr-0">
                                        <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                            href="#pills-profile" role="tab" aria-controls="pills-profile"
                                            aria-selected="false"><i class="ion-android-menu"></i></a>
                                    </li>
                                    <li> <span class="total-products text-capitalize">
                                            {{ __('names.thereAre') . ' ' . $products->total() . ' ' . __('names.products') }}</span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="shop-grid-button d-flex align-items-center justify-content-end">
                                <a href="{{ route('rootcategories') }}" class="btn btn-primary btn-block rounded">
                                    {{ __('buttons.backToMainCategories') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product-tab-nav end -->
                <div class="tab-content" id="pills-tabContent">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="row">
                            @forelse ($products as $product)
                            @include('user_views.product.product_grid')
                            @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                        </div>
                        <nav class="pagination-section bg-light my-5">
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-6 text-center text-sm-start  mb-3 mb-sm-0">
                                    <p class="text">{{ __('names.showing') }}
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
                                <div class="col-12 col-sm-6">
                                    <div class="pagination justify-content-center justify-content-sm-end">
                                        {{ $products->onEachSide(1)->links() }}
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <!-- second tab-pane -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="grid-list-wrapper overflow-hidden">
                            @forelse ($products as $product)
                            @include('user_views.product.product_list')
                            @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                        </div>
                        <nav class="pagination-section bg-light my-5">
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-6 text-center text-sm-start  mb-3 mb-sm-0">
                                    <p class="text">{{ __('names.showing') }}
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
                                <div class="col-12 col-sm-6">
                                    <div class="pagination justify-content-center justify-content-sm-end">
                                        {{ $products->onEachSide(1)->links() }}
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <aside class="left-sidebar">
                    <div class="product-widget pt-3rem mb-3rem">
                        <h3 class="title">{{ __('names.categories') }}</h3>
                        <div class="shop-submenu">
                            @include('user_views.category.category_tree')
                        </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection
