<table class="table table-bordered table-hover">
    <tbody>
        <tr>
            <th>{{ __('table.productName') }}</th>
            <th>{{ __('table.price') }}</th>
            <th>{{ __('table.count') }}</th>
        </tr>
        @foreach ($returnItems as $item)
            <tr>
                <td>{{ $item->product->name }}</td>
                <td>€{{ number_format($item->price_current, 2) }}</td>
                <td>{{ $item->count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
