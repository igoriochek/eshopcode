<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>{{__('table.userName')}}</th>
            <th>{{__('table.email')}}</th>
            <th>{{__('table.action')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($table_users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td width="60">
                     <a href="{{ route('messenger.show', [$user->id]) }}" class='btn btn-primary'>{{__('buttons.add')}}</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
