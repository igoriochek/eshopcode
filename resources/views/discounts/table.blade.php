<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Proc</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($discounts as $discount)
            <tr>
                <td>{{ $discount->name }}</td>
            <td>{{ $discount->description }}</td>
            <td>{{ $discount->proc }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['discounts.destroy', $discount->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('discounts.show', [$discount->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('discounts.edit', [$discount->id]) }}"
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
