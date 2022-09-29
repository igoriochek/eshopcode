@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <aside class="sidebar">
                    <h5 class="sidebar-title">{{ __('names.promotions')}}</h5>
                    @include('user_views.promotion.promotion_tree')
                </aside>
            </div>
            <div class="col-lg-9">
                <div class="row">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h5>{{ $promotion->name }}</h5>
                            <a href="{{ route("promotions") }}" class="promotion-return-button">
                                {{ __('buttons.backToAllPromotions') }}
                            </a>
                        </div>
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
                    <div class="d-flex justify-content-start">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
