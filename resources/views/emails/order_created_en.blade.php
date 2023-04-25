@component('mail::message')
# New Order Createden

Order ID: {{ $order->id }}<br>
Customer name: {{ $customer->name }}<br>
Phone number: {{ $customer->phone_number }}<br>
Collect time: {{ $order->collect_time }}<br>
How will the customer eat: @if ($order->place == '1') {{ __('names.onTheSpot') }} @elseif ($order->place == '2') {{ __('names.takeaway') }} @endif<br>
Company purchase: @if ($order->isCompanyBuying) {{ __('names.yes') }} @else {{ __('names.no') }} @endif <br>

@component('mail::table')
    |Product     |Price     |Quantity  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ number_format($orderItem->price_current, 2) }} | {{ $orderItem->count }} |
    @endforeach
    |Total Sum | €{{ number_format($order->sum, 2) }} | {{ $orderItemCountSum }} |
@endcomponent

@component('mail::button', ['url' => env('APP_URL').'/admin/orders/1'])
    View Order
@endcomponent

@endcomponent
