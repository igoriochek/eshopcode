<div class="table table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th>{{__('table.name')}}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @forelse ($table_users ?? [] as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td width="60">
                     <a href="{{ route('livewire.messenger.show', [$user->id]) }}" class='btn btn-primary'>{{__('buttons.addNew')}}</a>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{__('table.emptyTable')}}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
