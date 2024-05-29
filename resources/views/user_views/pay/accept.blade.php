@extends('layouts.app')

@section('title', __('names.orderComplete'))

@section('content')
    <div style="padding-block: 100px 70px">
        <div class="container order-complete">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card order-complete-success">
                        <div class="card-body text-center">
                            <p class="text-dark fw-bold mb-0">
                                <i class="fas fa-check me-1"></i>
                                {{ __('names.acceptedOrder') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
