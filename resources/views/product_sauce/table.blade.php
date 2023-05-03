<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>{{__('table.name')}}</th>
            <th>{{__('table.color')}}</th>
            <th>{{__('table.default')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productSauce as $productSau)
            <tr>
                <td>{{ $productSau->name }}</td>
                <td>{{ $productSau->color }}</td>
                <td>{{ $productSau->default }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['productSauce.destroy', $productSau], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('productSauce.edit', ['productSauce' => $productSau]) }}"
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
