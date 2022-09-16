@extends('layouts.app')

@section('content')

    <section id="hero" class="background-image" data-background=url(../img/header_bg.jpg) style="height: 470px">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="intro_title">
                <h3 class="animated fadeInDown">{{ __('names.checkoutPreview') }}</h3>
            </div>
        </div>
    </section>

    <div id="position">
        <div class="container">
            <ul>
                <li><a href="../">{{__('menu.home')}}</a></li>
                <li><a href="/user/viewcart">{{__('names.cart')}}</a></li>
                <li>{{ __('names.checkout') }}</li>
            </ul>
        </div>
    </div>

    <div class="container margin_60">
        <div class="checkout-page">
            @include('flash::message')

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="billing-details">
                        <div class="shop-form">
                            <div class="default-title">
                                <h2>{{__('forms.user')}}</h2>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>{{__('table.userId')}}: {{ $user->id }}</label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>{{__('forms.name')}}: {{ $user->name }}</label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>{{__('forms.email')}}: {{ $user->email }}</label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>{{__('forms.phone_number')}}: {{ $user->phone_number }}</label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>{{__('forms.city')}}: {{ $user->city }}</label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>{{__('forms.street')}}: {{ $user->street }}</label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>{{__('forms.house_flat')}}: {{ $user->house_flat }}</label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>{{__('forms.post_index')}}: {{ $user->post_index }}</label>
                                </div>
                                <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                    <label>{{__('forms.avatar')}}: {{ $user->avatar }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <a class="btn_1" href="{{ route('viewcart') }}">{{__('buttons.back')}}</a>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="your-order">
                        <div class="default-title">
                            <h2>{{ __('names.order') }}</h2>
                        </div>
                        <ul class="orders-table">
                            <li class="table-header clearfix">
                                <div class="col">
                                    <strong>{{__('table.name')}}</strong>
                                </div>
                                <div class="col">
                                    <strong>{{__('table.count')}}</strong>
                                </div>
                                <div class="col">
                                    <strong>{{__('table.pricePerItem')}}</strong>
                                </div>
                            </li>
                            @foreach($cartItems as $item)
                                <li class="clearfix">
                                    <div class="col">
                                        {{ $item['product']->name }}
                                    </div>
                                    <div class="col second">
                                        {{ $item->count }}
                                    </div>
                                    <div class="col second">
                                        {{ $item['product']->price }}€
                                    </div>
                                </li>
                            @endforeach
                            <li class="clearfix total">
                                <div class="col">
                                    <strong>{{__('names.total')}}:</strong>
                                </div>
                                <div class="col empty_col" ></div>
                                <div class="col second">
                                    <strong>{{ $cart->sum }}€</strong>
                                </div>
                            </li>
                        </ul>
                        <div class="coupon-code">
                            <div class="form-group">
                                {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                                <div >
                                    <label>{{__('names.discount')}}</label>
                                    <div class="styled-select-filters">
                                        <select name="discount[]" size="10" multiple>
                                            @forelse($discounts as $item)
                                                <option value="{{ $item->id }}">{{ $item->code }}: {{ $item->value }}€</option>
                                            @empty
                                                <option value="">{{ __('names.noDiscounts') }}</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <input type="submit" class="btn_full" value="{{__('buttons.checkout')}}">
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

