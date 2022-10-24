@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'promotions',
    'secondPageName' => __('names.promotions'),
    'hasThirdPage' => true,
    'thirdPageName' => $promotion->name
])
    <main class="main-wrapper">
        <div class="courses-section section-padding-01">
            <div class="container">
                <div class="row gy-10 flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="grid">
                                <div class="row gy-6">
                                        <div class="d-flex justify-content-between align-items-center mb-4">
                                            <h5>{{ $promotion->name }}</h5>
                                        </div>
                                        <hr class="mb-5" style="background: #ccc">
                                        @forelse ($products as $product)
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="course-item" data-aos="fade-up" data-aos-duration="1000">
                                                    <div class="course-header">
                                                        <div class="course-header__thumbnail ">
                                                            @if ($product->image)
                                                                <a style="cursor: pointer"
                                                                   href="{{ route('viewproduct', $product->id) }}">
                                                                    <img src="{{ $product->image }}"
                                                                         alt="{{ $product->name }}" width="330"
                                                                         height="221">
                                                                </a>
                                                            @else
                                                                <a style="cursor: pointer"
                                                                   href="{{ route('viewproduct', $product->id) }}">
                                                                    <img src="/images/courses/courses-1.jpg"
                                                                         alt="{{ $product->name }}" width="330"
                                                                         height="221">
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="course-info">
                                                        <h3 class="course-info__title"><a
                                                                href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
                                                        </h3>
                                                        <div class="course-info__price">
                                                            @if ($product->discount )
                                                                <span class="sale-price discount">{{ round(($product->price * $product->discount->proc / 100),2) }} €</span>
                                                                <span class="regular-price">{{number_format($product->price,2)}} €</span>
                                                            @else
                                                                <span class="sale-price">{{number_format($product->price,2)}} €</span>
                                                            @endif
                                                        </div>
                                                        {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
                                                        <div
                                                            class="product-list-item__actions d-flex justify-content-center">
                                                            <div class="product-quantity ">
                                                                {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                                            </div>
                                                            <input type="hidden" name="id" value="{{ $product->id }}">

                                                            <button type="submit"
                                                                    class="product-list-item__btn btn btn-primary btn-hover-secondary d-flex justify-content-center">
                                                                <span>{{ __('buttons.addToCart') }}</span>
                                                            </button>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                                        @endforelse
                                        <hr class="mb-5" style="background: #ccc">
                                </div>
                            </div>
                        </div>
                        <div class="page-pagination d-flex justify-content-center">
                            {{ $products -> links() }}
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="sidebar-widget-wrapper">
                            <div class="sidebar-widget-wrap bg-color-10">
                                <h4 class="sidebar-widget-wrap__title">{{__('names.promotions')}}</h4>
                                <div class="widget-filter">
                                    <div class="widget-filter__wrapper pl-0" style="white-space: nowrap;">
                                        @include('user_views.promotion.promotionTree')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection
