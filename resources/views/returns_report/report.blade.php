<div class="table-responsive">
    <table id="datatable">
        <thead>
            <tr>
                <th>Return ID</th>
                <th>Order ID</th>
                <th>User</th>
                <th>Admin</th>
                <th>Code</th>
                <th>Description</th>
                <th>Created Date</th>
                <th>Status</th>
            </tr>
        </thead>
        @foreach($returns as $return)
        <tbody>
                <tr>
                    <td>{{ $return->id }}</td>
                    <td>{{ $return->order_id }}</td>
                    <td>{{ $return->user->name }}</td>
                    <td>{{ $return->admin->name }}</td>
                    <td>{{ $return->code }}</td>
                    <td>{{ $return->description }}</td>
                    <td>{{ $return->created_at }}</td>
                    <td>{{ $return->status->name }}</td>
                </tr>
                <tr>
                    <th colspan="2">Product Name</th>
                    <th colspan="2">Price Per Item</th>
                    <th colspan="2">Count</th>
                    <th colspan="2" style="width: 200px">Subtotal</th>
                </tr>
                @foreach($returnItems as $returnItem)
                    @if ($returnItem->return_id === $return->id)
                        <tr>
                            <td colspan="2">{{ $returnItem->product->name }}</td>
                            <td colspan="2">{{ $returnItem->price_current }}</td>
                            <td colspan="2">{{ $returnItem->count }}</td>
                            <td colspan="2">{{ $returnItem->subtotal }}</td>
                        </tr>
                    @endif
                @endforeach
                <tr>
                    <th colspan="2">Total:</th>
                    <th colspan="2">{{ $return->total[0]->total_price_current }}</th>
                    <th colspan="2">{{ $return->total[0]->total_count }}</th>
                    <th colspan="2">{{ $return->total[0]->total_price }}</th>
                </tr>
            </tbody>
        @endforeach
    </table>
</div>

<style>
    #pdf-header h2,
    #pdf-header p {
        text-align: center;
    }

    #datatable {
        width: 100%;
        border-collapse: collapse;
        color: black;
    }

    #datatable td,
    #datatable th {
        border: 1px solid rgb(132, 132, 132);
        padding: 10px;
    }

    #datatable thead {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background: rgb(216, 216, 216);
    }

    #datatable tbody tr:nth-child(1) {
        background: rgb(241, 241, 241);
    }
</style>