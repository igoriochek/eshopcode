@extends('layouts.app')

@section('title', $maincategory->name ?? __('names.category'))
@section('parentTitle', __('menu.categories'))
@section('parentUrl', url('/rootcategories'))

@section('content')
    <div class="axil-single-product-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-5">
                    @include('flash_messages')
                </div>
                <div class="col-lg-3">
                    <div class="axil-shop-sidebar" style="z-index: 1000000">
                        <div class="d-lg-none">
                            <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
                        </div>
                        <div class="toggle-list product-categories active">
                            <h6 class="title">{{ __('names.categories') }}</h6>
                            <div class="shop-submenu">
                                @include('user_views.category.category_tree')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="axil-shop-top mb--40">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="shop-sorting-left-content">
                                            <h5 class="mb-1">{{ $maincategory->name }}</h5>
                                            <span class="filter-results">
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
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="shop-sorting-right-content">
                                            <a href="{{ route("rootcategories") }}" class="axil-btn btn-bg-primary">
                                                {{ __('buttons.backToMainCategories') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-lg-none">
                                    <button class="product-filter-mobile filter-toggle">
                                        {{ __('names.categories') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row row--15">
                        @forelse ($products as $product)
                            @include('user_views.product.product')
                        @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                        @endforelse
                    </div>
                    <div class="text-center pt--20">
                        {{ $products->onEachSide(1)->links() }}
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
            padding-left: none !important;
        }

        .axil-shop-sidebar .product-categories ul li a {
            padding-left: 0 !important;
        }

        .axil-shop-sidebar .product-categories ul li {
            padding-top: 12px;
            padding-bottom: 0 !important;
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