@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("rootcategories") ,'title' => __('names.categories'), 'paragraph'=>$maincategory->name])
    <section class="product-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0 mb-5">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title-container">
                                <h4 class="widget-title mb-5">
                                    {{ __('names.categories') }}
                                </h4>
                            </div>
                            @include('user_views.category.category_tree')
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-5">
                    <div class="d-flex gap-2 flex-column col-12 mb-4">
                        <h3 class="column-title mb-0">{{ $maincategory->name }}</h3>
                    </div>
                    <div class="d-flex gap-2 flex-column col-12 mb-4">
                        {!! $maincategory->description !!}
                    </div>
                    <div class="d-flex gap-2 flex-column col-12 mb-4">
                        <span class="text-muted">{{ __('names.results').': '.$products->total() }}</span>
                    </div>
                    <div class="row">
                        @forelse ($products as $product)
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
                                            {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container justify-content-center justify-content-md-between gap-4 gap-md-0']) !!}
                                                <div class="d-flex">
                                                    <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                                                    {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                                    <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+">
                                                </div>
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button type="submit" class="product-add-to-cart">
                                                    <i class="fa-sharp fa-solid fa-cart-plus me-1"></i>
                                                    {{__('buttons.addToCart')}}
                                                </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                        @endforelse
                        {{ $products->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
