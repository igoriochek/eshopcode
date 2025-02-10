@extends('layouts.app')

@section('title', __('menu.products'))

@section('content')
<div class="shop_area mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12">
                <div class="shop_toolbar_wrapper">
                    <div class="shop_toolbar_btn">
                        <button data-role="grid_3" type="button" class="active btn-grid-3" data-bs-toggle="tooltip"
                            title="3"></button>

                        <button data-role="grid_4" type="button" class=" btn-grid-4" data-bs-toggle="tooltip"
                            title="4"></button>

                        <button data-role="grid_list" type="button" class="btn-list" data-bs-toggle="tooltip"
                            title="List"></button>
                    </div>
                    <div class=" niceselect_option d-flex align-items-center">
                        <p class="mb-0">{{ __('names.sortBy') }}:</p>
                        <form class="select_option" action="#">
                            {!! Form::select('order', $order_list, $selectedOrder, [
                            'id' => 'orderSelector',
                            'class' => 'width: auto !important; justify-content: flex-start !important;',
                            ]) !!}
                        </form>
                    </div>
                    <div class="page_amount">
                        <p>{{ __('names.showing') }}
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
                </div>
                <div class="row shop_wrapper">
                    @forelse ($products as $product)
                    @include('user_views.product.product_grid')
                    @empty
                    <span class="text-muted">{{ __('names.noProducts') }}</span>
                    @endforelse
                </div>

                <div class="shop_toolbar t_bottom">
                    <div class="pagination">
                        {{ $products->onEachSide(1)->links() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12">
                @include('user_views.product.filters')
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const orderSelector = document.getElementById('orderSelector');
    const customSelect = document.querySelector('.list');

    customSelect.value = document.getElementById('order').value;

    console.log(orderSelector);
    console.log(customSelect);

    if (customSelect) {
        const selectItems = customSelect.querySelectorAll('li');
        selectItems.forEach(function(item) {
            item.addEventListener('click', function() {
                const selectedValue = this.getAttribute('data-value');
                orderSelector.value = selectedValue;
                addOrderValueToFilter();
                document.getElementById('mainForm').submit();
            })
        })
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
            values: [
                {{$filter['pricefrom'] ?? $minPrice}},
                {{$filter['priceto'] ?? $maxPrice}}
            ],
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