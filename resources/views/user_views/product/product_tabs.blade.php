<div class="container">
    <ul class="nav tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">{{ __('names.description') }}</a>
        </li>
        <li class="nav-item" role="presentation">
            <a id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">{{ __('names.reviews').' ('.$product->ratings->count().') ' }}</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <div class="product-desc-wrapper">
                <div class="row">
                    <div class="single-desc">
                        <p>{!! $product->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
            <div class="reviews-wrapper">
                <div class="row">
                    <div class="col-lg-6 mb--40">
                        <div class="axil-comment-area pro-desc-commnet-area">
                            <h5 class="title">{{ __('names.reviews') }}</h5>
                            <ul class="comment-list">
                                <li class="comment">
                                    <div class="comment-body">
                                        @forelse ($product->ratings as $rating)
                                        <div class="single-comment">
                                            <div class="comment-inner">
                                                <h6 class="commenter">
                                                    <a class="hover-flip-item-wrapper">
                                                        <span class="hover-flip-item">
                                                            <span data-text="Cameron Williamson">{{ $rating->user->name }}</span>
                                                        </span>
                                                    </a>
                                                    <span class="commenter-rating ratiing-four-star">
                                                        @for($i = 1; $i <= 5; $i++) <a>
                                                            <i class="fas 
                                                                @if ($rating->value >= $i) fa-star
                                                                @elseif ($rating->value >= $i - .5) fa-star-half-stroke
                                                                @else fa-star empty-rating 
                                                                @endif"></i>
                                                            </a>
                                                            @endfor
                                                    </span>
                                                </h6>
                                                <span class="date">{{ $rating->created_at->format('F j, Y') }}</span>
                                                <div class="comment-text">
                                                    <p>{{ $rating->description }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        @empty
                                        <span class="text-muted">{{ __('names.noReviews') }}</span>
                                        @endforelse
                                    </div>
                                </li>
                                <!-- End Single Comment  -->
                            </ul>
                        </div>
                        <!-- End .axil-commnet-area -->
                    </div>
                    <!-- End .col -->
                    <div class="col-lg-6 mb--40">
                        <!-- Start Comment Respond  -->
                        <div class="comment-respond pro-des-commend-respond mt--0">
                            <h5 class="title mb--30">{{ __('names.addReview') }}</h5>
                            @auth
                            <div class="rating-wrapper d-flex-center mb--40">
                                {{ __('names.rating') }}<span class="require">*</span>
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
                            <form action="#">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>{{ __('names.review')}}<span class="require">*</span>
                                            </label>
                                            <textarea id="comment" name="comment"></textarea>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-submit">
                                                <button type="submit" id="submit" class="axil-btn btn-bg-primary w-auto">{{ __('buttons.submit') }}</button>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            @else
                            <span class="text-muted">{{ __('names.loginToReview') }}</p>
                                @endauth
                        </div>
                        <!-- End Comment Respond  -->
                    </div>
                    <!-- End .col -->
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