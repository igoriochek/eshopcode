{!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
<div class="tp-product-list-item d-md-flex" style="margin: 30px 0px;">
    <a class="product-imgs" href="{{ route('viewproduct', $product->id) }}">
        @if ($product->image)
        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid">
        @else
        <img src="{{ asset('template/img/store/pro-1.jpg') }}" alt="product" class="img-fluid">
        @endif
    </a>

    @if ($product->discount)
    <span class="bg-primary text-white px-2 rounded sale-badge">{{ __('names.discount') }}</span>
    @endif

    <div class="bg-white text-center shadow-sm py-4 product-info" style="width: 75%;">
        <h3 class="product-content">
            <a href="{{ route('viewproduct', $product->id) }}" class="text-decoration-none">{{ $product->name }}</a>
        </h3>
        <div class="product-content">
            <div>
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
        </div>


        <div class="product-content pt-1">
            @for($i = 1; $i <= 5; $i++)
                <i class="product-rating-star text-warning
                                        @if ($product->average >= $i) fa-solid fa-star
                                        @elseif ($product->average >= $i - .5) fa-solid fa-star-half-stroke
                                        @else fa-regular fa-star 
                                        @endif"></i>
                @endfor
        </div>

        <div class="product-content pt-2">
            <div class="count-element">
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
            </div>

        </div>
        <div class="product-content" style="width: 100%;">
            <button type="submit" class="btn btn-primary py-2 mb-3" id="add_to_cart">
                {{ __('buttons.addToCart') }}
            </button>
        </div>
    </div>
</div>
<input type="hidden" name="id" value="{{ $product->id }}">
{!! Form::close() !!}


<style>
    .img-fluid {
        height: 100% !important;
    }

    .product-content {
        justify-content: start;
        display: flex;
        padding-left: 25px;
    }

    .count-element {
        margin: 10px 0px;
        align-items: center;
        display: flex;

    }

    @media (max-width: 767px) {
        .img-fluid {
            width: 100% !important;
        }

        .product-info {
            width: 100% !important;
            text-align: center !important;
        }

        .product-content {
            justify-content: center;
            display: flex;
            padding-left: 25px;
        }

        .count-element {
            margin: 10px 0px;
            align-items: center;
            display: flex;
            justify-content: center;

        }
    }
</style>