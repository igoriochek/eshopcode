@extends('layouts.app')

@section('title', $product->name ?? __('names.product'))
@section('parentTitle', __('menu.products'))
@section('parentUrl', url('/products'))

@section('content')
    <section class="section-product padding-tb-50">
        <div class="container">
            <div class="row mb-minus-24">
                <div class="mb-2">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                </div>
                <div class="col-lg-12 col-12 mb-24">
                    <div class="bb-single-pro">
                        <div class="row">
                            <div class="col-lg-5 col-12 mb-24">
                                <div class="single-pro-slider">
                                    <div class="single-product-cover">
                                        <div class="single-slide zoom-image-hover">
                                            @if ($product->image)
                                                <img class="img-responsive" src="{{ $product->image }}"
                                                    alt="{{ $product->name }}">
                                            @else
                                                <img class="img-responsive"
                                                    src="{{ asset('template/img/new-product/1.jpg') }}" alt="product-1">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-12 mb-24">
                                <div class="bb-single-pro-contact">
                                    <div class="bb-sub-title">
                                        <h4>{{ $product->name }}</h4>
                                    </div>
                                    <div class="bb-single-rating">
                                        <span class="bb-pro-rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="
                                        @if ($average >= $i) ri-star-fill
                                        @elseif ($average >= $i - 0.5) ri-star-half-fill
                                        @else ri-star-line @endif"
                                                    style="
                                        @if ($average >= $i - 0.5) color: #fea99a; @endif"></i>
                                            @endfor
                                        </span>
                                        <span class="bb-read-review">
                                            |&nbsp;&nbsp;<a href="#bb-spt-nav-review">{{ $rateCount }}
                                                {{ __('names.reviews') }}</a>
                                        </span>
                                    </div>
                                    <p>{{ $product->description }}</p>
                                    <div class="bb-single-price-wrap">
                                        <div class="bb-single-price">
                                            @if ($product->discount)
                                                <div class="price">
                                                    <h5>€{{ number_format($product->price, 2) }}
                                                        <span>-{{ $product->discount->proc }}%</span>
                                                    </h5>
                                                </div>
                                                <div class="mrp">
                                                    <p><span>€{{ number_format($product->original_price, 2) }}</span></p>
                                                </div>
                                            @else
                                                <div class="price">
                                                    <h5>€{{ number_format($product->price, 2) }}</h5>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="bb-single-price">
                                            <div class="stock">
                                                @if ($product->count > 3)
                                                    <span>{{ __('names.inStock') }}</span>
                                                @elseif ($product->count <= 3 && $product->count > 0)
                                                    <span>{{ $product->count }} {{ __('names.left') }}</span>
                                                @else
                                                    <span>{{ __('names.outOfStock') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bb-single-qty">
                                        {!! Form::open([
                                            'route' => ['addtocart'],
                                            'method' => 'post',
                                            'style' => 'display: flex;',
                                        ]) !!}
                                        <div class="qty-plus-minus">
                                            <input class="qty-input" type="text" name="count" value="1"
                                                max="{{ $product->count }}">
                                        </div>
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <div class="buttons">
                                            <button type="submit"
                                                class="bb-btn-2 ms-3">{{ __('buttons.addToCart') }}</button>
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="mt-3">
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
                    @include('user_views.product.product_tabs')
                </div>
            </div>
        </div>
    </section>
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
