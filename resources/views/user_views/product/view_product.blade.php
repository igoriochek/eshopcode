@extends('layouts.app')

@section('title', $product->name ?? __('names.product'))
@section('parentTitle', __('menu.products'))
@section('parentUrl', url('/products'))

@section('content')
<!-- <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
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
                                        <a href="{{ asset('template/images/product/product-big-01.png') }}"
                                            class="popup-zoom">
                                            <img src="{{ asset('template/images/product/product-big-01.png') }}"
                                                alt="product image">
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 mb--40">
                        <div class="single-product-content">
                            <div class="inner">
                                <h2 class="product-title mt-4 mt-lg-0">{{ $product->name }}</h2>
                                <div class="product-price-variant mb-4 pb-3">
                                    @if ($product->discount)
                                        <span
                                            class="price current-price fs-1 text-dark fw-bold">€{{ $product->price - round(($product->price * $product->discount->proc) / 100, 2) }}</span>
                                        <span class="price old-price fs-1 fw-bold text-muted ms-1">
                                            <del>€{{ number_format($product->price, 2) }}</del>
                                        </span>
                                    @else
                                        <span
                                            class="price current-price fs-1 text-dark fw-bold">€{{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>

                                <div class="product-rating">
                                    <div class="star-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i
                                                class=
                                                    "@if ($average >= $i) fas fa-star
                                                    @elseif ($average >= $i - 0.5) fa-solid fa-star-half-stroke
                                                    @else far fa-star @endif"></i>
                                        @endfor
                                    </div>
                                    <div class="review-link">
                                        <span>{{ __('names.reviews') . ' (' . $rateCount . ')' }}</span>
                                    </div>
                                </div>

                                <div class="product-action-wrapper d-flex-center">
                                    {!! Form::open([
                                        'route' => ['addtocart'],
                                        'method' => 'post',
                                        'class' => 'product-add-to-cart-container d-flex-center',
                                    ]) !!}

                                    <div class="pro-qty">
                                        <input type="number" name="count" value="1" min="1"
                                            class="product-add-to-cart-number"
                                            oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                    </div>

                                    <input type="hidden" name="id" value="{{ $product->id }}">

                                    <ul class="product-action d-flex-center mb--0">
                                        <li class="add-to-cart">
                                            <button type="submit"
                                                class="axil-btn btn-bg-primary">{{ __('buttons.addToCart') }}</button>
                                        </li>
                                    </ul>
                                    {!! Form::close() !!}
                                </div>

                                <div class="info-list mt-4">
                                    <div>
                                        <span>{{ __('names.categories') }}:</span>
                                        @forelse ($product->categories as $category)
                                            <a href="{{ url("/innercategories/$category->id") }}">
                                                {{ $category->name }}
                                                @if (!$loop->last)
                                                    ;
                                                @endif
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
    </div> -->
<section class="product-single style1 pb-6rem">
    <div class="container">
        <div class="row">
            <div class="mb-5">
                @include('adminlte-templates::common.errors')
                @include('flash_messages')
            </div>
            <div class="col-md-6 mx-auto col-lg-5 mb-5 mb-lg-0">
                <div class="product-sync-init mb-20">
                    <div class="single-product">
                        <div class="product-thumb">
                            @if ($product->image)
                            <img src="{{ $product->image }}" alt="{{ $product->name }}">
                            @else
                            <img src="{{ asset('template/img/slider/thumb/1.1.2x.jpg') }}"
                                alt="product image">
                            @endif
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-6 mt-5 mt-md-0">
                <div class="modal-product-info">
                    <div class="product-head">
                        <h2 class="title">{{ $product->name }}</h2>
                        <div class="star-content">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i
                                    class="product-rating-star text-warning
                                            @if ($average >= $i) fa-solid fa-star
                                            @elseif ($average >= $i - 0.5) fa-solid fa-star-half-stroke
                                            @else fa-regular fa-star @endif"></i>
                                    @endfor
                                <a id="write-comment">
                                    <span class="ml-2">
                                        <i class="far fa-comment-dots"></i>
                                    </span>
                                    {{ __('names.reviews') }}
                                    <span> {{ $rateCount }}</span>
                                </a>
                                <div class="product-discount">
                                    @if ($product->discount)
                                    <span class="regular-price"> <del style="margin-right: 10px">€{{ number_format($product->price, 2) }}</del>€{{ $product->price - round(($product->price * $product->discount->proc) / 100, 2) }}</span>
                                    <span class="badge badge-dark">{{ __('names.save') . ' ' . $product->discount->proc . '%' }}</span>
                                    @else
                                    <span class="regular-price">€{{ number_format($product->price, 2) }}</span>
                                    @endif
                                </div>
                        </div>
                    </div>
                    <div class="product-body">
                        <p>{!! $product->description !!}</p>
                    </div>

                    <div class="product-footer">
                        {!! Form::open([
                        'route' => ['addtocart'],
                        'method' => 'post',
                        'class' => 'product-add-to-cart-container d-flex-center',
                        ]) !!}
                        <div class="product-count style d-flex flex-column flex-sm-row mt-5 mb-5 pt-3" style="align-items: center;">
                            <div class="count d-flex" style="justify-content: center;">
                                <div class="counter-container" id="product-{{ $product->id }}">
                                    <input type="number" name="count" class="counter-input" value="1" min="1" max="100" style="width: 50px;"/>
                                    <div class="counter-arrows">
                                        <span class="counter-arrow-up" style="border-bottom: 1px solid #ccc;" onclick="incrementValue(this, event)">
                                            <i class="fas fa-chevron-up"></i>
                                        </span>
                                        <span class="counter-arrow-down" onclick="decrementValue(this, event)">
                                            <i class="fas fa-chevron-down"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div>
                                <button type="submit" class="btn btn-primary rounded mt-5 mt-sm-0" style="margin-left: 20px;">
                                    <span class="me-2"><i class="ion-android-add"></i></span>
                                    {{ __('buttons.addToCart') }}
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}

                        <!-- {!! Form::open([
                        'route' => ['addtocart'],
                        'method' => 'post',
                        'class' => 'product-add-to-cart-container d-flex-center',
                        ]) !!}

                        <div class="pro-qty">
                            <input type="number" name="count" value="1" min="1"
                                class="product-add-to-cart-number"
                                oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                        </div>

                        <input type="hidden" name="id" value="{{ $product->id }}">

                        <ul class="product-action d-flex-center mb--0">
                            <li class="add-to-cart">
                                <button type="submit"
                                    class="axil-btn btn-bg-primary">{{ __('buttons.addToCart') }}</button>
                            </li>
                        </ul>
                        {!! Form::close() !!} -->

                        <div class="pro-social-links mt-4">
                            <span>{{ __('names.categories') }}:</span>
                            @forelse ($product->categories as $category)
                            <a href="{{ url("/innercategories/$category->id") }}">
                                {{ $category->name }}
                                @if (!$loop->last)
                                ,
                                @endif
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
</section>

<div class="product-tab bg-light py-6rem">
    @include('user_views.product.product_tabs')
</div>
@endsection

@push('css')
<style>
    .counter-container {
        display: inline-block;
        position: relative;
        border: 1px solid #ccc;
        width: 50px;
        text-align: center;
        font-size: 1.2em;
    }

    .counter-input {
        width: 100%;
        text-align: center;
        border: none;
        padding-right: 20px;
        height: 48px;
    }

    .counter-arrows {
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        display: flex;
        flex-direction: column;
    }

    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type="number"] {
        -moz-appearance: textfield;
    }

    .counter-arrow-up,
    .counter-arrow-down {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 20px;
        height: 50%;
        text-align: center;
        line-height: 1em;
        cursor: pointer;
        border-left: 1px solid #ccc;
        border-top: none;
        border-right: none;
        border-bottom: none;
    }

    .increment {
        right: 4px;
        position: absolute;
    }

    .decrement {
        position: absolute;
        top: 24px;
        right: 4px;
    }
</style>
@endpush

@push('scripts')
<script>
    $('#product-reviews-add-review-submit').click(() => {
        const value = $('input[type=radio][name=rating]:checked').val();
        const desc = $('textarea#comment').val();

        const seconds = 1;

        $.post("{{ route('addUserRating') }}", {
                "_token": "{{ csrf_token() }}",
                rating: value,
                description: desc,
                product: {{$product -> id}}},
            (data, status) => {
                if (data.val == "ok") {
                    $('#review-product').html("<p>{{ __('names.reviewProduct') }}</p>");
                    $('#product-reviews-add-review-submit').prop("disabled", true);

                    setInterval(() => window.location.reload(), 1000 * seconds);
                }
            }
        );
    });

    function incrementValue(element, event) {
        event.preventDefault();
        let input = element.closest('.counter-container').querySelector('.counter-input');
        let value = parseInt(input.value) || 1;
        input.value = value + 1;
    }

    function decrementValue(element, event) {
        event.preventDefault();
        let input = element.closest('.counter-container').querySelector('.counter-input');
        let value = parseInt(input.value) || 1;
        if (value > 1) {
            input.value = value - 1;
        }
    }
</script>
@endpush