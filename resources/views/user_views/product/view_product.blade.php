@extends('layouts.app')

@section('content')
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{ $product->name ?? '' }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">
                                    {{ __('menu.home') }}
                                </a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url()->previous() }}">
                                    @if (Str::contains(str_replace(url('/'), '', url()->previous()) ,'/products'))
                                        {{ __('menu.products') ?? '' }}
                                    @elseif (Str::contains(str_replace(url('/'), '', url()->previous()) ,'/innercategories'))
                                        {{ __('menu.categories') ?? '' }}
                                    @elseif (Str::contains(str_replace(url('/'), '', url()->previous()) ,'/promotions'))
                                        {{ __('menu.promotions') ?? '' }}
                                    @endif
                                </a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{ $product->name ?? '' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->
    <section class="product__details--section section--padding">
        <div class="container">
            <div class="row row-cols-lg-2 row-cols-md-2">
                <div class="col">
                    <div class="product__details--media">
                        <div class="single__product--preview swiper mb-25 swiper-initialized swiper-horizontal swiper-pointer-events">
                            <div class="swiper-wrapper" id="swiper-wrapper-9d199e277a792227" aria-live="polite" style="transform: translate3d(-600px, 0px, 0px); transition-duration: 0ms;">
                                <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev" data-swiper-slide-index="4" role="group" aria-label="5 / 5" style="width: 590px; margin-right: 10px;"></div>
                                <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" role="group" aria-label="1 / 5" style="width: 590px; margin-right: 10px;">
                                    <div class="product__media--preview__items" >
                                        @if ($product->image)
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                 class="product__media--preview__items--img"/>
                                        @else
                                            <img src="/images/noimage.jpeg" alt="n-image"
                                                 class="product__media--preview__items--img"/>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="product__details--info">
                        <h2 class="product__details--info__title mb-15">{{ $product->name }}</h2>
                        <div class="product__details--info__price mb-12">
                            @if ($product->discount)
                                <span class="current__price">
                                            €{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}
                                        </span>
                                <strike class="old__price">
                                    €{{ number_format($product->price, 2) }}
                                </strike>
                            @else
                                <span>
                                        €{{ number_format($product->price, 2) }}
                                    </span>
                            @endif
                        </div>
                        <ul class="rating product__card--rating mb-15 d-flex flex-row justify-content-start">
                            @for($i = 1; $i <= 5; $i++)
                                <li class="rating__list">
                                        <span class="rating__icon">
                                            <i class="fs-5 product-rating-star @if ($average >= $i) fa-solid fa-star
                                             @elseif ($average >= $i - .5) fa-solid fa-star-half-stroke
                                             @else fa-regular fa-star @endif"></i>
                                        </span>
                                </li>
                            @endfor
                            <li>
                                    <span class="rating__review--text">
                                        {{ '('.$rateCount.' '.__('names.reviews').')' }}
                                    </span>
                            </li>
                        </ul>
                        <p class="product__details--info__desc mb-15">
                            {{ $product->description }}
                        </p>
                        <div class="product__variant">
                            <div class="product__variant--list quantity d-flex align-items-center mb-30 mt-4 mt-md-0">
                                {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'd-flex']) !!}
                                    <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                                    {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                    <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+">
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button type="submit"
                                            class="product__card--btn primary__btn ms-4"
                                            title="{{ __('buttons.addToCart') }}">
                                        <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z" fill="currentColor"></path>
                                        </svg>
                                        <span>{{ __('buttons.addToCart') }}</span>
                                    </button>
                                {!! Form::close() !!}
                            </div>
                            <div class="product__variant--list mb-15">
                                <div class="product__details--info__meta">
                                    <p class="product__details--info__meta--list">
                                        <strong>{{ __('names.categories') }}:</strong>
                                        @forelse ($product->categories as $category)
                                            <a href="{{ url("/user/innercategories/$category->id") }}">
                                                {{ $category->name }}
                                            </a>
                                        @empty
                                            <span class="fw-normal text-dark">{{ __('names.noCategories') }}</span>
                                        @endforelse
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product__details--tab__section section--padding">
        <div class="container">
            <div class="row row-cols-1">
                <div id="description" class="tabs tabs-simple tabs-simple-full-width-line tabs-product tabs-dark mb-2">
                    <ul class="nav nav-tabs justify-content-start product__tab--one product__details--tab mb-30" role="tablist">
                        <li class="product__details--tab__list" role="presentation">
                            <a class="active" href="#productDescription" data-bs-toggle="tab" aria-selected="true" role="tab">
                                {{ __('names.description') }}
                            </a>
                        </li>
                        <li class="product__details--tab__list" role="presentation">
                            <a class="" href="#productReviews" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">
                                {{ __('names.reviews').' ('.$product->ratings->count().') ' }}
                            </a>
                        </li>
                    </ul>
                    <div class="product__details--tab__inner border-radius-10">
                        <div class="tab-content p-0">
                            <div class="tab-pane px-0 py-3 active" id="productDescription" role="tabpanel">
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="tab-pane px-0 py-3" id="productReviews" role="tabpanel">
                                <div class="product__reviews">
                                    <div class="reviews__comment--area @if (count($product->ratings) === 0) ps-0 pb-5 border-bottom @endif">
                                        @forelse ($product->ratings as $rating)
                                            <div class="reviews__comment--list d-flex w-100">
                                                <div class="reviews__comment--content w-100 ps-0">
                                                    <div class="reviews__comment--top d-flex justify-content-between">
                                                        <div class="reviews__comment--top__left">
                                                            <h3 class="reviews__comment--content__title h4">
                                                                {{ $rating->user->name }}
                                                            </h3>
                                                            <ul class="rating d-flex flex-row justify-content-start">
                                                                @for($i = 1; $i <= 5; $i++)
                                                                    <li class="rating__list">
                                                                        <span class="rating__icon">
                                                                            <i class="product-rating-star @if ($rating->value >= $i) fa-solid fa-star
                                                                                @elseif ($rating->value >= $i - .5) fa-solid fa-star-half-stroke
                                                                                @else fa-regular fa-star @endif"></i>
                                                                        </span>
                                                                    </li>
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                        <span class="reviews__comment--content__date">{{ $rating->created_at->format('F j, Y') }}</span>
                                                    </div>
                                                    <p class="reviews__comment--content__desc">
                                                        {{ $rating->description ?? '' }}
                                                    </p>
                                                </div>
                                            </div>
                                        @empty
                                            <p class="text-muted">{{ __('names.noReviews') }}</p>
                                        @endforelse
                                    </div>
                                    <div id="writereview" class="reviews__comment--reply__area">
                                        <h3 class="reviews__comment--reply__title mb-15">{{ __('names.addReview') }}</h3>
                                        @guest
                                            <p class="text-muted">{{ __('names.loginToReview') }}</p>
                                        @else
                                            @if (!$voted)
                                                <div class="reviews__ratting mb-20">
                                                    <ul class="rating d-flex">
                                                        <li class="rating__list">
                                                        <span class="rating__icon gap-2">
                                                            <input type="radio" name="rating" value="5" id="5">
                                                            <label for="5">
                                                                <i class="fa-regular fa-star text-danger"></i>
                                                            </label>
                                                            <input type="radio" name="rating" value="4" id="4">
                                                            <label for="4">
                                                                <i class="fa-regular fa-star text-danger"></i>
                                                            </label>
                                                            <input type="radio" name="rating" value="3" id="3">
                                                            <label for="3">
                                                                <i class="fa-regular fa-star text-danger"></i>
                                                            </label>
                                                            <input type="radio" name="rating" value="2" id="2">
                                                            <label for="2">
                                                                <i class="fa-regular fa-star text-danger"></i>
                                                            </label>
                                                            <input type="radio" name="rating" value="1" id="1">
                                                            <label for="1">
                                                                <i class="fa-regular fa-star text-danger"></i>
                                                            </label>
                                                        </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mb-10">
                                                        <textarea class="reviews__comment--reply__textarea" id="comment" placeholder="{{ __('names.review') }}"></textarea>
                                                    </div>
                                                </div>
                                                <button class="primary__btn text-white post-review-button" data-hover="Submit" type="submit">
                                                    {{ __('buttons.postReview') }}
                                                </button>
                                            @else
                                                <p class="text-muted">{{ __('names.alreadyReviewed') }}</p>
                                            @endif
                                        @endguest
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('.post-review-button').click(function () {
            const value = $('input[type=radio][name=rating]:checked').val();
            const desc = $('textarea#comment').val();
            $.post("{{route('addUserRating')}}",
                {
                    "_token": "{{ csrf_token() }}",
                    rating: value,
                    description: desc,
                    product: {{ $product->id }}
                },
                function (data, status) {
                    if (data.val == "ok") {
                        $('#writereview').html("<p class='text-muted'>{{ __('names.reviewProduct') }}</p>");
                        setTimeout(() => location.reload(), 1000);
                    }
                }
            );
        });
    </script>
@endpush
@push('css')
    <style>
        /*rating form*/
        .rating__icon {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
        }

        .rating__icon > input {
            display: none
        }

        .rating__icon > label {
            position: relative;
            width: 1em;
            font-size: 2rem;
            color: var(--secondary-color);
            cursor: pointer
        }

        .rating__icon > label::before {
            content: "\2605";
            position: absolute;
            opacity: 0;
            top: 0;
            left: 1px;
        }

        .rating__icon > label:hover:before,
        .rating__icon > label:hover ~ label:before {
            opacity: 1 !important
        }

        .rating__icon > input:checked ~ label:before {
            opacity: 1
        }

        .rating__icon:hover > input:checked ~ label:before {
            opacity: 0.4
        }
    </style>
@endpush
