<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
        <tr>
            <th>{{__('table.orderId')}}</th>
            <th>{{__('table.user')}}</th>
            <th>{{__('table.status')}}</th>
            <th>{{__('table.collectTime')}}</th>
            <th>{{__('table.sum')}}</th>
            <th>{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
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
                <td>{{ $order->collect_time }}</td>
                <td>{{ number_format($order->sum, 2) }} €</td>
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
