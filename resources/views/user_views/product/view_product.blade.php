@extends('layouts.app')

@section('content')
    <div class="container product-section">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-6 mb-4 mb-md-0">
                        <div>
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
                    </div>
                    <div class="col-md-6">
                        <div class="summary entry-summary position-relative">
                            <h3 class="mb-0 font-weight-bold">{{ $product->name }}</h3>
                            <div class="pb-0 clearfix d-flex align-items-center mt-2">
                                <div class="product-rating">
                                    <span>{{ $average }}</span>
                                    <span>/</span>
                                    <span>5</span>
                                    @if ($average > 0)
                                        <i class="fa-solid fa-star ms-1"></i>
                                    @else
                                        <i class="fa-regular fa-star ms-1"></i>
                                    @endif
                                </div>
                                <div class="review-num">
                                    <a href="#description" class="text-decoration-none link text-color-default text-color-hover-primary" data-hash="" data-hash-offset="0" data-hash-offset-lg="75" data-hash-trigger-click=".nav-link-reviews" data-hash-trigger-click-delay="1000">
                                        <span class="count text-color-inherit" itemprop="ratingCount">
                                            {{ __('names.reviews').' ('.$rateCount.')' }}
                                        </span>
                                    </a>
                                </div>
                            </div>
                            <div class="divider divider-small">
                                <hr class="bg-color-grey-scale-4">
                            </div>
                            <p class="price mb-3">
                                @if ($product->discount)
                                    <span class="amount">€{{ $product->price }}</span>
                                    <span class="sale">€{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}</span>
                                @else
                                    <span class="default-price">€{{ $product->price }}</span>
                                @endif
                            </p>
                            <p class="mb-3">{{ $product->description }}</p>
                            <ul class="list list-unstyled text-2">
                                <li class="mb-0">
                                    <span class="text-uppercase">{{ __('names.categories') }}:</span>
                                    @forelse ($product->categories as $category)
                                        <a class="link" href="{{ url("/user/innercategories/$category->id") }}">
                                            {{ $category->name }}
                                        </a>
                                    @empty
                                        <span class="fw-bold text-dark">{{ __('names.noCategories') ?? '-' }}</span>
                                    @endforelse
                                </li>
                            </ul>
                            <hr>
                            {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container']) !!}
                                <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                                {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="submit" value="{{__('buttons.addToCart')}}" class="btn product-add-to-cart-button">
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col">
                <div id="description" class="tabs tabs-simple tabs-simple-full-width-line tabs-product tabs-dark mb-2">
                    <ul class="nav nav-tabs justify-content-start" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active font-weight-bold text-3 text-uppercase py-2 px-3" href="#productDescription" data-bs-toggle="tab" aria-selected="true" role="tab">
                                {{ __('names.description') }}
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link font-weight-bold text-3 text-uppercase py-2 px-3" href="#productInfo" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">
                                {{ __('names.additionalInformation') }}
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link nav-link-reviews font-weight-bold text-3 text-uppercase py-2 px-3" href="#productReviews" data-bs-toggle="tab" aria-selected="false" tabindex="-1" role="tab">
                                {{ __('names.reviews').' ('.$product->ratings->count().') ' }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content p-0">
                        <div class="tab-pane px-0 py-3 active" id="productDescription" role="tabpanel">
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="tab-pane px-0 py-3" id="productInfo" role="tabpanel">
                            <table class="table table-striped m-0">
                                <tbody>
                                <tr>
                                    <th class="border-top-0">
                                        Lorem:
                                    </th>
                                    <td class="border-top-0">
                                        Lorem ipsum dolor sit amet
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Lorem:
                                    </th>
                                    <td>
                                        Lorem ipsum dolor sit amet
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Lorem:
                                    </th>
                                    <td>
                                        Lorem ipsum dolor sit amet
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane px-0 py-3" id="productReviews" role="tabpanel">
                            <ul class="comments">
                                @forelse ($product->ratings as $rating)
                                    <li>
                                        <div class="comment">
                                            <div class="comment-block">
                                                <div class="comment-arrow"></div>
                                                <span class="comment-by">
                                                    <strong>{{ $rating->user->name }}</strong>
                                                    <span class="mx-1">–</span>
                                                    <span>{{ $rating->created_at->format('F j, Y') }}</span>
                                                    <span class="float-end">
                                                        <div class="pb-0 comment-rating">
                                                            @for($i = 1; $i <= 5; $i++)
                                                                <i class="product-rating-star @if ($rating->value >= $i) fa-solid fa-star
                                                                   @elseif ($rating->value >= $i - .5) fa-solid fa-star-half-stroke
                                                                   @else fa-regular fa-star @endif"></i>
                                                            @endfor
                                                        </div>
                                                    </span>
                                                </span>
                                                <p class="m-0 comment-description">{{ $rating->desription ?? 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.' }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <p class="text-muted">{{ __('names.noReviews') }}</p>
                                @endforelse
                            </ul>
                            <hr class="solid my-5">
                            <h5>{{ __('names.addReview') }}</h5>
                            <div class="row">
                                <div class="col product-review-add-review-form" id="review-product">
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
                                                <label class="form-label required text-dark fw-bold">
                                                    {{ __('names.rating') }}
                                                    <span>*</span>
                                                </label>
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
                                                <label class="form-label required text-dark fw-bold">
                                                    {{ __('names.review') }}
                                                    <span>*</span>
                                                </label>
                                                <div class="mb-3">
                                                    <textarea class="form-control" rows="5" id="comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <button type="button" class="product-reviews-add-review-submit">
                                                    {{ __('buttons.postReview') }}
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
    </div>
@endsection

@push('scripts')
    <script>
        $('.product-reviews-add-review-submit').click(function () {
            const value = $('input[type=radio][name=rating]:checked').val();
            $.post("{{route('addUserRating')}}",
                {
                    "_token": "{{ csrf_token() }}",
                    rating: value,
                    product: {{ $product->id }}
                },
                function (data, status) {
                    //alert("Data: " + data.val + "\nStatus: " + status);
                    if (data.val == "ok") {
                        // $('#vote').hide();
                        $('#review-product').html("<p>{{ __('names.reviewProduct') }}</p>");
                    }
                }
            );
        });

        const minus = document.querySelector('.minus');
        const plus = document.querySelector('.plus');
        const amount = document.querySelector('.product-add-to-cart-number');

        const minValue = 1;
        const maxValue = 5;

        minus.addEventListener('click', e => {
            e.preventDefault();
            const currentValue = Number(amount.value) || 0;
            if (currentValue === minValue) return;
            amount.value = currentValue - 1;
        });

        plus.addEventListener('click', e => {
            e.preventDefault();
            const currentValue = Number(amount.value) || 0;
            if (currentValue === maxValue) return;
            amount.value = currentValue + 1;
        });
    </script>
@endpush
@push('css')
    <style>
        .badge {
            font-size: 25px;
            font-weight: 200
        }

        .badge i {
            font-size: 20px;
            font-weight: 200
        }

        .about-rating {
            font-size: 15px;
            font-weight: 500;
            margin-top: 10px
        }

        .total-ratings {
            font-size: 12px
        }

        .bg-custom {
            background-color: #b7dd29 !important
        }

        .progress {
            margin-top: 10px
        }

        /*    rating form*/
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center
        }

        .rating > input {
            display: none
        }

        .rating > label {
            position: relative;
            width: 1em;
            font-size: 6vw;
            color: #FFD600;
            cursor: pointer
        }

        .rating > label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
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
@endpush
