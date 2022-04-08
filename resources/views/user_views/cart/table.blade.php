<div class="table table-responsive">
    <table class="table" id="categories">
        <thead>
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartItems->product as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->description }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
