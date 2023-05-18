@component('mail::message')
# Sukurtas Naujas Užsakymas

Užsakymo ID: {{ $order->id }}<br>
Kliento vardas: {{ $customer->name }}<br>
Telefono numeris: {{ $customer->phone_number }}<br>
Atsiemimo laikas: {{ $order->collect_time }}<br>
Kaip valgys klientas: @if ($order->place) {{ __('names.onTheSpot') }} @else {{ __('names.takeaway') }} @endif<br>
Perka įmonė: @if ($order->isCompanyBuying) {{ __('names.yes') }} @else {{ __('names.no') }} @endif <br><br>
@if ($order->isCompanyBuying)
Įmonės pavadinimas: {{ $company['name'] }}<br>
Įmonės adresas: {{ $company['address'] }}<br>
Įmonės kodas: {{ $company['code'] }}<br>
Įmonės PVM kodas: {{ $company['vat_code'] ?? '-' }}<br>
@endif

@component('mail::table')
    |Produktas     |Kaina     |Kiekis  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }}<br>@if ($orderItem->product_size_id){{ __('names.size').': '.$orderItem->itemSize->name }}<br>@endif @if ($orderItem->product_meat_id){{ __('names.meat').': '.$orderItem->meat->name }}<br>@endif @if ($orderItem->product_sauce_id){{ __('names.sauce').': '.$orderItem->sauce->name }}<br>@endif @if ($orderItem->paid_accessories){{ __('names.paidAccessories').': '}}@foreach ($orderItem->paidAccessories as $paidAccessory) {{ $paidAccessory->name }}</span>@if (!$loop->last),@endif @endforeach <br>@endif @if ($orderItem->free_accessories){{ __('names.compositionWithout').': '}}@foreach ($orderItem->freeAccessories as $freeAccessory) {{ $freeAccessory->name }}</span>@if (!$loop->last),@endif @endforeach <br>@endif | €{{ number_format($orderItem->price_current, 2) }} | {{ $orderItem->count }} |
    @endforeach
    |Bendra Suma | €{{ number_format($order->sum, 2) }} | {{ $orderItemCountSum }} |
@endcomponent

@component('mail::button', ['url' => env('APP_URL').'/admin/orders/'.$order->id])
    Peržiūrėti Užsakymą
@endcomponent

@endcomponent
