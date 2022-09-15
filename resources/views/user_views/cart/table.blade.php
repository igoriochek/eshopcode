<div class="cart-section">
    <table class="table table-striped cart-list shopping-cart">
        <thead>
        <tr>
            <th>{{__('table.name')}}</th>
            <th>{{__('table.count')}}</th>
            <th>{{__('table.price')}}</th>
            <th>{{__('table.description')}}</th>
            <th>{{__('names.removeProduct')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartItems as $item)
            <tr>
                <td>
                    <strong>{{ $item['product']->name }}</strong>
                </td>
                <td>
                    <strong>{{ $item->count }}</strong>
                </td>
                <td>
                    <strong>{{ $item['product']->price }}</strong>
                </td>
                <td>{{ $item['product']->description }}</td>

                <td class="options">
                    {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                    {!! Form::button('<i class="icon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
