<div class="bb-single-pro-tab">
    <div class="bb-pro-tab">
        <ul class="bb-pro-tab-nav nav">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#detail">{{ __('names.description') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#reviews">{{ __('names.reviews') }}</a>
            </li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade show active" id="detail">
            <div class="bb-inner-tabs">
                <div class="bb-details">
                    <p>
                        {{ $product->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="reviews">
            <div class="bb-inner-tabs">
                <div class="bb-reviews">
                    @forelse ($product->ratings as $rating)
                    <div class="reviews-bb-box">
                        <div class="inner-contact">
                            <h4>{{ $rating->user->name }}</h4>
                            <div class="bb-pro-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="
                                    @if ($rating->value >= $i) ri-star-fill
                                    @elseif ($rating->value >= $i - 0.5) ri-star-half-fill
                                    @else ri-star-line @endif"
                                    style="
                                    @if ($rating->value >= $i - 0.5) color: #fea99a; @endif"></i>
                                    @endfor
                            </div>
                            <p>{{ $rating->description }}</p>
                        </div>
                    </div>
                    @empty
                    <span class="text-muted">{{ __('names.noReviews') }}</span>
                    @endforelse
                </div>
                <div class="bb-reviews-form">
                    <h3>{{ __('names.addReview') }}</h3>
                    @auth
                    <form id="contact-form" action="assets/php/mail.php" method="post">
                        <div class="bb-review-rating">
                            <span>{{ __('names.rating') }}</span>
                            <div class="bb-pro-rating-custom">
                                <input type="radio" name="rating" value="5" id="star5" />
                                <label for="star5">
                                    <i class="ri-star-line star-outline"></i>
                                    <i class="ri-star-fill star-fill"></i>
                                </label>

                                <input type="radio" name="rating" value="4" id="star4" />
                                <label for="star4">
                                    <i class="ri-star-line star-outline"></i>
                                    <i class="ri-star-fill star-fill"></i>
                                </label>

                                <input type="radio" name="rating" value="3" id="star3" />
                                <label for="star3">
                                    <i class="ri-star-line star-outline"></i>
                                    <i class="ri-star-fill star-fill"></i>
                                </label>

                                <input type="radio" name="rating" value="2" id="star2" />
                                <label for="star2">
                                    <i class="ri-star-line star-outline"></i>
                                    <i class="ri-star-fill star-fill"></i>
                                </label>

                                <input type="radio" name="rating" value="1" id="star1" />
                                <label for="star1">
                                    <i class="ri-star-line star-outline"></i>
                                    <i class="ri-star-fill star-fill"></i>
                                </label>
                            </div>
                        </div>
                        <div>
                            <div class="input-box">
                                <textarea id="comment" name="comment"
                                    placeholder="{{ __('names.enterYourComment') }}"></textarea>
                            </div>
                            <div class="input-button">
                                <button type="button" id="product-reviews-add-review-submit" class="bb-btn-2">{{ __('buttons.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <span class="text-muted">{{ __('names.loginToReview') }}</p>
                        @endauth
                </div>
            </div>
        </div>
    </div>
</div>

@push('css')
<style>
    .bb-pro-rating-custom {
        display: inline-flex;
        flex-direction: row-reverse;
        cursor: pointer;
    }

    .bb-pro-rating-custom input[type="radio"] {
        display: none;
    }

    .star-outline {
        display: inline-block;
    }

    .star-fill {
        color: #fea99a;
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
        color: #fea99a;
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