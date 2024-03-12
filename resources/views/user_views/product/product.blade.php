<div class="col-lg-4 col-sm-6 products-col-item">
    {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
        <div class="single-shop-card">
            <div class="shop-image">
                @if ($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('template/images/shop/shop-image-5.webp') }}" alt="product">
                @endif
                <ul class="shop-btns">
                    <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="{{ __('buttons.addToCart') }}">
                        <button type="submit" class="default-btn style5 p-2 rounded-1" id="add_to_cart">
                            <i class="fa-solid fa-cart-shopping text-white pe-1"></i>
                        </button>
                    </li>
                </ul>
            </div>
            <div class="content">
                <h3>
                    <a href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
                </h3>
                <ul class="info d-flex justify-content-between">
                    <li>
                        @if ($product->discount)
                            <span>€{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }} <del>€{{ number_format($product->price, 2) }}</del></span>
                        @else
                            <span>€{{ number_format($product->price, 2) }}</span>
                        @endif
                    </li>
                    <li>
                        <div class="rating">
                            <div class="d-flex">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="product-rating-star text-warning
                                              @if ($product->average >= $i) fa-solid fa-star
                                              @elseif ($product->average >= $i - .5) fa-solid fa-star-half-stroke
                                              @else fa-regular fa-star 
                                              @endif"></i>
                                @endfor
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="w-100 d-flex justify-content-center flex-column mt-3">
                    <div class="d-flex justify-content-center">
                        <input type="button" class="minus rounded-0" value="-">
                        {!! Form::number('count', "1", [
                            'class' => 'product-add-to-cart-number', 
                            "min" => "1", 
                            "max" => "5", 
                            "minlength" => "1", 
                            "maxlength" => "5", 
                            "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null
                        "]) !!}
                        <input type="button" class="plus rounded-0" value="+">
                    </div>
                </div>
            </div>
        </div>
    <input type="hidden" name="id" value="{{ $product->id }}">
    {!! Form::close() !!}
</div>

<style>
    .minus, .plus {
        &:hover, &:focus {
            border-color: #a10909;
            background-color: #a10909;
        }
    }
</style>