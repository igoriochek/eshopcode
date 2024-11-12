<div class="table-responsive">
    <table class="table" id="cartStatuses-table">
        <thead>
        <tr>
            <th>{{__('table.name')}}</th>
            <th colspan="3">{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartStatuses as $cartStatus)
            <tr>
                <td>{{ $cartStatus->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cartStatuses.destroy', $cartStatus->id], 'method' => 'delete']) !!}
                    <div class='btn-group button-container'>
                        <a href="{{ route('cartStatuses.show', [$cartStatus->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="font-size: 20px; margin-left: 10px !important; margin-right: 10px !important; margin-top: 3px !important; margin-bottom: 3px !important;"></i>
                        </a>
                        <a href="{{ route('cartStatuses.edit', [$cartStatus->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-edit" style="font-size: 20px; margin-left: 10px !important; margin-right: 10px !important; margin-top: 3px !important; margin-bottom: 3px !important;"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt" style="font-size: 20px; margin-left: 10px !important; margin-right: 10px !important;"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'style' => 'font-size: 20px;', 'onclick' => "return confirm('Are you sure?')"]) !!}
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