@component('mail::message')
# New Order Createden

Order ID: {{ $orderId }}<br>
Customer Name: {{ $customerName }}<br>

@component('mail::table')
    |Product     |Price     |Quantity  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ $orderItem->product->price }} | {{ $orderItem->count }} |
    @endforeach
    |Total Sum | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

@component('mail::button', ['url' => env('APP_URL').'/admin/orders/' . $orderId])
    View Order
@endcomponent

@endcomponent
