@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.categories')}}</h1>
                </div>
{{--                <div class="col-sm-6">--}}
{{--                    <a class="btn btn-primary float-right"--}}
{{--                       href="{{ route('products.create') }}">--}}
{{--                        Add New--}}
{{--                    </a>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>

    <div class="content px-3">

{{--        @include('flash::message')--}}

        <div class="clearfix"></div>

        <div class="card">
            <div class="card-body p-0">
{{--                @include('products.table')--}}

                @if(!empty($categories))
                @forelse( $categories as $category )
                <div class="card-body">
                    <h4 class="card-title"><a href="{{route('innercategories', $category->id)}}">{{$category->name}}</a></h4>
                    <h6 class="card-subtitle mb-2 text-muted">{{__('names.productCount')}} {{ count($category->products) }}</h6>
                    <p class="card-text">{{$category->description}}</p>
                    @forelse($category->innerCategories as $c)
                                <a href="{{route('innercategories', $c->id)}}" class="card-link">{{$c->name}}</a> {{__('names.productCount')}} {{count($c->products)}}
                    @empty
                            ---{{__('names.noCategories')}}---
                    @endforelse
                </div>
            @empty
                {{__('names.noCategories')}}
            @endforelse
                    {{$categories->links()}}
                @endif

                <div class="card-footer clearfix">
                    <div class="float-right">
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
