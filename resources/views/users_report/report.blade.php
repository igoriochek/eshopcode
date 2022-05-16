<div class="table-responsive">
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Street</th>
                <th>House/Flat</th>
                <th>Post Index</th>
                <th>City</th>
                <th>Created Date</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{ $user->id ?? '-' }}</td>
                    <td>{{ $user->name ?? '-' }}</td>
                    <td>{{ $user->email ?? '-' }}</td>
                    <td>{{ $user->phone_number ?? '-'}}</td>
                    <td>{{ $user->street ?? '-'}}</td>
                    <td>{{ $user->house_flat ?? '-'}}</td>
                    <td>{{ $user->post_index ?? '-'}}</td>
                    <td>{{ $user->city ?? '-'}}</td>
                    <td>{{ $user->created_at ?? '-'}}</td>
                    @if ($user->type == '1')
                        <td>Admin</td>
                    @else
                        <td>User</td>
                    @endif
                </tr>
            @empty
                <tr>
                    <td colspan="8">No users found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<style>
    table {
        border: 1px solid #ccc;
        border-collapse: collapse;
        margin: 0;
        padding: 0;
        width: 100%;
        font-size: 1vw;
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

    @media screen and (max-width: 1500px) {
        table {
            border: 0;
            font-size: 0.7em;
        }
    }
</style>