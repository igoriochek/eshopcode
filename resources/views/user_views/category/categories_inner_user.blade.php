@extends('layouts.app')

@section('content')
    @include('page_header', [
        'secondPageLink' => 'rootcategories',
        'secondPageName' => __('names.categories'),
        'hasThirdPage' => true,
        'thirdPageName' => $maincategory->name
    ])
    <div class="container mb-30 mt-30" style="transform: none;">
        <div class="row" style="transform: none;">
            <div class="col-xl-9 col-lg-8 col-md-7 col-12 order-md-0 order-1">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <h4 class="mb-2">{{ $maincategory->name }}</h4>
                        <p>
                            {{ __('names.showing') }}
                            @if ($products->currentPage() !== $products->lastPage())
                                {{ ($products->count() * $products->currentPage() - $products->count() + 1).__('–').($products->count() * $products->currentPage())}}
                            @else
                                @if ($products->total() - $products->count() === 0)
                                    {{ $products->count() }}
                                @else
                                    {{ ($products->total() - $products->count()).__('–').$products->total() }}
                                @endif
                            @endif
                            {{ __('names.of') }}
                            {{ $products->total().' '.__('names.resultsOf') }}
                        </p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover w-100">
                            <a href="{{ route("rootcategories") }}" class="btn btn-primary w-100">
                                {{__('buttons.backToMainCategories')}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @forelse($products as $product)
                        @include('user_views.product.product')
                    @empty
                        <span class="text-muted">{{ __('names.noProducts') }}</span>
                    @endforelse
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20 d-flex justify-content-center">
                    {{ $products->onEachSide(1)->links() }}
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 col-12 primary-sidebar sticky-sidebar order-md-1 order-0" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <!-- Product sidebar Widget -->
                <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">
                            {{ __('names.categories') }}
                        </h5>
                        @include('user_views.category.categoryTreeview')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
