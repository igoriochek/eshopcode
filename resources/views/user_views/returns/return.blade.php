@extends('layouts.app')

@section('content')
<section class="main_content_area" style="padding-top: 0px;">
    <div class="container">
        <div class="account_dashboard">
            <div class="row">
                <div class="mb-5">
                    @include('adminlte-templates::common.errors')
                    @include('flash_messages')
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="dashboard_tab_button">
                        <ul role="tablist" class="nav flex-column dashboard-list">
                            <li>
                                <a href="{{ url('/user/userprofile') }}" class="nav-link">{{ __('menu.profile') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootorders') }}" class="nav-link">{{__('menu.orders') }}</a>
                            </li>
                            <li>
                                <a href="{{ url('/user/rootoreturns') }}" class="nav-link active">{{ __('menu.returns') }}</a>
                            </li>
                            <li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">{{ __('menu.logout') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <div class="contact_message form">
                        <h3>{{ __("names.returnOrder").':' }} {{ $order->order_id }}</h3>
                        {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
                        <div class="contact_textarea">
                            {!! Form::label('description', __('names.desc') )!!}
                            {!! Form::textarea('description', null, ['class' => 'form-control2']) !!}
                        </div>
                        <div class="d-flex" style="column-gap: 10px;">
                            <button type="submit" class="save-button">
                                {{ __('buttons.save') }}
                            </button>
                            <a href="{{ url('/user/vieworder/'.$order->id) }}" class="cancel-button">
                                {{ __('buttons.cancel') }}
                            </a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection