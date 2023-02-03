@forelse ($products as $product)
    <div class="col-lg-4 col-md-6 col-sm-6">
        {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
        <div class="product-item" data-aos="fade-up" data-aos-duration="1000">
            <div class="product-item__header">
                <div class="product-item__thumbnail">
                    @if ($product->image)
                        <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" width="251" height="290">
                        </a>
                    @else
                        <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                            <img src="/images/product/product-1.png" alt="Product" width="251" height="290">
                        </a>
                    @endif
                </div>
                <div class="product-item__actions">
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <button type="submit" class="product-item__action" data-bs-tooltip="tooltip" data-bs-placement="top" title="{{__('buttons.addToCart')}}">
                        <i class="fal fa-shopping-cart"></i>
                    </button>
                </div>
            </div>
            <div class="product-item__info text-center pt-3">
                <h2 class="product-item__title">
                    <a href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
                </h2>
                <div class="product-item__price">
                    @if ($product->discount )
                        <span class="sale-price discount">{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }} €</span>
                        <span class="regular-price">{{ number_format($product->price,2) }} €</span>
                    @else
                        <span class="sale-price">{{ number_format($product->price,2) }} €</span>
                    @endif
                </div>
                <div class="product__quantity d-flex justify-content-center pt-3">
                    <div class="product-quantity ">
                        {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@empty
    <span class="text-muted">{{__('names.noProduct')}}</span>
@endforelse
