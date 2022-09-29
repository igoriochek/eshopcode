@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-9 col-md-8 mb-5 order-last order-md-first">
            <div class="row">
                @forelse ($products as $product)
                    <div class="col-lg-4 col-md-6 mt-4 mt-md-0 mt-lg-0 mb-5">
                        <div class="product">
                            {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
                                @if ($product->image)
                                    <div class="product-image-container">
                                        <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image mx-auto"/>
                                        </a>
                                        <div class="product-add-to-cart-wrapper">
                                            <div class="d-flex justify-content-center justify-content-lg-start">
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button type="submit" class="text-decoration-none product-add-to-cart-button" title="Add to Cart">
                                                    <i class="fa-solid fa-bag-shopping"></i>
                                                    <span>{{ __('buttons.addToCart') }}</span>
                                                </button>
                                                <!--<div class="product-add-to-cart-text">{{ __('buttons.addToCart') }}</div>-->
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="product-image-container">
                                        <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                            <img src="/images/noimage.jpeg" alt="" class="product-image mx-auto"/>
                                        </a>
                                        <div class="product-add-to-cart-wrapper">
                                            <div class="d-flex justify-content-center justify-content-lg-start">
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                                <button type="submit" class="text-decoration-none product-add-to-cart-button" title="Add to Cart">
                                                    <i class="fa-solid fa-bag-shopping"></i>
                                                    <span>{{ __('buttons.addToCart') }}</span>
                                                </button>
                                                <!--<div class="product-add-to-cart-text">{{ __('buttons.addToCart') }}</div>-->
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="product-information">
                                    <div class="product-title-container">
                                        <a class="product-title" href="{{ route('viewproduct', $product->id) }}">
                                            {{ $product->name }}
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
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
                                    <div class="w-100 d-flex justify-content-center flex-column mt-3">
                                        <div class="d-flex justify-content-center">
                                            <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                                            {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                            <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+">
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                @empty
                    <span class="text-muted">{{ __('names.noProducts') }}</span>
                @endforelse
                <div class="d-flex justify-content-end">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <aside class="sidebar">
                <form method="get" action="{{route("userproducts")}}">
                    <div class="input-group mb-3 pb-1">
                        <input type="text" name="filter[namelike]" class="form-control product-search-input" id="filter[namelike]" placeholder="{{ __('names.search').'...' }}" value="{{$filter["namelike"] ?? ""}}">
                        <button type="submit" class="btn btn-primary p-2 product-search-button">
                            <i class="fas fa-search m-2"></i>
                        </button>
                    </div>
                    <h5 class="sidebar-title">{{ __('names.filterByPrice') }}</h5>
                    <div class="filter-by-price-widget-content">
                        <fieldset class="form-group">
                            <div id="range-slider" class="slider mb-3 mt-1 mx-1" wire:ignore></div>
                            <div class="filter-by-price-button-container mb-3">
                                <div class="d-flex">
                                    <span>{{ __('names.price')}} (€):</span>
                                    <input type="text" id="filter[pricefrom]" name="filter[pricefrom]"
                                           readonly
                                           value="{{ $filter["pricefrom"] ?? '0' }}"
                                           class="border-0 text-end filter-by-price-number" style="max-width: 40px"/>
                                    <span class="text-center"> — </span>
                                    <input type="text" id="filter[priceto]" name="filter[priceto]" readonly
                                           value="{{ $filter["priceto"] ?? '0' }}"
                                           class="border-0 text-start filter-by-price-number" style="max-width: 40px"/>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <h5 class="sidebar-title">{{ __('names.categories') }}</h5>
                    <ul class="nav nav-list flex-column">
                        @forelse($categories as $category)
                            <div class="nav-link">
                                <input class="form-check-input me-2" type="checkbox" value="{{ $category->id }}"
                                       id="category" onclick="calc();" name="filter[categories.id]"
                                       @if ($filter && array_key_exists('categories.id', $filter))
                                           {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                       @endif>
                                <label class="form-check-label" for="categories.id">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @empty
                            <div class="nav-link">
                                <span class="text-muted">{{ __('names.noCategories') }}</span>
                            </div>
                        @endforelse
                    </ul>
                    <div class="d-flex justify-content-center w-100">
                        <button type="submit" class="btn btn-primary product-filter-button">
                            {{ __('buttons.filter') }}
                        </button>
                    </div>
                </form>
            </aside>
        </div>
    </div>
</div>

    @push('scripts')
        <script>
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

