@extends('layouts.app')

@section('content')
    @include('header', ['title' => $product->name])
    <section class="product-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <div {{--id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel"--}}>
                                {{--<div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="0" class="active" aria-current="true"
                                            aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators"
                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>--}}
                                <div {{--class="carousel-inner"--}}>
                                    <div {{--class="carousel-item active"--}}>
                                        @if ($product->image)
                                            <div>
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                     class="d-block w-100"/>
                                            </div>
                                        @else
                                            <div>
                                                <img src="/images/noimage.jpeg" alt="" class="d-block w-100"/>
                                            </div>
                                        @endif
                                    </div>
                                    {{--<div class="carousel-item">
                                        @if ($product->image)
                                            <div>
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                     class="d-block w-100"/>
                                            </div>
                                        @else
                                            <div>
                                                <img src="/images/noimage.jpeg" alt="" class="d-block w-100"/>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="carousel-item">
                                        @if ($product->image)
                                            <div>
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                     class="d-block w-100"/>
                                            </div>
                                        @else
                                            <div>
                                                <img src="/images/noimage.jpeg" alt="" class="d-block w-100"/>
                                            </div>
                                        @endif
                                    </div>--}}
                                </div>
                                {{--<button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>--}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="product-title">{{ $product->name }}</h4>
                            <div class="product-rating-price-container">
                                <div class="product-rating">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="product-rating-star @if ($average >= $i) fa-solid fa-star
                                        @elseif ($average >= $i - .5) fa-solid fa-star-half-stroke
                                        @else fa-regular fa-star @endif"></i>
                                    @endfor
                                    <p class="ms-1">
                                        @if ($rateCount == 1)
                                            ({{ __('names.customerReview').' '.$rateCount }})
                                        @else
                                            ({{ __('names.customerReviews').' '.$rateCount }})
                                        @endif
                                    </p>
                                </div>
                                <div class="product-price">
                                    @if ($product->discount)
                                        <strike>€{{ $product->price }}</strike>&nbsp;
                                        <b>€{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}</b>
                                    @else
                                        <span>€{{ $product->price }}</span>
                                    @endif
                                </div>
                            </div>
                            <p class="product-description">{{ $product->description }}</p>
                                {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container']) !!}
                                {!! Form::number('count', "1",
                                ['class' => 'product-add-to-cart-number', "minlength"=>"3", "maxlength"=>"5", "size"=>"5"]) !!}
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="submit" value="{{__('buttons.addToCart')}}" class="product-add-to-cart-button">
                            {!! Form::close() !!}
                            <hr class="hr-dark my-4">
                            <div class="product-detail-container">
                                <span class="me-2">{{ __('names.categories') }}:</span>
                                @forelse ($product->categories as $category)
                                    <a href="{{ url("/user/innercategories/$category->id") }}" class="category-link">
                                        {{ $category->name }}
                                    </a>
                                @empty
                                    <span>{{ __('names.noCategories') ?? '-' }}</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-12">
                    <div class="product-reviews-container">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="product-reviews-title">
                                    {{ $product->ratings->count().' '.__('names.reviewsFor').' '.$product->name }}
                                </h5>
                                @forelse ($product->ratings as $rating)
                                    <div class="product-user-rating-container">
                                        <div class="d-flex">
                                            <div class="product-user-rating-name-date">
                                                <strong>{{ $rating->user->name }}</strong>
                                                <span class="mx-1">–</span>
                                                <span>{{ $rating->created_at->format('F j, Y') }}</span>
                                            </div>
                                            <div class="product-user-rating">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="product-rating-star @if ($rating->value >= $i) fa-solid fa-star
                                                    @elseif ($rating->value >= $i - .5) fa-solid fa-star-half-stroke
                                                    @else fa-regular fa-star @endif"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="product-user-rating-description">{{ $rating->desription }}</p>
                                    </div>
                                @empty
                                    <p class="mb-1 product-reviews-add-review-description">{{ __('names.noReviews') }}</p>
                                @endforelse
                                <div class="mt-4">
                                    <h5 class="product-reviews-add-review-title">
                                        {{ __('names.addReview') }}
                                    </h5>
                                    {{--@guest
                                        <p class="product-reviews-add-review-description">
                                            {{ __('Your email address will not be published. Required fields are marked *') }}
                                        </p>
                                    @endguest--}}
                                </div>
                                <div class="row mt-4 align-items-center product-review-add-review-form"
                                     id="review-product">
                                    @if (!$voted)
                                        {{--@guest
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label">Name*</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="mb-3 col-sm-6">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" placeholder="">
                                            </div>
                                        @endguest--}}
                                        @guest
                                            <p class="product-reviews-add-review-description">{{ __('names.loginToReview') }}</p>
                                        @endguest
                                        @auth
                                            <div class="col-sm-12">
                                                <label class="form-label">{{ __('names.yourReview') }}*</label>
                                                <div class="mb-3">
                                                    <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="rating" style="gap: 5px">
                                                    <input type="radio" name="rating" value="5" id="5"><label for="5">
                                                        <i class="fa-regular fa-star"></i>
                                                    </label>
                                                    <input type="radio" name="rating" value="4" id="4"><label for="4">
                                                        <i class="fa-regular fa-star"></i>
                                                    </label>
                                                    <input type="radio" name="rating" value="3" id="3"><label for="3">
                                                        <i class="fa-regular fa-star"></i>
                                                    </label>
                                                    <input type="radio" name="rating" value="2" id="2"><label for="2">
                                                        <i class="fa-regular fa-star"></i>
                                                    </label>
                                                    <input type="radio" name="rating" value="1" id="1"><label for="1">
                                                        <i class="fa-regular fa-star"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="button" class="product-reviews-add-review-submit">
                                                    {{ __('buttons.submit') }}
                                                </button>
                                            </div>
                                        @endauth
                                    @else
                                        <p class="product-reviews-add-review-description">{{ __('names.alreadyReviewed') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('button[type="button"]').click(function () {
            const value = $('input[type=radio][name=rating]:checked').val();
            const desc = $('textarea#comment').val();
            console.log(desc);
            $.post("{{route('addUserRating')}}",
                {
                    "_token": "{{ csrf_token() }}",
                    rating: value,

                    description: desc,
                    product: {{$product->id}}
                },
                function (data, status) {
                    //alert("Data: " + data.val + "\nStatus: " + status);
                    if (data.val == "ok") {
                        // $('#vote').hide();
                        $('#review-product').html("<p>{{__('names.reviewProduct')}}</p>");
                    }
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
