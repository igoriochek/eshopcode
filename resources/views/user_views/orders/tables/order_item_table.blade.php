<table class="table">
    <thead>
       <tr>
            @if ($order->status->name == 'Returned')
                <th scope="col">{{ __('table.status') }}</th>
            @endif
            <th scope="col">{{ __('table.productName') }}</th>
            <th scope="col">{{ __('table.price') }}</th>
            <th scope="col">{{ __('table.count') }}</th>
       </tr>
    </thead>
    <tbody>
        @foreach($orderItems as $item)
            <tr>
                @if ($order->status->name == 'Returned')
                    <td data-info="return">
                        @if ($item->isReturned !== null)
                            {{ $item->isReturned }}
                        @else
                            -
                        @endif
                    </td>
                @endif
                <td data-info="product">{{ $item->product->name }}</td>
                <td data-info="price">€{{ number_format($item->price_current, 2) }}</td>
                <td data-info="count">{{ $item->count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>