<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
        <tr>
            <th>User Id</th>
        <th>Status Id</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>
                    @if ($order->user)
                        {{ $order->user->name }}
                    @else
                        {{ $order->user_id }}
                    @endif
                </td>
                <td>
                    @if ($order->status)
                        {{ $order->status->name }}
                    @else
                        {{ $order->status_id }}
                    @endif
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('orders.show', [$order->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('orders.edit', [$order->id]) }}"
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
