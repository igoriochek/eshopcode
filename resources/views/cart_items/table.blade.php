<div class="table-responsive">
    <table class="table" id="cartItems-table">
        <thead>
        <tr>
            <th>Cart Id</th>
            <th>Product</th>
            <th>Price</th>
            <th>Count</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartItems as $cartItem)
            <tr>
                <td>{{ $cartItem->cart_id }}</td>
                <td>{{ $cartItem->product->name }}</td>
                <td>{{ $cartItem->price_current }}</td>
                <td>{{ $cartItem->count }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cartItems.destroy', $cartItem->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cartItems.show', [$cartItem->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cartItems.edit', [$cartItem->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
