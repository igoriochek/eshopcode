@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.cancelOrder').' '.$order->order_id])

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="/user/rootorders">{{ __('names.orders') }}</a></li>
                <li>{{__("names.cancelOrder")}} {{ __($order->id) }} </li>
            </ul>
        </div>
    </div>



<section>

    <div class="container margin_60">

        @include('flash::message')

        <div class="clearfix"></div>

        {!! Form::model($order, ['route' => ['savecancelnorder', $order->id], 'method' => 'post']) !!}

        <div class="row">
            <div class="form-group col-sm-6">
                {!! Form::label('description', __('names.desc')) !!}
                {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-12">
            {!! Form::submit(__('buttons.save'), ['class' => 'btn_1 green']) !!}
            <a href="{{ route('rootorders') }}" class="btn_1 white">{{__('buttons.cancel')}}</a>
        </div>
        {!! Form::close() !!}

    </div>

</section>

@endsection

