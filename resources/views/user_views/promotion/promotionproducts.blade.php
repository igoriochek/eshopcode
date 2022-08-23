@extends('layouts.app')

@section('content')
    @include('header', ['title' => __('names.promotion').' '.$promotion->name])
    <section class="pt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12 mb-5">
                    <div class="row mb-4 align-items-center">
                        <div class="col-lg-12">
                            <h3 class="column-title">{{ $promotion->name }}</h3>
                            {{--<a href="{{route("rootcategories")}}">Back to main categories</a>--}}
                            <p class="p-0 m-0 mb-sm-3 showing-all-results">
                                {{ __('Showing all ').$products->count().__(' result(s)') }}
                            </p>
                        </div>
                    </div>
                    {{--@include('products.table')--}}
                    @if(($products->count()))
                        @foreach($products as $prod)
                            <div class="promotion p-4 mb-4 mb-sm-5">
                                <h4>
                                    <a class="promotion-title" href="{{route('viewproduct', $prod->id)}}">
                                        {{$prod->name}}
                                    </a>
                                </h4>
                                <p class="promotion-description">{{$prod->description}}</p>
                            </div>
                        @endforeach
                    @else
                        <span class="promotions-empty">{{ __('names.noProducts') }}</span>
                    @endif
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
