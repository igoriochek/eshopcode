<div class="table-responsive">
    <table class="shop_table">
        <thead>
        <tr class="text-dark">
            <th class="product-thumbnail" width="15%">
            </th>
            <th class="product-name text-uppercase" width="30%">
                {{ __('Product') }}
            </th>
            <th class="product-price text-uppercase" width="15%">
                {{ __('Price') }}
            </th>
            <th class="product-quantity text-uppercase" width="20%">
                {{ __('Quantity') }}
            </th>
            <th class="product-subtotal text-uppercase text-end" width="20%">
                {{ __('Subtotal') }}
            </th>
        </tr>
        </thead>
        <tbody>
        @forelse($cartItems as $item)
            <tr class="cart_table_item">
                <td class="product-thumbnail">
                    <div class="product-thumbnail-wrapper">
                        {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                        <button type="submit" class="product-thumbnail-remove" title="{{ __('Remove Product') }}" onclick="return confirm('{{ __('Are you sure you want this remove this product') }}?')">
                            <i class="fas fa-times"></i>
                        </button>
                        {!! Form::close() !!}
                        <a href="user/viewproduct/{{ $item['product']->id }}" title="{{ $item['product']->name }}">
                            <img alt="{{ $item['product']->name }}" class="product-thumbnail-image"
                                 src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/noimage.jpeg @endif">
                        </a>
                    </div>
                </td>
                <td class="product-name">
                    <a href="user/viewproduct/{{ $item['product']->id }}">
                        {{ $item['product']->name }}
                    </a>
                </td>
                <td class="product-price">
                    <span class="amount font-weight-medium text-color-grey">€{{ $item->price_current }}</span>
                </td>
                <td class="product-quantity">
                    <div class="quantity d-flex justify-content-center w-50 ms-1">
                        <input readonly type="text" class="product-change-cart-number" title="Qty" value="{{ $item->count }}" name="quantity" min="1" max="5" minlength="1" maxlength="5">
                    </div>
                </td>
                <td class="product-subtotal text-end">
                    <span>€{{ $item->price_current * $item->count }}</span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="12" class="text-center">{{ __('Cart is empty') }}</td>
            </tr>
        @endforelse
        <tr>
            <td colspan="5"></td>
        </tr>
        </tbody>
    </table>
</div>
