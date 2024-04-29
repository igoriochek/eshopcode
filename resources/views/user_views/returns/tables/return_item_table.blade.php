<table class="table">
    <thead>
       <tr>
            <th scope="col">{{ __('table.productName') }}</th>
            <th scope="col">{{ __('table.price') }}</th>
            <th scope="col">{{ __('table.count') }}</th>
       </tr>
    </thead>
    <tbody>
        @foreach($returnItems as $item)
            <tr>
                <td data-info="product">{{ $item->product->name }}</td>
                <td data-info="price">€{{ number_format($item->price_current, 2) }}</td>
                <td data-info="count">{{ $item->count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>