@extends('layouts.app')

@section('title', $product->name ?? __('names.product'))
@section('parentTitle', __('menu.products'))
@section('parentUrl', url('/products'))

@section('content')
    <div class="products-details-area pt-70 pb-45">
        <div class="container">
            <div class="shop-details-content pl-0">
                <div class="row align-items-center">
                    <div class="mb-5">
                        @include('adminlte-templates::common.errors')
                        @include('flash_messages')
                    </div>
                    <div class="col-lg-5">
                        <div class="products-details-img">
                            @if ($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            @else
                                <img src="{{ asset('template/images/shop/shop-image-70.webp') }}" alt="product image">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="products-details-content">
                            <div class="top-content">
                                <div class="price">
                                    @if ($product->discount)
                                        <span class="new-price">€{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}</span>
                                        <span class="old-price">€{{ $product->price }}</span>
                                    @else
                                        <span class="new-price">€{{ $product->price }}</span>
                                    @endif
                                </div>
                                <h3>{{ $product->name }}</h3>
                                <ul class="ratings">
                                    <li>
                                        <i class="flaticon-star-1"></i>
                                        <i class="flaticon-star-1"></i>
                                        <i class="flaticon-star-1"></i>
                                        <i class="flaticon-star-1"></i>
                                        <i class="flaticon-star-1"></i>
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="product-rating-star text-warning
                                                @if ($average >= $i) fa-solid fa-star
                                                @elseif ($average >= $i - .5) fa-solid fa-star-half-stroke
                                                @else fa-regular fa-star 
                                                @endif"></i>
                                        @endfor
                                    </li>
                                    <li>
                                        <span>{{ __('names.reviews').' ('.$rateCount.')' }}</span>
                                    </li>
                                </ul>
                            </div> 
                            <ul class="btns my-4">
                                {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container']) !!}
                                    <li>
                                        <div class="input-counter" style="transform: translateY(18px)">
                                            <span class="minus-button"><i class="fa-solid fa-chevron-down"></i></span>
                                            {!! Form::number('count', "1", [
                                                'class' => 'product-add-to-cart-number pe-5', 
                                                "min" => "1", 
                                                "max" => "5", 
                                                "minlength" => "1", 
                                                "maxlength" => "5", 
                                                "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null
                                            "]) !!}
                                            <span class="plus-button"><i class="fa-solid fa-chevron-up"></i></span>
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                        </div>
                                    </li>
                                    <li>
                                        <button type="submit" class="default-btn style5">{{ __('buttons.addToCart') }}</a>
                                    </li>
                                {!! Form::close() !!}
                            </ul>
                            <ul class="info-list">
                                <li>
                                    <span>{{ __('names.categories') }}:</span>
                                    @forelse ($product->categories as $category)
                                        <a href="{{ url("/innercategories/$category->id") }}">
                                            {{ $category->name }}
                                        </a>
                                    @empty
                                        <span class="text-muted">{{ __('names.noCategories') }}</span>
                                    @endforelse
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="product-description-area pt-70 pb-45">
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
        $('#product-reviews-add-review-submit').click(() => {
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
                        $('#product-reviews-add-review-submit').prop("disabled", true);
                    }
                }
            );
        });
    </script>
@endpush