<div class="table-responsive">
    <table class="table" id="returns-table">
        <thead>
        <tr>
            <th>User</th>
            <th>Admin</th>
            <th>Order ID</th>
            <th>Code</th>
            <th>Description</th>
            <th>Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($returns as $returns)
            <tr>
                <td>{{ $returns->user->name }}</td>
                <td>{{ $returns->admin->name }}</td>
                <td>{{ $returns->order_id }}</td>
                <td>{{ $returns->code }}</td>
                <td>{{ $returns->description }}</td>
                <td>{{ $returns->status->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['returns.destroy', $returns->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('returns.show', [$returns->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('returns.edit', [$returns->id]) }}"
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
