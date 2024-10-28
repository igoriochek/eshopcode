<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col" class="text-center"></th>
            <th scope="col" class="text-center">{{ __('names.product') }}</th>
            <th scope="col" class="text-center"></th>
            <th scope="col" class="text-center">{{ __('names.price') }}</th>
            <th scope="col" class="text-center">{{ __('names.quantity') }}</th>

            <th scope="col" class="text-center">{{ __('table.productComplex') }}</th>

            <th scope="col" class="text-center">{{ __('names.subtotal') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($cartItems as $item)
        <tr>
            <td class="text-center">
                {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                <button type="submit" class="remove-wishlist" title="{{ __('names.removeProduct') }}"
                    onclick="return confirm('{{ __('messages.confirmDeleteProduct') }}')">
                    <i class="fas fa-trash-alt"></i>
                </button>
                {!! Form::close() !!}
            </td>
            <td class="text-center">
                <a href="{{ route('viewproduct', $item['product']->id) }}" title="{{ $item['product']->name }}">
                    <img alt="{{ $item['product']->name }}" class="product-thumbnail-image"
                        src="@if ($item['product']->image) {{ $item['product']->image }} @else /template/img/product/05.1.jpg @endif">
            </td>
            <td class="text-center">
                <a href="{{ route('viewproduct', $item['product']->id) }}">
                    {{ $item['product']->name }}
                </a>
            </td>
            <td class="text-center" data-title="Price">
                <span class="product-price">
                    <span class="currency-symbol">€</span>
                    {{ number_format($item->price_current, 2) }}
                </span>
            </td>
            <td class="text-center" data-title="Qty">
                <div style="display: inline-flex; width: 130px; border-radius: 50px; height: 20px; justify-content: center;">
                    <span type="text" class="fs-3 fw-bold text-muted px-0 cart-item-quantity"
                        name="quantity" readonly>
                        {{ $item->count }}
                    </span>

                </div>
            </td>

            <td class="text-center" data-title="{{ __('table.productComplex') }}">
                <div style="display: inline-flex; width: 130px; border-radius: 50px; height: 20px; justify-content: center;">
                    @if($item->isComplexProduct == 1)
                    <span class="fs-3 fw-bold text-muted px-0">{{ __('table.yes') }}</span>
                    @else
                    <span class="fs-3 text-muted px-0">{{ __('table.no') }}</span>
                    @endif
                </div>
            </td>

            <td class="text-center" data-title="Subtotal">
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