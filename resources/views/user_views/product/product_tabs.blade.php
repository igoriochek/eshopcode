{{-- <div class="container">

<ul class="nav justify-content-center feature-tab-list-2 mt-4" id="nav-tab-2" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="#tab-2-1" data-bs-toggle="tab" data-bs-target="#tab-2-1" role="tab" aria-selected="false">
            {{ __('names.description') }}
</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="#tab-2-2" data-bs-toggle="tab" data-bs-target="#tab-2-2" role="tab" aria-selected="false">
        {{ __('names.reviews').' ('.$product->ratings->count().') ' }}
    </a>
</li>
</ul>
<div class="tab-content">
    <div class="tab-pane fade active show" id="description" role="tabpanel" aria-labelledby="description-tab" tabindex="0">
        <div class="description-content">
            {!! $product->description !!}
        </div>
    </div>
    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab" tabindex="0">
        <div class="review-content">
            <div class="all-review-content">
                <h3>{{ __('names.reviews') }}</h3>
                @forelse ($product->ratings as $rating)
                <div class="single-review ps-1">
                    <div class="content">
                        <div class="rating flex-row justify-content-start">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="product-rating-star @if ($rating->value >= $i) fa-solid fa-star
                                            @elseif ($rating->value >= $i - .5) fa-solid fa-star-half-stroke
                                            @else fa-regular fa-star 
                                            @endif"></i>
                                @endfor
                        </div>
                        <h5>{{ $rating->user->name }}</h5>
                        <span class="date">{{ $rating->created_at->format('F j, Y') }}</span>
                        <p>{{ $rating->description }}</p>
                    </div>
                </div>
                @empty
                <span class="text-muted">{{ __('names.noReviews') }}</span>
                @endforelse
            </div>
            <div id="write" class="review-form">
                <h3>{{ __('names.addReview') }}</h3>
                @auth
                <form class="review-product">
                    <div class="form-group">
                        <label>{{ __('names.rating').'*' }}</label>
                        <div class="rating" style="gap: 5px">
                            <input type="radio" name="rating" value="5" id="5"><label for="5">
                                <i class="fa-regular fa-star text-warning"></i>
                            </label>
                            <input type="radio" name="rating" value="4" id="4"><label for="4">
                                <i class="fa-regular fa-star text-warning"></i>
                            </label>
                            <input type="radio" name="rating" value="3" id="3"><label for="3">
                                <i class="fa-regular fa-star text-warning"></i>
                            </label>
                            <input type="radio" name="rating" value="2" id="2"><label for="2">
                                <i class="fa-regular fa-star text-warning"></i>
                            </label>
                            <input type="radio" name="rating" value="1" id="1"><label for="1">
                                <i class="fa-regular fa-star text-warning"></i>
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>{{ __('names.review').'*' }}</label>
                        <textarea class="form-control" rows="8" id="comment" name="comment"></textarea>
                    </div>
                    <button class="default-btn style5 product-reviews-add-review-submit" type="submit">
                        {{ __('buttons.submit') }}
                    </button>
                </form>
                @else
                <span class="text-muted">{{ __('names.loginToReview') }}</p>
                    @endauth
            </div>
        </div>
    </div>
</div>
</div> --}}

