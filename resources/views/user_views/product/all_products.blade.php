@extends('layouts.app')

@section('title', __('menu.products'))

@section('content')
<section class="shop-area section-space-y-axis-100">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                @include('flash_messages')
            </div>
            <div class="col-xl-3 col-lg-4 order-lg-1 order-2 pt-10 pt-lg-0">
                @include('user_views.product.filters')
            </div>
            <div class="col-xl-9 col-lg-8 order-lg-2 order-1">
                <div class="product-topbar">
                    <ul>
                        <li class="page-count">
                            {{ __('names.showing') }}
                            <span>
                                @if ($products->currentPage() !== $products->lastPage())
                                {{ ($products->count() * $products->currentPage() - $products->count() + 1).__('–').($products->count() * $products->currentPage()) }}
                                @else
                                @if ($products->total() - $products->count() === 0)
                                {{ $products->count() }}
                                @else
                                {{ ($products->total() - $products->count()).__('–').$products->total() }}
                                @endif
                                @endif
                            </span>
                            {{ __('names.of') }}
                            <span>{{ $products->total() }}</span>
                            {{ __('names.entries') }}
                        </li>
                        <li class="product-view-wrap">
                            <ul class="nav" role="tablist">
                                <li class="grid-view" role="presentation">
                                    <a class="active" id="grid-view-tab" data-bs-toggle="tab" href="#grid-view" role="tab" aria-selected="true">
                                        <i class="fa fa-th"></i>
                                    </a>
                                </li>
                                <li class="list-view" role="presentation">
                                    <a id="list-view-tab" data-bs-toggle="tab" href="#list-view" role="tab" aria-selected="true">
                                        <i class="fa fa-th-list"></i>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="short">
                            {!! Form::select('order', $order_list, $selectedOrder,
                            ['class' => 'nice-select rounded-0', 'id' => 'orderSelector', 'style' => 'cursor: pointer']) !!}
                        </li>
                    </ul>
                </div>
                <div class="tab-content text-charcoal pt-8">
                    <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                        <div class="product-grid-view row">
                            @forelse ($products as $product)
                            @include('user_views.product.grid_product')
                            @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-view" role="tabpanel" aria-labelledby="list-view-tab">
                        <div class="product-list-view row">
                            @forelse ($products as $product)
                            @include('user_views.product.list_product')
                            @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="pagination-area pt-10">
                    <nav aria-label="Page navigation example">
                        <div class="pagination justify-content-end">
                            {{ $products->onEachSide(1)->links() }}
                            </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('css')
<style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
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

    $(document).ready(function() {
        $(rangeSlider).slider({
            range: true,
            min: {
                {
                    $minPrice
                }
            },
            max: {
                {
                    $maxPrice
                }
            },
            values: [{
                {
                    $filter["pricefrom"] ?? $minPrice
                }
            }, {
                {
                    $filter["priceto"] ?? $maxPrice
                }
            }],
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