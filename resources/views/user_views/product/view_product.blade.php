@extends('layouts.app')

@section('content')
    @include('page_header', [
        'secondPageLink' => 'products',
        'secondPageName' => __('menu.products'),
        'hasThirdPage' => true,
        'thirdPageName' => $product->name
    ])
    <div class="container mb-30 mt-30">
        <div class="row">
            <div class="col-xl-10 col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider slick-initialized slick-slider">
                                    @if($product->image)
                                        <img src="{{ $product->image }}" alt="{{$product->name}}"/>
                                    @else
                                        <img src="{{ asset('images/noimage.jpeg') }}" alt="no-product-image" class="w-100"/>
                                    @endif
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                @if ($product->discount)
                                    <span class="stock-status out-stock">{{ __('names.saleOff') }}</span>
                                @endif
                                <h2 class="title-detail">{{ $product->name }}</h2>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating d-flex" style="width: 90%">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="text-warning @if ($average >= $i) fa-solid fa-star
                                                        @elseif ($average >= $i - .5) fa-solid fa-star-half-stroke
                                                        @else fa-regular fa-star @endif"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <span class="font-small ms-4 text-muted">({{ $rateCount.' '.__('names.reviews') }})</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        @if ($product->discount)
                                            <span class="current-price text-brand">
                                                {{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }} €
                                            </span>
                                            <span>
                                                <span class="save-price font-md color3 ml-15">
                                                    {{ $product->discount->proc.'% '.__('names.off') }}
                                                </span>
                                                <span class="old-price font-md ml-15">
                                                    {{ number_format($product->price,2) }} €
                                                </span>
                                            </span>
                                        @else
                                            <span class="current-price text-brand">
                                                {{ number_format($product->price,2) }} €
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="detail-extralink mb-50">
                                    {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'd-flex align-items-center']) !!}
                                        <div class="d-flex me-4">
                                            {!! Form::number('count', "1", ['style' => 'width: 80px; height: 51px; padding-right: 10px', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                        </div>
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart">
                                                <i class="fi-rs-shopping-cart"></i>
                                                {{__('buttons.addToCart')}}
                                            </button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="font-xs">
                                    <ul class="mr-50 float-start">
                                        <li class="mb-5 fs-6">{{ __('names.categories') }}:
                                            @forelse ($product->categories as $category)
                                                <span class="text-brand">
                                                    <a href="{{ url("/user/innercategories/$category->id") }}" class="w-100">
                                                        {{ $category->name }}
                                                    </a>
                                                </span>
                                            @empty
                                                <span class="text-brand">{{ __('names.noCategories') }}</span>
                                            @endforelse
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="tab-style3">
                            <ul class="nav nav-tabs text-uppercase">
                                <li class="nav-item">
                                    <a class="nav-link" id="Description-tab" data-bs-toggle="tab" href="#Description">{{ __('names.description') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">
                                        {{ __('names.reviews').' ('.$rateCount.')' }}
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content shop_info_tab entry-main-content">
                                <div class="tab-pane fade" id="Description">
                                    <div>
                                        <p style="line-height: 33px">{{ $product->description }}</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade active show" id="Reviews">
                                    <!--Comments-->
                                    <div class="comments-area">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <h4 class="mb-30">{{ __('names.customerReviews') }}</h4>
                                                <div class="comment-list">
                                                    @forelse ($product->ratings as $rating)
                                                        <div class="single-comment justify-content-between d-flex mb-30">
                                                            <div class="user justify-content-between d-flex">
                                                                <div class="thumb text-center">
                                                                    <a href="#" class="font-heading text-brand">{{ $rating->user->name }}</a>
                                                                </div>
                                                                <div class="desc">
                                                                    <div class="d-flex justify-content-between mb-10">
                                                                        <div class="d-flex align-items-center">
                                                                            <span class="font-xs text-muted">{{ $rating->created_at->format('F j, Y - h:i A') }}</span>
                                                                        </div>
                                                                        <div class="product-rate d-inline-block ms-2">
                                                                            <div class="product-rating d-flex" style="width: 100%">
                                                                                @for($i = 1; $i <= 5; $i++)
                                                                                    <i class="product-rating-star text-warning pt-1 @if ($rating->value >= $i) fa-solid fa-star
                                                                                        @elseif ($rating->value >= $i - .5) fa-solid fa-star-half-stroke
                                                                                        @else fa-regular fa-star @endif"></i>
                                                                                @endfor
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                                                        <div class="product-rating d-flex" style="width: 90%">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                <i class="text-warning @if ($average >= $i) fa-solid fa-star
                                                                    @elseif ($average >= $i - .5) fa-solid fa-star-half-stroke
                                                                    @else fa-regular fa-star @endif"></i>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <h6 class="ms-4">{{ $average.' '.__('names.outOf').' '.'5' }}</h6>
                                                </div>
                                                <div class="progress">
                                                    <span>{{ '5 '.__('names.star') }}</span>
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ $percentages[5] ?? 0 }}%;"
                                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        {{ $percentages[5] ?? 0}}%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>{{ '4 '.__('names.star') }}</span>
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ $percentages[4] ?? 0 }}%;"
                                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        {{ $percentages[4] ?? 0 }}%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>{{ '3 '.__('names.star') }}</span>
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ $percentages[3] ?? 0 }}%;"
                                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        {{ $percentages[3] ?? 0 }}%
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <span>{{ '2 '.__('names.star') }}</span>
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ $percentages[2] ?? 0 }}%;"
                                                         aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                        {{ $percentages[2] ?? 0}}%
                                                    </div>
                                                </div>
                                                <div class="progress mb-30">
                                                    <span>{{ '1 '.__('names.star') }}</span>
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
                                        <h4 class="mb-15">{{ __('names.addAReview') }}</h4>
                                        <div class="product-rate d-inline-block mb-30"></div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('button[type="button"]').click(function () {
            const value = $('input[type=radio][name=rating]:checked').val();
            const desc = $('textarea#comment').val();
            $.post("{{ route('addUserRating') }}",
                {
                    "_token": "{{ csrf_token() }}",
                    rating: value,
                    description: desc,
                    product: {{ $product->id }}
                },
                (data, status) => {
                    if (data.val == "ok") location.reload();
                }
            );
        });
    </script>
    {{--@if ( $product->video )
        <script>
            // Load the IFrame Player API code asynchronously.
            var tag = document.createElement('script');
            tag.src = "https://www.youtube.com/player_api";
            var firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

            // Replace the 'ytplayer' element with an <iframe> and
            // YouTube player after the API code downloads.
            var player;

            function onYouTubePlayerAPIReady() {
                player = new YT.Player('ytplayer', {
                    height: '360',
                    width: '640',
                    videoId: '{{$product->video}}'
                });
            }
        </script>
    @endif--}}
@endpush

@push('css')
    <style>
        /*
         * Rating form
         */
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .rating > input {
            display: none
        }

        .rating > label {
            position: relative;
            width: 1em;
            cursor: pointer;
            margin-right: 4px;
            margin-bottom: 15px;
        }

        .rating > label .fa-solid {
            position: absolute;
            top: 0;
            left: 0;
            display: none;
        }

        .rating > label:hover .fa-solid,
        .rating > label:hover ~ label .fa-solid {
            display: block !important;
        }

        .rating > input:checked ~ label .fa-solid {
            display: block;
        }
    </style>
@endpush
