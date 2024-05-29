<table class="table">
    <thead>
        <tr>
            <th class="product_remove"></th>
            <th class="product-thumbnail"></th>
            <th class="cart-product-name">{{ __('names.product') }}</th>
            <th class="product-quantity">{{ __('names.quantity') }}</th>
            <th class="product-subtotal">{{ __('names.price') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse($cartItems as $item)
            <tr>
                <td class="product_remove">
                    {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                    <button type="submit" class="btn fs-4" title="{{ __('names.removeProduct') }}"
                        onclick="return confirm('{{ __('messages.confirmDeleteProduct') }}')">
                        <i class="pe-7s-trash" data-tippy="{{ __('names.removeProduct') }}" data-tippy-inertia="true"
                            data-tippy-animation="shift-away" data-tippy-delay="50" data-tippy-arrow="true"
                            data-tippy-theme="sharpborder" tabindex="0"></i>
                    </button>
                    {!! Form::close() !!}
                </td>
                <td class="product-thumbnail">
                    <a href="{{ route('viewproduct', $item['product']->id) }}">
                        <img alt="{{ $item['product']->name }}" class="product-thumbnail-image"
                            src="@if ($item['product']->image) {{ $item['product']->image }} @else {{ asset('template/images/product/small-size/2-1-112x112.png') }} @endif">
                    </a>
                </td>
                <td class="product-name">
                    <a href="{{ route('viewproduct', $item['product']->id) }}">
                        {{ $item['product']->name }}
                    </a>
                </td>
                <td class="quantity">
                    <span class="amount fs-6">
                        {{ $item->count }}
                    </span>
                </td>
                <td class="product-subtotal">
                    <span class="amount">
                        €{{ number_format($item->price_current * $item->count, 2) }}
                    </span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">{{ __('names.emptyCart') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>
