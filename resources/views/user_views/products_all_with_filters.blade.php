@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-6">
                <h1>Categories</h1>
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

<section>
<div class="row m-2">

    {{--        @include('flash::message')--}}
    <div class="col-sm-2">
        <div class="card">
            <div class="card-body p-0">
                <form method="get" action="{{route("userproducts")}}">
                    <div class="form-group">
                        <label for="filter[namelike]">Product name</label>
                        <input type="text" name="filter[namelike]" class="form-control" id="filter[namelike]" placeholder="" value="{{$filter["namelike"] ?? ""}}">
                    </div>
                    <fieldset class="form-group">
                        <div class="row">
                            <div><legend class="col-form-label col-sm-4 pt-0">Categories</legend></div>
                            <div class="col-sm-10">
                                @forelse($categories as $category)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{$category->id}}" id="category" onclick="calc();"
{{--                                           name="filter[categories.id]"--}}
                                        @if ($filter && $filter["categories.id"])
                                            {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                        @endif
                                    >
                                    <label class="form-check-label" for="categories.id">
                                        {{$category->name}}
                                    </label>
                                </div>
                                @empty
                                    ---
                                @endforelse
                                <input type="text" value="{{implode(",",$selCategories)}}" name="filter[categories.id]" id="filter[categories.id]">
                            </div>
                        </div>
                        <div>&nbsp;</div>
                    </fieldset>
                    <fieldset class="form-group">
                    <div class="price_filter">
                        <label for="amount">Price :</label>
                        <div id="slider" class="slider" wire:ignore></div>
                        <div>&nbsp;</div>
                        <div><label for="amount">From :</label>
                            <input type="text" id="filter[pricefrom]" name="filter[pricefrom]" readonly value="{{$filter["pricefrom"] ?? ""}}"/></div>
                        <div><label for="amount">To :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                            <input type="text" id="filter[priceto]" name="filter[priceto]" readonly value="{{$filter["priceto"] ?? ""}}"/></div>
                    </div>
                    </fieldset>
                    <div>&nbsp;</div>
                    <div>&nbsp;</div>
                    <input type="submit" value="[ Filter ]">
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-10">
        <div class="card">
            <div class="card-body p-0">
                {{--                @include('products.table')--}}

                @if(!empty($products))
                @forelse( $products as $product )
                <div class="card-body">
                    <h4 class="card-title"><a href="{{route('viewproduct', $product->id)}}">{{$product->name}}</a></h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">{{$product->description}}</p>
                    <p>{{$product->price}}</p>
                    @forelse($product->categories as $c)
                    <a href="{{route('innercategories', $c->id)}}" class="card-link">{{$c->name}}</a>
                    @empty
                    ---no cats---
                    @endforelse
                </div>
                @empty
                no categories
                @endforelse
                {{$products->links()}}
                @endif

                <!--<div class="card-footer clearfix">
                    <div class="float-right">

                    </div>
                </div>-->
            </div>

        </div>
    </div>
</div>
</section>

@push('scripts')
    <script>
    var slider = document.getElementById('slider');

    noUiSlider.create(slider, {
    // start: [0, 1000],
    start: [ {{$filter["pricefrom"] ?? 0}}, {{$filter["priceto"] ?? 1000}}],
    connect: true,
    step: 1,
    range: {
    'min': 0,
    'max': 1000
    }
    });

    slider.noUiSlider.on("change", (event)=>{
       var pricefrom = document.getElementById('filter[pricefrom]');
       var priceto = document.getElementById('filter[priceto]');
       var price = slider.noUiSlider.get();
       price = price.toString().split(",");
       pricefrom.value=price[0];
       priceto.value=price[1];
        // console.log(slider.noUiSlider.get());
    });

    function calc() {
        var elements = document.querySelectorAll("input[type='checkbox']");
        // console.log(elements);
        var value = '';
        for(var i = 0; i < elements.length; i++) {
            value += elements[i].checked == true && value ? ',' : '';
            value += elements[i].checked == true ? elements[i].value : "";
        }
        console.log(value);
        document.getElementById("filter[categories.id]").value = value;
    }
    </script>
@endpush

@endsection

