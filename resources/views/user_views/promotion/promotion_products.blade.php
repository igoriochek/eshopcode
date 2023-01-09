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
            <div class="col-xl-9 col-lg-8 col-md-7 col-12 order-md-0 order-1">
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
                        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        @if ($product->image)
                                            <a style="cursor: pointer; overflow: hidden" href="{{ route('viewproduct', $product->id) }}">
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="default-img mb-2" style="width: 100%; height: 300px; object-fit: cover"/>
                                            </a>
                                        @else
                                            <a style="cursor: pointer; overflow: hidden" href="{{ route('viewproduct', $product->id) }}">
                                                <img src="{{ asset('images/noimage.jpeg') }}" alt="no-image" class="default-img mb-2" style="width: 100%; height: 300px; object-fit: cover"/>
                                            </a>
                                        @endif
                                        @if ($product->discount)
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot" style="font-size: 14px">-{{$product->discount->proc}}%</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category text-center mt-2 mb-2">
                                        @foreach ($product->categories ?? [] as $category)
                                            <a href="{{ Auth::user() ? url("/user/innercategories/$category->id") : url("/innercategories/$category->id") }}">
                                                {{ $category->name }}
                                            </a>
                                            @if ($loop->first)
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center w-100 mb-3">
                                        <div class="d-flex">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fs-6 product-rating-star text-warning
                                                        @if ($product->average >= $i) fa-solid fa-star
                                                        @elseif ($product->average >= $i - .5) fa-solid fa-star-half-stroke
                                                        @else fa-regular fa-star @endif"
                                                ></i>
                                            @endfor
                                        </div>
                                        <span class="font-small ms-1">({{ sprintf("%.1f", $product->average) ?? 0 }})</span>
                                    </div>
                                    <h2 class="text-center" style="font-size: 21px">
                                        <a href="{{ route('viewproduct', $product->id) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h2>
                                    <div class="product-rate-cover mt-2 mb-4">
                                        <div class="product-price text-center d-flex justify-content-center align-items-center gap-3">
                                            @if ($product->discount)
                                                <span class="old-price">€{{ sprintf("%.2f", $product->price) }}</span>
                                                <span >€{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}</span>
                                            @else
                                                <span>€{{ sprintf("%.2f", $product->price) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-card-bottom mb-3">
                                        <div class="add-cart w-100">
                                            {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'd-flex justify-content-between align-items-center gap-2']) !!}
                                            {!! Form::number('count', "1", ['style' => 'height: 44px; width: 100px; padding-left: 30px; padding-right: 15px; border-radius: 5px', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <button type="submit" class="ms-3 add">
                                                <i class="fa-solid fa-bag-shopping me-1"></i>
                                                {{ __('buttons.addToCart') }}
                                            </button>
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
                <div class="pagination-area mt-20 mb-20 d-flex justify-content-center">
                    {{ $products->onEachSide(1)->links() }}
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 col-12 primary-sidebar sticky-sidebar order-md-1 order-0" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
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
