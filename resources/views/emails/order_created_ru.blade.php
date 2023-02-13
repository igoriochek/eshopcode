@component('mail::message')
# Создан Новый Заказ

Заказа ID: {{ $orderId }}<br>
Имя Клиента: {{ $customerName }}<br>

@component('mail::table')
    |Продукт     |Цена     |Количество  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ $orderItem->product->price }} | {{ $orderItem->count }} |
    @endforeach
    |Общая Сумма | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

@component('mail::button', ['url' => env('APP_URL').'/admin/orders/1'])
    Посмотреть Заказ
@endcomponent

@endcomponent
