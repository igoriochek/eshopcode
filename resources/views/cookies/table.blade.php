<div class="table-responsive">
    <table class="table" id="returns-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Mandatory Status</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cookies as $cookie)
            <tr>
                <td>{{ $cookie->id }}</td>
                <td>{{ $cookie->name }}</td>
                <td>{{ $cookie->description }}</td>
                <td>{{ $cookie->isMandatory}}</td>
                <td width="120">
                    {!! Form::open(['route' => ['cookies.destroy', $cookie->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('cookies.show', [$cookie->id]) }}"
                           class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('cookies.edit', [$cookie->id]) }}"
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
