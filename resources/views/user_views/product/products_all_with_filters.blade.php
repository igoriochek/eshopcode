@extends('layouts.app')

@section('content')
    @include('layouts.navi.page-banner',[
     'secondPageLink' => 'products',
    'secondPageName' => __('names.products'),
    'hasThirdPage' => false
])
    <main class="main-wrapper">
        <div class="shop-section section-padding-01">
            <div class="container">
                <div class="row gy-10">

                    <div class="shop-main-content">

                        <div class="archive-filter-bars">
                            <div class="archive-filter-bar">
                                <p>
                                    {{ __('names.showing') }}
                                    @if ($products->currentPage() !== $products->lastPage())
                                        {{ ($products->count() * $products->currentPage() - $products->count() + 1).__('–').($products->count() * $products->currentPage())}}
                                    @else
                                        @if ($products->total() - $products->count() === 0)
                                            {{ 1 }}
                                        @else
                                            {{ ($products->total() - $products->count()).__('–').$products->total() }}
                                        @endif
                                    @endif
                                    {{ __('names.of') }}
                                    {{ $products->total().' '.__('names.results') }}
                                </p>
                            </div>
                            <div class="archive-filter-bar">
                                <div class="filter-bar-wrapper">
                                    <span>{{__('names.view')}}</span>
                                    <ul class="nav">
                                        <li><button class="active" data-bs-toggle="tab" data-bs-target="#grid"><i class="fas fa-th"></i></button></li>
                                        <li><button data-bs-toggle="tab" data-bs-target="#list"><i class="fas fa-bars"></i></button></li>
                                    </ul>
                                    <div class="filter-select filter-select-icon">
                                        <form method="get" action="{{ route("userproducts") }}" id="orderForm">
                                            <input type="hidden" id="orderBy" value="">
                                            {!! Form::select('order', $order_list, $selectedProduct, ['class' => 'edumall-nice-select','data-select' => '{&quot;fieldLabel&quot;:&quot;Sort by:&quot;}', 'id' => 'orderSelector']) !!}
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="grid">
                                <div class="row gy-6">
                                    @include('user_views.product.products_grid')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="list">
                                @include('user_views.product.products_list')
                            </div>
                        </div>

                        <div class="page-pagination d-flex justify-content-center">
                            {{ $products -> links() }}
                        </div>

                    </div>

                    <div class="shop-main-sidebar">

                        <div class="sidebar-widget-wrapper">

                            <form method="get" action="{{route("userproducts")}}">

                                <div class="sidebar-widget-wrap bg-color-10">
                                    <h4 class="sidebar-widget-wrap__title">{{__('names.search')}}</h4>
                                    <div class="header-serach">
                                        <input type="text" name="filter[namelike]" class="header-serach__input"
                                               id="filter[namelike]" placeholder="{{ __('names.search').'...' }}" value="{{$filter["namelike"] ?? ""}}">
                                        <button type="submit" class="header-serach__btn">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="sidebar-widget-wrap bg-color-10 mt-4">
                                    <h4 class="sidebar-widget-wrap__title">{{ __('names.filterByPrice') }}</h4>
                                    <div class="widget-filter__wrapper">
                                        <div class="widget-filter__range-slider">
                                            <fieldset class="form-group">
                                                <div id="range-slider" class="slider mb-3 mt-1 mx-1" wire:ignore></div>
                                                <div class="filter-by-price-button-container mb-3">
                                                    <div class="d-flex">
                                                        <span>{{ __('names.price')}} (€):</span>
                                                        <input type="text" id="filter[pricefrom]" name="filter[pricefrom]"
                                                               readonly
                                                               value="{{ $filter["pricefrom"] ?? '0' }}"
                                                               class="border-0 text-end filter-by-price-number" style="max-width: 50px; background: none"/>
                                                        <span class="text-center"> — </span>
                                                        <input type="text" id="filter[priceto]" name="filter[priceto]" readonly
                                                               value="{{ $filter["priceto"] ?? '0' }}"
                                                               class="border-0 text-start filter-by-price-number" style="max-width: 50px; background: none"/>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="widget-filter__range-btn d-flex justify-content-end">
                                                <button type="submit" id="filterSubmit" class="btn btn-white btn-hover-primary">{{__('buttons.filter')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="sidebar-widget-wrap bg-color-10 mt-4">
                                    <h4 class="sidebar-widget-wrap__title">{{__('names.filterByCategory')}}</h4>
                                    <div class="widget-filter">
                                        <div class="widget-filter__wrapper">
                                            <ul class="widget-filter__list">
                                                @forelse($categories as $category)
                                                    <li>
                                                        <div class="widget-filter__item">
                                                            <input type="checkbox"  value="{{ $category->id }}" id="category{{ $category->id }}" onclick="calc();"
                                                            @if ($filter && array_key_exists('categories.id', $filter))
                                                                {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                                                @endif>
                                                            <label for="category{{ $category->id }}">
                                                                {{ $category->name }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <span class="text-muted">{{ __('names.noCategories') }}</span>
                                                @endforelse
                                                <input type="text" value="{{ implode(",", $selCategories) }}"
                                                       name="filter[categories.id]" id="filter[categories.id]" class="d-none">
                                            </ul>
                                        </div>
                                        <div class="widget-filter__range-btn d-flex justify-content-end pt-4">
                                            <button type="submit" id="filterSubmit" class="btn btn-white btn-hover-primary">{{__('buttons.filter')}}</button>
                                        </div>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>


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

