<table class="table table-bordered table-hover">
    <tbody>
        <tr>
            @if ($order->status->name == 'Returned')
                <th>{{ __('table.status') }}</th>
            @endif
            <th>{{ __('table.productName') }}</th>
            <th>{{ __('table.price') }}</th>
            <th>{{ __('table.count') }}</th>
        </tr>
        @foreach ($orderItems as $item)
            <tr>
                @if ($order->status->name == 'Returned')
                    <td>
                        @if ($item->isReturned !== null)
                            {{ __('status.' . $item->isReturned) }}
                        @else
                            -
                        @endif
                    </td>
                @endif
                <td>{{ $item->product->name }}</td>
                <td>€{{ number_format($item->price_current, 2) }}</td>
                <td>{{ $item->count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
