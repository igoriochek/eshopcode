<div class="col-xl-4 col-md-6 col-sm-12">
    {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
    <div class="single-product position-relative mb-30">

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

        <div class="product-cart-wishlist-icon">
            <div class="cart">
                <button type="submit" id="add_to_cart" class="cart-button fas fa-cart-shopping"></button>
            </div>
        </div>

        <div class="bg-white text-center shadow-sm py-4 product-info">
            <h6>
                <a href="{{ route('viewproduct', $product->id) }}" class="text-decoration-none">{{ $product->name }}</a>
            </h6>

            <div style="display: flex; justify-content: space-around;">
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
                <div class="d-flex pt-1">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="product-rating-star text-warning
                                        @if ($product->average >= $i) fa-solid fa-star
                                        @elseif ($product->average >= $i - .5) fa-solid fa-star-half-stroke
                                        @else fa-regular fa-star 
                                        @endif"></i>
                        @endfor
                </div>
            </div>

            <div class="pt-2">
                <div class="mb-15 mr-15 d-flex align-items-center" style="justify-content: center;">
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

        </div>
    </div>
    <input type="hidden" name="id" value="{{ $product->id }}">
    {!! Form::close() !!}
</div>

<style>
    .cart-button {
        border-width: 0px;
        position: absolute;
        top: 15px;
        right: 15px;
        width: 40px;
        height: 40px;
        background-color: #fff;
        line-height: 40px;
        display: inline-block;
        text-align: center;
        color: var(--bs-primary);
    }
</style>

<script>
    function minusValue(button) {
        let input = button.closest('.mb-15').querySelector('.countInput');
        let value = parseInt(input.value) || 1;
        if (value > 1) {
            input.value = value - 1;
        }
    }

    function plusValue(button) {
        let input = button.closest('.mb-15').querySelector('.countInput');
        let value = parseInt(input.value) || 1;
        input.value = value + 1;
    }
</script>