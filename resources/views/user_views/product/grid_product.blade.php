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
        <div class="product-content" style="bottom: 10px;">
            <div class="price-box">
                <a class="product-name pb-1" href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>

                <div class="" style="display: flex; justify-content: space-between; padding-right: 12px;">
                    <div class="price-box-holder">
                        <span>{{ __('names.price')}}:</span>
                        @if ($product->discount)
                        <span class="new-price text-primary">
                            €{{ number_format($product->price - (round(($product->price * $product->discount->proc / 100), 2)), 2) }}
                        </span>
                        <span class="old-price text-primary">
                            €{{ number_format($product->price, 2) }}
                        </span>
                        @else
                        <span class="new-price text-primary">
                            €{{ number_format($product->price, 2) }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="rating-box pb-2">
                    <ul>
                        @for($i = 1; $i <= 5; $i++) <li style="padding-right: 5px;">
                            <i class="
                                    @if ($product->average >= $i) fa fa-star
                                    @elseif ($product->average >= $i - .5) fa fa-star-half-o
                                    @else fa-regular fa-star-o
                                    @endif"></i>
                            </li>
                            @endfor
                    </ul>
                </div>
            </div>

            <div class="product-add-action">
                <button type="submit" class="tp-product-action" id="add_to_cart" data-tippy="{{ __('buttons.addToCart') }}" data-tippy-inertia="true" data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                    <i class="pe-7s-cart"></i>
                </button>
                <div class="quantity" style="padding-bottom: 25px;">
                    <div class="cart-plus-minus">
                        {!! Form::text('count', "1", [
                        'class' => 'cart-plus-minus-box tp-cart-input',
                        "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null
                        "]) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $product->id }}">
    {!! Form::close() !!}
</div>

@push('css')
<style>

    .tp-product-action {
        background: none;
        border: none;
        color: inherit;
        font: inherit;
        cursor: pointer;
        outline: inherit;
        border: 1px solid #dee2e6;
        -webkit-transition: all 0.3s ease 0s;
        -o-transition: all 0.3s ease 0s;
        transition: all 0.3s ease 0s;
        width: 30px;
        height: 30px;
        line-height: 28px;
        text-align: center;
        display: block;
        color: #444444;
    }

    .tp-product-action:hover {
        background-color: #ee3231;
        border-color: #ee3231;
        color: #fff;
    }

    .product-content {
        margin-left: 15px;
        width: 85%;
        position: initial !important;
        margin-top: 15px;
    }

    .product-add-action {
        width: 85%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 3px;
    }
</style>
@endpush