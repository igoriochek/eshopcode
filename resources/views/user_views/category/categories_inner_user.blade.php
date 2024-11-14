@extends('layouts.app')
@section('title', $maincategory->name ?? __('names.category'))
@section('parentTitle', __('menu.categories'))
@section('parentUrl', url('/rootcategories'))
@section('content')
<div class="shop-area section-space-y-axis-100">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                @include('flash_messages')
            </div>
            <div class="col-xl-3 col-lg-4 order-lg-1 order-2 pt-10 pt-lg-0">
                <div class="sidebar-area style-2">
                    <div class="widgets-area mb-9">
                        <h2 class="widgets-title mb-5">{{ __('names.categories') }}</h2>
                        @include('user_views.category.category_tree')
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 order-lg-2 order-1">
                <div class="category-description mb-8">
                    @if ($maincategory->description)
                        <h3 class="category-description-title mb-4">{{ $maincategory->name }}</h3>
                        <p class="category-description-content">{{ $maincategory->description }}</p>
                    @endif
                </div>
                <div class="product-topbar">
                    <ul>
                        <li class="page-count">
                            {{ __('names.showing') }}
                            <span>
                                @if ($products->currentPage() !== $products->lastPage())
                                {{ ($products->count() * $products->currentPage() - $products->count() + 1).__('–').($products->count() * $products->currentPage()) }}
                                @else
                                @if ($products->total() - $products->count() === 0)
                                {{ $products->count() }}
                                @else
                                {{ ($products->total() - $products->count()).__('–').$products->total() }}
                                @endif
                                @endif
                            </span>
                            {{ __('names.of') }}
                            <span>{{ $products->total() }}</span>
                            {{ __('names.entries') }}
                        </li>
                        <li class="product-view-wrap">
                            <ul class="nav" role="tablist">
                                <li class="grid-view" role="presentation">
                                    <a class="active" id="grid-view-tab" data-bs-toggle="tab" href="#grid-view" role="tab" aria-selected="true">
                                        <i class="fa fa-th"></i>
                                    </a>
                                </li>
                                <li class="list-view" role="presentation">
                                    <a id="list-view-tab" data-bs-toggle="tab" href="#list-view" role="tab" aria-selected="true">
                                        <i class="fa fa-th-list"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="tab-content text-charcoal pt-8">
                    <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                        <div class="product-grid-view row">
                            @forelse ($products as $product)
                            @include('user_views.product.grid_product')
                            @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
                        <div class="product-list-view row">
                            @forelse ($products as $product)
                            @include('user_views.product.list_product')
                            @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="pagination-area pt-10">
                    <nav aria-label="Page navigation example">
                        <div class="pagination justify-content-end">
                            {{ $products->onEachSide(1)->links() }}
                            </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('css')
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
    }

    .tp-sidebar-widget ul li a::after {
        position: absolute;
        content: "";
        width: 0;
        height: 0;
        background-color: transparent;
        border-radius: 50%;
        left: 0;
        top: 12px;
    }

    .category-description {
        background-color: #f8f8f8;
        padding: 1.5rem;
        border-radius: 0.5rem;
    }

    .category-description-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
    }

    .category-description-content {
        font-size: 1rem;
        line-height: 1.6;
    }
</style>
@endpush