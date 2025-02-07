<form method="get" action="{{ route('userproducts') }}" id="mainForm">
    <aside class="sidebar_widget">
        <div class="widget_inner">
            <div class="widget_list widget_categories">
                <h3>{{ __('names.search') }}</h3>
                <div class="search_container">
                    <div class="search_box">
                        <input type="text" name="filter[namelike]" id="filter[namelike]"
                            placeholder="{{ __('names.product') . '...' }}" value="{{ $filter['namelike'] ?? '' }}">
                        <button type="submit"><i class="icon-search"></i></button>
                    </div>
                </div>
            </div>
            <div class="widget_list widget_filter">
                <h3>{{ __('names.filterByPrice') }}</h3>
                <div class="range-slider">
                    <div id="range-slider" class="slider mx-1" wire:ignore></div>
                </div>
                <div class="d-flex" style="justify-content: space-between;">
                    <button class="filter_button" type="submit">{{ __('buttons.filter') }}</button>
                    <div class="d-flex">
                        <p style="margin-bottom: 0; line-height: 30px;">€</p>
                        <input type="text" id="filter[pricefrom]" name="filter[pricefrom]" readonly
                            value="{{ $filter['pricefrom'] ?? '0' }}" class="filter-price-input input-right-align"
                            style="" />
                        <p style="margin-bottom: 0; line-height: 30px;">-€</p>
                        <input type="text" id="filter[priceto]" name="filter[priceto]" readonly
                            value="{{ $filter['priceto'] ?? '0' }}" class="filter-price-input input-left-align"
                            style="" />
                    </div>
                </div>
            </div>
            <div class="widget_list widget_color">
                <h3>{{ __('names.categories') }}</h3>
                <ul style="margin-bottom: 10px;">
                    @forelse($categories as $category)
                    <li>
                        <label class="category_label" for="category.{{ $category->id }}">
                            <input type="checkbox" id="category.{{ $category->id }}"
                                value="{{ $category->id }}" onclick="calc();"
                                @if ($filter && isset($filter['categories.id'])) {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : '' }} @endif>
                            {{ $category->name }}
                        </label>
                    </li>
                    @empty
                    <li>
                        <span class="text-muted">{{ __('names.noCategories') }}</span>
                    </li>
                    @endforelse
                </ul>
                <div>
                    <button class="filter_button" type="submit">{{ __('buttons.filter') }}</button>
                </div>
            </div>
        </div>
    </aside>

    <input type="hidden" value="{{ implode(',', $selCategories) }}" name="filter[categories.id]"
        id="filter[categories.id]">
    <input type="hidden" id="order" name="order" value="{{ $selectedOrder }}">
</form>

<style>
    .category_label {
        font-size: 16px;
        font-weight: 400;
        cursor: pointer;
        line-height: 12px;
        margin-bottom: 12px;
    }

    .category_label:hover {
        color: #79a206;
    }

    .filter-price-input {
        background: none;
        border: none;
        font-size: 12px;
        line-height: 31px;
        width: 26px;
        transition: all 0.3s ease 0s;
        margin: 0;
        font-family: inherit;
    }

    .input-right-align {
        text-align: right;
    }

    .input-left-align {
        text-align: left;
    }

    .filter_button {
        height: 30px;
        line-height: 30px;
        padding: 0 20px;
        text-transform: capitalize;
        color: #ffffff;
        background: #222222;
        border: 0;
        border-radius: 30px;
        float: left;
        transition: 0.3s;
    }

    .filter_button:hover {
        background: #79a206;
    }

    @media only screen and (min-width: 768px) and (max-width: 991px) {
        .search_box {
            border: 0px solid #e1e1e1;
            margin-bottom: 0px;
        }
    }

    @media only screen and (max-width: 767px) {
        .search_box {
            border: 0px solid #e1e1e1;
            margin-bottom: 0px;
        }
    }

    .search_container {
        display: flex;
        border-radius: 30px;
        border: 1px solid #e1e1e1;
        background: #fff;
        margin-right: 0px;
    }

    .range-slider {
        padding-top: 10px;
        display: flex;
        justify-content: center;
    }

    .ui-state-default,
    .ui-widget-content .ui-state-default {
        background: #fff;
        width: 15px;
        height: 15px;
        top: -7px;
        cursor: pointer;
        border-radius: 50%;
        border: 2px solid #79a206;
    }

    .ui-widget.ui-widget-content {
        border: 0px solid #c5c5c5;
    }

    .ui-widget-content {
        background: #dbdbdb;
    }

    .ui-slider-horizontal {
        height: 2px;
    }

    .slider {
        margin-bottom: 22px;
    }

    .ui-state-focus,
    .ui-widget-content .ui-state-focus {
        border: 2px solid #79a206;
        background: #fff;
    }
</style>