@extends('layouts.app')

@section('content')
    @include('page_header', [
    'secondPageLink' => 'promotions',
    'secondPageName' => __('names.promotions'),
    'hasThirdPage' => true,
    'thirdPageName' => $promotion->name
])
    <div class="container mb-30 mt-30" style="transform: none;">
        <div class="row" style="transform: none;">
            <div class="col-lg-9">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <h4 class="mb-2">{{ $promotion->name ?? __('names.promotion')}}</h4>
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
                            <a href="{{ route("promotions") }}" class="btn btn-primary w-100">
                                {{ __('names.backToAllPromotions') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @forelse($products as $product)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        @if ($product->image)
                                            <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="default-img mb-2" />
                                            </a>
                                        @else
                                            <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                                <img src="{{ asset('images/noimage.jpeg') }}" alt="" class="default-img mb-2" />
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        @foreach ($product->categories ?? [] as $category)
                                            <a href="{{ Auth::user() ? url("/user/innercategories/$category->id") : url("/innercategories/$category->id") }}">
                                                {{ $category->name }}
                                            </a>
                                            @if ($loop->iteration > 0)
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                    <h2>
                                        <a href="{{ route('viewproduct', $product->id) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h2>
                                    <div class="product-rate-cover mt-1 d-flex align-items-center justify-content-between">
                                        <div class="product-rate d-flex">
                                            <div class="d-flex" style="width: 90%">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fs-6 product-rating-star @if ($product->average >= $i) fa-solid fa-star
                                                        @elseif ($product->average >= $i - .5) fa-solid fa-star-half-stroke
                                                        @else fa-regular fa-star @endif"></i>
                                                @endfor
                                            </div>
                                            <span class="font-small ms-4 ps-3 text-muted">({{ $product->average ?? 0 }})</span>
                                        </div>
                                        <div class="product-price">
                                            @if ($product->discount)
                                                <span class="old-price">€{{ $product->price }}</span>
                                                <span>€{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}</span>
                                            @else
                                                <span>€{{ $product->price }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="add-cart w-100">
                                            {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'd-flex justify-content-between align-items-center gap-2']) !!}
                                            {!! Form::number('count', "1", ['style' => 'height: 40px; width: 100px; text-align: center', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="submit" value="{{ __('buttons.addToCart') }}" class="ms-3 add">
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                    @empty
                        <span class="text-muted">{{ __('names.noProducts') }}</span>
                    @endforelse
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20">
                    {{ $products->links() }}
                </div>
            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <!-- Product sidebar Widget -->
                <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30">
                            {{ __('names.promotions') }}
                        </h5>
                        @include('user_views.promotion.promotion_tree')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
