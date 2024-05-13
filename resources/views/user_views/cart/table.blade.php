<table class="table axil-product-table axil-cart-table mb--40">
    <thead>
        <tr>
            <th scope="col" class="product-remove"></th>
            <th scope="col" class="product-thumbnail">{{ __('names.product') }}</th>
            <th scope="col" class="product-title"></th>
            <th scope="col" class="product-price">{{ __('names.price') }}</th>
            <th scope="col" class="product-quantity">{{ __('names.quantity') }}</th>
            <th scope="col" class="product-subtotal">{{ __('names.subtotal') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($cartItems as $item)
            <tr>
                <td class="product-remove">
                    {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                    <button type="submit" class="remove-wishlist" title="{{ __('names.removeProduct') }}"
                        onclick="return confirm('{{ __('messages.confirmDeleteProduct') }}')">
                        <i class="fal fa-times fs-5"></i>
                    </button>
                    {!! Form::close() !!}
                </td>
                <td class="product-thumbnail">
                    <a href="{{ route('viewproduct', $item['product']->id) }}" title="{{ $item['product']->name }}">
                        <img alt="{{ $item['product']->name }}" class="product-thumbnail-image"
                            src="@if ($item['product']->image) {{ $item['product']->image }} @else /template/images/product/electric/product-01.png @endif">
                </td>
                <td class="product-title">
                    <a href="{{ route('viewproduct', $item['product']->id) }}">
                        {{ $item['product']->name }}
                    </a>
                </td>
                <td class="product-price" data-title="Price">
                    <span class="currency-symbol">€</span>
                    {{ number_format($item->price_current, 2) }}
                </td>
                <td class="product-quantity" data-title="Qty">
                    <div style="display: inline-flex; width: 130px; border-radius: 50px; height: 20px">
                        <input type="text" class="fs-3 fw-bold text-muted px-0 cart-item-quantity"
                            value="{{ $item->count }}" name="quantity" readonly>
                    </div>
                </td>
                <td class="product-subtotal" data-title="Subtotal">
                    <span class="currency-symbol">€</span>
                    {{ number_format($item->price_current * $item->count, 2) }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">{{ __('names.emptyCart') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>

<style>
    .cart-item-quantity {
        text-align: start;
    }

    @media only screen and (max-width: 767px) {
        .cart-item-quantity {
            text-align: right;
        }
    }
</style>
