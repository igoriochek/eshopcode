<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($table_users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td width="60">
                     <a href="{{ route('messenger.show', [$user->id]) }}" class='btn btn-primary'>Add</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
