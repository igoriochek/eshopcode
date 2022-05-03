<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>Name</th>
            <th>Count</th>
            <th>Price</th>
            <th>Description</th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartItems as $item)
            <tr>
                <td>{{ $item['product']->name }}</td>
                <td>{{ $item->count }}</td>
                <td>{{ $item['product']->price }}</td>
                <td>{{ $item['product']->description }}</td>

                <td width="120">
                    {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
