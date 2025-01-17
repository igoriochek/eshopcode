<table>
    <thead>
        <tr>
            <th>{{ __('names.product') }}</th>
            <th>{{ __('names.price') }}</th>
            <th>{{ __('names.quantity') }}</th>
            <th>{{ __('table.productComplex') }}</th>
            <th>{{ __('names.subtotal') }}</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse($cartItems as $item)
        <tr>
            <td>
                <a href="{{ route('viewproduct', $item['product']->id) }}">
                    <div class="Product-cart d-flex align-items-center">
                        @if ($item['product']->image)
                        <img class="custom-img" src="{{ $item['product']->image }}" alt="{{ $item['product']->name }}">
                        @else
                        <img class="custom-img" src="{{ asset('template/img/new-product/1.jpg') }}" alt="new-product">
                        @endif
                        <span>{{ $item['product']->name }}</span>
                    </div>
                </a>
            </td>
            <td>
                <span class="price">€{{ number_format($item->price_current, 2) }}</span>
            </td>
            <td>
                <span class="price">{{ $item->count }}</span>
            </td>
            <td>
                @if($item->isComplexProduct == 1)
                <span class="price">{{ __('table.yes') }}</span>
                @else
                <span class="price">{{ __('table.no') }}</span>
                @endif
            </td>
            <td>
                <span class="price">€{{ number_format($item->price_current * $item->count, 2) }}</span>
            </td>
            <td>
                <div class="pro-remove">
                    {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                    <button class="remove-button" type="submit" title="{{ __('names.removeProduct') }}"
                        onclick="return confirm('{{ __('messages.confirmDeleteProduct') }}')">
                        <i class="ri-delete-bin-line"></i>
                    </button>
                    {!! Form::close() !!}
                </div>
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
    }

    .Product-cart {
        height: 70px;
    }

    .custom-img {
        max-height: 70px;
        width: auto;
        height: auto;
    }
</style>