<form method="get" action="{{ route("userproducts") }}" id="mainForm">
    <div class="tp-shop-sidebar tp-shop-sidebar-right mr-10">
        <!-- search -->
        <div class="job-overview-wrap bg-light-subtle p-4 sticky-sidebar rounded-custom mt-5 mt-lg-0" style="margin-bottom: 45px;">
            <div class="tp-header-search-2 d-none d-sm-block" style="display: flex !important; align-items: center !important;">
                <form action="#" style="display: flex !important; align-items: center !important;">
                   <input type="text" class="form-control me-2" style="flex-grow: 1; margin-right: 10px;" name="filter[namelike]" id="filter[namelike]" placeholder="{{ __('names.search').'...' }}" value="{{ $filter["namelike"] ?? "" }}">
                   <button type="submit" class="btn btn-primary" style="border: none !important; padding-left: 13.5px; padding-right: 13.5px;">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                         <path d="M18.9999 19L14.6499 14.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>
                   </button>
                </form>
             </div>
        </div>
        <!-- filter -->
        <div class="job-overview-wrap bg-light-subtle p-4 sticky-sidebar rounded-custom mt-5 mt-lg-0" style="margin-bottom: 45px;">
            <h5 class="tp-shop-widget-title no-border">{{ __('names.filterByPrice') }}</h5>

            <div class="tp-shop-widget-content">
                <div class="tp-shop-widget-filter">
                    <div class="range-slider">
                        <div id="range-slider" class="slider mb-3 mt-3 mx-1" style="padding: 0px !important; margin-bottom: 15px !important;" wire:ignore></div>
                    </div>
                        <ul class="price-list d-flex justify-content-between list-unstyled">
                            <li>
                                <span>{{ __('names.from') }}:</span>
                                <input type="text" id="filter[pricefrom]" name="filter[pricefrom]"
                                    readonly value="{{ $filter["pricefrom"] ?? '0' }}"
                                    class="border-0 filter-by-price-number px-0" style="max-width: 40px; outline: none; background-color: #fafafa;"/>
                            </li>
                            <li>
                                <span>{{ __('names.to') }}:</span>
                                <input type="text" id="filter[priceto]" name="filter[priceto]"
                                    readonly value="{{ $filter["priceto"] ?? '0' }}"
                                    class="border-0 filter-by-price-number px-0" style="max-width: 40px; outline: none; background-color: #fafafa;"/>
                            </li>
                        </ul>
                    <button class="btn btn-primary" type="submit">
                        {{ __('buttons.filter') }}
                    </button>
                </div>
            </div>
        </div>
        <!-- status -->
        <div class="job-overview-wrap bg-light-subtle p-4 sticky-sidebar rounded-custom mt-5 mt-lg-0">
            <h5 class="tp-shop-widget-title">{{ __('names.categories') }}</h5>

            <div class="tp-shop-widget-content">
                <div class="tp-shop-widget-checkbox">
                    <div class="filter-items filter-checkbox">
                        @forelse ($categories as $category)
                            <div class="filter-item checkbox">
                                <input type="checkbox" id="category.{{ $category->id }}" value="{{ $category->id }}" onclick="calc();"
                                    @if ($filter && isset($filter["categories.id"]))
                                        {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                    @endif
                                >
                                <label for="category.{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @empty
                            <div>
                                <span class="text-muted">{{ __('names.noCategories') }}</span>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" id="filter[categories.id]" name="filter[categories.id]" value="{{ implode(",", $selCategories) }}">
        <input type="hidden" id="order" name="order" value="{{ $selectedOrder }}">
    </div>
</form>

<style>
    .ui-state-default, .ui-widget-content .ui-state-default {
        border-radius: 100%;
        background-color: #175cff;
        border-color: #175cff;
        top: -0.3rem;
    }
    .ui-widget.ui-widget-content {
        border: 0px solid #c5c5c5;
    }
    .ui-widget-content {
        background: #fafafa;
    }
    .ui-widget-header {
        background: #175cff;
    }
    .ui-slider-horizontal {
        height: 0.5rem;
    }
    .slider {
        margin-bottom: 0.25rem !important;
    }
    .ui-state-focus, .ui-widget-content .ui-state-focus {
        border: 0px solid #175cff !important;
        background: #175cff;
    }
</style>