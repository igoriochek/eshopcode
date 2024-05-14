<div class="col-xl-4 col-sm-6">
    {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
    <div class="axil-product product-style-one mb--30">
        <div class="thumbnail">
            <a href="{{ route('viewproduct', $product->id) }}">
                @if ($product->image)
                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                @else
                    <img src="{{ asset('template/images/product/electric/product-01.png') }}" alt="{{ $product->name }}">
                @endif
            </a>
            @if ($product->discount)
                <div class="label-block label-right">
                    <div class="product-badget">
                        {{ $product->discount->proc . '% ' . __('names.off') }}
                    </div>
                </div>
            @endif
            <div class="product-hover-action">
                <ul class="cart-action">
                    <li class="select-option">
                        <a href="javascript:void(0)" class="p-0">
                            <button type="submit" class="py-2 px-4 btn text-white fs-4 fw-bold" id="add_to_cart">
                                {{ __('buttons.addToCart') }}
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="product-content">
            <div class="inner">
                <h5 class="title">
                    <a href="{{ route('viewproduct', $product->id) }}">
                        {{ $product->name }}
                    </a>
                </h5>
                <div class="d-flex justify-content-center justify-content-sm-start align-items-center">
                    <div class="rating mb-3">
                        <div class="d-flex">
                            @for ($i = 1; $i <= 5; $i++)
                                <i
                                    class="product-rating-star text-warning
                                            @if ($product->average >= $i) fa-solid fa-star
                                            @elseif ($product->average >= $i - 0.5) fa-solid fa-star-half-stroke
                                            @else fa-regular fa-star @endif"></i>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="product-price-variant">
                    @if ($product->discount)
                        <span
                            class="price current-price">€{{ $product->price - round(($product->price * $product->discount->proc) / 100, 2) }}</span>
                        <span class="price old-price">€{{ number_format($product->price, 2) }}</span>
                    @else
                        <span class="price current-price">€{{ number_format($product->price, 2) }}</span>
                    @endif
                </div>
                <div
                    class="product-action-wrapper d-flex justify-content-sm-start justify-content-center align-items-center mt-4">
                    <div class="pro-qty">
                        <input type="number" name="count" value="1" min="1"
                            oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $product->id }}">
    {!! Form::close() !!}
</div>
