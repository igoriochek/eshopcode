@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'products',
    'secondPageName' => __('menu.products'),
    'hasThirdPage' => true,
    'thirdPageName' => $product->name
])

    <main class="main-wrapper">
        <div class="shop-section section-padding-01">
            <div class="container custom-container">
                <div class="shop-single-product">
                    <div class="row gy-6">
                        <div class="col-md-6">
                            <div class="shop-single-product__images">
                                <div class="shop-single-product__image-main">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide product-image-main">
                                                @if ($product->image)
                                                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                                @else
                                                    <img src="/images/product/product-1.png" alt="{{ $product->name }}">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="shop-single-product__content">
                                <h1 class="shop-single-product__title">{{ $product->name }}</h1>
                                <div class="shop-single-product__meta-review-rating">
                                    <div class="inner">
                                        <div class="shop-single-product__rating">
                                            <div class="shop-single-product__rating-average">
                                                <span class="average">{{ $avarage }} / 5</span>
                                            </div>
                                            <div class="rating-star">
                                                <div class="rating-label"
                                                     style="width: calc(20% * {{$avarage}});">
                                                </div>
                                            </div>
                                            <span class="count text-color-inherit"
                                                  itemprop="ratingCount">{{ __('names.reviews').' ('.$rateCount.')' }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="shop-single-product__price">
                                    @if ($product->discount)
                                        <span class="sale-price discount">{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }} €</span>
                                        <span class="regular-price">{{ number_format($product->price,2)}} €</span>
                                    @else
                                        <span class="sale-price">{{number_format($product->price,2)}} €</span>
                                    @endif
                                </div>
                                <div class="shop-single-product__description">
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="shop-single-product__variations">
                                    <div class="shop-single-product__quantity-meta">
                                        {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container']) !!}
                                        <div class="shop-single-product__quantity">
                                            <div class="product-quantity">
                                                {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                            </div>

                                            <div class="shop-single-product__meta">
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <input type="submit" value="{{__('buttons.addToCart')}}"
                                                       class="btn btn-primary btn-hover-secondary w-100">
                                            </div>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                                <div class="shop-single-product__meta-product">
                                    <div class="shop-single-product__meta-item">
                                        <div class="value">
                                            <ul class="list list-unstyled text-2">
                                                <li class="mb-0">
                                                    <span class="text-uppercase">{{ __('names.categories') }} :</span>
                                                    @forelse ($product->categories as $category)
                                                        <a href="{{ url("/user/innercategories/$category->id") }}">
                                                            {{ $category->name }}
                                                        </a>
                                                    @empty
                                                        <span
                                                            class="fw-bold text-dark">{{ __('names.noCategories') ?? '-' }}</span>
                                                    @endforelse
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-product-tabs">
                    <div class="shop-product-tabs__item">
                        <h3 class="shop-product-tabs__title">{{ __('names.reviews')}} <span class="count">({{$rateCount}})</span>
                        </h3>
                        <ul class="comment-list">
                            @forelse ($product->ratings as $rating)
                                <li>
                                    <div class="comment-item">
                                        <div class="comment-item__content">
                                            <div class="comment-item__meta">
                                                <div class="comment-item__rating">
                                                    <div class="rating-star">
                                                        <div class="rating-label"
                                                             style="width: calc(20% * {{$rating->value}});">>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6 class="comment-item__name">{{ $rating->user->name }}</h6>
                                            </div>
                                            <div class="comment-item__description">
                                                <p>{{ $rating->description  }}</p>
                                            </div>
                                            <div class="comment-item__footer">
                                                <span
                                                    class="comment-item__datetime">{{ $rating->created_at->format('F j, Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <p class="text-muted">{{ __('names.noReviews') }}</p>
                            @endforelse
                        </ul>
                        <div class="comment-form">


                            @guest
                                <p class="text-muted">{{ __('names.loginToReview') }}</p>
                            @endguest
                            @auth
                                @if ( !$voted)
                                    <div class="comment-form__notes pt-20">
                                        <h4 class="shop-product-tabs__title">{{ __('names.addReview') }}</h4>
                                    </div>
                                    <div class="comment-form__rating">
                                        <label class="label"> {{ __('names.rating') }} <span
                                                class="text-danger">*</span></label>
                                        <div class="rating">
                                            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                        </div>
                                    </div>
                                    <div class="row gy-4">
                                        <div class="col-md-12">
                                            <div class="comment-form__input">
                                            <textarea name="review-message" class="form-control"
                                                      placeholder="{{ __('names.writeReview') }}"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="comment-form__input">
                                                <button type="button" id="submit-review"
                                                        class="btn btn-primary btn-hover-secondary">{{ __('buttons.postReview') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <h3 class="text-muted text-center">{{__('names.alreadyVoted')}}</h3>
                                @endif
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@endsection

@push('scripts')
    <script>
        $('#submit-review').click(() => {
            const value = $('input[type=radio][name=rating]:checked').val();
            const desc = $('textarea[name=review-message]').val();
            console.log(desc);
            $.post("{{ route('addUserRating') }}",
                {
                    "_token": "{{ csrf_token() }}",
                    rating: value,
                    description: desc,
                    product: {{ $product->id }}
                },
                (data, status) => {
                    if (data.val == "ok") location.reload();
                }
            );
        });
    </script>
@endpush

@push('css')

    <style>

        /*    rating form*/
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .rating > input {
            display: none
        }

        .rating > label {
            position: relative;
            width: 1em;
            font-size: 1.5vw;
            cursor: pointer
        }

        .rating > label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating > label:hover:before,
        .rating > label:hover ~ label:before {
            opacity: 1 !important
        }

        .rating > input:checked ~ label:before {
            opacity: 1
        }

        .rating:hover > input:checked ~ label:before {
            opacity: 0.4
        }

    </style>
@endpush
