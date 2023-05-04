@component('mail::message')
# Создан новый заказ

Заказа ID: {{ $orderId }}<br>
Имя клиента: {{ $customerName }}<br>
Дата и время: {{ now()->format('Y-m-d H:i') }}<br>

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
