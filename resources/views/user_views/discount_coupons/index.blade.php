@extends('layouts.app')

@section('content')
    @include('user_views.header', ['title' => __('names.discountCoupons')])
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5 order-sm-last order-lg-first">
                    <div class="row">
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
        </div>
    </section>
@endsection
