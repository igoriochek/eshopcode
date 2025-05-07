@component('mail::message')
# New Order Createden

Order ID: {{ $orderId }}<br>
Customer Name: {{ $customerName }}<br>

@component('mail::table')
    |Product     |Price     |Quantity  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ $orderItem->price_current }} | {{ $orderItem->count }} |
    @endforeach
    |Total Sum | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

@endcomponent
