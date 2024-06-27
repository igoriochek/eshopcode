<div class="table-responsive">
    <table class="table" id="orders-table">
        <thead>
        <tr>
            <th>{{__('table.user')}}</th>
            <th>{{__('table.status')}}</th>
            <th colspan="3">{{__('table.action')}}</th>
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
                    <div class='btn-group button-container'>
                        <a href="{{ route('orders.show', [$order->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="font-size: 20px;"></i>
                        </a>
                        <a href="{{ route('orders.edit', [$order->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="font-size: 20px;"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'style' => 'font-size: 20px;', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@push('css')
    <style>
        .button-container {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
        .button-container button {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
        }
        .table.dataTable thead th {
            padding: 10px 10px;
        }
        .button-container .btn {
            flex-grow: 1;
            width: 100%;
        }
    </style>
@endpush