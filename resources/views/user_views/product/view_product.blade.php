@extends('layouts.app')

@section('title', $product->name ?? __('names.product'))
@section('parentTitle', __('menu.products'))
@section('parentUrl', url('/products'))

@section('content')
    <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
            <div class="single-product-thumb mb--40">
                <div class="container">
                    <div class="row">
                        <div class="mb-5">
                            @include('adminlte-templates::common.errors')
                            @include('flash_messages')
                        </div>
                        <div class="col-lg-5">
                            <div class="single-product-thumbnail-wrap zoom-gallery">
                                <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                    <div class="thumbnail">
                                    @if ($product->image)
                                        <a href="{{ $product->image }}" class="popup-zoom">
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                        </a>
                                    @else
                                        <a href="{{ asset('template/images/product/product-big-01.png') }}" class="popup-zoom">
                                            <img src="{{ asset('template/images/product/product-big-01.png') }}" alt="product image">
                                        </a>
                                    @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title">{{ $product->name }}</h2>
                                    @if ($product->discount)
                                        <span class="price-amount">€{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}</span>
                                        <span class="price-amount">€{{ $product->price }}</span>
                                    @else
                                        <span class="price-amount">€{{ $product->price }}</span>
                                    @endif

                                    <div class="product-rating">
                                        <div class="star-rating">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class=
                                                    "@if ($average >= $i) fas fa-star
                                                    @elseif ($average >= $i - .5) fa-solid fa-star-half-stroke
                                                    @else far fa-star
                                                    @endif"></i>
                                            @endfor
                                        </div>
                                        <div class="review-link">
                                            <span>{{ __('names.reviews').' ('.$rateCount.')' }}</span>
                                        </div>
                                    </div>

                                    <div class="product-action-wrapper d-flex-center">
                                        {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container d-flex-center']) !!}
                                        
                                        <div class="pro-qty">
                                            <input type="text" name="count" value="1" class="product-add-to-cart-number" min="1" max="5" minlength="1" maxlength="5" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                        </div>
                                        
                                        <ul class="product-action d-flex-center mb--0">
                                            <li class="add-to-cart">
                                                <button type="submit" class="axil-btn btn-bg-primary">{{ __('buttons.addToCart') }}</button>
                                            </li>
                                        </ul>
                                        {!! Form::close() !!}
                                    </div>

                                    <div class="info-list">
                                        <div>
                                            <span>{{ __('names.categories') }}:</span>
                                            @forelse ($product->categories as $category)
                                                <a href="{{ url("/innercategories/$category->id") }}">
                                                    {{ $category->name }}
                                                </a>
                                            @empty
                                                <span class="text-muted">{{ __('names.noCategories') }}</span>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
            @include('user_views.product.product_tabs')
        </div>
@endsection

@push('css')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        .products-details-content .btns li .input-counter span.minus-button {
            bottom: 5px;
        }

        .products-details-content .btns li .input-counter span.plus-button {
            top: 5px;
        }

        .products-details-content .btns li .input-counter span {
            position: absolute;
            font-size: 13px;
            right: 15px;
            color: #111;
            cursor: pointer;
        }
    </style>
@endpush

@push('scripts')
    <script>
        const minus = document.querySelector('.minus-button');
        const plus = document.querySelector('.plus-button');
        const amount = document.querySelector('.product-add-to-cart-number');

        const minValues = 1;
        const maxValues = 5;

        minus.addEventListener('click', e => {
            e.preventDefault();
            const currentValue = Number(amount.value) || 0;
            if (currentValue === minValues) return;
            amount.value = currentValue - 1;
        });

        plus.addEventListener('click', e => {
            e.preventDefault();
            const currentValue = Number(amount.value) || 0;
            if (currentValue === maxValues) return;
            amount.value = currentValue + 1;
        });

        $('.product-reviews-add-review-submit').click(() => {
            const value = $('input[type=radio][name=rating]:checked').val();
            const desc = $('textarea#comment').val();
            
            $.post("{{route('addUserRating')}}",
                {
                    "_token": "{{ csrf_token() }}",
                    rating: value,
                    description: desc,
                    product: {{ $product->id }}
                },
                (data, status) => {
                    if (data.val == "ok") {
                        $('#review-product').html("<p>{{ __('names.reviewProduct') }}</p>");
                    }
                }
            );
        });
    </script>
@endpush