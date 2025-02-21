<table>
    <thead>
        <tr>
            <th>{{ __('names.removeProduct') }}</th>
            <th>{{ __('names.image') }}</th>
            <th>{{ __('names.product') }}</th>
            <th>{{ __('names.price') }}</th>
            <th>{{ __('names.quantity') }}</th>
            <th>{{ __('table.productComplex') }}</th>
            <th>{{ __('names.subtotal') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($cartItems as $item)
        <tr>
            <td class="product_remove">
                {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                <button class="remove-button" type="submit" title="{{ __('names.removeProduct') }}"
                    onclick="return confirm('{{ __('messages.confirmDeleteProduct') }}')">
                    <i class="fa fa-trash-o"></i>
                </button>
                {!! Form::close() !!}
            </td>
            <td class="product_thumb d-flex justify-content-center">
                <a href="{{ route('viewproduct', $item['product']->id) }}">
                    <div class="product-cart d-flex align-items-center">
                        @if ($item['product']->image)
                        <img class="custom-img" src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}">
                        @else
                        <img class="custom-img" src="{{ asset('template/img/s-product/product.jpg') }}" alt="new-product">
                        @endif
                    </div>
                </a>
            </td>
            <td class="product_name">
                <a href="{{ route('viewproduct', $item['product']->id) }}">
                    {{ $item['product']->name }}
                </a>
            </td>
            <td class="product-price">
                €{{ number_format($item->price_current, 2) }}
            </td>
            <td class="product_quantity">
                {{ $item->count }}
            </td>
            <td class="product_quantity">
                @if($item->isComplexProduct == 1)
                {{ __('table.yes') }}
                @else
                {{ __('table.no') }}
                @endif
            </td>
            <td class="product_total">
                €{{ number_format($item->price_current * $item->count, 2) }}
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7">{{ __('names.emptyCart') }}</td>
        </tr>
        @endforelse
    </tbody>
</table>

<style>
    .remove-button {
        border: 0px;
        background: transparent;
        font-size: 20px;
        color: #222222;
        transition: all 0.3s ease 0s;
    }

    .remove-button:hover {
        color: #79a206;
    }

    .product-cart {
        width: 100px;
    }

    .custom-img {
        max-height: 100px;
        width: auto;
        height: auto;
    }
</style>