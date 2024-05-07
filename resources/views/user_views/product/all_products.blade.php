@extends('layouts.app')

@section('title', __('menu.products'))

@section('content')
    <div class="axil-shop-area axil-section-gap bg-color-white">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include('flash_messages')
                </div>
                <div class="col-lg-3">
                    @include('user_views.product.filters')
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="axil-shop-top mb--40">
                                <div class="category-select align-items-center justify-content-lg-end justify-content-between">
                                    <!-- Start Single Select  -->
                                    <span class="filter-results">
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
                                    </span>
                                    {!! Form::select('order', $order_list, $selectedOrder,
                                        ['class' => 'single-select', 'id' => 'orderSelector', 'style' => 'cursor: pointer']) !!}
                                    <!-- End Single Select  -->
                                </div>
                                <div class="d-lg-none">
                                    <button class="product-filter-mobile filter-toggle">
                                        <i class="fas fa-filter"></i> 
                                        {{ __('buttons.filter') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End .row -->
                    <div class="row row--15">
                        @forelse ($products as $product)
                            @include('user_views.product.product')
                        @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                        @endforelse
                    </div>
                    <div class="text-center pt--20">
                        {{ $products->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
@endsection

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
                min: {{ $minPrice }},
                max: {{ $maxPrice }},
                values: [{{ $filter["pricefrom"] ?? $minPrice }}, {{ $filter["priceto"] ?? $maxPrice }}],
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