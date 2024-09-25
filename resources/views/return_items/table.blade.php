<div class="table-responsive">
    <table class="table" id="returnItems-table">
        <thead>
        <tr>
            <th>{{__('table.user')}}</th>
            <th>{{__('table.productName')}}</th>
            <th>{{__('table.priceCurrent')}}</th>
            <th>{{__('table.count')}}</th>
            <th>{{ __('table.productComplex') }}</th>
            <th colspan="3">{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($returnItems as $returnItem)
            <tr>
                {{--<td>{{ $returnItem->order_id }}</td>--}}
                <td>{{ $returnItem->user->name }}</td>
                {{--<td>{{ $returnItem->return_id }}</td>--}}
                <td>{{ $returnItem->product->name }}</td>
                <td>{{ $returnItem->price_current }}</td>
                <td>{{ $returnItem->count }}</td>
                <td>
                    <div>
                        @if($returnItem->isComplexProduct == 1)
                            <span>{{ __('table.yes') }}</span>
                        @else
                        <span>{{ __('table.no') }}</span>
                        @endif
                    </div>
                </td>
                <td width="120">
                    {!! Form::open(['route' => ['returnItems.destroy', $returnItem->id], 'method' => 'delete']) !!}
                    <div class='btn-group button-container'>
                        <a href="{{ route('returnItems.show', [$returnItem->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="font-size: 20px;"></i>
                        </a>
                        <a href="{{ route('returnItems.edit', [$returnItem->id]) }}"
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