@extends('layouts.app')

@section('content')
    @include('user_views.section', ['title' => __('names.products'), 'paragraph' => $product->name])
    <div id="position">
        <div class="container">
            <ul>
                <li>
                    <a href="{{ url('/home') }}">{{ __('names.home') }}</a>
                </li>
                <li>
                    <a href="{{ url('/user/products') }}">{{ __('names.products') }}</a>
                </li>
                <li>
                    {{ $product->name }}
                </li>
            </ul>
        </div>
    </div>
    <div class="container margin_60">
        <div class="row">
            <div class="col-lg-12">

                <div class="product-details">

                    <div class="basic-details">
                        <div class="row">
                            <div class="image-column col-sm-6">
                                <figure class="image-box">
                                    @if ($product->image)
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                    @else
                                        <img src="/images/noimage.jpeg" alt="noimage">
                                    @endif
                                </figure>
                            </div>
                            <div class="info-column col-sm-6">
                                <div class="details-header">
                                    <h2>{{ $product->name }}</h2>
                                    <div class="item-price">
                                        @if ($product->discount)
                                            <span class="offer">
                                                {{ number_format($product->price,2) }} €
                                            </span>
                                            {{ $product->price - round(($product->price * $product->discount->proc / 100), 2) }} €
                                        @else
                                            {{ number_format($product->price,2) }} €
                                        @endif
                                    </div>
                                    <div class="rating flex-row justify-content-start">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="icon-star @if ($product->average >= $i) voted @endif"></i>
                                        @endfor
                                        ({{ $count.' '.__('names.customerReviews') }})
                                    </div>
                                </div>
                                <div class="text">
                                    <p>{{ $product->description }}</p>
                                </div>
                                <div class="other-options">
                                    {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => '']) !!}
                                        <div class="numbers-row">
                                            {!! Form::number('count', "1", ['class' => 'qty2 form-control text-center', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5",
                                                            "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                            <input type="button" class="dec button_inc" value="-">
                                            <input type="button" class="inc button_inc" value="+">
                                        </div>
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="submit" value="{{__('buttons.addToCart')}}" class="btn_1">
                                    {!! Form::close() !!}
                                </div>
                                <!--Item Meta-->
                                <ul class="item-meta">
                                    <li>
                                        {{ __('names.categories') }}:
                                        @forelse($product->categories as $category)
                                            <a href="{{ route('innercategories', $category->id) }}">{{$category->name}}</a>
                                            @if (!$loop->last) , @endif
                                        @empty
                                            <span class="text-muted">{{ __('names.noCategories') }}</span>
                                        @endforelse
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--End Basic Details-->
                    <div class="product-info-tabs">
                        <div class="prod-tabs" id="product-tabs">
                            <div class="tab-btns clearfix">
                                <a href="#prod-description" class="tab-btn active-btn">{{ __('names.description') }}</a>
                                <a href="#prod-reviews" class="tab-btn">{{ __('names.reviews').' ('.$count.')' }}</a>
                            </div>

                            <div class="tabs-container">
                                <div class="tab active-tab" id="prod-description">
                                    <h3>{{ __('names.productDescription') }}</h3>
                                    <div class="content">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                </div>
                                <!--End Tab-->
                                <div class="tab" id="prod-reviews">
                                    <h3>{{ $count.' '.__('names.reviewsFound') }}</h3>
                                    @forelse ($product->ratings as $rating)
                                        <div class="reviews-container">
                                            <div class="review-box clearfix ps-0">
                                                <div class="rev-content">
                                                    <div class="rating flex-row justify-content-start">
                                                        @for($i = 1; $i <= 5; $i++)
                                                            <i class="icon-star @if ($rating->value >= $i) voted @endif"></i>
                                                        @endfor
                                                    </div>
                                                    <div class="rev-info">
                                                        {{ $rating->user->name }}
                                                        {{ __(' – ') }}
                                                        {{ $rating->created_at->format('F j, Y') }}
                                                    </div>
                                                    <div class="rev-text">
                                                        <p>{{ $rating->description  }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End Review Container-->
                                    @empty
                                        <p class="text-muted">{{ __('names.noReviews') }}</p>
                                    @endforelse
                                    @if (!$voted)
                                        <hr>
                                        <div class="add-review">
                                            <h3>{{ __('names.addReview') }}</h3>
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <div class="rating mb-3" style="gap: 10px">
                                                            <input type="radio" name="rating" value="5" id="5">
                                                            <label for="5">
                                                                <i class="icon-star fs-5"></i>
                                                                <i class="icon-star voted fs-5"></i>
                                                            </label>
                                                            <input type="radio" name="rating" value="4" id="4">
                                                            <label for="4">
                                                                <i class="icon-star fs-5"></i>
                                                                <i class="icon-star voted fs-5"></i>
                                                            </label>
                                                            <input type="radio" name="rating" value="3" id="3">
                                                            <label for="3">
                                                                <i class="icon-star fs-5"></i>
                                                                <i class="icon-star voted fs-5"></i>
                                                            </label>
                                                            <input type="radio" name="rating" value="2" id="2">
                                                            <label for="2">
                                                                <i class="icon-star fs-5"></i>
                                                                <i class="icon-star voted fs-5"></i>
                                                            </label>
                                                            <input type="radio" name="rating" value="1" id="1">
                                                            <label for="1">
                                                                <i class="icon-star fs-5"></i>
                                                                <i class="icon-star voted fs-5"></i>
                                                            </label>
                                                        </div>
                                                        <textarea name="review-message" placeholder="{{ __('names.writeReview') }}" class="form-control" style="height:150px;"></textarea>
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <button type="button" class="btn_1" id="submit-review">{{ __('buttons.addReview') }}</button>
                                                    </div>
                                                </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!--End tabs-container-->
                        </div>
                        <!--End prod-tabs-->
                    </div>
                    <!--End product-info-tabs-->
                </div>
                <!--End Product-details-->
            </div>
            <!--End Col-->
        </div>
    </div>
    @push('css')
        <style>
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
                cursor: pointer
            }

            .rating > label .voted {
                position: absolute;
                top: 0;
                left: 0;
                display: none;
            }

            .rating > label:hover .voted,
            .rating > label:hover ~ label .voted {
                display: block !important;
            }

            .rating > input:checked ~ label .voted {
                display: block;
            }
        </style>
    @endpush
    @push('scripts')
        <script>
            if ($('.prod-tabs .tab-btn').length) {
                $('.prod-tabs .tab-btn').on('click', function (e) {
                    e.preventDefault();
                    var target = $($(this).attr('href'));
                    $('.prod-tabs .tab-btn').removeClass('active-btn');
                    $(this).addClass('active-btn');
                    $('.prod-tabs .tab').fadeOut(0);
                    $('.prod-tabs .tab').removeClass('active-tab');
                    $(target).fadeIn(500);
                    $(target).addClass('active-tab');
                });
            }

            $('#submit-review').click(() => {
                const value = $('input[type=radio][name=rating]:checked').val();
                const desc = $('textarea[name=review-message]').val();
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
    @endpush
@endsection
