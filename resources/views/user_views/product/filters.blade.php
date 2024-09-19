<form method="get" action="{{ route('userproducts') }}" id="mainForm">

    <div class="sidebar-area style-2">
        <div class="widgets-searchbox widgets-area py-6 mb-9">
            <form id="widgets-searchbox" action="#">
                <input class="input-field" type="text" name="filter[namelike]" id="filter[namelike]"
                    placeholder="{{ __('names.search') . '...' }}" value="{{ $filter['namelike'] ?? '' }}">
                <button class="widgets-searchbox-btn" type="submit">
                    <i class="pe-7s-search"></i>
                </button>
            </form>
        </div>


        <div class="widgets-area widgets-filter mb-9">
            <h2 class="widgets-title mb-5">{{ __('names.filterByPrice') }}</h2>

            <div class="tp-shop-widget-content">
                <div class="tp-shop-widget-filter">
                    <div class="irs-line">
                        <div id="range-slider" class="slider mb-3 mt-1 mx-1" wire:ignore></div>
                    </div>
                    <div class="tp-shop-widget-filter-info align-items-center">
                        <ul class="price-list d-flex justify-content-between list-unstyled">
                            <li>
                                <span>{{ __('names.from') }}:</span>
                                <input type="text" id="filter[pricefrom]" name="filter[pricefrom]" readonly
                                    value="{{ $filter['pricefrom'] ?? '0' }}"
                                    class="border-0 filter-by-price-number px-0"
                                    style="max-width: 40px; outline: none; background-color: #f9f9f9;" />
                            </li>
                            <li>
                                <span>{{ __('names.to') }}:</span>
                                <input type="text" id="filter[priceto]" name="filter[priceto]" readonly
                                    value="{{ $filter['priceto'] ?? '0' }}" class="border-0 filter-by-price-number px-0"
                                    style="max-width: 40px; outline: none; background-color: #f9f9f9;" />
                            </li>
                        </ul>
                        <div class="d-flex justify-content-start pt-4">
                            <button type="submit"
                                class="btn btn-custom-size lg-size btn-primary">{{ __('buttons.filter') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widgets-area mb-9">
            <h2 class="widgets-title mb-5">{{ __('names.categories') }}</h2>
            <div class="widgets-item">
                <ul class="widgets-checkbox">
                    @forelse ($categories as $category)
                        <li>
                            <input class="input-checkbox" type="checkbox" id="category.{{ $category->id }}"
                                value="{{ $category->id }}" onclick="calc();"
                                @if ($filter && isset($filter['categories.id'])) {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : '' }} @endif>
                            <label class="label-checkbox mb-0" for="category.{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </li>
                    @empty
                        <li>
                            <span class="text-muted">{{ __('names.noCategories') }}</span>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>

        <input type="hidden" id="filter[categories.id]" name="filter[categories.id]"
            value="{{ implode(',', $selCategories) }}">
        <input type="hidden" id="order" name="order" value="{{ $selectedOrder }}">
    </div>
</form>

<style>
    .btn-custom-size.lg-size {
        width: auto;
        padding: 0px 15px;
    }

    .ui-slider-horizontal {
        height: 4px;
    }

    .ui-widget.ui-widget-content {
        border: 0px;
        background-color: #e1e4e9;
    }

    .ui-slider-horizontal .ui-slider-range {
        background: #ed5565;
    }

    .ui-state-default,
    .ui-widget-content .ui-state-default,
    .ui-widget-header .ui-state-default,
    .ui-button,
    html .ui-button.ui-state-disabled:hover,
    html .ui-button.ui-state-disabled:active {
        background-color: #f9f9f9;
        border: 3px solid #ee3231;
        border-radius: 100%;
        cursor: pointer;
        top: -5px;
        width: 18px;
        height: 18px;
    }

    .irs-line {
        padding-top: 5px;
        padding-left: 5px;
        padding-right: 5px;
    }
</style>
