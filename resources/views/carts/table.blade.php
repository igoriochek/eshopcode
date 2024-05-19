<div class="table-responsive">
    <table class="table" id="carts-table">
        <thead>
        <tr>
            <th>{{__('table.user')}}</th>
            <th>{{__('table.code')}}</th>
            <th>{{__('table.status')}}</th>
            <th>{{__('table.admin')}}</th>
            <th colspan="3">{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($carts as $cart)
            <tr>
                <td>{{ $cart->user->name }}</td>
                <td>{{ $cart->code }}</td>
                <td>{{ $cart->status->name }}</td>
                <td>{{ $cart->admin->name }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['carts.destroy', $cart->id], 'method' => 'delete']) !!}
                    <div class='btn-group button-container'>
                        <a href="{{ route('carts.show', [$cart->id]) }}" class="btn btn-default btn-xs">
                            <i class="far fa-eye" style="font-size: 20px;"></i>
                        </a>
                        <a href="{{ route('carts.edit', [$cart->id]) }}" class="btn btn-default btn-xs">
                            <i class="far fa-edit" style="font-size: 20px;"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger', 'style' => 'font-size: 20px;', 'onclick' => "return confirm('Are you sure?')"]) !!}
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
        .button-container a,
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