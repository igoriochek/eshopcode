<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <style>
        body {
            font-family: "dejavu sans", serif;
            font-size: 12px;
            color: #000;
        }
        .text-center {
            text-align: center;
        }
        .table {
            border-collapse: collapse;
            width: 100%;
        }
        .top-align {
            vertical-align: top;
        }
        .capitalize {
            text-transform: uppercase;
        }
        .mb-5 {
            margin-bottom: 3rem;
        }
    </style>
</head>

<body>
<h1 class="text-center capitalize ">{{__('names.invoice')}}</h1>
<div class="text-center">{{__('table.orderId')}} {{ sprintf("%05d", $order->id) }}</div>
<div class="text-center">2024-08-21</div>
<div class="text-center mb-5">
    {{__('table.status')}}: 
    @if($order->status->name == 'New' || $order->status->name == "Waiting")
        <span>{{$order->status->name}}</span>
    @elseif($order->status->name == "Canceled" || $order->status->name == "Returned")
        <span>{{$order->status->name}}</span>
    @else
        <span>{{$order->status->name}}</span>
    @endif
</div>
    
<table class="table mb-5">
    <tr>
        <td>
            <span class="capitalize">{{ __('names.seller') }}</span><br>
            <b>UAB "Jodesta"</b><br>
            <!-- {{ __('names.reg_code') }}: 223946830<br>
            {{ __('names.vat') }}: LT239468314<br>
            {{ __('forms.address') }}: Žalgirio g. 93, LT-08218 Vilnius<br>
            {{ __('names.settlement_acc') }}: LT287044060001173197<br>
            {{ __('names.bank') }}: SEB bankas<br>
            {{ __('names.bank_code') }}: 70440 -->
        </td>
        <td class="top-align">
            <span class="capitalize">{{ __('names.buyer') }}</span><br>
            <b>{{ $order->user->name }}</b><br>
            {{ __('forms.address') }}: Ulonų g. 12, Vilnius<br>
            <!-- {{ __('forms.address') }}: {{ $order->user->street }} {{ $order->user->house_flat }}, {{ $order->user->city }}<br> -->
            {{ __('forms.phone_number') }}: +37069784236<br>
            <!-- {{ $order->user->phone_number }} -->
        </td>
    </tr>
</table>
<div class="card">
    <div class="card-body">
        <div class="container mb-5 mt-3">
            <div class="container flex-grow-1">
                <hr>
                @foreach($orderItems as $orderItem)
                    <div class="row my-2 mx-1 justify-content-center">
                        <div class="col-md-2 mb-4 mb-md-0 mb col-sm-3">
                            <div class="
                        bg-image
                        ripple
                        rounded-5
                        overflow-hidden
                        d-block
                        " data-ripple-color="light">
{{--                                <img--}}
{{--                                    class="img-fluid"--}}
{{--                                    width="150"--}}
{{--                                    height="150"--}}
{{--                                    src="{{$orderItem->product->image ? $orderItem->product->image : 'https://t4.ftcdn.net/jpg/04/00/24/31/360_F_400243185_BOxON3h9avMUX10RsDkt3pJ8iQx72kS3.jpg'}}"--}}
{{--                                    alt="{{$orderItem->product->name}}--}}
{{--                                    "/>--}}

                            </div>
                        </div>
                        <div class="col-md-7 mb-4 mb-md-0">
                            <p><b>Termostato įrengimas</b></p>
                            <p class="mb-1">
                                <span class="text-muted me-2">{{__('table.description')}}: </span><span>Termostato įrengimas</span>
                            </p>
                        </div>
                        <div class="col-md-3 mb-4 mb-md-0 my-md-4 align-items-md-center justify-content-md-center">
                            <h5 class="mb-2">
                                <span class="align-middle"><b>{{__('table.price')}}:</b> 30.25 € x 1</span>
                            </h5>
                        </div>
                    </div>
                @endforeach
                <hr>
                <div class="row">
{{--                    <div class="col-xl-8">--}}
{{--                        <p class="ms-3">PLACEHOLDER FOR ADDITIONAL NOTES AND PAYMENT INFO</p>--}}
{{--                    </div>--}}
                    <div class="col-xl-3">
{{--                        <ul class="list-unstyled">--}}
{{--                            <li class="text-muted ms-3"><span class="text-black me-4">{{__('table.subTotal')}}</span> BEFORE SHIPPING--}}
{{--                            </li>--}}
{{--                            <li class="text-muted ms-3 mt-2"><span class="text-black me-4">{{__('table.shipping')}}</span> INCLUDE PRICE--}}
{{--                                HERE--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                        {{ number_format((float)$order->sum, 2, '.', '') }}--}}
                        <p class="text-black float-start">
                            <span class="text-black me-3">{{__('table.sum')}}:</span>
                            <span style="font-size: 25px;"> 30.25 €</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>