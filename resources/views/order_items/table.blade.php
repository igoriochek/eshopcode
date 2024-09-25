<div class="table-responsive">
    <table class="table" id="orderItems-table">
        <thead>
        <tr>
            <th>{{__('table.orderId')}}</th>
            <th>{{__('table.product')}}</th>
            <th>{{__('table.price')}}</th>
            <th>{{__('table.count')}}</th>
            <th>{{ __('table.productComplex') }}</th>
            <th colspan="3">{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orderItems as $orderItem)
            <tr>
                <td>{{ $orderItem->order_id }}</td>
                <td>{{ $orderItem->product->name }}</td>
                <td>{{ $orderItem->price_current }}</td>
                <td>{{ $orderItem->count }}</td>
                <td>
                    <div>
                        @if($orderItem->isComplexProduct == 1)
                            <span>{{ __('table.yes') }}</span>
                        @else
                        <span>{{ __('table.no') }}</span>
                        @endif
                    </div>
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['orderItems.destroy', $orderItem->id], 'method' => 'delete']) !!}
                    <div class='btn-group button-container'>
                        <a href="{{ route('orderItems.show', [$orderItem->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="font-size: 20px;"></i>
                        </a>
                        <a href="{{ route('orderItems.edit', [$orderItem->id]) }}"
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