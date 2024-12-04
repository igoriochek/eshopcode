<form method="get" action="{{ route('userproducts') }}" id="mainForm">
    <aside class="left-sidebar">
        <div class="product-widget pt-3rem mb-3rem">
            <h3 class="title">{{ __('names.search') }}</h3>
            <div class="shop-submenu">
                <div class="d-flex"
                    style="height: 55px;">
                    <input class="form-control border-blue" type="text" name="filter[namelike]" id="filter[namelike]"
                        placeholder="{{ __('names.product') . '...' }}" value="{{ $filter['namelike'] ?? '' }}">
                    <button class="btn bg-primary search-btn" type="submit" style="position: inherit !important;">
                        <i class="ion-ios-search-strong"></i>
                    </button>

                </div>
            </div>
        </div>

        <div class="product-widget pt-3rem mb-3rem">
            <h3 class="title">{{ __('names.filterByPrice') }}</h3>
            <div class="product-tag d-flex flex-wrap">
                <div class="shop-submenu">
                    <div class="range-slider">
                        <div id="range-slider" class="slider mb-3 mt-1 mx-1" wire:ignore></div>
                    </div>
                    <div class="d-flex" style="justify-content: space-between; margin-top: 20px;">
                        <div>
                            <span>{{ __('names.from') }}: <b class="text-dark">€</b></span>
                            <input type="text" id="filter[pricefrom]" name="filter[pricefrom]" readonly
                                value="{{ $filter['pricefrom'] ?? '0' }}" class="price-input px-0 fw-bold fs-4"
                                style="width: 42px; padding-top: 1px" />
                        </div>
                        <div>
                            <span class="text-capitalize">{{ __('names.to') }}: <b class="text-dark">€</b></span>
                            <input type="text" id="filter[priceto]" name="filter[priceto]" readonly
                                value="{{ $filter['priceto'] ?? '0' }}" class="price-input px-0 fw-bold fs-4"
                                style="width: 42px; padding-top: 1px" />
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary rounded mt-4" type="submit">
                {{ __('buttons.filter') }}
            </button>
        </div>


        <div class="product-widget pt-3rem mb-3rem">
            <h3 class="title">{{ __('names.categories') }}</h3>
            <ul>
                @forelse($categories as $category)
                <li class="filter-check-box">
                    <input type="checkbox" id="category.{{ $category->id }}"
                        value="{{ $category->id }}" onclick="calc();"
                        @if ($filter && isset($filter['categories.id'])) {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : '' }} @endif>
                    <label for="category.{{ $category->id }}">
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
        <button class="btn btn-primary rounded mt-5 mt-sm-0" type="submit">
            {{ __('buttons.filter') }}
        </button>
    </aside>

    <input type="hidden" value="{{ implode(',', $selCategories) }}" name="filter[categories.id]"
        id="filter[categories.id]">
    <input type="hidden" id="order" name="order" value="{{ $selectedOrder }}">
</form>

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
</style>