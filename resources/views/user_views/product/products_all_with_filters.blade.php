@extends('layouts.app')

@section('content')
    <section id="hero" class="background-image" data-background=url(../img/header_bg.jpg) style="height: 470px">
        <div class="opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
            <div class="intro_title">
                <h3 class="animated fadeInDown">{{ __('names.products') }}</h3>
            </div>
        </div>
        <!-- End opacity-mask-->
    </section>
    <div id="position">
        <div class="container">
            <ul>
                <li>
                    <a href="../">{{__('menu.home')}}</a>
                </li>
                <li>{{ __('names.products') }}</li>
            </ul>
        </div>
    </div>
    <div class="container margin_60">
        <div class="row">
            <aside class="col-lg-3">
                <form method="get" action="{{ route("userproducts") }}">
                    <p>
                        <button type="submit" class="filter-button" data-text-original="{{ __('buttons.filter') }}">
                            {{ __('buttons.filter') }}
                        </button>
                    </p>
                    <div id="filters_col">
                        <a data-bs-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">
                            <i class="icon_set_1_icon-65"></i>
                            {{ __('names.filters') }}
                        </a>
                        <div class="collapse show" id="collapseFilters">
                            <div class="filter_type">
                                <h6>{{ __('names.search') }}</h6>
                                <input type="text" name="filter[namelike]" class="form-control mb-3" id="filter[namelike]"
                                       placeholder="{{ __('names.search') }}..." value="{{ $filter["namelike"] ?? "" }}">
                            </div>
                            <div class="filter_type">
                                <h6>{{ __('names.price') }}</h6>
                                <fieldset class="form-group">
                                    <div class="price_filter">
                                        <label for="amount">{{__('names.price')}} :</label>
                                        <div id="slider" class="slider" wire:ignore></div>
                                        <div>&nbsp;</div>
                                        <div><label for="amount">{{__('names.from')}} :</label>
                                            <input type="text" id="filter[pricefrom]" name="filter[pricefrom]" readonly
                                                   value="{{$filter["pricefrom"] ?? ""}}"/></div>
                                        <div><label for="amount">{{__('names.to')}} :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            <input type="text" id="filter[priceto]" name="filter[priceto]" readonly
                                                   value="{{$filter["priceto"] ?? ""}}"/></div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="filter_type">
                                <h6>{{ __('names.categories') }}</h6>
                                <ul class="mb-0">
                                    @forelse($categories as $category)
                                        <li>
                                            <label class="container_check">
                                                {{ $category->name }}
                                                <input type="checkbox" value="{{$category->id}}" id="category" onclick="calc();"
                                                @if ($filter && array_key_exists('categories.id', $filter))
                                                    {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                                    @endif
                                                >
                                                <span class="checkmark"></span>
                                            </label>
                                        </li>
                                    @empty
                                        <li>{{ __('names.noCategories') }}</li>
                                    @endforelse
                                </ul>
                                <input type="text" value="{{ implode(",", $selCategories) }}"
                                       name="filter[categories.id]" id="filter[categories.id]" class="d-none">
                            </div>
                        </div>
                        <!--End collapse -->
                    </div>
                </form>
            </aside>
            <!--End aside -->
            <div class="col-lg-9">
                <div id="tools">
                    <div class="row justify-content-between">
                        <div class="col-md-3 col-sm-4">
                            <div class="styled-select-filters">
                                <form method="get" action="{{ route("userproducts") }}" id="orderForm">
                                    {!! Form::select('order', $order_list, $selectedProduct, ['class' => 'ps-3', 'id' => 'orderSelector']) !!}
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4 d-none d-sm-block text-end">
                            {{--
                            <a href="#" class="bt_filters" id="productsGrid">
                                <i class="icon-th"></i>
                            </a>
                            <a href="#" class="bt_filters" id="productsList">
                                <i class=" icon-list"></i>
                            </a>
                            --}}
                        </div>
                    </div>
                </div>
                <!--/tools -->
                @forelse( $products as $product )
                    @include('user_views.product.products_list')
                @empty
                    {{ __('names.noProducts') }}
                @endforelse
                <div class="d-flex justify-content-center">
                    {{ $products->links() }}
                </div>
                <!-- end pagination-->
            </div>
            <!-- End col lg-9 -->
        </div>
        <!-- End row -->
    </div>

    @push('scripts')
        <script>
            const orderForm = document.getElementById('orderForm');
            const orderSelector = document.getElementById('orderSelector');

            orderSelector.onchange = () => orderForm.submit();

            let slider = document.getElementById('range-slider');

            noUiSlider.create(slider, {
                start: [{{ $filter["pricefrom"] ?? 0 }}, {{ $filter["priceto"] ?? 1000 }}],
                connect: true,
                step: 1,
                range: {
                    'min': 0,
                    'max': 1000
                }
            });

            slider.noUiSlider.on("change", (event) => {
                const priceFrom = document.getElementById('filter[pricefrom]');
                const priceTo = document.getElementById('filter[priceto]');
                let price = slider.noUiSlider.get();
                price = price.toString().split(",");
                priceFrom.value = price[0];
                priceTo.value = price[1];
            });

            function calc() {
                var elements = document.querySelectorAll("input[type='checkbox']");
                // console.log(elements);
                var value = '';
                for (var i = 0; i < elements.length; i++) {
                    value += elements[i].checked == true && value ? ',' : '';
                    value += elements[i].checked == true ? elements[i].value : "";
                }
                //console.log(value);
                document.getElementById("filter[categories.id]").value = value;
            }
        </script>
    @endpush

@endsection

