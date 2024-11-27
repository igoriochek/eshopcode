<div class="col-12 pt-8">
    {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
    <div class="product-list-item">
        <div class="product-list-img img-zoom-effect">
            <a href="{{ route('viewproduct', $product->id) }}">
                @if ($product->image)
                    <img class="img-full" src="{{ $product->image }}" alt="{{ $product->name }}">
                @else
                    <img class="img-full" src="{{ asset('template/images/product/medium-size/shop/1-1-290x350.jpg') }}" alt="product">
                @endif
            </a>
        </div>
        <div class="product-list-content ms-4">
            <a class="product-name pb-2" href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
            <div class="price-box pb-1">
                @if ($product->discount)
                    <span class="new-price">
                        €{{ number_format($product->discounted_price, 2) }}
                    </span>
                    <span class="old-price">
                        €{{ number_format($product->price, 2) }}
                    </span>
                @else
                    <span class="new-price">
                        €{{ number_format($product->price, 2) }}
                    </span>
                @endif
            </div>
            <div class="rating-box pb-2">
                <ul>
                    @for ($i = 1; $i <= 5; $i++)
                        <li>
                            <i class="text-warning
                        @if ($product->average >= $i) fa fa-star
                        @elseif ($product->average >= $i - 0.5) fa-solid fa-star-half-stroke
                        @else fa-regular fa-star-o @endif"></i>
                        </li>
                    @endfor
                </ul>
            </div>
            <p class="short-desc mb-0">{!! $product->description !!}</p>
            <div class="d-flex justify-content-start pt-2 pb-2">
                @if(!$product->only_one)
                    <div class="quantity" >
                        <div class="cart-plus-minus">
                            {!! Form::text('count', '1', [
                                'class' => 'cart-plus-minus-box tp-cart-input',
                                'oninput' => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null",
                                ]) !!}
                        </div>
                    </div>
                @else
                    <div>
                        {!! Form::hidden('count', '1') !!}
                    </div>
                @endif
                <button class="btn btn-custom-size lg-size btn-primary ms-2" type="submit" value="{{ __('buttons.addToCart') }}" @if($product->only_one && $product->isInCart) disabled @endif>{{ __('buttons.addToCart') }}</button>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $product->id }}">
    {!! Form::close() !!}
</div>
