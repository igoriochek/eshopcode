{!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
<div class="row grid-list1">
    <div class="col-12 col-sm-4 col-md-5 col-lg-3 mb-5">
        <div class="position-relative">
            @if ($product->discount)
            <span class="badge badge-danger cb3">{{ $product->discount->proc . '%' }}</span>
            @endif
            <a href="{{ route('viewproduct', $product->id) }}">
                <div class="product-thumbnail position-relative d-flex justify-content-center align-items-center">
                    @if ($product->image)
                    <img class="product-image" src="{{ $product->image }}" alt="{{ $product->name }}">
                    @else
                    <img class="product-image" src="{{ asset('template/img/product/03.jpg') }}" alt="{{ $product->name }}">
                    @endif
                </div>
            </a>
        </div>
    </div>
    <div class="col-12 col-sm-8 col-md-7 col-lg-6 mb-5">
        <div class="product-desc">
            <h3 class="title">
                <a href="{{ route('viewproduct', $product->id) }}">
                    {{ $product->name }}
                </a>
            </h3>
            <div class="star-rating">
                @for ($i = 1; $i <= 5; $i++)
                    <i
                    class="product-rating-star text-warning
                                            @if ($product->average >= $i) fa-solid fa-star
                                            @elseif ($product->average >= $i - 0.5) fa-solid fa-star-half-stroke
                                            @else fa-regular fa-star @endif"></i>
                    @endfor
            </div>
        </div>
        <ul class="product-list-des">
            <li>
                {!! $product->description !!}
            </li>
        </ul>
    </div>
    <div class="col-12 col-sm-8 offset-sm-4 offset-md-5 offset-lg-0 col-lg-3 mb-5">
        <div class="availability-list">
            @if ($product->discount)
            <span class="text-danger ms-1">€{{ $product->price - round(($product->price * $product->discount->proc) / 100, 2) }}</span>
            <del>€{{ number_format($product->price, 2) }}</del>
            @else
            <span class="price ">€{{ number_format($product->price, 2) }}</span>
            @endif
        </div>

        <a href="javascript:void(0)" class="p-0">
            <button type="submit" class="btn btn-primary btn-add-to-cart rounded btn-sm mb-3 btn-sm btn-md-block" id="add_to_cart" style="margin-bottom: 60px;">
                {{ __('buttons.addToCart') }}
                <i class="ion-bag"></i>
            </button>
        </a>

        <div class="counter-container" id="product-{{ $product->id }}">
            <input type="number" name="count" class="counter-input" value="1" min="1" max="100" />
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
</div>
<input type="hidden" name="id" value="{{ $product->id }}">
{!! Form::close() !!}

@push('css')
<style>
    .product-thumbnail {
        height: 200px;
    }

    .product-image {
        max-height: 200px;
        width: auto;
        height: auto;
    }

    .product-desc .title {
        text-transform: none !important;
    }
    
    .counter-container {
        display: inline-block;
        position: relative;
        border: 1px solid #ccc;
        width: 50px;
        text-align: center;
        font-size: 1.2em;
        margin-top: 10px;
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