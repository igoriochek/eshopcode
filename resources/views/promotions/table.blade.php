<div class="table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>{{__('table.name')}}</th>
            <th>{{__('table.description')}}</th>
            <th>{{__('table.start')}}</th>
            <th>{{__('table.finish')}}</th>
            <th>{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($promotions as $promotion)
            <tr>
                <td>{{ $promotion->name }}</td>
            <td>{{ $promotion->description }}</td>
            <td>{{ $promotion->start }}</td>
            <td>{{ $promotion->finish }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['promotions.destroy', $promotion->id], 'method' => 'delete']) !!}
                    <div class='btn-group button-container'>
                        <a href="{{ route('promotions.show', [$promotion->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye" style="font-size: 20px;"></i>
                        </a>
                        <a href="{{ route('promotions.edit', [$promotion->id]) }}"
                           class='btn btn-default btn-xs'>
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