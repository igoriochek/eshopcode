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
            <div class="col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <div class="product-image-slider slick-initialized slick-slider" style="border: 2px solid white">
                                    @if($product->image)
                                        <img src="{{ $product->image }}" alt="{{$product->name}}" class="w-100"/>
                                    @else
                                        <img src="{{ asset('images/noimage.jpeg') }}" alt="no-product-image" class="w-100"/>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                @if ($product->discount)
                                    <span class="stock-status out-stock">{{ __('names.saleOff') }}</span>
                                @endif
                                <h2>{{ $product->name }}</h2>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating d-flex" style="width: 90%">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="text-warning fs-6 @if ($average >= $i) fa-solid fa-star
                                                        @elseif ($average >= $i - .5) fa-solid fa-star-half-stroke
                                                        @else fa-regular fa-star @endif"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <span class="ms-4 ps-3 fs-6">({{ $rateCount.' '.__('names.reviews') }})</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover my-1">
                                    <div class="product-price primary-color float-left">
                                        @if ($product->hasSizes)
                                            @if ($product->discount)
                                                <span class="current-price text-brand" id="newPrice">
                                                    €{{ sprintf("%.2f", $product->big - (round(($product->big * $product->discount->proc / 100), 2))) }}
                                                </span>
                                                <span>
                                                <span class="save-price font-md color3 ml-15 fs-6">
                                                    {{ '-'.$product->discount->proc.'% '.__('names.off') }}
                                                </span>
                                                <span class="old-price font-md ml-15 fs-5" id="oldPrice">
                                                    €{{ sprintf("%.2f", $product->big) }}
                                                </span>
                                            </span>
                                            @else
                                                <span class="current-price text-brand" id="price">
                                                    €{{ sprintf("%.2f", $product->big) }}
                                                </span>
                                            @endif
                                        @else
                                            @if ($product->discount)
                                                <span class="current-price text-brand">
                                                {{ sprintf("%.2f", $product->price - (round(($product->price * $product->discount->proc / 100), 2))) }} €
                                            </span>
                                                <span>
                                                <span class="save-price font-md color3 ml-15 fs-6">
                                                    {{ '-'.$product->discount->proc.'% '.__('names.off') }}
                                                </span>
                                                <span class="old-price font-md ml-15 fs-5">
                                                    {{ sprintf("%.2f", $product->price) }} €
                                                </span>
                                            </span>
                                            @else
                                                <span class="current-price text-brand">
                                                    {{ sprintf("%.2f", $product->price) }} €
                                                </span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                @if ($product->hasSizes)
                                    <div class="d-block">
                                        <div class="d-flex align-items-center gap-1">
                                            <p class="mb-0 pb-0">{{ __('names.selectSize').' ('.__('names.selectSizeInfo').')' }}</p>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 mb-40">
                                            <div class="product-size-button">
                                                <input type="radio" id="small" name="size" value="{{ \App\Models\Product::SMALL }}" />
                                                <label class="rounded" for="small">{{ __('names.small') }}</label>
                                            </div>
                                            <div class="product-size-button">
                                                <input type="radio" id="large" name="size" value="{{ \App\Models\Product::LARGE }}" />
                                                <label class="rounded" for="large">{{ __('names.large') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="detail-extralink mb-50">
                                    {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'd-flex align-items-center']) !!}
                                        <div class="d-flex me-4">
                                            {!! Form::number('count', "1", ['style' => 'width: 80px; height: 51px; padding-left: 20px; padding-right: 15px; border-radius: 5px', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                        </div>
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        @if ($product->hasSizes)
                                            <input type="hidden" name="size" id="size" value="{{ \App\Models\Product::LARGE }}">
                                        @endif
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart" style="padding-inline: 30px; font-size: .95rem">
                                                <i class="fa-solid fa-bag-shopping me-1"></i>
                                                {{__('buttons.addToCart')}}
                                            </button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="font-xs">
                                    <ul class="mr-50 float-start">
                                        <li class="mb-5 fs-6 fw-bold text-dark">{{ __('names.categories') }}:
                                            @forelse ($product->categories as $category)
                                                <span class="text-brand ms-2">
                                                    <a href="{{ url("/user/innercategories/$category->id") }}" class="w-100">
                                                        {{ $category->name }}@if (!$loop->last),@endif
                                                    </a>
                                                </span>
                                            @empty
                                                <span class="text-brand">{{ __('names.noCategories') }}</span>
                                            @endforelse
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-45 d-md-none" style="color: #8f5c5c">
                    <div class="product-info">
                        @include('user_views.product.tabs')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        /*
         * Size buttons
         */
        .product-size-button {
            margin: 0 5px 0 0;
            background: transparent;
            width: 120px;
            text-align: center;
            font-family: "Quicksand", sans-serif;
            font-weight: 600;
        }

        .product-size-button label,
        .product-size-button input {
            display: block;
            background: transparent;
            border: 1px solid #dc0505;
            color: #dc0505;
        }

        .product-size-button label:hover,
        .product-size-button input:hover {
            -webkit-box-shadow: 0 0 0 1.5px #dc0505;
            -moz-box-shadow: 0 0 0 1.5px #dc0505;
            box-shadow: 0 0 0 1.5px #dc0505;
            font-weight: 900;
        }

        .product-size-button input[type="radio"] {
            opacity: 0.011;
            z-index: 100;
        }

        .product-size-button input[type="radio"]:checked + label {
            background: transparent;
            border-radius: 4px;
            -webkit-box-shadow: 0 0 0 1.5px #dc0505;
            -moz-box-shadow: 0 0 0 1.5px #dc0505;
            box-shadow: 0 0 0 1.5px #dc0505;
            font-weight: 900;
        }

        .product-size-button label {
            cursor: pointer;
            z-index: 90;
            padding: 12px 20px;
            font-size: .95rem;
        }

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
            width: 1.1em;
            cursor: pointer;
            margin-right: 5px;
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

@push('scripts')
    <script>
        const small = document.getElementById('small')
        const large = document.getElementById('large')
        const size = document.getElementById('size')

        const buttons = [small, large]

        const createClickEventListenerForButtons = buttons => {
            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    size.value = button.value
                    changeProductPrice()
                });
            })
        }
        createClickEventListenerForButtons(buttons)

        const changeProductPrice = () => {
            const newPrice = document.getElementById('newPrice');
            const oldPrice = document.getElementById('oldPrice');
            const price = document.getElementById('price');

            $.ajax({
                url: '{{ route('changeProductPrice', $product->id) }}',
                type: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    size: size.value
                },
                success: res => {
                    @if ($product->hasSizes)
                        @if ($product->discount)
                            newPrice.innerText = `€${res.newPrice}`
                            oldPrice.innerText = `€${res.oldPrice}`
                        @else
                            price.innerText = `€${res.price}`
                        @endif
                    @else
                        price.innerText = `€${res.price}`
                    @endif
                },
                error: XMLHttpRequest => console.error(XMLHttpRequest)
            })
        }

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
@endpush
