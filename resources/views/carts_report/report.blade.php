    <table>
        <thead>
            <tr>
                <th>Cart ID</th>
                <th>User</th>
                <th>Code</th>
                <th>Created Date</th>
                <th>Status</th>
            </tr>
        </thead>
        @forelse ($carts as $cart)
            <tbody>
                <tr>
                    <td>{{ $cart->id ?? '-' }}</td>
                    <td>{{ $cart->user->name ?? '-' }}</td>
                    <td>{{ $cart->code ?? '-' }}</td>
                    <td>{{ $cart->created_at ?? '-' }}</td>
                    <td>{{ $cart->status->name ?? '-' }}</td>
                </tr>
                <tr>
                    <th colspan="2">Product Name</th>
                    <th>Price Per Item</th>
                    <th>Count</th>
                    <th>Subtotal</th>
                </tr>
                @forelse ($cartItems as $cartItem)
                    @if ($cartItem->cart_id === $cart->id)
                        <tr>
                            <td colspan="2">{{ $cartItem->product->name ?? '-' }}</td>
                            <td>{{ $cartItem->price_current ?? '-' }}</td>
                            <td>{{ $cartItem->count ?? '-' }}</td>
                            <td>{{ $cartItem->subtotal ?? '-' }}</td>
                        </tr>
                    @endif
                @empty
                    <tr>Cart is empty</tr>
                @endforelse
                <tr>
                    <th colspan="2">Total:</th>
                    <th>{{ $cart->total[0]->total_price_current ?? '-' }}</th>
                    <th>{{ $cart->total[0]->total_count ?? '-' }}</th>
                    <th>{{ $cart->total[0]->total_price ?? '-' }}</th>
                </tr>
            </tbody>
        @empty
            <tr>No carts found</tr>
        @endforelse
    </table>

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

    table tbody tr:nth-child(1) {
        background-color: #e7e7e7;
    }

    @media screen and (max-width: 1500px) {
        table {
            border: 0;
            font-size: 0.8em;
        }
    }
</style>