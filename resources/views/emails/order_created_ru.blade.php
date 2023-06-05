@component('mail::message')
# Создан Новый Заказ

Заказа ID: {{ $orderId }}<br>
Имя клиента: {{ $customerName }}<br>

@component('mail::table')
    |Продукт     |Цена     |Количество  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
    | {{ $orderItem->product->name }}@if($orderItem->rental_start_date)<br>{{  __('forms.startDate').': '.$orderItem->rental_start_date->format('Y-m-d') }}@endif @if($orderItem->days)<br>{{ __('forms.selectedDays').': '.$orderItem->days.' '.__('names.days') }}@endif | €{{ $orderItem->rental_start_date && $orderItem->days ? $orderItem->product->rental_price : $orderItem->product->price }} | {{ $orderItem->rental_start_date && $orderItem->days ? '-' : $orderItem->count }} |
    @endforeach
    |Общая Сумма | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

{{-- @component('mail::button', ['url' => env('APP_URL').'/admin/orders/'.$orderId])
    Посмотреть Заказ
@endcomponent --}}

@endcomponent
