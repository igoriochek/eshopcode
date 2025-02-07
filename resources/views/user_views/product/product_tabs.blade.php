<div class="product_d_info mb-90">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product_d_inner">
                    <div class="product_info_button">
                        <ul class="nav" role="tablist" id="nav-tab">
                            <li>
                                <a class="active" data-bs-toggle="tab" href="#info" role="tab" aria-controls="info"
                                    aria-selected="false">{{ __('names.description') }}</a>
                            </li>
                            <li>
                                <a data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                                    aria-selected="false">{{ __('names.reviews') }} ({{ $rateCount }})</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="info" role="tabpanel">
                            <div class="product_info_content">
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="reviews_wrapper">
                                <h2>{{ $rateCount . ' ' . __('names.reviews') . ' ' . __('names.for') . ' ' . $product->name }}</h2>
                                @forelse ($product->ratings as $rating)
                                <div class="reviews_comment_box">
                                    <div class="comment_text">
                                        <div class="reviews_meta">
                                            <div class="star_rating">
                                                <ul>
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        <li>
                                                        <a>
                                                            <i class="icon 
                                                            @if ($rating->value >= $i) icon-star2
                                                            @elseif ($rating->value >= $i - 0.5) icon-star2
                                                            @else icon-star-outlined @endif">
                                                            </i>
                                                        </a>
                                                        </li>
                                                        @endfor
                                                </ul>
                                            </div>
                                            <p><strong>{{ $rating->user->name }} </strong>- {{ $rating->created_at->format('F j, Y') }}</p>
                                            <span>{{ $rating->description }}</span>
                                        </div>
                                    </div>

                                </div>
                                @empty
                                <span class="text-muted">{{ __('names.noReviews') }}</span>
                                @endforelse
                                <div class="comment_title">
                                    <h2>{{ __('names.addReview') }} </h2>
                                </div>
                                @auth
                                <div class="product_ratting mb-10">
                                    <h3>{{ __('names.rating') }}</h3>
                                    <div class="bb-pro-rating-custom">
                                        <input type="radio" name="rating" value="5" id="star5" />
                                        <label for="star5">
                                            <i class="icon icon-star-outlined star-outline"></i>
                                            <i class="icon icon-star2 star-fill"></i>
                                        </label>
                                        <input type="radio" name="rating" value="4" id="star4" />
                                        <label for="star4">
                                            <i class="icon icon-star-outlined star-outline"></i>
                                            <i class="icon icon-star2 star-fill"></i>
                                        </label>
                                        <input type="radio" name="rating" value="3" id="star3" />
                                        <label for="star3">
                                            <i class="icon icon-star-outlined star-outline"></i>
                                            <i class="icon icon-star2 star-fill"></i>
                                        </label>
                                        <input type="radio" name="rating" value="2" id="star2" />
                                        <label for="star2">
                                            <i class="icon icon-star-outlined star-outline"></i>
                                            <i class="icon icon-star2 star-fill"></i>
                                        </label>
                                        <input type="radio" name="rating" value="1" id="star1" />
                                        <label for="star1">
                                            <i class="icon icon-star-outlined star-outline"></i>
                                            <i class="icon icon-star2 star-fill"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="product_review_form">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="comment">{{ __('names.review') }}</label>
                                            <textarea id="comment" name="comment" placeholder="{{ __('names.enterYourComment') }}"></textarea>
                                        </div>
                                    </div>
                                    <button type="button" id="product-reviews-add-review-submit">{{ __('buttons.submit') }}</button>
                                </div>
                                @else
                                <span class="text-muted">{{ __('names.loginToReview') }}</p>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('css')
<style>
    .icon {
        color: #79a206;
    }


    .reviews_comment_box .comment_text::before {
        background: none;
        border-bottom: 0px;
        border-left: 0px;
        content: '';
        display: none;
        height: 0px;
        left: 0px;
        position: none;
        top: 0px;
        transform: none;
        width: 0px;
    }

    .reviews_comment_box .comment_text {
        margin-left: 0px;
    }


    .bb-pro-rating-custom {
        display: inline-flex;
        flex-direction: row-reverse;
        cursor: pointer;
        align-items: center;
    }

    .bb-pro-rating-custom input[type="radio"] {
        display: none;
    }

    .star-outline {
        display: inline-block;
    }

    .star-fill {
        display: none;
    }

    .bb-pro-rating-custom input[type="radio"]:checked~label .star-outline {
        display: none;
    }

    .bb-pro-rating-custom input[type="radio"]:checked~label .star-fill {
        display: inline-block;
    }

    [type="radio"]:checked+label {
        padding-left: 5px !important;
    }

    [type="radio"]:not(:checked)+label {
        padding-left: 5px !important;
    }

    [type="radio"]:checked+label::before {
        background: transparent;
        border: 0px solid transparent;
    }

    [type="radio"]:checked+label::after {
        background: transparent;
        top: 0px;
        left: 0px;
    }

    [type="radio"]:not(:checked)+label::before {
        height: 16px;
        border: 0px solid #eee;
        background: transparent;
    }
</style>
@endpush