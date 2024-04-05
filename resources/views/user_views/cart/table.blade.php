<table class="table">
    <thead>
        <tr>
            <th scope="col">{{ __('names.product') }}</th>
            <th scope="col">{{ __('names.price') }}</th>
            <th scope="col">{{ __('names.quantity') }}</th>
            <th scope="col">{{ __('names.subtotal') }}</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($cartItems as $item)
            <tr>
                <td class="image-and-content d-flex align-items-center">
                    <div class="products-image">
                        <a href="{{ route('viewproduct', $item['product']->id) }}" title="{{ $item['product']->name }}">
                            <img alt="{{ $item['product']->name }}" class="product-thumbnail-image" style="height: 50px; width: 100px; object-fit: cover"
                                 src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/noimage.jpeg @endif">
                        </a>
                    </div>

                    <div class="products-content">
                        <h3>
                            <a href="{{ route('viewproduct', $item['product']->id) }}">
                                {{ $item['product']->name }}
                            </a>
                        </h3>
                    </div>
                </td>
                <td class="price">€{{ number_format($item->price_current,2) }}</td>
                <td class="quantity">
                    <div class="input-counter">
                        <input type="text" style="border: none" title="Qty" value="{{ $item->count }}" name="quantity" min="1" max="5" minlength="1" maxlength="5" readonly>
                    </div>
                </td>
                <td class="total">€{{ $item->price_current * $item->count }}</td>
                <td class="remove">
                    {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                        <button type="submit" class="btn" title="{{ __('names.removeProduct') }}" onclick="return confirm('{{ __('messages.confirmDeleteProduct') }}')">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    {!! Form::close() !!}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">{{ __('names.emptyCart') }}</td>
            </tr>
        @endforelse
    </tbody>
</table>