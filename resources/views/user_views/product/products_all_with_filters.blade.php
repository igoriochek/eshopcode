@extends('layouts.app')

@section('content')
    @include('header', ['title' => __('names.products')])
    <section class="pt-5">
        <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 order-sm-last order-lg-first">
                        <div class="row mb-4 align-items-center">
                            <div class="col-lg-8">
                                <p class="p-0 m-0 showing-all-results">
                                    {{ __('names.results').': '.$products->count() }}
                                </p>
                            </div>
                            <div class="col-lg-4">
                                <form method="get" action="{{ route("userproducts") }}" id="orderForm">
                                    <input type="hidden" id="orderBy" value="">
                                    {!! Form::select('order', $order_list, $selectedProduct, ['class' => 'form-select selector', 'id' => 'orderSelector']) !!}
                                </form>
                            </div>
                        </div>
                        <hr class="hr mb-5"/>
                        <div class="row">
                            @forelse ($products as $product)
                                <div class="col-lg-6 mt-4 mt-md-5 mt-lg-0 mb-5">
                                    <div class="product">
                                        @if ($product->image)
                                            <div class="product-image-container">
                                                <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image mx-auto"/>
                                                </a>
                                            </div>
                                        @else
                                            <div class="product-image-container">
                                                <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                                    <img src="/images/noimage.jpeg" alt="" class="product-image mx-auto"/>
                                                </a>
                                            </div>
                                        @endif
                                        <div class="product-information">
                                            <div class="product-title-container">
                                                <a class="product-title" href="{{ route('viewproduct', $product->id) }}"
                                                   class="product-image">
                                                    {{ $product->name }}
                                                </a>
                                            </div>
                                            <hr class="product-hr"/>
                                            <div class="d-flex justify-content-between align-items-center my-3">
                                                <div class="product-rating">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <i class="fs-5 product-rating-star @if ($product->average >= $i) fa-solid fa-star
                                                        @elseif ($product->average >= $i - .5) fa-solid fa-star-half-stroke
                                                        @else fa-regular fa-star @endif"></i>
                                                    @endfor
                                                </div>
                                                <div class="product-price">
                                                    @if ($product->discount)
                                                        <span class="product-previous-price product-price-font-family">
                                                            €{{ $product->price }}
                                                        </span>&nbsp
                                                        <span class="product-discounted-price product-price-font-family">
                                                            €{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}
                                                        </span>
                                                    @else
                                                        <span class="product-no-discount-price product-price-font-family">
                                                            €{{ $product->price }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr class="product-hr"/>
                                            <div class="product-button-container">
                                                {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <input type="hidden" name="count" value="1">
                                                    <input type="submit" value="{{__('buttons.addToCart')}}" class="product-add-to-cart">
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                            {{ $products->links() }}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0 order-sm-first order-lg-last">
                        <div class="sidebar">
                            <form method="get" action="{{route("userproducts")}}">
                                <div class="widget">
                                    <div class="widget-title-container">
                                        <h4 class="widget-title">
                                            {{ __('names.search') }}
                                        </h4>
                                    </div>
                                    <div class="search-widget-content">
                                        <input type="text" name="filter[namelike]" class="form-control search-widget-input"
                                               id="filter[namelike]"
                                               placeholder="{{ __('forms.searchPlaceholder') }}" value="{{ $filter["namelike"] ?? '' }}">
                                        <button type="submit" class="search-widget-button">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="widget">
                                    <div class="widget-title-container">
                                        <h4 class="widget-title">
                                            {{ __('names.filterByPrice') }}
                                        </h4>
                                    </div>
                                    <div class="filter-by-price-widget-content">
                                        <fieldset class="form-group">
                                            <div id="range-slider" class="slider mx-2 mb-4 mt-1" wire:ignore></div>
                                            <div class="filter-by-price-button-container">
                                                <div class="d-flex">
                                                    <span>{{ __('names.price')}}:</span>
                                                    <input type="text" id="filter[pricefrom]" name="filter[pricefrom]"
                                                           readonly
                                                           value="{{ $filter["pricefrom"] ?? '0' }}"
                                                           class="border-0 text-end filter-by-price-number" style="max-width: 50px"/>
                                                    <span class="text-center">&nbsp;—&nbsp;</span>
                                                    <input type="text" id="filter[priceto]" name="filter[priceto]" readonly
                                                           value="{{ $filter["priceto"] ?? '0' }}"
                                                           class="border-0 text-start filter-by-price-number" style="max-width: 50px"/>
                                                </div>
                                                <button type="submit" class="filter-by-price-button">
                                                    <i class="fa-solid fa-filter"></i>
                                                    {{ __('buttons.filter') }}
                                                </button>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="categories-widget-content">
                                        @forelse($categories as $category)
                                            <div class="form-check mb-3">
                                                <input class="form-check-input me-3" type="checkbox"
                                                       value="{{ $category->id }}" id="category" onclick="calc();"
                                                @if ($filter && array_key_exists('categories.id', $filter))
                                                    {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                                    @endif
                                                >
                                                <label class="form-check-label" for="categories.id">
                                                    {{ $category->name }}
                                                </label>
                                            </div>
                                        @empty
                                            <span>
                                                <span class="text-muted">{{ __('names.noCategories') }}</span>
                                            </span>
                                        @endforelse
                                        <input type="text" value="{{ implode(",", $selCategories) }}"
                                               name="filter[categories.id]" id="filter[categories.id]" class="d-none">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    </section>

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

