@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-6">
                <h1>{{__('names.checkout')}}</h1>
            </div>
        </div>
    </div>
</section>

<section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-lg-6">
                <div><strong>{{__('names.cart')}}</strong></div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>{{__('table.name')}}</th>
                        <th>{{__('table.count')}}</th>
                        <th>{{__('table.price')}}</th>
                        <th>{{__('table.description')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>{{ $item['product']->name }}</td>
                            <td>{{ $item->count }}</td>
                            <td>{{ $item['product']->price }}</td>
                            <td>{{ $item['product']->description }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td>{{__('names.sum')}}:</td>
                        <td colspan="3" style="text-align: right">{{ $cart->sum }}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-lg-6">
                <div><strong>{{__('forms.user')}}</strong></div>
                <div>Id: {{ $user->id }}</div>
                <div>{{__('forms.name')}}: {{ $user->name }}</div>
                <div>{{__('forms.email')}}: {{ $user->email }}</div>
                <div>{{__('forms.avatar')}}: {{ $user->avatar }}</div>
                <div>{{__('forms.street')}}: {{ $user->street }}</div>
                <div>{{__('forms.house_flat')}}: {{ $user->house_flat }}</div>
                <div>{{__('forms.post_index')}}: {{ $user->post_index }}</div>
                <div>{{__('forms.city')}}: {{ $user->city }}</div>
                <div>{{__('forms.phone_number')}}: {{ $user->phone_number }}</div>
            </div>
        </div>

        <br>
        <br>
        <div>

        </div>

        <div>
            {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                <div>
                    <div>{{__('names.discount')}}</div>
                    <select name="discount[]" size="10" multiple>
                        @foreach($discounts as $item)
                            <option value="{{ $item->id }}">{{ $item->code }}: {{ $item->value }}</option>
                        @endforeach
                    </select>
                </div>
                <br><br>
                <input type="submit" value="{{__('buttons.preview')}}">
            {!! Form::close() !!}
        </div>
    </div>
</section>

@endsection

