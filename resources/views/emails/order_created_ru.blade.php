@component('mail::message')
# Создан Новый Заказ

Заказа ID: {{ $orderId }}<br>
Имя Клиента: {{ $customerName }}<br>

@component('mail::table')
    |Продукт     |Цена     |Количество  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ $orderItem->price_current }} | {{ $orderItem->count }} |
    @endforeach
    |Общая Сумма | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

@endcomponent
