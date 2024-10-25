@extends('layouts.app')

@section('title', __('menu.products'))

@section('content')
<!-- product tab start -->
<div class="product-tab bg-white pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                @include('flash_messages')
            </div>
            <div class="col-lg-9">
                <div class="grid-nav-wraper bg-light mb-5">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <nav class="shop-grid-nav">
                                <ul class="nav nav-pills align-items-center" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                            href="#pills-home" role="tab" aria-controls="pills-home"
                                            aria-selected="true"><i class="ion-grid"></i></a>
                                    </li>
                                    <li class="nav-item mr-0">
                                        <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                            href="#pills-profile" role="tab" aria-controls="pills-profile"
                                            aria-selected="false"><i class="ion-android-menu"></i></a>
                                    </li>
                                    <li> <span class="total-products text-capitalize">
                                            {{ __('names.thereAre') . ' ' . $products->total() . ' ' . __('names.products') }}</span>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="shop-grid-button d-flex align-items-center justify-content-end">
                                <span class="sort-by">{{ __('names.sortBy') }}:</span>
                                {!! Form::select('order', $order_list, $selectedOrder, [
                                'class' => 'btn-dropdown rounded d-flex justify-content-between shop-grid-menu',
                                'id' => 'orderSelector',
                                'style' => 'cursor: pointer; height: 30px;',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- product-tab-nav end -->
                <div class="tab-content" id="pills-tabContent">
                    <!-- first tab-pane -->
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab">
                        <div class="row">
                            @forelse ($products as $product)
                            @include('user_views.product.product_grid')
                            @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                        </div>
                        <nav class="pagination-section bg-light my-5">
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-6 text-center text-sm-start  mb-3 mb-sm-0">
                                    <p class="text">{{ __('names.showing') }}
                                        @if ($products->currentPage() !== $products->lastPage())
                                        {{ $products->count() * $products->currentPage() - $products->count() + 1 . __('–') . $products->count() * $products->currentPage() }}
                                        @else
                                        @if ($products->total() - $products->count() === 0)
                                        {{ $products->count() }}
                                        @else
                                        {{ $products->total() - $products->count() . __('–') . $products->total() }}
                                        @endif
                                        @endif
                                        {{ __('names.of') }}
                                        {{ $products->total() . ' ' . __('names.entries') }}
                                    </p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="pagination justify-content-center justify-content-sm-end">
                                        {{ $products->onEachSide(1)->links() }}
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <!-- second tab-pane -->
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="grid-list-wrapper overflow-hidden">
                            @forelse ($products as $product)
                            @include('user_views.product.product_list')
                            @empty
                            <span class="text-muted">{{ __('names.noProducts') }}</span>
                            @endforelse
                        </div>
                        <nav class="pagination-section bg-light my-5">
                            <div class="row align-items-center">
                                <div class="col-12 col-sm-6 text-center text-sm-start  mb-3 mb-sm-0">
                                    <p class="text">{{ __('names.showing') }}
                                        @if ($products->currentPage() !== $products->lastPage())
                                        {{ $products->count() * $products->currentPage() - $products->count() + 1 . __('–') . $products->count() * $products->currentPage() }}
                                        @else
                                        @if ($products->total() - $products->count() === 0)
                                        {{ $products->count() }}
                                        @else
                                        {{ $products->total() - $products->count() . __('–') . $products->total() }}
                                        @endif
                                        @endif
                                        {{ __('names.of') }}
                                        {{ $products->total() . ' ' . __('names.entries') }}
                                    </p>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="pagination justify-content-center justify-content-sm-end">
                                        {{ $products->onEachSide(1)->links() }}
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-3rem">
                @include('user_views.product.filters')
            </div>
        </div>
    </div>
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

    $(document).ready(function() {
        $(rangeSlider).slider({
            range: true,
            min: {{$minPrice}},
            max: {{$maxPrice}},
            values: [{{$filter['pricefrom'] ?? $minPrice}}, 
            {{$filter['priceto'] ?? $maxPrice}}],
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