@extends('layouts.app')

@section('title', __('menu.products'))

@section('content')
<section class="section-category padding-t-50 mb-24">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bb-category-6-colum owl-carousel">
                    @php $counter = 0; @endphp
                    @forelse($categories as $category)
                    @php $itemNumber = ($counter % 4) + 1; $counter++; @endphp
                    <div class="bb-category-box category-items-{{ $itemNumber }}" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="500">
                        <div class="category-sub-contact">
                            <h5><a href="{{ route('innercategories', ['category_id' => $category->id]) }}">{{ $category->name }}</a></h5>
                            <p>{{ count($category->products) }} {{ __('names.items') }}</p>
                        </div>
                    </div>
                    @empty
                    <span class="text-muted">{{ __('names.noCategories') }}</span>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>



<section class="section-shop padding-b-50">
    <div class="container">
        <div class="row mb-minus-24">
            <div class="col-lg-3 col-12 mb-24">
                @include('user_views.product.filters')
            </div>
            <div class="col-lg-9 col-12 mb-24">
                <div class="bb-shop-pro-inner">
                    <div class="row mb-minus-24">
                        <div class="col-12">
                            <div class="bb-pro-list-top">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="bb-bl-btn">
                                            <button type="button" class="grid-btn btn-grid-100 active">
                                                <i class="ri-apps-line"></i>
                                            </button>
                                            <button type="button" class="grid-btn btn-list-100">
                                                <i class="ri-list-unordered"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="bb-select-inner">
                                            <span class="sort-by">{{ __('names.sortBy') }}:</span>
                                            <div class="custom-select">
                                                {!! Form::select('order', $order_list, $selectedOrder, [
                                                'id' => 'orderSelector',
                                                'style' => 'width: auto !important; justify-content: flex-start !important;',
                                                ]) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @forelse ($products as $product)
                        @include('user_views.product.product_grid')
                        @empty
                        <span class="text-muted">{{ __('names.noProducts') }}</span>
                        @endforelse
                        <div class="col-12">
                            <div class="bb-pro-pagination">
                                <p>
                                    {{ __('names.showing') }}
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
                                <div class="bb-pro-pagination">
                                    {{ $products->onEachSide(1)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


<style>
    .product-widget .title {
        text-transform: none !important;
    }

    .form-control {
        font-size: 1.2rem;
        border: 2px solid #0090f0;
        border-bottom-left-radius: 3rem;
        border-top-left-radius: 3rem;
        border-bottom-right-radius: 0rem;
        border-top-right-radius: 0rem;
    }

    .shop-submenu {
        width: 100%;
        margin-left: 10px;
        margin-right: 10px;
    }

    .ui-state-default,
    .ui-widget-content .ui-state-default {
        border-radius: 100%;
        background-color: #0090f0;
        border-color: #0090f0;
        top: -0.6rem;
    }

    .ui-widget.ui-widget-content {
        border: 0px solid #c5c5c5;
    }

    .ui-widget-content {
        background: #fafafa;
    }

    .ui-widget-header {
        background: #0090f0;
    }

    .ui-slider-horizontal {
        height: 0.5rem;
    }

    .slider {
        margin-bottom: 0.25rem !important;
    }

    .ui-state-focus,
    .ui-widget-content .ui-state-focus {
        border: 0px solid #0090f0 !important;
        background: #0090f0;
    }

    .price-input {
        border: none;
        outline: none;
        background-color: transparent;
        box-shadow: none;
    }

    .price-input:focus {
        outline: none;
        background-color: transparent;
        box-shadow: none;
    }

    .bb-pro-list-top .bb-select-inner .custom-select {
        width: auto !important;
        justify-content: flex-start !important;
        margin-right: 10px !important;
        margin-left: 3px;
    }

    .bb-pro-list-top .bb-select-inner .custom-select::after {
        right: 0px !important;
    }

    .pagination .page-item.active .page-link {
        background-color: #3d4750 !important;
        color: #fff !important;
        transition: all 0.3s ease-in-out !important;
        width: 32px !important;
        height: 32px !important;
        padding: 0 !important;
        font-weight: 300 !important;
        line-height: 32px !important;
        font-size: 15px !important;
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        text-align: center !important;
        vertical-align: top !important;
        -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        border-radius: 10px !important;
        border: 1px solid #eee !important;
    }

    .pagination .page-item .page-link {

        background: #f8f8fb;
        transition: all 0.3s ease-in-out !important;
        width: 32px !important;
        height: 32px !important;
        padding: 0 !important;
        font-weight: 300 !important;
        line-height: 32px !important;
        font-size: 15px !important;
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        text-align: center !important;
        vertical-align: top !important;
        -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        border-radius: 10px !important;
        border: 1px solid #eee !important;
        &:hover {
            background-color: #3d4750 !important;
            color: #fff !important;
        }
    }
</style>

@push('scripts')
<script>

    console.log(document.getElementById('order').value);

    const orderSelector = document.getElementById('orderSelector');
    const customSelect = document.querySelector('.select .select-options');

    customSelect.value = document.getElementById('order').value;

    if(customSelect) { 
        const selectItems = customSelect.querySelectorAll('li');
        selectItems.forEach(function (item) {
            item.addEventListener('click', function () {
                const selectedValue = this.getAttribute('rel');
                orderSelector.value = selectedValue;
                addOrderValueToFilter();
                document.getElementById('mainForm').submit();
            })
        })
    }

    const addOrderValueToFilter = () => document.getElementById('order').value = orderSelector.value;

    const selectedText = document.querySelector('.custom-select .select .custom-select');
    const options = document.querySelectorAll('.custom-select .select-options li');

    const selectedOptionText = orderSelector.options[orderSelector.selectedIndex].textContent;
    if (selectedText) {
        selectedText.textContent = selectedOptionText;
    }

    options.forEach(li => {
        li.classList.remove('selected'); 
        if (li.getAttribute('rel') === orderSelector.value) {
        li.classList.add('selected');
        }
    });

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