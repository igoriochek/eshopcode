@extends('layouts.app')

@section('content')
    @include('user_views.header', ['title' => __('names.categories')])
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 order-sm-last order-lg-first">
                    <div class="row">
                        @if(!empty($categories))
                            @forelse($categories as $category)
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
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0 order-sm-first order-lg-last">
                    @foreach($categoryTree as $category)
                        <li>
                            <a href="{{ route("innercategories", ["category_id" => $category->id ]) }}">
                                {{ $category->name }}</a>
                            ( {{ count($category->products) }} )
                            @if(count($category->innerCategories))
                                {{--{{dd($category->innerCategories)}}--}}
                                @include('user_views.category.manageChild', ['childs' => $category->innerCategories])
                            @endif
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
