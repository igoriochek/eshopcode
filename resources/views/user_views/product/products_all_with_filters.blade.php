@extends('layouts.app')

@section('content')
    @include('user_views.section', ['title' => __('names.products')])
    <div id="position">
        <div class="container">
            <ul>
                <li>
                    <a href="{{ url('/home') }}">{{ __('names.home') }}</a>
                </li>
                <li>
                    {{ __('names.products') }}
                </li>
            </ul>
        </div>
    </div>
    <div class="container margin_60">
        <div class="row">
            <div class="col-lg-9">
                <div class="shop-section">
                    <div class="items-sorting">
                        <div class="row">
                            <div class="col-6">
                                <div class="results_shop">
                                    {{ __('Showing ') }}
                                    @if ($products->currentPage() !== $products->lastPage())
                                        {{ ($products->count() * $products->currentPage() - $products->count() + 1).__('–').($products->count() * $products->currentPage()) }}
                                    @else
                                        @if ($products->total() - $products->count() === 0)
                                            {{ 1 }}
                                        @else
                                            {{ ($products->total() - $products->count()).__('–').$products->total() }}
                                        @endif
                                    @endif
                                    {{ __(' of ') }}
                                    {{ $products->total().__(' results') }}
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <form method="get" action="{{ route("userproducts") }}" id="orderForm">
                                        {!! Form::select('order', $order_list, $selectedProduct, ['class' => 'ps-3', 'id' => 'orderSelector']) !!}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Sort By-->
                    <div class="row">
                        @forelse ($products as $product)
                            <div class="shop-item col-lg-4 col-md-6 col-sm-6">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="{{ route('viewproduct', $product->id) }}">
                                                @if ($product->image)
                                                    <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                                @else
                                                    <img src="/images/noimage.jpeg" alt="noimage">
                                                @endif
                                            </a>
                                        </figure>
                                        <div class="item-options clearfix">
                                            {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="count" value="1">
                                            <button type="submit" class="btn_shop border-0">
                                                <span class="icon-basket"></span>
                                                <div class="tool-tip">
                                                    {{ __('buttons.addToCart') }}
                                                </div>
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                    <div class="product_description">
                                        <div class="rating flex-row justify-content-center">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="@if ($product->average >= $i) icon-star voted @else icon-star-empty @endif"></i>
                                            @endfor
                                        </div>
                                        <h3>
                                            <a href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
                                        </h3>
                                        <div class="price">
                                            @if ($product->discount)
                                                <span class="offer">
                                                    €{{ $product->price }}
                                                </span>
                                                €{{ $product->price - round(($product->price * $product->discount->proc / 100), 2) }}
                                            @else
                                                €{{ $product->price }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--End Shop Item-->
                        @empty
                            {{ __('names.noProducts') }}
                        @endforelse
                    </div>
                    <!--End Shop Item-->
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                    <!-- end pagination-->
                </div>
                <!-- End row -->
            </div>
            <!-- End col -->
            <!--Sidebar-->
            <div class="col-lg-3">
                <aside class="sidebar">
                    <form method="get" action="{{ route("userproducts") }}">
                        <div class="widget">
                            <div class="input-group">
                                <input type="text" name="filter[namelike]" class="form-control" id="filter[namelike]"
                                       placeholder="{{ __('names.search') }}..." value="{{ $filter["namelike"] ?? "" }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" style="margin-left:0;">
                                        <i class="icon-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <!-- End Search -->
                        <hr>
                        <div class="widget">
                            <h4>{{ __('names.filters') }}</h4>
                            <fieldset class="form-group">
                                <div id="range-slider" class="slider mx-2 mt-5 mb-2" wire:ignore>
                                    <div class="ui-slider-handle position-relative" style="transform: translate(7px, 1px)">
                                        <input type="text" id="filter[pricefrom]" name="filter[pricefrom]" readonly
                                               value="{{ $filter["pricefrom"] ?? '0' }}" style="position: absolute; top: -150%; left: -650%; border: none; width: 40px; background: #e04f67; text-align: center; border-radius: 4px; color: #fff"/>
                                    </div>
                                    <div class="ui-slider-handle position-relative" style="transform: translate(7px, -15px)">
                                        <input type="text" id="filter[priceto]" name="filter[priceto]" readonly
                                               value="{{ $filter["priceto"] ?? '0' }}" style="position: absolute; top: -150%; left: -650%; border: none; width: 40px; background: #e04f67; text-align: center; border-radius: 4px; color: #fff"/>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <!-- End widget -->
                        <hr>
                        <div class="widget" id="cat_shop">
                            <h4 class="mb-3">{{ __('names.categories') }}</h4>
                            <ul>
                                @forelse($categories as $category)
                                    <li class="mb-3">
                                        <label class="container_check">
                                            {{ $category->name }}
                                            <input type="checkbox" value="{{$category->id}}" id="category" onclick="calc();"
                                            @if ($filter && array_key_exists('categories.id', $filter))
                                                {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                                @endif
                                            >
                                            <span class="checkmark"></span>
                                        </label>
                                    </li>
                                @empty
                                    <li>{{ __('names.noCategories') }}</li>
                                @endforelse
                            </ul>
                            <input type="text" value="{{ implode(",", $selCategories) }}"
                                   name="filter[categories.id]" id="filter[categories.id]" class="d-none">
                        </div>
                        <!-- End widget -->
                        <hr>
                        <button type="submit" class="filter-button" data-text-original="{{ __('buttons.filter') }}">
                            {{ __('buttons.filter') }}
                        </button>
                        <hr>
                        <div class="widget related-products">
                            <h4>{{ __('names.topRated') }}</h4>
                            @foreach($products->sortByDesc('average')->take(3) as $productByRating)
                                <div class="post">
                                    <figure class="post-thumb">
                                        <a href="{{ route('viewproduct', $product->id) }}">
                                            @if ($product->image)
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                            @else
                                                <img src="/images/noimage.jpeg" alt="noimage">
                                            @endif
                                        </a>
                                    </figure>
                                    <h5>
                                        <a href="{{ route('viewproduct', $productByRating->id) }}">{{ $productByRating->name }}</a>
                                    </h5>
                                    <div class="rating flex-row justify-content-start">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="@if ($productByRating->average >= $i) icon-star voted @else icon-star-empty @endif"></i>
                                        @endfor
                                    </div>
                                    <div class="price">
                                        @if ($productByRating->discount)
                                            €{{ $productByRating->price - round(($productByRating->price * $productByRating->discount->proc / 100), 2) }}
                                        @else
                                            €{{ $productByRating->price }}
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </form>
                </aside>
            </div>
            <!--Sidebar-->
        </div>
    </div>
    @push('scripts')
        <script>
            const orderForm = document.getElementById('orderForm');
            const orderSelector = document.getElementById('orderSelector');

            orderSelector.onchange = () => orderForm.submit();

            const rangeSlider = document.getElementById('range-slider');
            const priceFrom = document.getElementById('filter[pricefrom]');
            const priceTo = document.getElementById('filter[priceto]');

            $(() => {
                $(rangeSlider).slider({
                    range: true,
                    min: 0,
                    max: 1000,
                    values: [{{ $filter["pricefrom"] ?? 0 }}, {{ $filter["priceto"] ?? 1000 }}],
                    slide: (event, ui) => {
                        $(priceFrom).val(ui.values[0]);
                        $(priceTo).val(ui.values[1]);
                    }
                });
                $(priceFrom).val($(rangeSlider).slider("values", 0));
                $(priceTo).val($(rangeSlider).slider("values", 1));
            });

            function calc() {
                var elements = document.querySelectorAll("input[type='checkbox']");
                // console.log(elements);
                var value = '';
                for (var i = 0; i < elements.length; i++) {
                    value += elements[i].checked == true && value ? ',' : '';
                    value += elements[i].checked == true ? elements[i].value : "";
                }
                //console.log(value);
                document.getElementById("filter[categories.id]").value = value;
            }
        </script>
    @endpush
@endsection

