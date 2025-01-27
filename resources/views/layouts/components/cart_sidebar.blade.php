<div class="bb-side-cart-overlay"></div>
<div class="bb-side-cart">
    <div class="row h-full">
        <div class="col-md-12 col-12">
            <div class="bb-inner-cart">
                <div class="bb-top-contact">
                    <div class="bb-cart-title">
                        <h4>{{ __('names.myCart') }}</h4>
                        <a href="javascript:void(0)" class="bb-cart-close" title="{{ __('names.closeCart') }}"></a>
                    </div>
                </div>
                <div class="bb-cart-box item">
                    <ul class="bb-cart-items">
                        @forelse ($cartItems as $item)
                        <li class="cart-sidebar-list">
                            {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                            <button class="cart-remove-item" type="submit" title="{{ __('names.removeProduct') }}"
                                onclick="return confirm('{{ __('messages.confirmDeleteProduct') }}')">
                                <i class="ri-close-line"></i>
                            </button>
                            {!! Form::close() !!}
                            <a href="javascript:void(0)" class="bb-cart-pro-img">
                                @if ($item['product']->image)
                                <img src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}">
                                @else
                                <img src="{{ asset('template/img/new-product/1.jpg') }}" alt="{{ $item['product']->name }}">
                                @endif
                            </a>
                            <div class="bb-cart-contact">
                                <a href="{{ route('viewproduct', $item['product']->id) }}" class="bb-cart-sub-title">
                                    {{ $item['product']->name }}
                                </a>
                                <span class="cart-price">
                                    @if ($item['product']->discount)
                                    <span class="new-price">
                                        €{{ $item['product']->price - round(($item['product']->price * $item['product']->discount->proc) / 100, 2) }}
                                    </span>
                                    @else
                                    <span class="new-price">
                                        €{{ number_format($item['product']->price, 2) }}
                                    </span>
                                    @endif
                                    {{ 'x' . $item->count }}
                                </span>
                            </div>
                        </li>
                        @empty
                        <p class="bb-wishlist-msg">{{ __('names.emptyCart') }}!</p>
                        @endforelse
                    </ul>
                </div>
                <div class="bb-bottom-cart">
                    <div class="cart-sub-total">
                        <table class="table cart-table">
                            <tbody>
                                <tr>
                                    <td class="title">{{ __('names.total') }} :</td>
                                    <td class="price">€{{ $cart->sum ? number_format($cart->sum, 2) : '0.00' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-btn">
                        <a href="{{ url('user/viewcart') }}" class="bb-btn-1">{{ __('names.viewCart') }}</a>
                        <a href="{{ url('user/checkout') }}" class="bb-btn-2">{{ __('buttons.proceedToCheckout') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .cart-remove-item-custom {
        transition: all 0.3s ease-in-out;
        background-color: #3d4750;
        width: 20px;
        height: 20px;
        color: #fff;
        position: absolute;
        top: -3px;
        right: -3px;
        border-radius: 50%;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        opacity: 0.5;
    }
</style>