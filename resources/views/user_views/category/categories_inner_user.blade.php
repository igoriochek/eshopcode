@extends('layouts.app')

@section('title', $maincategory->name ?? __('names.category'))
@section('parentTitle', __('menu.categories'))
@section('parentUrl', url('/rootcategories'))

@section('content')
    <div class="shop-area ptb-70">
        <div class="container">
            <div class="row gap-5 gap-lg-0">
                <div class="col-lg-9">
                    <div class="shop-top-shorting-area">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="shop-shorting-left-content">
                                    <ul>
                                        <li>
                                            <h5 class="mb-1">{{ $maincategory->name }}</h5>
                                            <p>
                                                {{ __('names.showing') }}
                                                @if ($products->currentPage() !== $products->lastPage())
                                                    {{ ($products->count() * $products->currentPage() - $products->count() + 1).__('–').($products->count() * $products->currentPage()) }}
                                                @else
                                                    @if ($products->total() - $products->count() === 0)
                                                        {{ $products->count() }}
                                                    @else
                                                        {{ ($products->total() - $products->count()).__('–').$products->total() }}
                                                    @endif
                                                @endif
                                                {{ __('names.of') }}
                                                {{ $products->total().' '.__('names.entries') }}
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="shop-shorting-right-content">
                                    <ul>
                                        <li>
                                            <a href="{{ route("rootcategories") }}" class="default-btn style5">
                                                {{ __('buttons.backToMainCategories') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="products-collections-filter" class="row justify-content-center">
                        @forelse ($products as $product)
                            @include('user_views.product.product')
                        @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                        @endforelse
                    </div>
                    <div class="default-pagination mt-20">
                        {{ $products->onEachSide(1)->links() }}
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <div class="single-shop-sidebar-widget color-and-item pb-1">
                            <h3>{{ __('names.categories') }}</h3>
                            @include('user_views.category.category_tree')
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