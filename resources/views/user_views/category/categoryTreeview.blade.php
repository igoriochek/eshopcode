@extends('layouts.app')


{{--@push('css')--}}
{{--    <link href="/css/treeview.css" rel="stylesheet">--}}
{{--@endpush--}}
@section('content')
    <div class="container">

        <div class="panel panel-primary">

            <div class="panel-heading">Manage Category TreeView</div>

            <div class="panel-body">

                <div class="row">

                    <div class="col-md-6">

                        <h3>{{__('names.categoryList')}}</h3>

                        <ul id="tree1">
{{--                            {{ dd($categories) }}--}}

                            @foreach($categories as $category)

                                <li>

                                    <a href="{{ route("innercategories", ["category_id" => $category->id ])}}">  {{ $category->name }}  </a>( {{ count($category->products) }} )

                                    @if(count($category->innerCategories))
{{--                                        {{dd($category->innerCategories)}}--}}
                                        @include('user_views.category.manageChild',['childs' => $category->innerCategories])

                                    @endif

                                </li>

                            @endforeach

                        </ul>

                    </div>

{{--                    <div class="col-md-6">--}}

{{--                        <h3>Add New Category</h3>--}}


{{--                        {!! Form::open(['route'=>'add.category']) !!}--}}


{{--                        @if ($message = Session::get('success'))--}}

{{--                            <div class="alert alert-success alert-block">--}}

{{--                                <button type="button" class="close" data-dismiss="alert">×</button>--}}

{{--                                <strong>{{ $message }}</strong>--}}

{{--                            </div>--}}

{{--                        @endif--}}


{{--                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">--}}

{{--                            {!! Form::label('Title:') !!}--}}

{{--                            {!! Form::text('title', old('title'), ['class'=>'form-control', 'placeholder'=>'Enter Title']) !!}--}}

{{--                            <span class="text-danger">{{ $errors->first('title') }}</span>--}}

{{--                        </div>--}}


{{--                        <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">--}}

{{--                            {!! Form::label('Category:') !!}--}}

{{--                            {!! Form::select('parent_id',$allCategories, old('parent_id'), ['class'=>'form-control', 'placeholder'=>'Select Category']) !!}--}}

{{--                            <span class="text-danger">{{ $errors->first('parent_id') }}</span>--}}

{{--                        </div>--}}


{{--                        <div class="form-group">--}}

{{--                            <button class="btn btn-success">Add New</button>--}}

{{--                        </div>--}}


{{--                        {!! Form::close() !!}--}}


{{--                    </div>--}}

                </div>




            </div>

        </div>

    </div>


@endsection
{{--@push('scripts')--}}
{{--    <script src="/js/treeview.js"></script>--}}
{{--@endpush--}}
