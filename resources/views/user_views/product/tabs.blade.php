<div class="tab-style3">
    <ul class="nav nav-tabs text-uppercase">
        <li class="nav-item">
            <a class="nav-link active fs-6" id="Description-tab" data-bs-toggle="tab" href="#Description">
                {{ __('names.description') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link fs-6" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">
                {{ __('names.reviews').' ('.$rateCount.')' }}
            </a>
        </li>
    </ul>
    <div class="tab-content shop_info_tab entry-main-content">
        <div class="tab-pane fade active show" id="Description">
            <div>
                <p style="line-height: 33px">{{ $product->description }}</p>
            </div>
        </div>
        <div class="tab-pane fade" id="Reviews">
            <!--Comments-->
            <div class="comments-area">
                <div class="row">
                    <div class="col-lg-8">
                        <h4 class="mb-30">{{ __('names.customerReviews') }}</h4>
                        <div class="comment-list mb-2">
                            @forelse ($product->ratings as $rating)
                                <div class="single-comment justify-content-between d-flex mb-30">
                                    <div class="d-flex flex-column justify-content-between">
                                        <div class="d-flex flex-column flex-md-row justify-content-between mb-10 w-100">
                                            <div class="thumb mb-1">
                                                <a href="javascript:void(0)" class="font-heading text-brand fs-6">{{ $rating->user->name }}</a>
                                            </div>
                                            <div class="d-flex align">
                                                <div class="d-flex align-items-center mb-2">
                                                    <span class="font-xs text-muted">{{ $rating->created_at->format('F j, Y - h:i A') }}</span>
                                                </div>
                                                <div class="product-rate d-inline-block ms-2">
                                                    <div class="product-rating d-flex" style="width: 100%">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <i class="product-rating-star text-warning pt-1
                                                                @if ($rating->value >= $i) fa-solid fa-star
                                                                @elseif ($rating->value >= $i - .5) fa-solid fa-star-half-stroke
                                                                @else fa-regular fa-star @endif"></i>
                                                        @endfor
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="desc">
                                            <p class="mb-10">{{ $rating->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="mb-1 product-reviews-add-review-description">{{ __('names.noReviews') }}</p>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="mb-30">{{ __('names.customerRatings') }}</h4>
                        <div class="d-flex mb-30">
                            <div class="product-rate d-inline-block mr-15">
                                <div class="product-rating d-flex fs-5" style="width: 90%">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="text-warning @if ($average >= $i) fa-solid fa-star
                                           @elseif ($average >= $i - .5) fa-solid fa-star-half-stroke
                                           @else fa-regular fa-star @endif"></i>
                                    @endfor
                                </div>
                            </div>
                            <h6 class="ms-5">{{ $average.' '.__('names.outOf').' '.'5' }}</h6>
                        </div>
                        <div class="progress">
                            <span class="fs-6">
                                5 <i class="text-warning fa-solid fa-star"></i>
                            </span>
                            <div class="progress-bar" role="progressbar"
                                 style="width: {{ $percentages[5] ?? 0 }}%;"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                {{ $percentages[5] ?? 0}}%
                            </div>
                        </div>
                        <div class="progress">
                            <span class="fs-6">
                                4 <i class="text-warning fa-solid fa-star"></i>
                            </span>
                            <div class="progress-bar" role="progressbar"
                                 style="width: {{ $percentages[4] ?? 0 }}%;"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                {{ $percentages[4] ?? 0 }}%
                            </div>
                        </div>
                        <div class="progress">
                            <span class="fs-6">
                                3 <i class="text-warning fa-solid fa-star"></i>
                            </span>
                            <div class="progress-bar" role="progressbar"
                                 style="width: {{ $percentages[3] ?? 0 }}%;"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                {{ $percentages[3] ?? 0 }}%
                            </div>
                        </div>
                        <div class="progress">
                            <span class="fs-6">
                                2 <i class="text-warning fa-solid fa-star"></i>
                            </span>
                            <div class="progress-bar" role="progressbar"
                                 style="width: {{ $percentages[2] ?? 0 }}%;"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                {{ $percentages[2] ?? 0}}%
                            </div>
                        </div>
                        <div class="progress mb-30">
                            <span class="fs-6">
                                1 <i class="text-warning fa-solid fa-star"></i>
                            </span>
                            <div class="progress-bar" role="progressbar"
                                 style="width: {{ $percentages[1] ?? 0 }}%;"
                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                {{ $percentages[1] ?? 0}}%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--comment form-->
            <div class="comment-form">
                <h5 class="mb-10">{{ __('names.addAReview') }}</h5>
                <div class="product-rate d-inline-block "></div>
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        @if (!$voted)
                            @guest
                                <p class="text-muted">{{ __('names.loginToReview') }}</p>
                            @endguest
                            @auth
                                <div class="col-sm-12">
                                    <div class="rating" style="gap: 5px">
                                        <input type="radio" name="rating" value="5" id="5">
                                        <label for="5">
                                            <i class="fa-regular fa-star fs-5 text-warning"></i>
                                            <i class="fa-solid fa-star fs-5 text-warning"></i>
                                        </label>
                                        <input type="radio" name="rating" value="4" id="4">
                                        <label for="4">
                                            <i class="fa-regular fa-star fs-5 text-warning"></i>
                                            <i class="fa-solid fa-star fs-5 text-warning"></i>
                                        </label>
                                        <input type="radio" name="rating" value="3" id="3">
                                        <label for="3">
                                            <i class="fa-regular fa-star fs-5 text-warning"></i>
                                            <i class="fa-solid fa-star fs-5 text-warning"></i>
                                        </label>
                                        <input type="radio" name="rating" value="2" id="2">
                                        <label for="2">
                                            <i class="fa-regular fa-star fs-5 text-warning"></i>
                                            <i class="fa-solid fa-star fs-5 text-warning"></i>
                                        </label>
                                        <input type="radio" name="rating" value="1" id="1">
                                        <label for="1">
                                            <i class="fa-regular fa-star fs-5 text-warning"></i>
                                            <i class="fa-solid fa-star fs-5 text-warning"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea class="form-control w-100" rows="5" id="comment" name="comment" placeholder="{{ __('names.yourReview') }}*"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <button type="button" class="button button-contactForm">
                                            {{ __('buttons.submitReview') }}
                                        </button>
                                    </div>
                                </div>
                            @endauth
                        @else
                            <p class="text-muted">{{ __('names.alreadyReviewed') }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
