@component('mail::message')
# New Order Createden

Order ID: {{ $orderId }}<br>
Customer Name: {{ $customerName }}<br>
@if (!empty($customerCompany))
<br>
Company Title: {{ $customerCompany->title }}<br>
Company Code: {{ $customerCompany->code }}<br>
Company VAT: {{ $customerCompany->vat }}<br>
Company Address: {{ $customerCompany->address }}<br>
@endif

@component('mail::table')
    |Product     |Price     |Quantity  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ $orderItem->price_current }} | {{ $orderItem->count }} |
    @endforeach
    |Total Sum | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

@endcomponent
