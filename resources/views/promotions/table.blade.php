<div class="table-responsive">
    <table class="table" id="promotions-table">
        <thead>
        <tr>
            <th>Name</th>
        <th>Description</th>
        <th>Start</th>
        <th>Finish</th>
            <th colspan="3">Action</th>
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
                    <div class='btn-group'>
                        <a href="{{ route('promotions.show', [$promotion->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('promotions.edit', [$promotion->id]) }}"
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
