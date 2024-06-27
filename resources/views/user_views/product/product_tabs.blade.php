<div class="container">
    <ul class="nav tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab"
                aria-controls="description" aria-selected="true">{{ __('names.description') }}</a>
        </li>
        <li class="nav-item" role="presentation">
            <a id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews"
                aria-selected="false">{{ __('names.reviews') . ' (' . $product->ratings->count() . ') ' }}</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
            <div class="product-desc-wrapper">
                <div class="row">
                    <div class="single-desc">
                        <p class="mb-5 px-3">{!! $product->description !!}</p>
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
                                                                <span
                                                                    data-text="Cameron Williamson">{{ $rating->user->name }}</span>
                                                            </span>
                                                        </a>
                                                        <span class="commenter-rating ratiing-four-star">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                <a>
                                                                    <i
                                                                        class="fas
                                                                @if ($rating->value >= $i) fa-star
                                                                @elseif ($rating->value >= $i - 0.5) fa-star-half-stroke
                                                                @else fa-star empty-rating @endif"></i>
                                                                </a>
                                                            @endfor
                                                        </span>
                                                    </h6>
                                                    <span
                                                        class="date">{{ $rating->created_at->format('F j, Y') }}</span>
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
                                <form id="review-product">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="rating-wrapper d-flex-center mb--40">
                                                {{ __('names.rating') }}<span class="require">*</span>
                                                <div class="rating ms-4" style="gap: 5px">
                                                    <input type="radio" name="rating" value="5"
                                                        id="5"><label for="5">
                                                        <i class="fa-regular fa-star text-warning"></i>
                                                    </label>
                                                    <input type="radio" name="rating" value="4"
                                                        id="4"><label for="4">
                                                        <i class="fa-regular fa-star text-warning"></i>
                                                    </label>
                                                    <input type="radio" name="rating" value="3"
                                                        id="3"><label for="3">
                                                        <i class="fa-regular fa-star text-warning"></i>
                                                    </label>
                                                    <input type="radio" name="rating" value="2"
                                                        id="2"><label for="2">
                                                        <i class="fa-regular fa-star text-warning"></i>
                                                    </label>
                                                    <input type="radio" name="rating" value="1"
                                                        id="1"><label for="1">
                                                        <i class="fa-regular fa-star text-warning"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>{{ __('names.review') }}<span class="require">*</span>
                                                </label>
                                                <textarea id="comment" name="comment"></textarea>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-submit">
                                                    <button type="button" class="axil-btn btn-bg-primary w-auto"
                                                        id="product-reviews-add-review-submit">
                                                        {{ __('buttons.submit') }}
                                                    </button>
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

@push('css')
    <style>
        input[type=checkbox]:checked~label::before,
        input[type=radio]:checked~label::before {
            background-color: unset;
            border: unset;
        }

        input[type=radio]~label::before {
            border-radius: unset;
        }

        input[type=checkbox]~label::before,
        input[type=radio]~label::before {
            content: unset;
            position: unset;
            top: unset;
            left: unset;
            width: unset;
            height: unset;
            background-color: unset;
            border: unset;
            border-radius: unset;
            transition: unset;
        }

        input[type=checkbox]~label,
        input[type=radio]~label {
            position: unset;
            font-size: unset;
            line-height: unset;
            color: unset;
            font-weight: unset;
            padding-left: unset;
            cursor: unset;
        }

        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .rating>input {
            display: none !important;
        }

        .rating>label i {
            position: relative !important;
            width: 1em !important;
            cursor: pointer !important;
            color: #FFD600 !important;
            font-size: 1.2em !important;
            padding-top: 7px !important;
        }

        .rating>label::before {
            content: "\2605" !important;
            position: absolute !important;
            opacity: 0 !important;
            color: #FFD600 !important;
            font-size: 1.35em !important;
        }

        .rating>label:hover:before,
        .rating>label:hover~label:before {
            opacity: 1 !important;
        }

        .rating>input:checked~label:before {
            opacity: 1 !important;
        }

        .rating:hover>input:checked~label:before {
            opacity: 0.4 !important;
        }
    </style>
@endpush
