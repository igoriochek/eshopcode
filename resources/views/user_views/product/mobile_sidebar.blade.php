<!-- Start offcanvas filter sidebar -->
<div class="offcanvas__filter--sidebar widget__area" id="mobileMainForm">
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
                       id="mfilter[namelike]" placeholder="{{ __('names.search').'...' }}"
                       value="{{$filter["namelike"] ?? ""}}">
                <button type="button" class="btn btn-primary p-2 product-search-button" onclick="submitMobileMainForm();">
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
                        <input type="number" id="mfilter[pricefrom]" name="filter[pricefrom]"
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
                        <input type="number" id="mfilter[priceto]" name="filter[priceto]"
                               value="{{ $filter["priceto"] ?? '0' }}"
                               class="price__filter--input__field border-0 w-100"/>
                    </div>
                </div>
            </div>
            <button type="button" class="primary__btn price__filter--btn w-100 mt-4" onclick="submitMobileMainForm();">
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
                                   id="mcategory" onclick="calc();" name="filter[categories.id]" style="cursor: pointer"
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
                       name="filter[categories.id]" id="mfilter[categories.id]" class="d-none">
            </ul>
        </div>

    </div>
</div>
<!-- End offcanvas filter sidebar -->

@push('scripts')
    <script>
        const mainForm = document.getElementById('mainForm');

        const submitMobileMainForm = () => {
            addFilterValuesToMainForm();
            mainForm.submit();
        }

        const addFilterValuesToMainForm = () => {
            document.getElementById("filter[namelike]").value = document.getElementById("mfilter[namelike]").value
            document.getElementById('filter[pricefrom]').value = document.getElementById("mfilter[pricefrom]").value
            document.getElementById('filter[priceto]').value = document.getElementById("mfilter[priceto]").value
            document.getElementById('category').value = document.getElementById("mcategory").value
        }
    </script>
@endpush
