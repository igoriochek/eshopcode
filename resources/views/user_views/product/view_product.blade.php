@extends('layouts.app')

@section('title', $product->name ?? __('names.product'))
@section('parentTitle', __('menu.products'))
@section('parentUrl', url('/products'))

@section('content')
    <div class="single-product-area section-space-top-100">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-4">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                </div>
                <div class="col-lg-6">
                    <div class="single-product-img">
                        <div class="swiper-container single-product-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    @if ($product->image)
                                        <a href="{{ $product->image }}" class="single-img gallery-popup">
                                            <img class="img-full" src="{{ $product->image }}" alt="{{ $product->name }}">
                                        </a>
                                    @else
                                        <a href="{{ asset('template/images/product/large-size/2-1-618x578.jpg') }}"
                                            class="single-img gallery-popup">
                                            <img class="img-full"
                                                src="{{ asset('template/images/product/large-size/2-1-618x578.jpg') }}"
                                                alt="Product Image">
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pt-9 pt-lg-0">
                    <div class="single-product-content">
                        <h2 class="title mb-3">{{ $product->name }}</h2>
                        <div class="price-box pb-3">
                            @if ($product->discount)
                                <span class="new-price text-danger">
                                    €{{ number_format($product->computed_price - round(($product->computed_price * $product->discount->proc) / 100, 2), 2) }}
                                </span>
                                <span class="old-price text-danger">
                                    €{{ number_format($product->computed_price, 2) }}
                                </span>
                            @else
                                <span class="new-price text-danger">
                                    €{{ number_format($product->computed_price, 2) }}
                                </span>
                            @endif
                        </div>
                        <div class="rating-box-wrap pb-9">
                            <div class="rating-box" style="padding-right: 15px;">
                                <ul>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <li style="padding-right: ;">
                                            <i
                                                class="
                                                    @if ($average >= $i) fa fa-star
                                                    @elseif ($average >= $i - 0.5) fa fa-star-half-stroke
                                                    @else fa-regular fa-star-o @endif"></i>
                                        </li>
                                    @endfor


                                </ul>
                            </div>
                            <div class="review-status ps-4" style="padding-left: 0px !important;">
                                <a href="#">{{ '(' . $rateCount . ' ' . __('names.reviews') . ')' }}</a>
                            </div>
                        </div>
                        <ul>
                            {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'quantity-with-btn pb-9']) !!}
                            <li class="quantity">
                                <div class="cart-plus-minus">
                                    {!! Form::text('count', '1', [
                                        'class' => 'cart-plus-minus-box tp-cart-input',
                                        'oninput' => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null
                                                                                                                                                                                                                    ",
                                    ]) !!}
                                    <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                    <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                </div>
                            </li>
                            <li class="add-to-cart">
                                <button type="submit"
                                    class="btn btn-custom-size lg-size btn-primary px-4">{{ __('buttons.addToCart') }}</button>
                            </li>
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            {!! Form::close() !!}
                        </ul>
                        <div class="product-category pb-3">
                            <span class="title">{{ __('names.categories') }}: </span>
                            <ul>
                                @forelse ($product->categories as $category)
                                    <li>
                                        <a href="{{ url("/innercategories/$category->id") }}">
                                            {{ $category->name }}@if (!$loop->last)
                                                ,
                                            @endif
                                        </a>
                                    </li>
                                    @empty
                                        <li>
                                            <span class="text-muted">{{ __('names.noCategories') }}</span>
                                        </li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-tab-area section-space-y-axis-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        @include('user_views.product.product_tabs')
                    </div>
                </div>
            </div>
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

            .btn-custom-size.lg-size {
                width: auto;
                padding: 0px 15px;
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

            .single-product-content .quantity-with-btn li .cart-plus-minus {
                width: 76px;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const quantityContainer = document.querySelector('.cart-plus-minus');

                if (quantityContainer) {
                    const inputBox = quantityContainer.querySelector('.cart-plus-minus-box');
                    const decButton = quantityContainer.querySelector('.dec');
                    const incButton = quantityContainer.querySelector('.inc');

                    decButton.addEventListener('click', function() {
                        if (parseInt(inputBox.value, 10) > 1) {
                            inputBox.value = parseInt(inputBox.value, 10) - 1;
                        }
                    });

                    incButton.addEventListener('click', function() {
                        inputBox.value = parseInt(inputBox.value, 10) + 1;
                    });
                }
            });



            $('#product-reviews-add-review-submit').click(() => {
                const value = $('input[type=radio][name=rating]:checked').val();
                const desc = $('textarea#comment').val();

                const seconds = 1;

                $.post("{{ route('addUserRating') }}", {
                        "_token": "{{ csrf_token() }}",
                        rating: value,
                        description: desc,
                        product: {{ $product->id }}
                    },
                    (data, status) => {
                        if (data.val == "ok") {
                            $('#feedback-form').html("<p class='pt-1'>{{ __('names.reviewProduct') }}</p>");
                            $('#product-reviews-add-review-submit').prop("disabled", true);

                            setInterval(() => window.location.reload(), 1000 * seconds);
                        }
                    }
                )
            });
        </script>
    @endpush
