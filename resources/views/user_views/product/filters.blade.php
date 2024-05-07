<form method="get" action="{{ route("userproducts") }}" id="mainForm">
    <div class="axil-shop-sidebar" style="z-index: 1000000">
        <div class="d-lg-none">
            <button class="sidebar-close filter-close-btn"><i class="fas fa-times"></i></button>
        </div>
        <div class="toggle-list product-color active">
            <h6 class="title">{{ __('names.search') }}</h6>
            <div class="shop-submenu">
                <div class="d-flex rounded" style="border: 1px solid #f0f0f0; height: 40px;">
                    <input type="text" name="filter[namelike]" class="form-control ps-4" id="filter[namelike]" 
                        placeholder="{{ __('names.product').'...' }}" value="{{ $filter["namelike"] ?? "" }}" style="width: 85%">
                    <button type="submit" class="btn" style="width: 15%">
                        <i class="fa-solid fa-magnifying-glass fs-5"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="toggle-list product-price-range active">
            <h6 class="title">{{ __('names.filterByPrice') }}</h6>
            <div class="shop-submenu" style="">
                <div class="mt--25">
                    <div class="range-slider">
                        <div id="range-slider" class="slider mb-3 mt-1 mx-1" wire:ignore></div>
                    </div>
                    <div class="flex-center mt--20">
                        <div class="d-flex align-items-center">
                            <span>{{ __('names.from') }}: <b class="text-dark">€</b></span>
                            <input type="text" id="filter[pricefrom]" name="filter[pricefrom]" 
                                readonly value="{{ $filter["pricefrom"] ?? '0' }}"
                                class="px-0 fw-bold fs-4" style="width: 60px; padding-top: 1px" />
                        </div>
                        <div class="d-flex align-items-center">
                            <span>{{ __('names.to') }}: <b class="text-dark">€</b></span>
                            <input type="text" id="filter[priceto]" name="filter[priceto]" 
                                readonly value="{{ $filter["priceto"] ?? '0' }}" 
                                class="px-0 fw-bold fs-4" style="width: 60px; padding-top: 1px" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="toggle-list product-categories active">
            <h6 class="title">{{ __('names.categories') }}</h6>
            <div class="shop-submenu">
                <ul>
                    @forelse($categories as $category)
                        <li>
                            <input class="current-cat" type="checkbox" id="category.{{ $category->id }}"
                                value="{{ $category->id }}" onclick="calc();"
                                @if ($filter && isset($filter["categories.id"]))
                                    {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                @endif
                            >
                            <label class="form-check-label" for="category.{{ $category->id }}">
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
        <button class="axil-btn btn-bg-primary" type="submit">
            {{ __('buttons.filter') }}
        </button>
    </div>
    <input type="hidden" value="{{ implode(",", $selCategories) }}" name="filter[categories.id]" id="filter[categories.id]">
    <input type="hidden" id="order" name="order" value="{{ $selectedOrder }}">
</form>