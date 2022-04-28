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

        <div>
            {!! Form::open(['route' => ['pay'], 'method' => 'post']) !!}
                <div>
                    <div>discount</div>
                    <select name="discount[]" size="10" multiple>
                        @foreach($discounts as $item)
                            <option value="{{ $item->id }}">{{ $item->code }}: {{ $item->value }}</option>
                        @endforeach
                    </select>
                </div>
                <br><br>
                <input type="submit" value="pay">
            {!! Form::close() !!}
        </div>
    </div>
</section>

@endsection

