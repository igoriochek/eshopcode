@extends('layouts.app')

@section('content')
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{ $maincategory->name ?? '' }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">
                                    {{ __('menu.home') }}
                                </a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url()->previous() }}">
                                    {{ __('menu.categories') }}
                                </a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{ $maincategory->name ?? '' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->
    <div class="shop__section section--padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 shop-col-width-lg-4">
                    <div class="shop__sidebar--widget widget__area d-none d-lg-block">
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title h3">
                                {{ __('names.categories') }}
                            </h2>
                            @include('user_views.category.categoryTree')
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 shop-col-width-lg-8">
                    <div class="shop__right--sidebar">
                        <div class="shop__product--wrapper">
                            <div class="shop__header d-flex align-items-center justify-content-between mb-30">
                                <div class="product__view--mode d-flex align-items-center">
                                    <button class="widget__filter--btn d-flex d-lg-none align-items-center" data-offcanvas="">
                                        <svg class="widget__filter--btn__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28" d="M368 128h80M64 128h240M368 384h80M64 384h240M208 256h240M64 256h80"></path><circle cx="336" cy="128" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"></circle><circle cx="176" cy="256" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"></circle><circle cx="336" cy="384" r="28" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="28"></circle></svg>
                                        <span class="widget__filter--btn__text">{{ __('buttons.filter') }}</span>
                                    </button>
                                    <div class="product__view--mode__list product__short--by align-items-center d-flex ">

                                    </div>
                                    <div class="product__view--mode__list">
                                        <div class="product__tab--one product__grid--column__buttons d-flex justify-content-center">
                                            <button class="product__grid--column__buttons--icons active" aria-label="grid btn" data-toggle="tab" data-target="#product_grid">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 9 9">
                                                    <g transform="translate(-1360 -479)">
                                                        <rect id="Rectangle_5725" data-name="Rectangle 5725" width="4" height="4" transform="translate(1360 479)" fill="currentColor"></rect>
                                                        <rect id="Rectangle_5727" data-name="Rectangle 5727" width="4" height="4" transform="translate(1360 484)" fill="currentColor"></rect>
                                                        <rect id="Rectangle_5726" data-name="Rectangle 5726" width="4" height="4" transform="translate(1365 479)" fill="currentColor"></rect>
                                                        <rect id="Rectangle_5728" data-name="Rectangle 5728" width="4" height="4" transform="translate(1365 484)" fill="currentColor"></rect>
                                                    </g>
                                                </svg>
                                            </button>
                                            <button class="product__grid--column__buttons--icons" aria-label="list btn" data-toggle="tab" data-target="#product_list">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 13 8">
                                                    <g id="Group_14700" data-name="Group 14700" transform="translate(-1376 -478)">
                                                        <g transform="translate(12 -2)">
                                                            <g id="Group_1326" data-name="Group 1326">
                                                                <rect id="Rectangle_5729" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor"></rect>
                                                                <rect id="Rectangle_5730" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor"></rect>
                                                            </g>
                                                            <g id="Group_1328" data-name="Group 1328" transform="translate(0 -3)">
                                                                <rect id="Rectangle_5729-2" data-name="Rectangle 5729" width="3" height="2" transform="translate(1364 483)" fill="currentColor"></rect>
                                                                <rect id="Rectangle_5730-2" data-name="Rectangle 5730" width="9" height="2" transform="translate(1368 483)" fill="currentColor"></rect>
                                                            </g>
                                                            <g id="Group_1327" data-name="Group 1327" transform="translate(0 -1)">
                                                                <rect id="Rectangle_5731" data-name="Rectangle 5731" width="3" height="2" transform="translate(1364 487)" fill="currentColor"></rect>
                                                                <rect id="Rectangle_5732" data-name="Rectangle 5732" width="9" height="2" transform="translate(1368 487)" fill="currentColor"></rect>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <p class="product__showing--count">
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
                            </div>
                            <div class="tab_content">
                                @include('user_views.product.products_grid')
                                @include('user_views.product.products_list')
                            </div>
                            <div class="pagination__area">
                                <nav class="pagination justify-content-center">
                                    {{ $products->onEachSide(1)->links() }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            {{--<div class="col-lg-9">
                <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center mb-4 mt-4 mt-lg-0 gap-3">
                    <div>
                        <h4 class="mb-1 mb-lg-0" style="font-family: 'Times New Roman', sans-serif">{{ $maincategory->name }}</h4>
                        <div class="text-muted">
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
                        </div>
                    </div>
                    <a href="{{ route("rootcategories") }}" class="category-return-button">{{__('buttons.backToMainCategories')}}</a>
                </div>
                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-lg-4 col-md-6 mt-4 mt-md-0 mt-lg-0 mb-5">
                            <div class="product">
                                {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
                                    @if ($product->image)
                                        <div class="product-image-container">
                                            <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image mx-auto"/>
                                            </a>
                                            <div class="product-add-to-cart-wrapper">
                                                <div class="d-flex justify-content-center justify-content-lg-start">
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <button type="submit" class="text-decoration-none product-add-to-cart-button" title="Add to Cart">
                                                        <i class="fa-solid fa-bag-shopping"></i>
                                                        {{ __('buttons.addToCart') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="product-image-container">
                                            <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                                <img src="/images/noimage.jpeg" alt="" class="product-image mx-auto"/>
                                            </a>
                                            <div class="product-add-to-cart-wrapper">
                                                <div class="d-flex justify-content-center justify-content-lg-start">
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <button type="submit" class="text-decoration-none product-add-to-cart-button" title="Add to Cart">
                                                        <i class="fa-solid fa-bag-shopping"></i>
                                                        <span>{{ __('buttons.addToCart') }}</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="product-information">
                                        <div class="product-title-container">
                                            <a class="product-title" href="{{ route('viewproduct', $product->id) }}">
                                                {{ $product->name }}
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="product-rating">
                                                <span>{{ $product->average }}</span>
                                                <span>/</span>
                                                <span>5</span>
                                                @if ($product->average > 0)
                                                    <i class="fa-solid fa-star text-warning ms-1"></i>
                                                @else
                                                    <i class="fa-regular fa-star text-warning ms-1"></i>
                                                @endif
                                            </div>
                                            <div class="product-price">
                                                @if ($product->discount)
                                                    <span class="product-previous-price product-price-font-family">
                                                    €{{ number_format($product->price,2) }}
                                                </span>&nbsp
                                                    <span class="product-discounted-price product-price-font-family">
                                                    €{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}
                                                </span>
                                                @else
                                                    <span class="product-no-discount-price product-price-font-family">
                                                    €{{ number_format($product->price,2) }}
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="w-100 d-flex justify-content-center flex-column mt-3">
                                            <div class="d-flex justify-content-center">
                                                <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                                                {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                                <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+">
                                            </div>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @empty
                        <span class="text-muted">{{ __('names.noProducts') }}</span>
                    @endforelse
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>--}}
@endsection
