<!-- Start offcanvas filter sidebar -->
<div class="offcanvas__filter--sidebar widget__area">
    <button type="button" class="offcanvas__filter--close ms-4" data-offcanvas>
        <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
            <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
        </svg>
        <span class="offcanvas__filter--close__text">{{ __('buttons.close') }}</span>
    </button>
    <div class="offcanvas__filter--sidebar__inner">
        <div class="single__widget widget__bg">
            <h2 class="widget__title h3">{{ __('names.search') }}</h2>
            <div class="input-group mb-3 pb-1">
                <input type="text" name="filter[namelike]" class="form-control product-search-input"
                       id="filter[namelike]" placeholder="{{ __('names.search').'...' }}"
                       value="{{$filter["namelike"] ?? ""}}">
                <button type="submit" class="btn btn-primary p-2 product-search-button">
                    <i class="fas fa-search m-2"></i>
                </button>
            </div>
        </div>
        <div class="single__widget price__filter widget__bg">
            <h2 class="widget__title h3">{{ __('names.filterByPrice') }}</h2>
            <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                <div class="price__filter--group">
                    <label class="price__filter--label" for="Filter-Price-GTE2">{{ __('names.from') }}</label>
                    <div class="price__filter--input border-radius-5 d-flex align-items-center">
                        <span class="price__filter--currency">€</span>
                        <input type="number" id="filter[pricefrom]" name="filter[pricefrom]"
                               value="{{ $filter["pricefrom"] ?? '0' }}"
                               class="price__filter--input__field border-0 w-100"/>
                    </div>
                </div>
                <div class="price__divider">
                    <span>-</span>
                </div>
                <div class="price__filter--group">
                    <label class="price__filter--label" for="Filter-Price-LTE2">{{ __('names.to') }}</label>
                    <div class="price__filter--input border-radius-5 d-flex align-items-center">
                        <span class="price__filter--currency">€</span>
                        <input type="number" id="filter[priceto]" name="filter[priceto]"
                               value="{{ $filter["priceto"] ?? '0' }}"
                               class="price__filter--input__field border-0 w-100"/>
                    </div>
                </div>
            </div>
            <button type="submit" class="primary__btn price__filter--btn w-100 mt-4">
                {{ __('buttons.filter') }}
            </button>
        </div>
        <div class="single__widget widget__bg">
            <h2 class="widget__title h3">{{ __('names.categories') }}</h2>
            <ul class="widget__form--check">
                @forelse($categories as $category)
                    <li class="widget__form--check__list">
                        <label class="widget__form--check__label">
                            {{ $category->name }}
                            <input class="form-check-input my-0" type="checkbox" value="{{ $category->id }}"
                                   id="category" onclick="calc();" name="filter[categories.id]" style="cursor: pointer"
                            @if ($filter && array_key_exists('categories.id', $filter))
                                {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                @endif>
                        </label>
                    </li>
                @empty
                    <li class="widget__form--check__list">
                        <span class="text-muted">{{ __('names.noCategories') }}</span>
                    </li>
                @endforelse
                <input type="text" value="{{ implode(",", $selCategories) }}"
                       name="filter[categories.id]" id="filter[categories.id]" class="d-none">
                <input type="hidden" id="order" name="order" value="{{ $selectedOrder }}">
                <input type="hidden" id="paginate" name="productsPerPage" value="{{ $selectedProductsPerPage }}">
            </ul>
        </div>

    </div>
</div>
<!-- End offcanvas filter sidebar -->