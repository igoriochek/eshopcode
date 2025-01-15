<form method="get" action="{{ route('userproducts') }}" id="mainForm">
    <div class="bb-shop-wrap">
        <div class="bb-sidebar-block">
            <div class="bb-sidebar-title">
                <h3>{{ __('names.search') }}</h3>
            </div>
            <div class="bb-sidebar-contact">
                <div class="header-search">
                    <input type="text" name="filter[namelike]" id="filter[namelike]"
                        placeholder="{{ __('names.product') . '...' }}" value="{{ $filter['namelike'] ?? '' }}">
                    <button class="search-button" type="submit"><i class="ri-search-line"></i></button>
                </div>
            </div>
        </div>
        <div class="bb-sidebar-block">
            <div class="bb-sidebar-title">
                <h3>{{ __('names.filterByPrice') }}</h3>
            </div>
            <div class="bb-sidebar-contact">
                <div class="range-slider">
                    <div id="range-slider" class="slider mb-3 mt-1 mx-1" wire:ignore></div>
                </div>
                <div class="d-flex" style="justify-content: space-between; margin-top: 20px;">
                    <div>
                        <span>{{ __('names.from') }}: <b>€</b></span>
                        <input type="text" id="filter[pricefrom]" name="filter[pricefrom]" readonly
                            value="{{ $filter['pricefrom'] ?? '0' }}" class="price-input px-0 fw-bold fs-4"
                            style="width: 50px; padding-top: 1px" />
                    </div>
                    <div>
                        <span class="text-capitalize">{{ __('names.to') }}: <b>€</b></span>
                        <input type="text" id="filter[priceto]" name="filter[priceto]" readonly
                            value="{{ $filter['priceto'] ?? '0' }}" class="price-input px-0 fw-bold fs-4"
                            style="width: 50px; padding-top: 1px" />
                    </div>
                </div>
                <button class="bb-btn-2 mt-4" type="submit">
                    {{ __('buttons.filter') }}
                </button>
            </div>
        </div>
        <div class="bb-sidebar-block">
            <div class="bb-sidebar-title">
                <h3>{{ __('names.categories') }}</h3>
            </div>
            <div class="bb-sidebar-contact">
                <ul>
                    @forelse($categories as $category)
                    <li>
                        <div class="bb-sidebar-block-item">
                            <input type="checkbox" id="category.{{ $category->id }}"
                                value="{{ $category->id }}" onclick="calc();"
                                @if ($filter && isset($filter['categories.id'])) {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : '' }} @endif>
                            <a href="javascript:void(0)" for="category.{{ $category->id }}">
                                {{ $category->name }}
                            </a>
                            <span class="checked"></span>
                        </div>
                    </li>
                    @empty
                    <li>
                        <span class="text-muted">{{ __('names.noCategories') }}</span>
                    </li>
                    @endforelse
                </ul>
            </div>
            <button class="bb-btn-2 mt-4" type="submit">
                {{ __('buttons.filter') }}
            </button>
        </div>

    </div>

    <input type="hidden" value="{{ implode(',', $selCategories) }}" name="filter[categories.id]"
        id="filter[categories.id]">
    <input type="hidden" id="order" name="order" value="{{ $selectedOrder }}">
</form>

<style>
    .header-search {
        display: flex;
        justify-content: flex-end;
    }

    .search-button {
        position: absolute;
        width: 45px;
        background: transparent;
        box-shadow: none;
        color: #555;
        border: 0px;
        height: 45px;
    }


    .ui-state-default,
    .ui-widget-content .ui-state-default {
        border-radius: 100%;
        background-color: #6c7fd8;
        border-color: #6c7fd8;
        top: -0.5rem;
    }

    .ui-widget.ui-widget-content {
        border: 0px solid #c5c5c5;
    }

    .ui-widget-content {
        background: rgb(0, 0, 0);
    }

    .ui-widget-header {
        background: #6c7fd8;
    }

    .ui-slider-horizontal {
        height: 3px;
    }

    .slider {
        margin-bottom: 0.25rem !important;
    }

    .ui-state-focus,
    .ui-widget-content .ui-state-focus {
        border: 1px solid #6c7fd8 !important;
        background: #fff;
    }
</style>