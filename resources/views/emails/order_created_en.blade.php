@component('mail::message')
# New Order Createden

Order ID: {{ $orderId }}<br>
Customer name: {{ $customerName }}<br>

@component('mail::table')
    |Product     |Price     |Quantity  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
    | {{ $orderItem->product->name }}@if($orderItem->rental_start_date)<br>{{  __('forms.startDate').': '.$orderItem->rental_start_date->format('Y-m-d') }}@endif @if($orderItem->days)<br>{{ __('forms.selectedDays').': '.$orderItem->days }}@endif | €{{ $orderItem->rental_start_date && $orderItem->days ? $orderItem->product->rental_price : $orderItem->product->price }} | {{ $orderItem->rental_start_date && $orderItem->days ? '-' : $orderItem->count }} |
    @endforeach
    |Total Sum | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

{{-- @component('mail::button', ['url' => env('APP_URL').'/admin/orders/'.$orderId])
    View Order
@endcomponent --}}

@endcomponent