<ul class="nav justify-content-center feature-tab-list-2 mt-4" id="nav-tab-2" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" href="#tab-2-1" data-bs-toggle="tab" data-bs-target="#tab-2-1" role="tab" aria-selected="false">
            {{ __('names.description') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#tab-2-2" data-bs-toggle="tab" data-bs-target="#tab-2-2" role="tab" aria-selected="false">
            {{ '('.$product->ratings->count().' '.__('names.reviews').')' }}
        </a>
    </li>
</ul>

<div class="tab-content" id="nav-tabContent-2">
    <div class="tab-pane fade pt-60 active show" id="tab-2-1" role="tabpanel">
        <div class="row justify-content-center align-items-center justify-content-around">
            <div class="col-md-10 col-lg-8">
                <div class="feature-tab-info">
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-pane fade review-pane pt-60" id="tab-2-2" role="tabpanel">
        <div class="col-lg-6 col-md-12">
            <div class="tp-product-details-review-statics">
                <div class="tp-product-details-review-number d-inline-block mb-50">
                    <div class="tp-product-details-review-summery d-flex align-items-center">
                        <div class="tp-product-details-review-summery-value">
                            <span style="margin-right: 5px;">{{ number_format($average, 1) }}</span>
                        </div>
                        <div class="tp-product-details-review-summery-rating d-flex align-items-center">
                            <div class="rating flex-row justify-content-start text-warning" style="margin-right: 5px;">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="product-rating-star @if ($average >= $i) fa-solid fa-star
                                            @elseif ($average >= $i - .5) fa-solid fa-star-half-stroke
                                            @else fa-regular fa-star 
                                            @endif"></i>
                                    @endfor
                            </div>
                            <p style="margin-bottom: 0px;">{{ '('.$product->ratings->count().' '.__('names.reviews').')' }}</p>
                        </div>
                    </div>
                    <div class="tp-product-details-review-rating-list">
                        <div class="tp-product-details-review-rating-item d-flex align-items-center">
                            <span class="rating-percentage-title">5 {{ __('names.stars') }}</span>
                            <span class="tp-product-details-review-rating-bar-inner" data-width="{{ $percentages[5] ?? 0 }}%" style="width: {{ $percentages[5] ?? 0 }}%;"></span>

                            <div class="tp-product-details-review-rating-percent">
                                <span>{{ $percentages[5] ?? 0 }}%</span>
                            </div>
                        </div>

                        <div class="tp-product-details-review-rating-item d-flex align-items-center">
                            <span class="rating-percentage-title">4 {{ __('names.stars') }}</span>
                            <span class="tp-product-details-review-rating-bar-inner" data-width="{{ $percentages[4] ?? 0 }}%" style="width: {{ $percentages[4] ?? 0 }}%;"></span>

                            <div class="tp-product-details-review-rating-percent">
                                <span>{{ $percentages[4] ?? 0 }}%</span>
                            </div>
                        </div>

                        <div class="tp-product-details-review-rating-item d-flex align-items-center">
                            <span class="rating-percentage-title">3 {{ __('names.stars') }}</span>
                            <span class="tp-product-details-review-rating-bar-inner" data-width="{{ $percentages[3] ?? 0 }}%" style="width: {{ $percentages[3] ?? 0 }}%;"></span>

                            <div class="tp-product-details-review-rating-percent">
                                <span>{{ $percentages[3] ?? 0 }}%</span>
                            </div>
                        </div>

                        <div class="tp-product-details-review-rating-item d-flex align-items-center">
                            <span class="rating-percentage-title">2 {{ __('names.stars') }}</span>
                            <span class="tp-product-details-review-rating-bar-inner" data-width="{{ $percentages[2] ?? 0 }}%" style="width: {{ $percentages[2] ?? 0 }}%;"></span>

                            <div class="tp-product-details-review-rating-percent">
                                <span>{{ $percentages[2] ?? 0 }}%</span>
                            </div>
                        </div>

                        <div class="tp-product-details-review-rating-item d-flex align-items-center">
                            <span class="rating-percentage-title">1 {{ __('names.stars') }}</span>
                            <span class="tp-product-details-review-rating-bar-inner" data-width="{{ $percentages[1] ?? 0 }}%" style="width: {{ $percentages[1] ?? 0 }}%;"></span>

                            <div class="tp-product-details-review-rating-percent">
                                <span>{{ $percentages[1] ?? 0 }}%</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <h2 class="tp-product-details-review-title">{{ __('names.reviews') }}</h2>
                    <div class="row">
                        <div class="col-12">
                            <div class="position-relative w-100">
                                <div class="swiper testimonialSwiper">
                                    <div class="swiper-wrapper">
                                        @forelse ($product->ratings as $rating)
                                        <div class="swiper-slide">
                                            <div class="border border-2 p-5 rounded-custom position-relative">
                                                <div class="d-flex align-items-center" style="margin-bottom: 10px;">
                                                    <div class="author-info">
                                                        <h6 class="mb-0">{{ $rating->user->name }}</h6>
                                                        <small>{{ $rating->created_at->format('F j, Y') }}</small>
                                                    </div>
                                                </div>
                                                <blockquote>
                                                    {{ $rating->description }}
                                                </blockquote>
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="product-rating-star text-warning pb-1 @if ($rating->value >= $i) fa-solid fa-star
                                    @elseif ($rating->value >= $i - .5) fa-solid fa-star-half-stroke
                                    @else fa-regular fa-star 
                                    @endif"></i>
                                                    @endfor
                                            </div>
                                        </div>
                                        @empty
                                        <span class="text-muted">{{ __('names.noReviews') }}</span>
                                        @endforelse
                                    </div>
                                </div>

                                <div class="swiper-nav-control">
                                    <div class="swiper-button-next" style="right: -15px;"></div>
                                    <div class="swiper-button-prev" style="left: -15px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="register-wrap p-5 bg-white shadow rounded-custom position-relative">
                <form action="#" class="register-form position-relative z-5">
                    <h3 class="mb-5 fw-medium">{{ __('names.addReview') }}</h3>
                    @auth
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="input-group mb-3">
                                <p style="margin-bottom: 0px;margin-right: 10px;">{{ __('names.rating') }}:</p>
                                <div class="tp-product-details-review-form-rating-icon d-flex align-items-center">
                                    <div class="rating" style="gap: 5px">
                                        <input type="radio" name="rating" value="5" id="5"><label for="5">
                                            <i class="fa-regular fa-star text-warning"></i>
                                        </label>
                                        <input type="radio" name="rating" value="4" id="4"><label for="4">
                                            <i class="fa-regular fa-star text-warning"></i>
                                        </label>
                                        <input type="radio" name="rating" value="3" id="3"><label for="3">
                                            <i class="fa-regular fa-star text-warning"></i>
                                        </label>
                                        <input type="radio" name="rating" value="2" id="2"><label for="2">
                                            <i class="fa-regular fa-star text-warning"></i>
                                        </label>
                                        <input type="radio" name="rating" value="1" id="1"><label for="1">
                                            <i class="fa-regular fa-star text-warning"></i>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="comment">{{ __('names.review').'*' }}</label>
                            <div class="input-group mb-3">
                                <textarea class="form-control" id="comment" name="comment" placeholder="" rows="8" style="height: 120px"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="button" type="submit" class="btn btn-primary mt-4 d-block w-100" id="product-reviews-add-review-submit">
                                {{ __('buttons.postReview') }}
                            </button>
                        </div>
                    </div>
                    @else
                    <span class="text-muted">{{ __('names.loginToReview') }}</p>
                        @endauth
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .rating>input:checked~label::before {
        margin-left: 3px;
        margin-top: -3px;
    }

    .register-wrap {
        margin-left: 20px;
    }

    .review-pane {
        display: flex !important;
        justify-content: center !important;
    }

    @media (max-width: 991px) {
        .review-pane {
            display: block !important;
            justify-content: none !important;
        }

        .register-wrap {
            margin-left: 0px;
            margin-top: 20px;
        }
    }


    .tp-product-details-review-title {
        margin-top: 10px;
    }

    .tp-product-details-review-rating-list {
        width: 135%;
    }

    .tp-product-details-review-rating-bar-inner {
        height: 21.6px;
        background-color: #175cff;
        margin-right: 5px;
        border: 3px solid #0044e3;
        border-radius: 5px;
    }

    .rating-percentage-title {
        white-space: nowrap;
        margin-right: 5px;
    }

    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }

    .rating>input {
        display: none
    }

    .rating>label i {
        position: relative;
        width: 1em;
        cursor: pointer;
        color: #FFD600;
        font-size: 1.35em;
        padding-top: 4px;
    }

    .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0;
        color: #FFD600;
        font-size: 1.35em;
    }

    .rating>label:hover:before,
    .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .rating>input:checked~label:before {
        opacity: 1
    }

    .rating:hover>input:checked~label:before {
        opacity: 0.4
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.testimonialSwiper', {
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            slidesPerView: 1,
            spaceBetween: 30,
        });
    });
</script>