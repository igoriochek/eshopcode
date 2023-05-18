@component('mail::message')
# New Order Createden

Order ID: {{ $order->id }}<br>
Customer name: {{ $customer->name }}<br>
Phone number: {{ $customer->phone_number }}<br>
Collect time: {{ $order->collect_time }}<br>
How will the customer eat: @if ($order->place == '1') {{ __('names.onTheSpot') }} @elseif ($order->place == '2') {{ __('names.takeaway') }} @endif<br>
Company purchase: @if ($order->isCompanyBuying) {{ __('names.yes') }} @else {{ __('names.no') }} @endif <br><br>
@if ($order->isCompanyBuying)
Company name: {{ $company['name'] }}<br>
Company address: {{ $company['address'] }}<br>
Company code: {{ $company['code'] }}<br>
Company VAT code: {{ $company['vat_code'] ?? '-' }}<br>
@endif

@component('mail::table')
    |Product     |Price     |Quantity  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ number_format($orderItem->price_current, 2) }} | {{ $orderItem->count }} |
        @if ($orderItem->product_size_id)| {{ __('names.size').': '.$orderItem->itemSize->name }} | - | - |@endif
        @if ($orderItem->product_meat_id)| {{ __('names.meat').': '.$orderItem->meat->name }} | - | - |@endif
        @if ($orderItem->product_sauce_id)| {{ __('names.sauce').': '.$orderItem->sauce->name }} | - | - |@endif
        @if ($orderItem->paid_accessories)| {{ __('names.paidAccessories').': '}} @foreach ($orderItem->paidAccessories as $paidAccessory) {{ $paidAccessory->name }}</span>@if (!$loop->last),@endif @endforeach | - | - |@endif
        @if ($orderItem->free_accessories)| {{ __('names.compositionWithout').': '}} @foreach ($orderItem->freeAccessories as $freeAccessory) {{ $freeAccessory->name }}</span>@if (!$loop->last),@endif @endforeach | - | - |@endif
    @endforeach
    |Total Sum | €{{ number_format($order->sum, 2) }} | {{ $orderItemCountSum }} |
@endcomponent

@component('mail::button', ['url' => env('APP_URL').'/admin/orders/'.$order->id])
    View Order
@endcomponent

@endcomponent
