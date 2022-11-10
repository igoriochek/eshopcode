@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("promotions") ,'title' => __('names.promotions')])
    <section class="pt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0 mb-5">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title-container">
                                <h4 class="widget-title mb-5">
                                    {{ __('names.promotions') }}
                                </h4>
                            </div>
                            @include('user_views.promotion.promotion_tree')
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-5">
                    <div class="row">
                        @forelse ($promotions as $promotion)
                            <div class="col-lg-12 mb-5">
                                <div class="col-sm-12 d-flex justify-content-between align-items-center flex-column flex-lg-row mb-4">
                                    <div class="d-flex justify-content-center gap-2 flex-column pe-0 pe-lg-3 col-lg-7 col-12">
                                        <h3 class="column-title mb-0">{{ $promotion->name }}</h3>
                                        <span class="text-muted">{{ __('names.results').': '.$promotion->products->count() }}</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 pt-lg-0 col-lg-5 col-12">
                                        <a href="{{ route("promotion", ["id" => $promotion->id]) }}" class="more-products-button">
                                            {{ __("names.more_for_promotions") }}
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    @forelse ($promotion->products as $product)
                                        <div class="col-lg-6 mt-4 mt-lg-0 mb-5">
                                            <div class="product">
                                                @if ($product->image)
                                                    <div class="product-image-container">
                                                        <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image mx-auto"/>
                                                        </a>
                                                    </div>
                                                @else
                                                    <div class="product-image-container">
                                                        <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                                            <img src="/images/noimage.jpeg" alt="" class="product-image mx-auto"/>
                                                        </a>
                                                    </div>
                                                @endif
                                                <div class="product-information">
                                                    <div class="product-title-container">
                                                        <a class="product-title" href="{{ route('viewproduct', $product->id) }}"
                                                           class="product-image">
                                                            {{ $product->name }}
                                                        </a>
                                                    </div>
                                                    <hr class="product-hr"/>
                                                    <div class="d-flex justify-content-between align-items-center my-3">
                                                        <div class="product-rating">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                <i class="fs-5 product-rating-star @if ($product->average >= $i) fa-solid fa-star
                                                        @elseif ($product->average >= $i - .5) fa-solid fa-star-half-stroke
                                                        @else fa-regular fa-star @endif"></i>
                                                            @endfor
                                                        </div>
                                                        <div class="product-price">
                                                            @if ($product->discount)
                                                                <span class="product-previous-price product-price-font-family">
                                                            {{ number_format($product->price,2) }} €
                                                        </span>&nbsp
                                                                <span class="product-discounted-price product-price-font-family">
                                                            {{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }} €
                                                        </span>
                                                            @else
                                                                <span class="product-no-discount-price product-price-font-family">
                                                            {{ number_format($product->price,2) }} €
                                                        </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <hr class="product-hr"/>
                                                    <div class="product-button-container">
                                                        {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container justify-content-center justify-content-md-between']) !!}
                                                            <div class="d-flex">
                                                                <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                                                                {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                                                <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+">
                                                            </div>
                                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                                            <input type="submit" value="{{__('buttons.addToCart')}}" class="product-add-to-cart-button">
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($loop->iteration > 3)
                                            @break
                                        @endif
                                    @empty
                                        <span class="text-muted">{{ __('names.noProducts') }}</span>
                                    @endforelse
                                </div>
                            </div>
                        @empty
                            <span class="promotions-empty">{{ __('names.noPromotions') }}</span>
                        @endforelse
                        {{ $promotions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
