@forelse ($products as $product)
    <div class="product-list-item">

        <div class="product-list-item__header">

            <div class="product-list-item__thumbnail">
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

        </div>

        <div class="product-list-item__info">

            <h2 class="product-list-item__title">
                <a href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
            </h2>

            <div class="product-list-item__price">
                @if ($product->discount )
                    <span class="sale-price discount">{{ round(($product->price * $product->discount->proc / 100),2) }} €</span>
                    <span class="regular-price">{{$product->price}} €</span>
                @else
                    <span class="sale-price">{{$product->price}} €</span>
                @endif
            </div>

            <p>{{ $product->description }}</p>

            {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}

            <div class="product-list-item__actions">

                <div class="product-quantity ">
                    {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                </div>

                <input type="hidden" name="id" value="{{ $product->id }}">

                <button type="submit" class="product-list-item__btn btn btn-primary btn-hover-secondary d-flex justify-content-center">
                    <span>{{ __('buttons.addToCart') }}</span>
                </button>

            </div>

            {!! Form::close() !!}

        </div>

    </div>
@empty
    <span class="text-muted">{{__('names.noProduct')}}</span>
@endforelse
