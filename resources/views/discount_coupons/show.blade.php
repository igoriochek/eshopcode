@extends('layouts.app')

@section('content')
    <section class="content-header mt-5">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.discountCouponDetails')}}</h1>
                </div>
                <div class="col-sm-6">
                    <a class="axil-btn btn-primary float-right"
                       href="{{ route('discountCoupons.index') }}">
                        {{__('buttons.back')}}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    @include('discount_coupons.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
