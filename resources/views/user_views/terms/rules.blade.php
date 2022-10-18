@extends('layouts.app')

@section('content')
    <div class="container product-section">

        @if($lang=="lt")
            <h1> Taisyklės</h1>
            <p>Paslaugų apmokėjimas, o vėliau ir suteikimas bus vykdomas užsiregistravus pirkėjui. Jo nurodytais kontaktais bus siunčiamas patvirtinimas apie nupirktą paslaugą. Taip pat bus suderinamas laikas jos suteikimui.
                Jei klientas liks nepatenkintas paslauga, jam bus garantuojamas pilnas mokėjimo grąžinimas. Klientui reikės raštiškai nurodyti priežąstį kodėl jam paslauga netiko.
        @elseif ($lang == "ru")
            <h1>Правила</h1>
            <p>Оплата услуг, а затем услуги будут оказаны после регистрации покупателя. По указанным им контактам будет отправлено подтверждение о покупке услуги. Также будет согласовано время для её оказания.
                Если клиент остался недоволен услугой, то ему гарантируется полный возврат оплаты. Клиент должен будет в письменной форме указать причину, почему эта услуга ему не понравилась.

        @else
            <h1>Rules</h1>
            <p>Payment and provision of services will be carried out after the buyer completes the registration. Confirmation of the purchased service shall be sent to the contacts specified by the buyer. The time for the provision of the purchased service shall also be agreed upon.
                If the customer is dissatisfied with the services provided, the customer is entitled to a full refund. In this case the customer has to specify in writing the reason why he was not happy with the service.
        @endif



    </div>

@endsection
