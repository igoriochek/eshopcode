@extends('layouts.app')

@section('title', __('menu.productComplex'))

@section('content')
    <div class="container">

        <div class="content px-3 py-3">
            @include('adminlte-templates::common.errors')
            @include('flash_messages')
            <div class="clearfix"></div>
            {!! Form::open([
                'route' => ['addtocartcomplexproduct'],
                'method' => 'post',
            ]) !!}
            <div class="row">
                <div class="col-lg-6 col-sm-12">
                    <div class="bb-contact-form">
                        <div class="section-title">
                            <div class="section-detail">
                                <h2 class="bb-title">{{ __('names.products') }}</h2>
                            </div>
                        </div>
                        @foreach ($categories as $category)
                            <div class="py-1">
                                <div>
                                    {!! Form::label(__('names.item') . '[' . $category->id . ']', $category->name . ':') !!}
                                    {!! Form::select(__('names.item') . '[' . $category->id . ']', $selectorsComples[$category->id], null, [
                                        'style' => 'height: 30px;"',
                                        'placeholder' => '---',
                                        'id' => 'part_' . $category->id,
                                        'data-category-id' => $category->id,
                                    ]) !!}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12"
                    style="display: flex; justify-content: center; align-items: center; flex-wrap: wrap; flex-direction: column;">
                    <div class="responsive-container" style="margin-bottom: 25px;">
                        <div class="complex" style="z-index: 1;">
                            <img src="{{ asset('images/lekste.png') }}" class="plate-img" />
                        </div>
                        <div id="complex1" class="complex" style="z-index: 2;"></div>
                        <div id="complex2" class="complex" style="z-index: 3;"></div>
                        <div id="complex3" class="complex" style="z-index: 4;"></div>
                        <div id="complex4" class="complex" style="z-index: 5;"></div>
                    </div>
                    <h4>
                        {{ __('names.totalPrice') }}: €
                        <span id="total-price">0.00</span>
                    </h4>
                </div>
                <div class="col-lg-6 col-sm-12 d-flex justify-content-center">
                    <div class="product-action d-flex-center mt-3">
                        <button type="submit" id="cart-button" class="bb-btn-2">{{ __('buttons.addToCart') }}</button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .plate-img {
            border-radius: 20px;
            width: 100%;
            aspect-ratio: 1 / 1;
        }

        .custom-select {
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .select {
            height: 35px;
            align-content: center;
            background-color: #fff;
            border: 1px solid #eee;
            border-radius: 10px;
        }

        .custom-select .custom-select::after {
            right: 25px !important;
        }

        .content {
            margin-bottom: 75px;
        }

        .product-add-to-cart-container {
            width: 50%;
            justify-content: center;
        }

        .wheel-container {
            position: absolute;
            right: 3px;
            height: 280px;
            bottom: 35px;
            transform: rotate(-7deg);
        }

        .complex {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
        }

        .image-style {
            position: absolute;
        }

        .responsive-container {
            display: flex;
            justify-content: center;
            width: 455px;
            height: 455px;
            position: relative;
        }

        .complex-{{ $categories[0]->id }} {
            height: 50%;
            width: 50%;
            top: 2%;
            left: 1%
        }

        .complex-{{ $categories[1]->id }} {
            height: 50%;
            width: 50%;
            right: 0%;
            top: 4%;
        }

        .complex-{{ $categories[2]->id }} {
            bottom: 0%;
            height: 50%;
            width: 50%;
            left: 9%;
        }

        .complex-{{ $categories[3]->id }} {
            height: 50%;
            width: 50%;
            bottom: 7%;
            right: 2%;
        }

        @media (max-width: 992px) {

            .responsive-container {
                margin-top: 25px;
            }

            .product-add-to-cart-container {
                width: 100%;
                display: flex;
                flex-direction: column;
            }
        }

        @media (max-width: 575px) {
            .col-sm-12 {
                flex: 0 0 auto;
                width: 100%;
            }

            .responsive-container {
                width: 100%;
                aspect-ratio: 1 / 1;
                height: auto;
            }
        }
    </style>


    @push('scripts')
        <script>
            document.getElementById('cart-button').addEventListener('click', function() {
                const selectedElements = document.querySelectorAll(`select[name^="{{ __('names.item') }}["]`);
                let selected = true;

                selectedElements.forEach(element => {
                    if (!element.value) {
                        selected = false;
                    }
                });

            });

            const productApi = "{{ env('APP_URL') }}/api/products/";
            //const productApi = "http://127.0.0.1:8000/api/products/";

            function findNameById(value) {
                for (const key in complexMap) {
                    if (complexMap.hasOwnProperty(key)) {
                        if (complexMap[key].id === value) {
                            return complexMap[key].name;
                        }
                    }
                }
                return null;
            }

            function findNumById(value) {
                for (const key in complexMap) {
                    if (complexMap.hasOwnProperty(key)) {
                        if (complexMap[key].id === value) {
                            return complexMap[key].id;
                        }
                    }
                }
                return null;
            }


            async function fetchData(url) {

                try {
                    const response = await fetch(url);
                    if (!response.ok) {
                        throw new Error('Network response was not ok ' + response.statusText);
                    }
                    const data = await response.json();
                    return data.data;
                } catch (error) {
                    console.error('There was a problem with the fetch operation:', error);
                }
            }

            function imageWithStyle(id, src) {
                id = id.replace("part_", "");
                if (src === undefined) {
                    return ``;
                }
                return `<img src="${src}" class="image-style complex-${id}" />`;
            }

            async function updateValue(e) {
                var name = findNameById(event.target.id);
                var id = findNumById(event.target.id);
                const selectComplex = document.getElementById(name);
                var sVal = event.target.value;
                var fullUrl = productApi + sVal;
                let data = await fetchData(fullUrl);
                selectComplex.innerHTML = imageWithStyle(id, data.complexProductImage);
                return;
            }

            var selects = document.querySelectorAll('select[data-category-id]');
            var totalPriceElement = document.getElementById('total-price');
            var prices = @json($selectorsComplesPrices);

            var cats = [
                @foreach ($categories as $category)
                    {{ $category->id }},
                @endforeach
            ]

            const names = ["complex1", "complex2", "complex3", "complex4"];
            const complexMap = cats.reduce((acc, id, index) => {
                const key = names[index];
                acc[key] = {
                    name: key,
                    id: `part_${id}`
                };
                return acc;
            }, {});

            var totalPrice = 0;
            let currentSelectValues = cats.reduce((acc, cat) => {
                acc[`part_${cat}`] = null;
                return acc;
            }, {});


            var selectOptions = document.querySelectorAll('ul.select-options li');
            selectOptions.forEach(selectOption => {
                selectOption.addEventListener('click', function(e) {
                    const rel = selectOption.getAttribute('rel');
                    const parentSelectDiv = selectOption.closest('.select');
                    const selectId = parentSelectDiv.querySelector('select').id;
                    if (currentSelectValues[selectId] != rel) {
                        calculateTotalPrice(rel, selectId);
                        changeValue(rel, selectId);
                        currentSelectValues[selectId] = rel;
                    }
                });
            })

            async function changeValue(sVal, id) {
                var name = findNameById(id);
                const selectComplex = document.getElementById(name);
                var fullUrl = productApi + sVal;
                let data = await fetchData(fullUrl);
                selectComplex.innerHTML = imageWithStyle(id, data.complexProductImage);
                return;
            }

            function findSelectId(sVal) {
                var select = document.querySelector(`select option[value="${sVal}"]`);
                if (select) {
                    var parentSelect = select.closest('select');
                    if (parentSelect) {
                        return parentSelect.id;
                    }
                    return null;
                }
                return null;
            }

            function calculateTotalPrice(sVal, selectId) {
                if (sVal) {
                    for (let singleSelectPrices in prices) {
                        if (prices.hasOwnProperty(singleSelectPrices)) {
                            if (prices[singleSelectPrices].hasOwnProperty(sVal)) {
                                if (sVal != currentSelectValues[selectId] && sVal != null && currentSelectValues[selectId] !=
                                    null && currentSelectValues[selectId] != "") {
                                    const id = selectId.replace("part_", "");
                                    totalPrice -= prices[id][currentSelectValues[selectId]];
                                }
                                totalPrice += prices[singleSelectPrices][sVal];
                                totalPriceElement.textContent = totalPrice.toFixed(2);
                            }
                        }
                    }
                } else {
                    if (selectId && currentSelectValues[selectId]) {
                        const id = selectId.replace("part_", "");
                        totalPrice -= prices[id][currentSelectValues[selectId]];
                        currentSelectValues[selectId] = null;
                        totalPriceElement.textContent = totalPrice.toFixed(2);
                    }
                }
            }
        </script>

    @endpush
