@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-6">
                <h1>{{__('names.checkout.preview')}}</h1>
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
                <div><strong>Cart</strong></div>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Count</th>
                        <th>Price</th>
                        <th>Description</th>
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
                    @if ($discounts)
                        <tr>
                            <td>sum:</td>
                            <td colspan="3" style="text-align: right">{{ $cart->sum }}</td>
                        </tr>
                        @foreach($discounts as $item)
                            <tr>
                                <td>discount:</td>
                                <td colspan="3" style="text-align: right">{{ $item->value }}</td>
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <td>total:</td>
                        <td colspan="3" style="text-align: right">{{ $amount }}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-lg-6">
                <div><strong>User</strong></div>
                <div>id: {{ $user->id }}</div>
                <div>name: {{ $user->name }}</div>
                <div>email: {{ $user->email }}</div>
                <div>avatar: {{ $user->avatar }}</div>
                <div>street: {{ $user->street }}</div>
                <div>house_flat: {{ $user->house_flat }}</div>
                <div>post_index: {{ $user->post_index }}</div>
                <div>city: {{ $user->city }}</div>
                <div>phone_number: {{ $user->phone_number }}</div>
            </div>
        </div>

        <br>
        <br>
        <div class="row">
            <div class="col-sm-6">
                <a class="btn btn-default float-right" href="{{ route('viewcart') }}">Back</a>
            </div>
            <div class="col-sm-6">
                {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
                <input type="submit" value="pay">
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@endsection

