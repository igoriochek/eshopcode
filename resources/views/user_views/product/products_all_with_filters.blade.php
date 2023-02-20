@extends('layouts.app')

@section('content')
    @include('header', ['url' => route("userproducts") ,'title' => __('names.products')])
    <section class="pt-5">
        <div class="container">
                <div class="row">
                    <div class="col-lg-8 mb-5 order-last order-lg-first">
                        <div class="row mb-4 align-items-center">
                            <div class="d-flex justify-content-center gap-2 flex-column col-lg-5">
                                <h3 class="column-title mb-0">{{ __('names.products') }}</h3>
                                <span class="text-muted">{{ __('names.results').': '.$products->total() }}</span>
                            </div>
                            <div class="col-lg-7 d-flex align-items-center gap-3 mt-3 mt-lg-0">
                                <span style="white-space: nowrap;">{{ __('names.orderBy') }}:</span>
                                <form method="get" action="{{ route("userproducts") }}" id="orderForm" class="w-100">
                                    <input type="hidden" id="orderBy" value="">
                                    {!! Form::select('order', $order_list, $selectedOrder,
                                    ['class' => 'form-select selector w-100', 'id' => 'orderSelector', 'style' => 'cursor: pointer']) !!}
                                </form>
                            </div>
                        </div>
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
                                                           {{ number_format($product->price,2) }} €
                                                        </span>&nbsp
                                                        <span class="product-discounted-price product-price-font-family">
                                                            {{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }} €
                                                        </span>
                                                    @else
                                                        <span class="product-no-discount-price product-price-font-family">
                                                            {{ number_format($product->price,2) }} €
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr class="product-hr"/>
                                            <div class="product-button-container">
                                                {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container justify-content-center justify-content-md-between gap-4 gap-md-0']) !!}
                                                    <div class="d-flex">
                                                        <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                                                        {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                                        <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+">
                                                    </div>
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <button type="submit" class="product-add-to-cart">
                                                        <i class="fa-sharp fa-solid fa-cart-plus me-1"></i>
                                                        {{__('buttons.addToCart')}}
                                                    </button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                            {{ $products->onEachSide(1)->links() }}
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0 order-first order-lg-last">
                        <div class="sidebar">
                            <form method="get" action="{{route("userproducts")}}" id="mainForm">
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
                                    <hr>
                                    <div class="categories-widget-content mt-4">
                                        @forelse($categories as $category)
                                            <div class="form-check mb-3">
                                                <label class="form-check-label" style="cursor: pointer">
                                                    <input class="form-check-input me-2" type="checkbox" value="{{ $category->id }}"
                                                           id="category" onclick="calc();" name="filter[categories.id]" style="cursor: pointer; border-radius: 0"
                                                    @if ($filter && array_key_exists('categories.id', $filter))
                                                        {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                                        @endif>
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
                                        <input type="hidden" id="order" name="order" value="{{ $selectedOrder }}">
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
            document.getElementById('orderSelector').onchange = () => {
                addOrderValueToFilter();
                document.getElementById('mainForm').submit();
            }

            const addOrderValueToFilter = () => document.getElementById('order').value = $('#orderSelector').val();

            const rangeSlider = document.getElementById('range-slider');
            const priceFrom = document.getElementById('filter[pricefrom]');
            const priceTo = document.getElementById('filter[priceto]');

            $(() => {
                $(rangeSlider).slider({
                    range: true,
                    min: 0,
                    max: {{ $maxPrice }},
                    values: [{{ $filter["pricefrom"] ?? 0 }}, {{ $filter["priceto"] ?? $maxPrice }}],
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

