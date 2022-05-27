@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('names.promotions')}}</h1>
                </div>
            </div>
        </div>
    </section>


    @forelse ($promotions as $item)
        <div class="col-sm-6">
            <h3>{{$item->name}}: {{__('names.products')}}</h3>
            {{--        <a href="{{route("rootcategories")}}">Back to main categories</a>--}}
        </div>
        <div class="content px-3">
            <div class="clearfix"></div>
            <div class="card">
                <div class="card-body p-0">
                    {{--                @include('products.table')--}}

                    @if(($item->products->count()))
                        @foreach( $item->products as $prod )
                            <div class="card-body">
                                <h4 class="card-title"><a href="{{route('viewproduct', $prod->id)}}">{{$prod->name}}</a>
                                </h4>
                                <h6 class="card-subtitle mb-2 text-muted">{{__('names.desc')}}</h6>
                                <p class="card-text">{{$prod->description}}</p>
                            </div>
                            @if ($loop->iteration > 2)
                                <a href="{{route("promotion", ["id"=>$item->id])}}">{{__("names.more_for_promotions")}}</a>
                                @break
                            @endif
                        @endforeach
                </div>
            </div>
        </div>
        @else
            {{__('names.noProducts')}}
        @endif

    @empty
        {{__('names.noPromotions')}}
    @endforelse


    <div class="card-footer clearfix">
        <div class="float-right">
            {{$promotions->links()}}
        </div>
    </div>
    {{--              </div>--}}

@endsection
