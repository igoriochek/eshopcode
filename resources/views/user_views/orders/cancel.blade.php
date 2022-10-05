@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("rootorders") ,'title' => __('names.orders'), 'paragraph'=>__('names.cancelOrder').' '.$order->order_id ])

    <div class="auth-form container py-5">

<section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card">

            {!! Form::model($order, ['route' => ['savecancelnorder', $order->id], 'method' => 'post']) !!}

            <div class="card-body">
                <div class="row">
                    <!-- Name Field -->
                    <div class="form-group col-sm-6">
                        {!! Form::label('description', __('names.desc')) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>

            <div class="card-footer">
                {!! Form::submit(__('buttons.save'), ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('rootorders') }}" class="btn btn-default">{{__('buttons.cancel')}}</a>
            </div>

            {!! Form::close() !!}

        </div>

    </div>
</section>
    </div>
@endsection

