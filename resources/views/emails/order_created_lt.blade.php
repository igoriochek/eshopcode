@component('mail::message')
# Sukurtas Naujas Užsakymas

Užsakymo ID: {{ $order->id }}<br>
Kliento vardas: {{ $customer->name }}<br>
Telefono numeris: {{ $customer->phone_number }}<br>
Atsiemimo laikas: {{ $order->collect_time }}<br>
Kaip valgys klientas: @if ($order->place) {{ __('names.onTheSpot') }} @else {{ __('names.takeaway') }} @endif<br>
Perka įmonė: @if ($order->isCompanyBuying) {{ __('names.yes') }} @else {{ __('names.no') }} @endif <br>

@component('mail::table')
    |Produktas     |Kaina     |Kiekis  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ number_format($orderItem->price_current, 2) }} | {{ $orderItem->count }} |
    @endforeach
    |Bendra Suma | €{{ number_format($order->sum, 2) }} | {{ $orderItemCountSum }} |
@endcomponent

@component('mail::button', ['url' => env('APP_URL').'/admin/orders/1'])
    Peržiūrėti Užsakymą
@endcomponent

@endcomponent
