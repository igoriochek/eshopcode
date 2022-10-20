@extends('layouts.app')

@section('content')
    <div class="page-navigation">
        <div class="container">
            <a href="{{ url('/') }}">
                {{ __('menu.home') }}
            </a>
            <i class="fa-solid fa-angle-right"></i>
            <span>
                {{ __('menu.termsofservice') ?? '' }}
            </span>
        </div>
    </div>
    <div class="container">
        <div class="product-section p-4">
            @if($lang=="lt")
                <h4>Taisyklės</h4>
                <p>Paslaugų apmokėjimas, o vėliau ir suteikimas bus vykdomas užsiregistravus pirkėjui. Jo nurodytais kontaktais bus siunčiamas patvirtinimas apie nupirktą paslaugą. Taip pat bus suderinamas laikas jos suteikimui.
                    Jei klientas liks nepatenkintas paslauga, jam bus garantuojamas pilnas mokėjimo grąžinimas. Klientui reikės raštiškai nurodyti priežąstį kodėl jam paslauga netiko.
            @elseif ($lang == "ru")
                <h4>Правила</h4>
                <p>Оплата услуг, а затем услуги будут оказаны после регистрации покупателя. По указанным им контактам будет отправлено подтверждение о покупке услуги. Также будет согласовано время для её оказания.
                    Если клиент остался недоволен услугой, то ему гарантируется полный возврат оплаты. Клиент должен будет в письменной форме указать причину, почему эта услуга ему не понравилась.
            @else
                <h4>Rules</h4>
                <p>Payment and provision of services will be carried out after the buyer completes the registration. Confirmation of the purchased service shall be sent to the contacts specified by the buyer. The time for the provision of the purchased service shall also be agreed upon.
                    If the customer is dissatisfied with the services provided, the customer is entitled to a full refund. In this case the customer has to specify in writing the reason why he was not happy with the service.
            @endif
        </div>
    </div>
@endsection