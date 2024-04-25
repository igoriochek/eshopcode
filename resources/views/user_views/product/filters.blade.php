<form method="get" action="{{ route("userproducts") }}" id="mainForm">
    <div class="tp-shop-sidebar tp-shop-sidebar-right mr-10">
        <!-- search -->
        <div class="tp-shop-widget mb-35">
            <h3 class="tp-shop-widget-title no-border">{{ __('names.search') }}</h3>

            <div class="tp-header-search-2 d-none d-sm-block">
                <form action="#">
                   <input type="text" name="filter[namelike]" id="filter[namelike]" placeholder="{{ __('names.product').'...' }}" value="{{ $filter["namelike"] ?? "" }}">
                   <button type="submit">
                      <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M9 17C13.4183 17 17 13.4183 17 9C17 4.58172 13.4183 1 9 1C4.58172 1 1 4.58172 1 9C1 13.4183 4.58172 17 9 17Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                         <path d="M18.9999 19L14.6499 14.65" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                      </svg>                                       
                   </button>
                </form>
             </div>
        </div>
        <!-- filter -->
        <div class="tp-shop-widget mb-35">
            <h3 class="tp-shop-widget-title no-border">{{ __('names.filterByPrice') }}</h3>

            <div class="tp-shop-widget-content">
                <div class="tp-shop-widget-filter">
                    <div class="range-slider">
                        <div id="range-slider" class="slider mb-3 mt-1 mx-1" wire:ignore></div>
                    </div>
                    <div class="tp-shop-widget-filter-info d-flex align-items-center justify-content-between">
                        <ul class="price-list d-flex justify-content-between list-unstyled">
                            <li>
                                <span>{{ __('names.from') }}:</span>
                                <input type="text" id="filter[pricefrom]" name="filter[pricefrom]" 
                                    readonly value="{{ $filter["pricefrom"] ?? '0' }}"
                                    class="border-0 filter-by-price-number px-0" style="max-width: 40px; outline: none"/>
                            </li>
                            <li>
                                <span>{{ __('names.to') }}:</span>
                                <input type="text" id="filter[priceto]" name="filter[priceto]" 
                                    readonly value="{{ $filter["priceto"] ?? '0' }}" 
                                    class="border-0 filter-by-price-number px-0" style="max-width: 40px; outline: none"/>
                            </li>
                        </ul>
                        <button class="tp-shop-widget-filter-btn" type="submit">
                            {{ __('buttons.filter') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- status -->
        <div class="tp-shop-widget mb-50">
            <h3 class="tp-shop-widget-title">{{ __('names.categories') }}</h3>

            <div class="tp-shop-widget-content">
                <div class="tp-shop-widget-checkbox tp-shop-widget-categories">
                    <ul class="filter-items filter-checkbox">
                        @forelse ($categories as $category)
                            <li class="filter-item checkbox">
                                <input type="checkbox" id="category.{{ $category->id }}" value="{{ $category->id }}" onclick="calc();"
                                    @if ($filter && isset($filter["categories.id"]))
                                        {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                    @endif
                                >
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
            </div>
        </div>
        <input type="hidden" id="filter[categories.id]" name="filter[categories.id]" value="{{ implode(",", $selCategories) }}">
        <input type="hidden" id="order" name="order" value="{{ $selectedOrder }}">
    </div>
</form>