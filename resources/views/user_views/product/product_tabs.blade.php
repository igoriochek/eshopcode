<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 rounded-0">
                <div class="card-body">
                    <nav class="product-tab-menu style1 border-bottom cbb1 mb-4rem pr-0">
                        <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    href="#pills-home" role="tab" aria-controls="pills-home"
                                    aria-selected="true">{{ __('names.description') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    href="#pills-contact" role="tab" aria-controls="pills-contact"
                                    aria-selected="false">{{ __('names.reviews') . ' (' . $product->ratings->count() . ') ' }}</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <div class="product-description">
                                <p>{!! $product->description !!}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab">
                            <div class="row">
                                <div class="col-lg-6 col-12 mb-5">
                                    @forelse ($product->ratings as $rating)
                                    <div class="grade-content">
                                        <span class="grade">{{ __('names.grade') . ' ' }} </span>
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i
                                            class="product-rating-star text-warning
                                            @if ($rating->value >= $i) fa-solid fa-star
                                            @elseif ($rating->value >= $i - 0.5) fa-solid fa-star-half-stroke
                                            @else fa-regular fa-star @endif"></i>
                                            @endfor

                                            <h6 class="sub-title">{{ $rating->user->name }}</h6>
                                            <p>{{ $rating->created_at->format('F j, Y') }}</p>
                                            <h4 class="title" style="margin-top: 10px; margin-bottom: 30px;">{{ $rating->description }}</h4>
                                    </div>
                                    @empty
                                    <span class="text-muted">{{ __('names.noReviews') }}</span>
                                    @endforelse
                                </div>
                                <div class="col-lg-6 col-12 mb-5">
                                    <div class="contact-form-content">
                                        <h3 class="contact-page-title">{{ __('names.addReview') }}</h3>
                                        @auth

                                        <div class="contact-form">
                                            <form id="contact-form" action="assets/php/mail.php" method="post">
                                                <div class="rating-wrapper d-flex-center mb--40">
                                                    {{ __('names.rating') }}<span class="required">*</span>
                                                    <div class="rating" style="gap: 5px">
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
                                                    <label>{{ __('names.review') }}<span class="required">*</span>
                                                    </label>
                                                    <textarea id="comment" name="comment"></textarea>
                                                </div>
                                                <div class="form-group mb-0">
                                                    <button type="button" class="btn btn-dark3"
                                                        id="product-reviews-add-review-submit">
                                                        {{ __('buttons.submit') }}
                                                    </button>
                                                </div>
                                            </form>
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
    </div>
</div>


@push('css')
<style>
    .btn-dark3 {
        text-transform: none !important;
    }

    .grade-content .title {
        text-transform: none !important;
    }

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