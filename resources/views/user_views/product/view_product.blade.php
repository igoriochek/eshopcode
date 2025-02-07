@extends('layouts.app')

@section('title', $product->name ?? __('names.product'))
@section('parentTitle', __('menu.products'))
@section('parentUrl', url('/products'))

@section('content')
<div class="product_details mt-100 mb-100">
    <div class="container">
        <div class="row">
            @include('adminlte-templates::common.errors')
            @include('flash_messages')
            <div class="col-lg-6 col-md-6">
                <div class="product-details-tab">
                    <div id="img-1" class="zoomWrapper single-zoom">
                        <a>
                            @if ($product->image)
                            <img id="zoom1" src="{{ $product->image }}"
                                data-zoom-image="{{ $product->image }}" alt="{{ $product->name }}">
                            @else
                            <img id="zoom1" src="{{ asset('template/img/product/productbig4.jpg') }}"
                                data-zoom-image="{{ asset('template/img/product/productbig4.jpg') }}" alt="{{ $product->name }}">
                            @endif
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product_d_right">
                    {!! Form::open([
                    'route' => ['addtocart'],
                    'method' => 'post',
                    ]) !!}
                    <h1><a>{{ $product->name }}</a></h1>
                    <div class=" product_ratting">
                        <ul>
                            @for ($i = 1; $i <= 5; $i++)
                            <li>
                                <a>
                                    <i class="
                                    @if ($average >= $i) icon-star2
                                    @elseif ($average >= $i - 0.5) icon-star2
                                    @else icon-star-outlined @endif">
                                    </i>
                                </a>
                            </li>
                            @endfor
                            <li class="review"><a> ( {{ $rateCount }} {{ __('names.reviews') }} ) </a></li>
                        </ul>

                    </div>
                    <div class="price_box">
                        @if ($product->discount)
                        <span class="current_price">€{{ $product->price - round(($product->price * $product->discount->proc) / 100, 2) }}</span>
                        <span class="old_price">€{{ number_format($product->price, 2) }}</span>
                        @else
                        <span class="current_price">€{{ number_format($product->price, 2) }}</span>
                        @endif
                    </div>
                    <div class="product_desc">
                        <p>{{ $product->description }}</p>
                    </div>
                    <div class="product_variant quantity">
                        <label>{{ __('names.quantity') }}</label>
                        <input min="1" max="{{ $product->count }}" value="1" type="number" name="count">
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <button class="button" type="submit">{{ __('buttons.addToCart') }}</button>
                    </div>
                    <div class="product_meta">
                        <span>{{ __('names.categories') }}:
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
                        </span>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@include('user_views.product.product_tabs')
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
                product: {{$product -> id}}
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