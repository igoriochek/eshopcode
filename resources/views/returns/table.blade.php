<div class="table-responsive">
    <table class="table" id="returns-table">
        <thead>
        <tr>
            <th>{{__('table.user')}}</th>
            <th>{{__('table.admin')}}</th>
            <th>{{__('table.orderId')}}</th>
            <th>{{__('table.code')}}</th>
            <th>{{__('table.description')}}</th>
            <th>{{__('table.status')}}</th>
            <th colspan="3">{{__('table.action')}}</th>
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
                    <div class='btn-group button-container'>
                        <a href="{{ route('returns.show', [$returns->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="font-size: 20px;"></i>
                        </a>
                        <a href="{{ route('returns.edit', [$returns->id]) }}"
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