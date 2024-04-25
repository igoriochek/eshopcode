<form method="get" action="{{ route("userproducts") }}" id="mainForm">
    <div class="shop-sidebar">
        <div class="single-shop-sidebar-widget search-bar">
            <div class="form-group">
                <input type="text" name="filter[namelike]" class="form-control" id="filter[namelike]" 
                    placeholder="{{ __('names.search') }}" value="{{ $filter["namelike"] ?? "" }}">
                <button type="submit" class="search-btn pb-3">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </div>
        <div class="single-shop-sidebar-widget price-filter">
            <h3>{{ __('names.filterByPrice') }}</h3>
            <div class="range-slider">
                <div id="range-slider" class="slider mb-3 mt-1 mx-1" wire:ignore></div>
            </div>
            <ul class="price-list d-flex justify-content-between">
                <li>
                    <span>{{ __('names.from') }} (€):</span>
                    <input type="text" id="filter[pricefrom]" name="filter[pricefrom]" 
                        readonly value="{{ $filter["pricefrom"] ?? '0' }}"
                        class="border-0 text-start filter-by-price-number" style="max-width: 40px; outline: none"/>
                </li>
                <li>
                    <span>{{ __('names.to') }} (€):</span>
                    <input type="text" id="filter[priceto]" name="filter[priceto]" 
                        readonly value="{{ $filter["priceto"] ?? '0' }}" 
                        class="border-0 text-start filter-by-price-number" style="max-width: 40px; outline: none"/>
                </li>
            </ul>
            <button class="default-btn style5" type="submit">
                {{ __('buttons.filter') }}
            </button>
        </div>
        <div class="single-shop-sidebar-widget color-and-item">
            <h3>{{ __('names.categories') }}</h3>
            <ul>
                @forelse($categories as $category)
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="category.{{ $category->id }}"
                                    value="{{ $category->id }}" onclick="calc();"
                                    @if ($filter && isset($filter["categories.id"]))
                                        {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                    @endif
                            >
                            <label class="form-check-label" for="category.{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                        </div>
                    </li>
                @empty
                    <li>
                        <span class="text-muted">{{ __('names.noCategories') }}</span>
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
    <input type="hidden" value="{{ implode(",", $selCategories) }}" 
        name="filter[categories.id]" id="filter[categories.id]">
    <input type="hidden" id="order" name="order" value="{{ $selectedOrder }}">
</form>