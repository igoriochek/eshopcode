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
                        <form action="#">
                            <h2 class="product__details--info__title mb-15">{{ $product->name }}</h2>
                            <div class="product__details--info__price mb-12">
                                @if ($product->discount)
                                    <span class="current__price">
                                            €{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}
                                        </span>
                                    <span class="old__price">
                                        €{{ number_format($product->price, 2) }}
                                    </span>
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
                                <div class="product__variant--list quantity d-flex align-items-center mb-20">
                                    {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container']) !!}

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
                        </form>
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
