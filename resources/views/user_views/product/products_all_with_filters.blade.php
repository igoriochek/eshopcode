@extends('layouts.app')

@section('content')
    <section>
        <div class="container mb-30">
            <div class="row">
                <div class="col-lg-4-5">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <h1>{{__('names.products')}}</h1>
                            @if(!empty($products))
                                <p>We found <strong class="text-brand">{{count($products)}}</strong> items for you!</p>
                            @endif
                        </div>
                    </div>
                    <div class="row product-grid">
                        @if(!empty($products))
                            @forelse($products as $product)
                                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                    <div class="product-cart-wrap mb-30 m">
                                        <div class="product-img-action-wrap mh-100 ">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{route('viewproduct', $product->id)}}">
                                                    <img class="default-img" src="{{$product->image}}"
                                                         alt="{{$product->name}}"/>
                                                </a>
                                            </div>
                                            <div class="product-content-wrap">
                                                <div class="product-category">
                                                    @forelse($product->categories as $c)
                                                        <a href="{{route('innercategories', $c->id)}}"
                                                           class="card-link">{{$c->name}}</a>
                                                    @empty
                                                        ---{{__('names.noCategories')}}---
                                                    @endforelse
                                                </div>
                                                <h2>
                                                    <a href="{{route('viewproduct', $product->id)}}">{{$product->name}}</a>
                                                </h2>
                                                <div class="product-rate-cover">
                                                    {{__('names.rating')}}<span
                                                        class="font-small ml-5 text-muted"> {{$product->rating}}</span>
                                                </div>
                                                <div class="product-card-bottom text-center">
                                                    <div class="product-price">
                                                        <span>{{$product->price}}</span>
                                                    </div>

                                                </div>
                                                <div class="product-card-bottom">
                                                    <div class="add-cart d-flex">
                                                        <div class="col-7">
                                                            {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}

                                                            {!! Form::number('count', "1", ['class' => 'form-control col-lg-5 col-sm-5', "minlength"=>"3", "maxlength"=>"5", "size"=>"5"]) !!}

                                                        </div>
                                                        <div class="col-5 ml-5">
                                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                                            <input class="add h-100" type="submit"
                                                                   value="{{__('buttons.add')}}">
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                {{__('names.noProducts')}}
                            @endforelse
                            <div class="pagination-area mt-20 mb-20">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-start">
                                        {{$products->links()}}
                                    </ul>
                                </nav>
                            </div>

                        @endif
                    </div>
                </div>
                <div class="col-lg-1-5 primary-sidebar sticky-sidebar pt-10">
                    <div class="sidebar-widget price_range range mb-30">
                        <h5 class="section-title style-1 mb-30">Fill by price</h5>
                        <div class="price-filter">
                            <div class="price-filter-inner">
                                <div class="d-flex justify-content-between">
                                    <form method="get" action="{{route("userproducts")}}">
                                        <div class="form-group">
                                            <label for="filter[namelike]">{{__('names.productName')}}</label>
                                            <input type="text" name="filter[namelike]" class="form-control"
                                                   id="filter[namelike]"
                                                   placeholder="" value="{{$filter["namelike"] ?? ""}}">
                                         </div>
                                        <fieldset class="form-group">
                                            <div class="price_filter">
                                                <label for="amount">{{__('names.price')}} :</label>
                                                <div id="slider" class="slider" wire:ignore></div>
                                                <div>&nbsp;</div>
                                                <div><label for="amount">{{__('names.from')}} :</label>
                                                    <input type="text" id="filter[pricefrom]" name="filter[pricefrom]"
                                                           readonly
                                                           value="{{$filter["pricefrom"] ?? ""}}"/></div>
                                                <div><label for="amount">{{__('names.to')}}
                                                        :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                    <input type="text" id="filter[priceto]" name="filter[priceto]"
                                                           readonly
                                                           value="{{$filter["priceto"] ?? ""}}"/></div>

                                                <div><label for="order">{{__('names.orderBy')}}:</label>
                                                    {!! Form::select('order', $order_list, $selectedProduct, ['class' => 'form-control custom-select']) !!}
                                                </div>
                                            </div>
                                        </fieldset>
                                        <input class="add" type="submit" value="{{__('buttons.filter')}}">
                                    </form>
                                </div>
                            </div>
                        </div>
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
                start: [{{$filter["pricefrom"] ?? 0}}, {{$filter["priceto"] ?? 1000}}],
                connect: true,
                step: 1,
                range: {
                    'min': 0,
                    'max': 1000
                }
            });

            slider.noUiSlider.on("change", (event) => {
                var pricefrom = document.getElementById('filter[pricefrom]');
                var priceto = document.getElementById('filter[priceto]');
                var price = slider.noUiSlider.get();
                price = price.toString().split(",");
                pricefrom.value = price[0];
                priceto.value = price[1];
                // console.log(slider.noUiSlider.get());
            });

        </script>
    @endpush
@endsection

