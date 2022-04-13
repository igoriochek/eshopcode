@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-6">
                <h1>Orders</h1>
            </div>
        </div>
    </div>
</section>

<section>

    <div class="content px-3">

        @include('flash::message')

        <div class="clearfix"></div>

        @if($orders)
            <div class="card">
                <div class="card-body p-0">
                    <div class="table table-responsive">
                        <table class="table" id="categories">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Status</th>
                                <th> </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->status->name }}</td>
                                    <td width="120">
                                        {!! Form::open(['route' => ['destroyorder', $item->id], 'method' => 'delete']) !!}
                                        <div class='btn-group'>
                                            <div class='btn-group'>
                                                <a href="{{ route('vieworder', [$item->id]) }}"
                                                   class='btn btn-default btn-xs'>
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </div>
                                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        @else
            your order is empty
        @endif
    </div>
</section>

@endsection

