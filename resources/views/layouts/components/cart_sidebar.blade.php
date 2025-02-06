<div class="mini_cart">
    <div class="cart_gallery">
        <div class="cart_close">
            <div class="cart_text">
                <h3>{{ __('names.myCart') }}</h3>
            </div>
            <div class="mini_cart_close">
                <a href="javascript:void(0)"><i class="icon-x"></i></a>
            </div>
        </div>
        @forelse ($cartItems as $item)
        <div class="cart_item">
            <div class="cart_img">
                <a href="{{ route('viewproduct', $item['product']->id) }}">
                    @if ($item['product']->image)
                    <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}">
                    @else
                    <img src="{{ asset('template/img/s-product/product2.jpg') }}" alt="{{ $item['product']->name }}">
                    @endif
                </a>
            </div>
            <div class="cart_info">
                <a href="{{ route('viewproduct', $item['product']->id) }}">{{ $item['product']->name }}</a>
                <p>{{ $item->count . ' x' }}
                    @if ($item['product']->discount)
                    <span> €{{ $item['product']->price - round(($item['product']->price * $item['product']->discount->proc) / 100, 2) }} </span>
                    @else
                    <span> €{{ number_format($item['product']->price, 2) }} </span>
                    @endif
                </p>
            </div>
            <div class="cart_remove">
                {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                <button class="cart-remove-item" type="submit" title="{{ __('names.removeProduct') }}"
                    onclick="return confirm('{{ __('messages.confirmDeleteProduct') }}')">
                    <i class="icon-x"></i>
                </button>
                {!! Form::close() !!}
            </div>
        </div>
        @empty
        <p>{{ __('names.emptyCart') }}!</p>
        @endforelse
    </div>
    <div class="mini_cart_table">
        <div class="cart_table_border">
            <div class="cart_total">
                <span>{{ __('names.total') }} :</span>
                <span class="price">€{{ $cart->sum ? number_format($cart->sum, 2) : '0.00' }}</span>
            </div>
        </div>
    </div>
    <div class="mini_cart_footer">
        <div class="cart_button">
            <a href="{{ url('user/viewcart') }}">
                <i class="fa fa-shopping-cart"></i>
                {{ __('names.viewCart') }}
            </a>
        </div>
        <div class="cart_button">
            <a class="active" href="{{ url('user/checkout') }}">
                <i class="fa fa-sign-in"></i>
                {{ __('buttons.proceedToCheckout') }}
            </a>
        </div>
    </div>
</div>

<style>
    .cart-remove-item {
        font-size: 15px;
        display: block;
        line-height: 20px;
        text-align: center;
        transition: all 0.3s ease 0s;
        color: inherit;
        line-height: inherit;
        text-decoration: none;
        cursor: pointer;
        box-sizing: border-box;
        background-color: transparent;
        border: transparent;
    }
</style>