@extends('layouts.app')

@section('content')
    @include('page_header', [
        'secondPageLink' => 'products',
        'secondPageName' => __('menu.products'),
        'hasThirdPage' => false
    ])
    <div class="container mb-30 mt-30" style="transform: none;">
        <div class="row" style="transform: none;">
            <div class="col-xl-9 col-lg-8 col-md-7 col-12 order-md-0 order-1">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <h4 class="mb-2">{{ __('names.products') }}</h4>
                        <p>
                            {{ __('names.showing') }}
                            @if ($products->currentPage() !== $products->lastPage())
                                {{ ($products->count() * $products->currentPage() - $products->count() + 1).__('–').($products->count() * $products->currentPage())}}
                            @else
                                @if ($products->total() - $products->count() === 0)
                                    {{ $products->count() }}
                                @else
                                    {{ ($products->total() - $products->count()).__('–').$products->total() }}
                                @endif
                            @endif
                            {{ __('names.of') }}
                            {{ $products->total().' '.__('names.resultsOf') }}
                        </p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover w-100">
                            <div class="sort-by-product-wrap">
                                <i class="fi-rs-apps-sort mx-2"></i>
                                {!! Form::select('order', $order_list, $selectedOrder, ['class' => 'sort-by py-1', 'id' => 'orderSelector']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row product-grid">
                    @forelse($products as $product)
                        <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        @if ($product->image)
                                            <a style="cursor: pointer; overflow: hidden" href="{{ route('viewproduct', $product->id) }}">
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="default-img mb-2" style="width: 100%; height: 300px; object-fit: cover"/>
                                            </a>
                                        @else
                                            <a style="cursor: pointer; overflow: hidden" href="{{ route('viewproduct', $product->id) }}">
                                                <img src="{{ asset('images/noimage.jpeg') }}" alt="no-image" class="default-img mb-2" style="width: 100%; height: 300px; object-fit: cover"/>
                                            </a>
                                        @endif
                                            @if ($product->discount)
                                                <div class="product-badges product-badges-position product-badges-mrg">
                                                    <span class="hot" style="font-size: 14px">-{{$product->discount->proc}}%</span>
                                                </div>
                                            @endif
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category text-center mt-2 mb-2">
                                        @foreach ($product->categories ?? [] as $category)
                                            <a href="{{ Auth::user() ? url("/user/innercategories/$category->id") : url("/innercategories/$category->id") }}">
                                                {{ $category->name }}
                                            </a>
                                            @if ($loop->first)
                                                @break
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center w-100 mb-3">
                                        <div class="d-flex">
                                            @for($i = 1; $i <= 5; $i++)
                                                <i class="fs-6 product-rating-star text-warning
                                                        @if ($product->average >= $i) fa-solid fa-star
                                                        @elseif ($product->average >= $i - .5) fa-solid fa-star-half-stroke
                                                        @else fa-regular fa-star @endif"
                                                ></i>
                                            @endfor
                                        </div>
                                        <span class="font-small ms-1">({{ sprintf("%.1f", $product->average) ?? 0 }})</span>
                                    </div>
                                    <h2 class="text-center" style="font-size: 21px">
                                        <a href="{{ route('viewproduct', $product->id) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h2>
                                    <div class="product-rate-cover mt-2 mb-4">
                                        <div class="product-price text-center d-flex justify-content-center align-items-center gap-3">
                                            @if ($product->discount)
                                                <span class="old-price">€{{ sprintf("%.2f", $product->price) }}</span>
                                                <span >€{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}</span>
                                            @else
                                                <span>€{{ sprintf("%.2f", $product->price) }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-card-bottom mb-3">
                                        <div class="add-cart w-100 d-flex justify-content-center align-items-center">
                                            {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'd-flex justify-content-between align-items-center gap-2']) !!}
                                                {!! Form::number('count', "1", ['style' => 'height: 47px; width: 80px; padding-left: 25px; padding-right: 15px; border-radius: 5px', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                            <button type="submit" class="ms-1 add">
                                                <i class="fa-solid fa-bag-shopping me-1"></i>
                                                {{ __('buttons.addToCart') }}
                                            </button>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end product card-->
                    @empty
                        <span class="text-muted">{{ __('names.noProducts') }}</span>
                    @endforelse
                </div>
                <!--product grid-->
                <div class="pagination-area mt-20 mb-20 d-flex justify-content-center">
                    {{ $products->onEachSide(1)->links() }}
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-5 col-12 primary-sidebar sticky-sidebar order-md-1 order-0" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <!-- Product sidebar Widget -->
                <div class="theiaStickySidebar" style="padding-top: 0; padding-bottom: 1px; position: static; transform: none;">
                    <form method="get" action="{{ route("userproducts") }}" id="mainForm">
                        <div class="sidebar-widget price_range range mb-30">
                            <h5 class="section-title style-1 mb-30">{{ __('names.search') }}</h5>
                            <div class="d-flex align-items-center">
                                <input type="text" name="filter[namelike]" class="form-control"
                                       id="filter[namelike]" style="font-size: 1em"
                                       placeholder="{{ __('names.searchForItems') }}..." value="{{$filter["namelike"] ?? ""}}">
                                <button type="submit" class="btn btn-primary p-2 ms-2" style="height: 48px">
                                    <i class="fas fa-search m-2"></i>
                                </button>
                            </div>
                        </div>
                        <div class="sidebar-widget price_range range mb-30">
                            <h5 class="section-title style-1 mb-30">{{ __('names.filterByPrice') }}</h5>
                            <div class="price-filter">
                                <div class="price-filter-inner">
                                    <div id="range-slider" class="slider mb-3 mt-1 mx-1" wire:ignore></div>
                                    <div class="d-flex justify-content-between">
                                        <div class="caption">{{ __('names.from') }}:
                                            <span class="fs-6" style="color: #e10000">€</span>
                                            <input type="text" id="filter[pricefrom]" name="filter[pricefrom]"
                                                   readonly
                                                   value="{{ $filter["pricefrom"] ?? '0' }}"
                                                   class="border-0 text-start text-brand p-0 fw-bold" style="max-width: 40px"/>
                                        </div>
                                        <div class="caption">{{ __('names.to') }}:
                                            <span class="fs-6" style="color: #e10000">€</span>
                                            <input type="text" id="filter[priceto]" name="filter[priceto]" readonly
                                                   value="{{ $filter["priceto"] ?? '0' }}"
                                                   class="border-0 text-start text-brand p-0 fw-bold" style="max-width: 40px"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group">
                                <div class="list-group-item mb-10 mt-20">
                                    <label class="fw-900 mb-2">{{ __('names.categories') }}:</label>
                                    @forelse($categories as $category)
                                        <div class="form-check mb-2 ms-1">
                                            <input class="form-check-input" type="checkbox"
                                                   value="{{ $category->id }}" id="category" onclick="calc();"
                                                    @if ($filter && array_key_exists('categories.id', $filter))
                                                        {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                                    @endif
                                            >
                                            <label class="form-check-label" for="categories.id">
                                                {{ $category->name.' ('.count($category->products).')' }}
                                            </label>
                                        </div>
                                    @empty
                                        <span class="text-muted">{{ __('names.noCategories') }}</span>
                                    @endforelse
                                    <input type="text" value="{{ implode(",", $selCategories) }}"
                                           name="filter[categories.id]" id="filter[categories.id]"
                                           class="d-none">
                                </div>
                            </div>
                            <input type="hidden" id="order" name="order" value="{{ $selectedOrder }}">
                            <button type="submit" class="btn btn-primary w-100" id="filterSubmit" style="font-size: 15px; padding: 10px 0">
                                <i class="fi-rs-filter mr-5"></i>
                                {{ __('buttons.filter') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.getElementById('orderSelector').onchange = () => {
                addOrderValueToFilter();
                document.getElementById('mainForm').submit();
            }

            const addOrderValueToFilter = () => document.getElementById('order').value = $('#orderSelector').val();

            const rangeSlider = document.getElementById('range-slider');
            const priceFrom = document.getElementById('filter[pricefrom]');
            const priceTo = document.getElementById('filter[priceto]');

            $(() => {
                $(rangeSlider).slider({
                    range: true,
                    min: 0,
                    max: {{ $maxPrice }},
                    values: [{{ $filter["pricefrom"] ?? 0 }}, {{ $filter["priceto"] ?? $maxPrice }}],
                    slide: (event, ui) => {
                        $(priceFrom).val(ui.values[0]);
                        $(priceTo).val(ui.values[1]);
                    }
                });
                $(priceFrom).val($(rangeSlider).slider("values", 0));
                $(priceTo).val($(rangeSlider).slider("values", 1));
            });

            function calc() {
                var elements = document.querySelectorAll("input[type='checkbox']");
                var value = '';
                for (var i = 0; i < elements.length; i++) {
                    value += elements[i].checked == true && value ? ',' : '';
                    value += elements[i].checked == true ? elements[i].value : "";
                }
                document.getElementById("filter[categories.id]").value = value;
            }
        </script>
    @endpush
    @push('css')
        <style>
            .ui-widget.ui-widget-content {
                border: none;
            }

            .ui-widget-content {
                border: 1px solid #dddddd;
                background: #dddddd;
                color: #333333;
            }

            .ui-slider-horizontal {
                height: 0.4em;
            }

            .ui-widget-header {
                border: none;
                background: #fa7777;
            }

            .range .ui-slider-handle.ui-state-default.ui-corner-all {
                width: 20px;
                height: 20px;
                transform: translateY(-10%);
                transition: none;
            }

            .caption::first-letter {
                text-transform: uppercase;
            }

            .form-check-input[type='checkbox'] {
                border: 2px solid #ced4da;
                height: 17px;
                width: 17px;
                border-radius: 2px;
            }

            .form-check-input[type='checkbox']:checked {
                background-color: #e10000;
                border-color: #e10000;
            }

            .form-check-label {
                cursor: pointer;
                color: #687188;
            }
        </style>
    @endpush
@endsection

