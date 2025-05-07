@component('mail::message')
# Sukurtas Naujas Užsakymas

Užsakymo ID: {{ $orderId }}<br>
Kliento Vardas: {{ $customerName }}<br>

@component('mail::table')
    |Produktas     |Kaina     |Kiekis  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ $orderItem->price_current }} | {{ $orderItem->count }} |
    @endforeach
    |Bendra Suma | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

@endcomponent
