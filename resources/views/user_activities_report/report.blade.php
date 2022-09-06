    <table>
        <thead>
            <tr>
                <th>{{__('table.activityId')}}</th>
                <th>{{__('table.user')}}</th>
                <th>{{__('table.email')}}</th>
                <th>{{__('table.userType')}}</th>
                <th>{{__('table.activity')}}</th>
                <th>{{__('table.created_at')}}</th>
            </tr>
        </thead>
        <tbody id="user_activity_data">
            @forelse ($userActivities as $userActivity)
                <tr>
                    <td>{{ $userActivity->id ?? '-'}}</td>
                    <td>{{ $userActivity->user->name ?? '-' }}</td>
                    <td>{{ $userActivity->user->email ?? '-' }}</td>
                    @if ($userActivity->user->type == '1')
                        <td>{{__('table.admin')}}</td>
                    @else
                        <td>{{__('table.user')}}</td>
                    @endif
                    <td>{{ $userActivity->activity ?? '-'}}</td>
                    <td>{{ $userActivity->created_at ?? '-'}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">{{__('reports.noUserActivities')}}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="my-3">
        {{ $userActivities->links() }}
    </div>
<style>
    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    table tr {
        background-color: #f8f8f8;
        border: 1px solid #ddd;
        padding: .35em;
    }

    table th,
    table td {
        padding: .625em;
    }

    table th {
        font-size: .85em;
    }

    table thead tr:nth-child(1) {
        background-color: #d4d4d4;
    }
</style>
