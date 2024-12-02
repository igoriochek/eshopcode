<div class="col-xl-4 col-sm-6 pt-6">
    {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
    <div class="product-item">
        <div class="product-img img-zoom-effect">
            <a href="{{ route('viewproduct', $product->id) }}">
                @if ($product->image)
                    <img class="img-full" src="{{ $product->image }}" alt="{{ $product->name }}">
                @else
                    <img class="img-full" src="{{ asset('template/images/product/medium-size/shop/1-1-290x350.jpg') }}" alt="product">
                @endif
            </a>
        </div>
        <div class="product-content">
            <a class="product-name pb-1" href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
            <div class="">
                <span>{{ __('names.price') }}:</span>
                @if ($product->discount)
                    <span class="new-price text-primary">
                        €{{ number_format($product->discounted_price, 2) }}
                    </span>
                    <span class="old-price text-primary">
                        €{{ number_format($product->price, 2) }}
                    </span>
                @else
                    <span class="new-price text-primary">
                        €{{ number_format($product->price, 2) }}
                    </span>
                @endif
                @if(isset($product->unit))
                    <span class="ms-1">
                        {{ $product->unit }}
                    </span>
                @endif
            </div>
            <div class="rating-box">
                <ul>
                    @for ($i = 1; $i <= 5; $i++)
                        <li style="padding-right: 5px;">
                            <i class="
                                    @if ($product->average >= $i) fa fa-star
                                    @elseif ($product->average >= $i - 0.5) fa fa-star-half-o
                                    @else fa-regular fa-star-o @endif"></i>
                        </li>
                    @endfor
                </ul>
            </div>
            <div class="d-flex justify-content-between pt-2 pb-2">
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
                <button class="btn btn-custom-size lg-size btn-primary" type="submit" value="{{ __('buttons.addToCart') }}" @if($product->only_one && $product->isInCart) disabled @endif>{{ __('buttons.addToCart') }}</button>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $product->id }}">
    {!! Form::close() !!}
</div>
