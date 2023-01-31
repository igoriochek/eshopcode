<div class="card">
    <div class="card-body">
        <div class="container mb-5 mt-3">
            <div class="container flex-grow-1">
                <div class="col-md-12">
                    <div class="text-center">
                        <i class="far fa-building fa-4x ms-0" style="color:#8f8061 ;"></i>
                        <p class="pt-2">UAB "MD Projects"</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <ul class="list-unstyled">
                            <li class="text-muted"><b>{{ __('forms.buyer') }}:</b> <span style="color:#8f8061 ;">{{ $order->user->name }}</span></li>
                            <li class="text-muted"><b>{{ __('forms.address') }}:</b> {{ $order->user->street }} {{ $order->user->house_flat }}, {{ $order->user->city }}</li>
                            <li class="text-muted"><b>{{ __('forms.phone_number') }}:</b> {{ $order->user->phone_number }}</li>
                        </ul>
                    </div>
                    <div class="col-xl-4 ">
                        <p class="text-muted">{{__('names.invoice')}}</p>
                        <ul class="list-unstyled">
                            <li class="text-muted">
                                <i class="fas fa-circle" style="color:#8f8061 ;"></i> <span class="fw-bold">{{__('table.orderId')}}:</span> {{ $order->id }}
                            </li>
                            <li class="text-muted">
                                <i class="fas fa-circle" style="color:#8f8061 ;"></i> <span class="fw-bold">{{__('table.created_at')}}: </span> {{ $order->created_at }}
                            </li>
                            <li class="text-muted">
                                <i class="fas fa-circle" style="color:#8f8061;"></i> <span class="me-1 fw-bold">{{__('table.status')}}:</span>
                                @if($order->status->name == 'New' || $order->status->name == "Waiting")
                                    <span class="badge bg-warning text-black fw-bold">{{ $order->status->name }}</span>
                                @elseif($order->status->name == "Canceled" || $order->status->name == "Returned")
                                    <span class="badge bg-danger text-white fw-bold">{{ $order->status->name }}</span>
                                @else
                                    <span class="badge bg-success text-white fw-bold">{{ $order->status->name }}</span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <hr/>
                @foreach($orderItems as $orderItem)
                    <div class="row my-2 mx-1 justify-content-center">
                        <div class="col-md-2 mb-4 mb-md-0 mb col-sm-3">
                            <div class="bg-image ripple rounded-5 overflow-hidden d-block" data-ripple-color="light">

                            </div>
                        </div>
                        <div class="col-md-7 mb-4 mb-md-0">
                            <p class="fw-bold">{{ $orderItem->product->name }}</p>
                            <p class="mb-1">
                                <span class="text-muted me-2">{{__('table.description')}}: </span><span>{!! $orderItem->product->description !!}</span>
                            </p>
                        </div>
                        <div class="col-md-3 mb-4 mb-md-0 my-md-4 align-items-md-center justify-content-md-center">
                            <h5 class="mb-2">
                                <span class="align-middle"><b>{{__('table.price')}}:</b> {{ number_format($orderItem->price_current,2) }} € x {{ $orderItem->count }}</span>
                            </h5>
                        </div>
                    </div>
                @endforeach
                <hr>
                <div class="row">
                    <div class="col-xl-3">
                        <p class="text-black float-start">
                            <span class="text-black me-3">{{ __('table.sum') }}</span>
                            <span style="font-size: 25px;">{{ number_format($order->sum,2) }} €</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
