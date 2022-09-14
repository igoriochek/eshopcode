@extends('layouts.app')

@section('content')
    <div class="container order-complete">
        <div class="col">
            <ul class="breadcrumb font-weight-bold text-6 justify-content-center my-5">
                <li class="text-transform-none me-3">
                    <span class="done">{{ __('Cart') }}</span>
                </li>
                <li class="text-transform-none text-color-grey-lighten me-3">
                    <i class="fa-solid fa-angle-right me-2"></i>
                    <span class="done">{{ __('Checkout') }}</span>
                </li>
                <li class="text-transform-none text-color-grey-lighten me-3">
                    <i class="fa-solid fa-angle-right me-2"></i>
                    <span class="done">{{ __('Preview') }}</span>
                </li>
                <li class="text-transform-none text-color-grey-lighten">
                    <i class="fa-solid fa-angle-right me-2"></i>
                    <span class="active">{{ __('Order Complete') }}</span>
                </li>
            </ul>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card order-complete-fail">
                    <div class="card-body text-center">
                        <p class="text-dark fw-bold mb-0">
                            <i class="fa-solid fa-xmark me-1 fs-5"></i>
                            {{ __('Your Order has been canceled.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

