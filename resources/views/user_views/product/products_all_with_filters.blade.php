@extends('layouts.app')

@section('title', __('menu.products'))

@section('content')
    <div class="shop-area ptb-70">
        <div class="container">
            <div class="row gap-5 gap-lg-0">
                <div class="col-lg-9">
                    <div class="shop-top-shorting-area">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-6">
                                <div class="shop-shorting-left-content">
                                    <ul>
                                        <li>
                                            {!! Form::select('order', $order_list, $selectedOrder,
                                                ['class' => 'form-select', 'id' => 'orderSelector', 'style' => 'cursor: pointer']) !!}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="shop-shorting-right-content">
                                    <ul>
                                        <li>
                                            <div class="grid-view-content">
                                                <div class="view-list-row d-none d-lg-block d-md-block">
                                                    <div class="view-column">
                                                        <a href="#" class="icon-view-three active">
                                                            <img src="{{ asset('template/images/icon/grid-icon.svg') }}" alt="icon">
                                                        </a>
                                                        <a href="#" class="view-grid-switch">
                                                            <img src="{{ asset('template/images/icon/list-icon.svg') }}" alt="icon">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <p>
                                                {{ __('names.showing') }}
                                                @if ($products->currentPage() !== $products->lastPage())
                                                    {{ ($products->count() * $products->currentPage() - $products->count() + 1).__('–').($products->count() * $products->currentPage()) }}
                                                @else
                                                    @if ($products->total() - $products->count() === 0)
                                                        {{ $products->count() }}
                                                    @else
                                                        {{ ($products->total() - $products->count()).__('–').$products->total() }}
                                                    @endif
                                                @endif
                                                {{ __('names.of') }}
                                                {{ $products->total().' '.__('names.entries') }}
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="products-collections-filter" class="row justify-content-center">
                        @forelse ($products as $product)
                            @include('user_views.product.product')
                        @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                        @endforelse
                    </div>
                    <div class="default-pagination mt-20">
                        {{ $products->onEachSide(1)->links() }}
                    </div>
                </div>
                <div class="col-lg-3">
                    @include('user_views.product.filters')
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .pagination {
            display: flex;
            justify-content: center
        }

        .pagination .page-item.active .page-link {
            background-color: #a10909;
            border-color: transparent;
            border-radius: 100%;
            font-weight: bold;
        }

        .pagination .page-item .page-link {
            border-color: transparent;
            color: #111111;
            border-radius: 100%;

            &:hover {
                color: #fff;
            }
        }

        .default-pagination ul li a {
            display: flex;
            justify-content: center;
            align-items: center;
            line-height: 30px;
        }

        .default-pagination ul li span {
            text-align: center;
            height: 40px;
            width: 40px;
            line-height: 30px;
            background-color: var(--whiteColor);
            display: inline-block;
            font-family: var(--headingFont);
            transition: var(--transition);
            color: var(--headingColor);
            font-size: 18px;
            font-weight: 600;
            position: relative;
            z-index: 1;
        }

        .ui-widget.ui-widget-content {
            border: none;
            background-color: rgb(230, 230, 230);
            height: 5px;
        }

        .ui-state-default, .ui-widget-content .ui-state-default {
            border: none;
            background: #a10909;
            font-weight: normal;
            color: #a10909;
            border-radius: 100%;
            width: 15px;
            height: 15px;

            &:focus {
                outline: none;
            }
        }

        .ui-widget-header {
            border: none;
            background: #a10909;
            color: #a10909;
            font-weight: bold;
        }
    </style>
@endpush

@push('scripts')
    <script>
        const orderSelector = document.getElementById('orderSelector');

        orderSelector.onchange = () => {
            console.log(document.getElementById('order'));
            addOrderValueToFilter();
            document.getElementById('mainForm').submit();
        }

        const addOrderValueToFilter = () => document.getElementById('order').value = orderSelector.value;

        const rangeSlider = document.getElementById('range-slider');
        const priceFrom = document.getElementById('filter[pricefrom]');
        const priceTo = document.getElementById('filter[priceto]');

        $(document).ready(function () {
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
            var value = '';

            for (var i = 0; i < elements.length; i++) {
                value += elements[i].checked == true && value ? ',' : '';
                value += elements[i].checked == true ? elements[i].value : "";
            }

            document.getElementById("filter[categories.id]").value = value;
        }
    </script>
@endpush