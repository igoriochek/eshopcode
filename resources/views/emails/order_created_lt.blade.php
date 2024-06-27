@component('mail::message')
# Sukurtas naujas užsakymas

Užsakymo ID: {{ $orderId }}<br>
Kliento vardas: {{ $customerName }}<br>
Data ir laikas: {{ now()->format('Y-m-d H:i') }}<br>

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
