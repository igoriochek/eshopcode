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
    </div>
    <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white">
        @include('user_views.product.product_tabs')
    </div>
@endsection

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
                    product: {{ $product->id }}
                },
                (data, status) => {
                    if (data.val == "ok") {
                        $('#review-product').html("<p>{{ __('names.reviewProduct') }}</p>");
                        $('#product-reviews-add-review-submit').prop("disabled", true);

                        setInterval(() => window.location.reload(), 1000 * seconds);
                    }
                }
            );
        });
    </script>
@endpush
