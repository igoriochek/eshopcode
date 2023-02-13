@component('mail::message')
# Sukurtas Naujas Užsakymas

Užsakymo ID: {{ $orderId }}<br>
Kliento Vardas: {{ $customerName }}<br>

@component('mail::table')
    |Produktas     |Kaina     |Kiekis  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ $orderItem->product->price }} | {{ $orderItem->count }} |
    @endforeach
    |Bendra Suma | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

@component('mail::button', ['url' => env('APP_URL').'/admin/orders/1'])
    Peržiūrėti Užsakymą
@endcomponent

@endcomponent
