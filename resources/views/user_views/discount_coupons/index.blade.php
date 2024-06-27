@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.discountCoupons')}}</h1>
                </div>
            </div>
        </div>
    </section>


        <div class="col-sm-6">
            <h3>[{{__('names.discountCouponsForYou')}}]</h3>
            {{--        <a href="{{route("rootcategories")}}">Back to main categories</a>--}}
        </div>
        <div class="content px-3">

            {{--        @include('flash::message')--}}

            <div class="clearfix"></div>

            <div class="card">
                <div class="card-body p-0">
                    {{--                @include('products.table')--}}

                    @if(($discountCoupons->count()))
                        @foreach( $discountCoupons as $prod )
                            <div class="card-body">
                                <h4 class="card-title"><a href="{{route('viewproduct', $prod->id)}}">{{$prod->code}}</a></h4>
                                <h6 class="card-subtitle mb-2 text-muted">{{__('names.desc')}}</h6>
                                <p class="card-text">{{$prod->value}}</p>
                            </div>
                        @endforeach

                    @else
                    {{__('names.noProducts')}}
                    @endif




                    <div class="card-footer clearfix">
                        <div class="float-right">
                            {{$discountCoupons->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>





@endsection
