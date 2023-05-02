@component('mail::message')
# Создан Новый Заказ

Заказа ID: {{ $orderId }}<br>
Имя Клиента: {{ $customerName }}<br>

@component('mail::table')
    |Продукт     |Цена     |Количество  |
    |:----------- |:---------:|:--------:|
    @foreach($orderItems as $orderItem)
        | {{ $orderItem->product->name }} | €{{ $orderItem->product->price }} | {{ $orderItem->count }} |
        @if ($orderItem->product_size_id)| {{ __('names.size').': '.$orderItem->itemSize->name }} | - | - |@endif
        @if ($orderItem->product_meat_id)| {{ __('names.meat').': '.$orderItem->meat->name }} | - | - |@endif
        @if ($orderItem->product_sauce_id)| {{ __('names.sauce').': '.$orderItem->sauce->name }} | - | - |@endif
        @if ($orderItem->paid_accessories)| {{ __('names.paidAccessories').': '}} @foreach ($orderItem->paidAccessories as $paidAccessory) {{ $paidAccessory->name }}</span>@if (!$loop->last),@endif @endforeach | - | - |@endif
        @if ($orderItem->free_accessories)| {{ __('names.compositionWithout').': '}} @foreach ($orderItem->freeAccessories as $freeAccessory) {{ $freeAccessory->name }}</span>@if (!$loop->last),@endif @endforeach | - | - |@endif
    @endforeach
    |Общая Сумма | €{{ $orderSum }} | {{ $orderItemCountSum }} |
@endcomponent

@component('mail::button', ['url' => env('APP_URL').'/admin/orders/1'])
    Посмотреть Заказ
@endcomponent

@endcomponent
