<div class="cart__table">
    <table class="cart__table--inner">
        <thead>
        <tr class="text-dark">
            <th class="cart__table--header__list">{{ __('names.product') }}</th>
            <th class="cart__table--header__list">{{ __('names.price') }}</th>
            <th class="cart__table--header__list">{{ __('names.quantity') }}</th>
            <th class="cart__table--header__list">{{ __('names.subtotal') }}</th>
        </tr>
        </thead>
        <tbody class="cart__table--body">
        @forelse($cartItems as $item)
            <tr class="cart__table--body__items">
                <td class="cart__table--body__list">
                    <div class="cart__product d-flex align-items-center">
                        {!! Form::open(['route' => ['userCartItemDestroy', [$role, $item->id]], 'method' => 'delete']) !!}
                        <button type="submit" class="cart__remove--btn" title="{{ __('names.removeProduct') }}"
                                onclick="return confirm('{{ __('messages.areYouSureCart') }}?')">
                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16px"
                                 height="16px">
                                <path
                                    d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/>
                            </svg>
                        </button>
                        {!! Form::close() !!}
                        <div class="cart__thumbnail">
                            <a href="{{ route('viewproduct', $item['product']->id) }}"
                               title="{{ $item['product']->name }}">
                                <img alt="{{ $item['product']->name }}" class="border-radius-5"
                                     src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/noimage.jpeg @endif">
                            </a>
                        </div>
                        <div class="cart__content">
                            <h3 class="cart__content--title h4"><a
                                    href="{{ route('viewproduct', $item['product']->id) }}">
                                    {{ $item['product']->name }}
                                </a></h3>
                        </div>
                    </div>
                </td>
                <td class="cart__table--body__list">
                    <span class="cart__price">€{{ number_format($item->price_current,2) }}</span>
                </td>
                <td class="cart__table--body__list">
                    <div class="quantity__box">
                        <input readonly type="text" class="product-change-cart-number text-start" title="Qty"
                               value="{{ $item->count }}" name="quantity" min="1" max="5" minlength="1" maxlength="5">
                    </div>
                </td>
                <td class="cart__table--body__list">
                    <span class="cart__price end">€{{ $item->price_current * $item->count }}</span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="12" class="text-center">{{ __('names.emptyCart') }}</td>
            </tr>
        @endforelse
        <tr>
            <td colspan="5"></td>
        </tr>
        </tbody>
    </table>
</div>
