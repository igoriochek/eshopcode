<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>{{__('table.name')}}</th>
            <th>{{__('table.product_id')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($freeAccessory as $freeAccess)
            <tr>
                <td>{{ $freeAccess->name }}</td>
                <td>{{ $freeAccess->product_id }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['freeAccessory.destroy', $freeAccess], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('freeAccessory.edit', ['freeAccessory' => $freeAccess]) }}"
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
