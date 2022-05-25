<div class="table-responsive">
    <table class="table" id="ordersHistory-table">
        <thead>
        <tr>
            <th>Date</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
            @foreach($logs as $log)
                <tr>
                    <td>{{$log->created_at}}</td>
                    <td>{{$log->activity}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
