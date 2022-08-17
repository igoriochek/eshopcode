@extends('layouts.app')

@section('content')
    @include('user_views.header', ['title' => __('names.products')])
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 order-sm-last order-lg-first">
                    <div class="row mb-4 align-items-center">
                        <div class="col-lg-8">
                            <p class="p-0 m-0 mb-sm-3 showing-all-results">
                                {{ __('Showing all ').$products->count().__(' results') }}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <form method="get" action="{{ route("userproducts") }}">
                                {!! Form::select('order', $order_list, $selectedProduct,
                                ['class' => 'form-select selector']) !!}
                            </form>
                        </div>
                    </div>
                    <div class="row">
                        @forelse ($products as $product)
                            <div class="col-lg-6 mt-4 mt-md-5 mt-lg-0 mb-5">
                                <div class="product">
                                    @if ($product->image)
                                        <div class="product-image-container">
                                            <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                                 class="product-image mx-auto"/>
                                        </div>
                                    @else
                                        <div class="product-image-container">
                                            <img src="/images/noimage.jpeg" alt="" class="product-image mx-auto"/>
                                        </div>
                                    @endif
                                    <div class="product-information">
                                        <div class="product-title-container">
                                            <a class="product-title" href="{{ route('viewproduct', $product->id) }}"
                                               class="product-image">
                                                {{ $product->name }}
                                            </a>
                                        </div>
                                        <div class="product-rating">
                                            @for($i = 0; $i < 3; $i++)
                                                <i class="fa-solid fa-star fs-5"></i>
                                            @endfor
                                            <i class="fa-solid fa-star-half-stroke fs-5"></i>
                                            <i class="fa-regular fa-star fs-5"></i>
                                            {{--
                                            @forelse ($product->ratings as $rating)
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="product-rating-star @if ($avarage >= $i) fa-solid fa-star
                                                    @elseif ($avarage >= $i - .5) fa-solid fa-star-half-stroke
                                                    @else fa-regular fa-star @endif"></i>
                                                @endfor
                                            @empty
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fa-regular fa-star"></i>
                                                @endfor
                                            @endforelse
                                            --}}
                                        </div>
                                        <div class="product-price">
                                            <p>
                                                €{{ $product->price }}
                                            </p>
                                        </div>
                                        <div class="product-button-container">
                                            {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="count" value="1">
                                            <input type="submit" value="{{__('buttons.addToCart')}}"
                                                   class="product-add-to-cart">
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            {{__('names.noProducts')}}
                        @endforelse
                        {{$products->links()}}
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0 order-sm-first order-lg-last">
                    <div class="sidebar">
                        <form method="get" action="{{route("userproducts")}}">
                            <div class="widget">
                                <div class="widget-title-container">
                                    <h4 class="widget-title">
                                        {{ __('Search') }}
                                    </h4>
                                </div>
                                <div class="search-widget-content">
                                    <input type="text" name="filter[namelike]" class="form-control search-widget-input"
                                           id="filter[namelike]"
                                           placeholder="Search" value="{{ $filter["namelike"] ?? '' }}">
                                    <button type="submit" class="search-widget-button">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-title-container">
                                    <h4 class="widget-title">
                                        {{ __('Filter by price') }}
                                    </h4>
                                </div>
                                <div class="filter-by-price-widget-content">
                                    <fieldset class="form-group">
                                        <div id="range-slider" class="slider mx-2 mb-4 mt-1" wire:ignore></div>
                                        <div class="filter-by-price-button-container">
                                            <div class="d-flex">
                                                <span>{{ __('Price')}}:</span>
                                                <input type="text" id="filter[pricefrom]" name="filter[pricefrom]"
                                                       readonly
                                                       value="{{ $filter["pricefrom"] ?? '0' }}"
                                                       class="border-0 text-end" style="max-width: 50px"/>
                                                <span class="text-center">&nbsp;—&nbsp;</span>
                                                <input type="text" id="filter[priceto]" name="filter[priceto]" readonly
                                                       value="{{ $filter["priceto"] ?? '0' }}"
                                                       class="border-0 text-start" style="max-width: 50px"/>
                                            </div>
                                            <button type="submit" class="filter-by-price-button">
                                                <i class="fa-solid fa-filter"></i>
                                                {{ __('buttons.filter') }}
                                            </button>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="widget">
                                <div class="widget-title-container">
                                    <h4 class="widget-title">
                                        {{ __('Categories') }}
                                    </h4>
                                </div>
                                <div class="categories-widget-content">
                                    @forelse($categories as $category)
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox"
                                                   value="{{ $category->id }}" id="category" onclick="calc();"
                                            @if ($filter && $filter["categories.id"])
                                                {{ in_array($category->id, $selCategories) ? "checked=\"checked\"" : ""}}
                                                @endif
                                            >
                                            <label class="form-check-label" for="categories.id">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @empty
                                        <span>
                                            {{ __('names.noCategories') }}
                                        </span>
                                    @endforelse
                                    <input type="text" value="{{ implode(",", $selCategories) }}"
                                           name="filter[categories.id]" id="filter[categories.id]" class="d-none">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            const rangeSlider = document.getElementById('range-slider');
            const priceFrom = document.getElementById('filter[pricefrom]');
            const priceTo = document.getElementById('filter[priceto]');

            $(() => {
                $(rangeSlider).slider({
                    range: true,
                    min: 0,
                    max: 1000,
                    values: [{{ $filter["pricefrom"] ?? 0 }}, {{ $filter["priceto"] ?? 1000 }}],
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

