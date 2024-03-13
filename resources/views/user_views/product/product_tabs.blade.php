<div class="container">
    <ul class="description-tab nav" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="description-tab" data-bs-toggle="pill" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="false" tabindex="-1">
                {{ __('names.description') }}
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="reviews-tab" data-bs-toggle="pill" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="true">
                {{ __('names.reviews').' ('.$product->ratings->count().') ' }}
            </button>
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
</div>

<style>
    .rating {
        display: flex;
        flex-direction: row-reverse;
        justify-content: flex-end;
    }

    .rating > input {
        display: none
    }

    .rating > label i {
        position: relative;
        width: 1em;
        cursor: pointer;
        color: #FFD600;
        font-size: 1.35em;
        padding-top: 4px;
    }

    .rating > label::before {
        content: "\2605";
        position: absolute;
        opacity: 0;
        color: #FFD600;
        font-size: 1.35em;
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