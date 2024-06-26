@component('mail::message')
# New order created

Order ID: {{ $orderId }}<br>
Customer name: {{ $customerName }}<br>
Date and time: {{ now()->format('Y-m-d H:i') }}<br>

@component('mail::table')
    |Product     |Price     |Quantity  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ $orderItem->product->price }} | {{ $orderItem->count }} |
    @endforeach
    |Total Sum | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

@component('mail::button', ['url' => env('APP_URL').'/admin/orders/1'])
    View Order
@endcomponent

@endcomponent
