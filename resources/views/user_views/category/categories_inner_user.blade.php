@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <aside class="sidebar">
                    <h5 class="sidebar-title">{{ __('names.categories')}}</h5>
                    @include('user_views.category.categoryTree')
                </aside>
            </div>
            <div class="col-lg-9">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5>{{ $maincategory->name }}</h5>
                    <a href="{{ route("rootcategories") }}" class="category-return-button">{{__('buttons.backToMainCategories')}}</a>
                </div>
                <div class="row">
                    @forelse ($products as $product)
                        <div class="col-lg-4 col-md-6 mt-4 mt-md-0 mt-lg-0 mb-5">
                            <div class="product">
                                @if ($product->image)
                                    <div class="product-image-container">
                                        <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image mx-auto"/>
                                        </a>
                                        <div class="product-add-to-cart-wrapper">
                                            {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'd-flex justify-content-center justify-content-lg-start']) !!}
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="count" value="1">
                                            <div class="product-add-to-cart-text">{{ __('buttons.addToCart') }}</div>
                                            <button type="submit" class="text-decoration-none product-add-to-cart-button" title="{{ __('buttons.addToCart') }}">
                                                <i class="fa-solid fa-bag-shopping"></i>
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                @else
                                    <div class="product-image-container">
                                        <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                            <img src="/images/noimage.jpeg" alt="" class="product-image mx-auto"/>
                                        </a>
                                        <div class="product-add-to-cart-wrapper">
                                            {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'd-flex justify-content-center justify-content-lg-start']) !!}
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="count" value="1">
                                            <button type="submit" class="text-decoration-none product-add-to-cart-button" title="Add to Cart">
                                                <i class="fa-solid fa-bag-shopping"></i>
                                            </button>
                                            <!--<div class="product-add-to-cart-text">{{ __('buttons.addToCart') }}</div>-->
                                            {!! Form::close() !!}
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
                                        <div class="product-price">
                                            @if ($product->discount)
                                                <span class="product-previous-price product-price-font-family">
                                                €{{ $product->price }}
                                            </span>&nbsp
                                                <span class="product-discounted-price product-price-font-family">
                                                €{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}
                                            </span>
                                            @else
                                                <span class="product-no-discount-price product-price-font-family">
                                                €{{ $product->price }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <span class="text-muted">{{ __('names.noProducts') }}</span>
                    @endforelse
                    <div class="d-flex justify-content-end">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
