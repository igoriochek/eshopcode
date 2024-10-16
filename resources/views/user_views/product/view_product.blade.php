@extends('layouts.app')

@section('title', $product->name ?? __('names.product'))
@section('parentTitle', __('menu.products'))
@section('parentUrl', url('/products'))

@section('content')
<section class="work-process ptb-120">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 mb-4">
                @include('adminlte-templates::common.errors')
                @include('flash_messages')
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="img-wrap">
                    @if ($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid rounded-custom">
                    @else
                    <img src="{{ asset('template/img/office-img-1.jpg') }}" alt="product" class="img-fluid rounded-custom">
                    @endif
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <ul class="work-process-list list-unstyled">
                    <li class="d-flex align-items-start mb-4">
                        <div class="icon-content">
                            <h2 class="text-primary" style="margin-top: 0.625rem;">{{ $product->name }}</h2>
                        </div>
                    </li>
                    <li class="d-flex align-items-start mb-4">
                        <div class="icon-content">
                            @if ($product->discount)
                            <span class="fw-bold">
                                €{{ number_format($product->price - (round(($product->price * $product->discount->proc / 100), 2)), 2) }}
                            </span>
                            <span class="text-decoration-line-through">
                                €{{ number_format($product->price, 2) }}
                            </span>
                            @else
                            <span class="fw-bold">
                                €{{ number_format($product->price, 2) }}
                            </span>
                            @endif
                        </div>
                    </li>
                    <li class="d-flex align-items-start mb-4">
                        <div class="icon-content" style="display: flex; justify-content: start;">
                            <div class="tp-product-details-rating">
                                <ul class="ratings list-unstyled">
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
                                </ul>
                            </div>
                            <div class="tp-product-details-reviews" style="margin-left: 15px;">
                                <span>{{ '('.$rateCount.' '.__('names.reviews').')' }}</span>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex align-items-start mb-4">
                        {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container']) !!}
                        <div class="icon-content">
                            <div class="product-content pt-2">
                                <div class="count-element" style="display: flex; justify-content: start;align-items: center; align-content: center;">
                                    <button type="button" class="btn btn-primary p-0 me-2" style="border-radius: 100%; width: 29.45px;" onclick="minusValue(this)">
                                        <svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                    {!! Form::text('count', "1", [
                                    'class' => 'form-control w-25 text-center countInput',
                                    "oninput" => "this.value = this.value < 0 ? Math.abs(this.value) : this.value"
                                        ]) !!}
                                        <button type="button" class="btn btn-primary p-0 ms-2" style="border-radius: 100%; width: 29.45px;" onclick="plusValue(this)">
                                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        </button>
                                        <button type="submit" class="btn btn-primary py-2" style="margin-left: 20px;">
                                            {{ __('buttons.addToCart') }}
                                        </button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </li>
                    <li class="d-flex align-items-start mb-4 mb-lg-0">
                        <div class="icon-content">
                            <span>{{ __('names.categories') }}: </span>
                            @forelse ($product->categories as $category)
                            <a href="{{ url("/innercategories/$category->id") }}">
                                {{ $category->name }}@if (!$loop->last),@endif
                            </a>
                            @empty
                            <span class="text-muted">{{ __('names.noCategories') }}</span>
                            @endforelse
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="style-guide">
        <section class="feature-tab-section ptb-120 bg-light-subtle">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        @include('user_views.product.product_tabs')
                    </div>
                </div>
            </div>
    </div>
    </div>
</section>
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

        const seconds = 1;

        $.post("{{route('addUserRating')}}", {
                "_token": "{{ csrf_token() }}",
                rating: value,
                description: desc,
                product: {{$product -> id}}
            },
            (data, status) => {
                if (data.val == "ok") {
                    $('#review-product').html("<p class='pt-1'>{{ __('names.reviewProduct') }}</p>");
                    $('#product-reviews-add-review-submit').prop("disabled", true);

                    setInterval(() => window.location.reload(), 1000 * seconds);
                }
            }
        )
    });

    function minusValue(button) {
        let input = button.closest('.count-element').querySelector('.countInput');
        let value = parseInt(input.value) || 1;
        if (value > 1) {
            input.value = value - 1;
        }
    }

    function plusValue(button) {
        let input = button.closest('.count-element').querySelector('.countInput');
        let value = parseInt(input.value) || 1;
        input.value = value + 1;
    }
</script>
@endpush