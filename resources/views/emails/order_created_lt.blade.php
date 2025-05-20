@component('mail::message')
# Sukurtas Naujas Užsakymas

Užsakymo ID: {{ $orderId }}<br>
Kliento Vardas: {{ $customerName }}<br>
@if (!empty($customerCompany))
<br>
Įmonės pavadinimas: {{ $customerCompany->title }}<br>
Įmonės kodas: {{ $customerCompany->code }}<br>
Įmonės PVM mokėtojas: {{ $customerCompany->vat }}<br>
Įmonės adresas: {{ $customerCompany->address }}<br>
@endif

@component('mail::table')
    |Produktas     |Kaina     |Kiekis  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ $orderItem->price_current }} | {{ $orderItem->count }} |
    @endforeach
    |Bendra Suma | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

@endcomponent
