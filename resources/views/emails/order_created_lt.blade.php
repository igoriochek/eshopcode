@component('mail::message')
# Sukurtas Naujas Užsakymas

Užsakymo ID: {{ $orderId }}<br>
Kliento vardas: {{ $customerName }}<br>

@component('mail::table')
    |Produktas     |Kaina     |Kiekis  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
    | {{ $orderItem->product->name }}@if($orderItem->rental_start_date)<br>{{  __('forms.startDate').': '.$orderItem->rental_start_date->format('Y-m-d') }}@endif @if($orderItem->days)<br>{{ __('forms.selectedDays').': '.$orderItem->days.' '.__('names.days') }}@endif | €{{ $orderItem->rental_start_date && $orderItem->days ? $orderItem->product->rental_price : $orderItem->product->price }} | {{ $orderItem->rental_start_date && $orderItem->days ? '-' : $orderItem->count }} |
    @endforeach
    |Bendra Suma | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

{{-- @component('mail::button', ['url' => env('APP_URL').'/admin/orders/'.$orderId])
    Peržiūrėti Užsakymą
@endcomponent --}}

@endcomponent
