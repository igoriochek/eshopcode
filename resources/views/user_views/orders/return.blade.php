@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row m-2">
                <div class="col-sm-6">
                    <h1>[Return]</h1>
                </div>
            </div>
        </div>
    </section>

    <section>

        <div class="content px-3">

            @include('flash::message')

            <div class="clearfix"></div>
            {!! Form::model($order, ['route' => ['savereturnorder', $order->id], 'method' => 'post']) !!}
            <div class="table table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="text-center">Check to Return</th>
                        <th>Product Id</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Count</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderItems as $item)
                        <tr>
                            <td class="text-center">
                                {!! Form::checkbox("return_items[]", $item->product_id, false) !!}
                            </td>
                            <td>{{ $item->product_id }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->price_current }}</td>
                            <td>{{ $item->count }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <!-- Name Field -->
                        <div class="form-group col-sm-6">
                            {!! Form::label('description', 'Description:') !!}
                            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('rootorders') }}" class="btn btn-default">Cancel</a>
                </div>

                {!! Form::close() !!}

            </div>

        </div>
    </section>

@endsection

