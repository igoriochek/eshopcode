@extends('layouts.app')

@section('title', __('names.orderComplete'))

@section('content')
    <div class="py-5 mt-5">
        <div class="container order-complete">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card order-complete-fail">
                        <div class="card-body text-center">
                            <p class="text-dark fw-bold mb-0">
                                <i class="fa-solid fa-xmark me-1 fs-5"></i>
                                {{ __('names.canceledOrder') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
