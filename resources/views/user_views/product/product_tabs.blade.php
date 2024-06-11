<ul class="nav product-tab-nav mb-10" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="active tab-btn" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">
            {{ __('names.description') }}
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="tab-btn" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">
            {{ __('names.reviews').' ('.$product->ratings->count().') ' }}
        </a>
    </li>
</ul>


<div class="tab-content product-tab-content">
    <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
        <div class="product-description-body">
            <p class="short-desc mb-0" style="text-align: start;">{!! $product->description !!}</p>
        </div>
    </div>
    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
        <div class="product-review-body">
            <div class="blog-comment">
                <h4 class="heading mb-7">{{ __('names.reviews') }}</h4>
                @forelse ($product->ratings as $rating)
                    <div class="blog-comment-item mb-8">
                        <div class="blog-comment-content" style="margin-left: 0px !important">
                            <div class="user-meta">
                                <span><strong>{{ $rating->user->name }} - </strong>{{ $rating->created_at->format('F j, Y') }}</span>
                            </div>
                            <div class="rating-box" style="padding-bottom: 10px">
                            <ul>
                                @for($i = 1; $i <= 5; $i++)<li style="padding-right: 5px;">
                                    <i class="@if ($rating->value >= $i) fa fa-star
                                        @elseif ($rating->value >= $i - .5) fa fa-star-half-stroke
                                        @else fa-regular fa-star-o
                                        @endif"></i></li>
                                @endfor
                            <ul>
                            </div>
                            <p class="user-comment mb-4">{{ $rating->description }}</p>
                        </div>
                    </div>
                @empty
                    <span class="text-muted">{{ __('names.noReviews') }}</span>
                @endforelse
            </div>

            <div class="feedback-area pt-10">
                <h2 class="heading mb-3">{{ __('names.addReview') }}</h2>
                <div id="feedback-form"></div>
                @auth
                    <form class="feedback-form" style="padding-top: 26px;">
                        <div class="rating-box">
                            <span>{{ __('names.rating').'*' }}</span>

                            <div class="rating ps-3" style="gap: 5px">
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
                        <div class="form-field mt-6">
                            <textarea id="comment" name="comment" placeholder="{{ __('names.review').'*' }}" class="textarea-field"></textarea>
                        </div>
                        <div class="button-wrap mt-8">
                            <button id="product-reviews-add-review-submit" type="button" class="btn btn-custom-size lg-size btn-primary">
                            {{ __('buttons.submit') }}</button>
                        </div>
                    </form>
                @else
                    <span class="text-muted">{{ __('names.loginToReview') }}</p>
                @endauth
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