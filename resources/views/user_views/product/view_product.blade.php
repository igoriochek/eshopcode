@extends('layouts.app')

@section('content')
    @include('page_header', [
        'secondPageLink' => 'products',
        'secondPageName' => __('menu.products'),
        'hasThirdPage' => true,
        'thirdPageName' => $product->name
    ])
    <div class="container mb-30 mt-30">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="product-detail accordion-detail">
                    <div class="row mb-50 mt-30">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <div class="product-image-slider slick-initialized slick-slider" style="border: 2px solid white">
                                    @if($product->image)
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-100"/>
                                    @else
                                        <img src="{{ asset('images/noimage.jpeg') }}" alt="no-product-image" class="w-100"/>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                @if ($product->discount)
                                    <span class="stock-status out-stock">{{ __('names.saleOff') }}</span>
                                @endif
                                <h2>{{ $product->name }}</h2>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating d-flex" style="width: 90%">
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="text-warning fs-6 @if ($average >= $i) fa-solid fa-star
                                                        @elseif ($average >= $i - .5) fa-solid fa-star-half-stroke
                                                        @else fa-regular fa-star @endif"></i>
                                                @endfor
                                            </div>
                                        </div>
                                        <span class="ms-4 ps-3 fs-6">({{ $rateCount.' '.__('names.reviews') }})</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover my-1">
                                    <div class="product-price primary-color float-left">
                                        @if ($product->hasSizes)
                                            @if ($product->discount)
                                                <span class="current-price text-brand" id="newPrice">
                                                    €{{ sprintf("%.2f", $defaultSize->price - (round(($defaultSize->price * $product->discount->proc / 100), 2))) }}
                                                </span>
                                                <span>
                                                <span class="save-price font-md color3 ml-15 fs-6">
                                                    {{ '-'.$product->discount->proc.'% '.__('names.off') }}
                                                </span>
                                                <span class="old-price font-md ml-15 fs-5" id="oldPrice">
                                                    €{{ sprintf("%.2f", $defaultSize->price) }}
                                                </span>
                                            </span>
                                            @else
                                                <span class="current-price text-brand" id="price">
                                                    €{{ sprintf("%.2f", $defaultSize->price) }}
                                                </span>
                                            @endif
                                        @else
                                            @if ($product->discount)
                                                <span class="current-price text-brand">
                                                    €{{ sprintf("%.2f", $product->price - (round(($product->price * $product->discount->proc / 100), 2))) }}
                                                </span>
                                                <span>
                                                <span class="save-price font-md color3 ml-15 fs-6">
                                                    {{ '-'.$product->discount->proc.'% '.__('names.off') }}
                                                </span>
                                                <span class="old-price font-md ml-15 fs-5">
                                                    €{{ sprintf("%.2f", $product->price) }}
                                                </span>
                                            </span>
                                            @else
                                                <span class="current-price text-brand">
                                                    €{{ sprintf("%.2f", $product->price) }}
                                                </span>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                @if ($product->hasSizes)
                                    <div class="d-block">
                                        <div class="d-flex align-items-center gap-1">
                                            <p class="mb-0 pb-0 fw-600">{{ __('names.selectSize') }}:</p>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            @foreach($product->sizesPrices as $sizePrice)
                                                <div class="product-size-button">
                                                    <input type="radio" id="{{ $sizePrice->size->name }}" name="size" value="{{ $sizePrice->size->id }}" />
                                                    <label for="{{ $sizePrice->size->name }}">
                                                        @if ($product->discount)
                                                            {{ $sizePrice->size->name.' (€'.sprintf("%.2f", $sizePrice->price - (round(($sizePrice->price * $product->discount->proc / 100), 2))).')' }}
                                                        @else
                                                            {{ $sizePrice->size->name.' (€'.sprintf("%.2f", $sizePrice->price).')' }}
                                                        @endif
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if ($product->hasMeats)
                                    <div class="d-block mt-20">
                                        <div class="d-flex align-items-center gap-1">
                                            <p class="mb-0 pb-0 fw-600">{{ __('names.selectMeat') }}:</p>
                                        </div>
                                        <div class="d-flex align-items-center gap-2">
                                            @foreach($productMeats as $productMeat)
                                                <div class="product-size-button">
                                                    <input type="radio" id="{{ $productMeat->name }}" name="meat" value="{{ $productMeat->id }}" />
                                                    <label for="{{ $productMeat->name }}">{{ $productMeat->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if ($product->hasSauces)
                                    <div class="d-block mt-20">
                                        <div class="d-flex align-items-center gap-1">
                                            <p class="mb-0 pb-0 fw-600">{{ __('names.selectSauce') }}:</p>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap gap-2">
                                            @foreach($productSauces as $productSauce)
                                                <div class="product-size-button">
                                                    <input type="radio" id="{{ $productSauce->name }}" name="sauce" value="{{ $productSauce->id }}" />
                                                    <label class="d-flex align-items-center justify-content-center" for="{{ $productSauce->name }}">
                                                        <div style="background: {{ $productSauce->color }}; width: 21px; height: 21px; border-radius: 13px"></div>
                                                        <div style="width: 8px"></div>
                                                        {{ $productSauce->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if ($product->hasPaidAccessories)
                                    <div class="d-block mt-20">
                                        <div class="d-flex align-items-center gap-1">
                                            <p class="mb-0 pb-0 fw-600">{{ __('names.selectPaidAccessories') }}:</p>
                                        </div>
                                        <div class="d-flex flex-column flex-sm-row align-items-sm-center flex-wrap gap-4 mt-3">
                                            @foreach($paidAccessories as $paidAccessory)
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="checkbox" id="{{ $paidAccessory->name }}" name="paidAccessory" value="{{ $paidAccessory->id }}" />
                                                    <label class="d-flex align-items-center justify-content-center pt-1 fw-500" for="{{ $paidAccessory->name }}" style="font-size: 15px; line-height: 2px; color: #666">
                                                        {{ $paidAccessory->name }}
                                                        (+€{{ number_format($paidAccessory->price, 2) }})
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                @if ($product->hasFreeAccessories)
                                    <div class="d-block mt-30">
                                        <div class="d-flex align-items-center gap-1">
                                            <p class="mb-0 pb-0 fw-600">{{ __('names.selectComposition') }}:</p>
                                        </div>
                                        <div class="d-flex flex-column flex-sm-row align-items-sm-center flex-wrap gap-4 mt-3">
                                            @foreach($product->freeAccessories as $freeAccessory)
                                                <div class="d-flex align-items-center gap-2">
                                                    <input type="checkbox" id="{{ $freeAccessory->name }}" name="freeAccessory" value="{{ $freeAccessory->id }}" checked />
                                                    <label class="d-flex align-items-center justify-content-center pt-1 fw-500" for="{{ $freeAccessory->name }}" style="font-size: 15px; line-height: 2px; color: #666">
                                                        {{ $freeAccessory->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                                <div class="detail-extralink mb-50 @if ($product->hasSizes || $product->hasMeats || $product->hasSauces || $product->hasPaidAccessories || $product->hasFreeAccessories) mt-40 @endif">
                                    {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'd-flex align-items-center']) !!}
                                        <div class="d-flex me-4">
                                            {!! Form::number('count', "1", ['style' => 'width: 80px; height: 51px; padding-left: 20px; padding-right: 15px; border-radius: 5px', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                        </div>
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        @if ($product->hasSizes)
                                            <input type="hidden" name="size" id="size" value="{{ $defaultSize->size->id }}">
                                        @endif
                                        @if ($product->hasMeats)
                                            <input type="hidden" name="meat" id="meat" value="{{ $defaultMeat }}">
                                        @endif
                                        @if ($product->hasSauces)
                                            <input type="hidden" name="sauce" id="sauce" value="{{ $defaultSauce }}">
                                        @endif
                                        @if ($product->hasPaidAccessories)
                                            <input type="hidden" name="paid_accessories" id="paidAccessories">
                                        @endif
                                        @if ($product->hasFreeAccessories)
                                            <input type="hidden" name="free_accessories" id="freeAccessories">
                                        @endif
                                        <div class="product-extra-link2">
                                            <button type="submit" class="button button-add-to-cart" style="padding-inline: 30px; font-size: .95rem">
                                                <i class="fa-solid fa-bag-shopping me-1"></i>
                                                {{__('buttons.addToCart')}}
                                            </button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <div class="font-xs">
                                    <ul class="mr-50 float-start">
                                        <li class="mb-5 fs-6 fw-bold text-dark">{{ __('names.categories') }}:
                                            @forelse ($product->categories as $category)
                                                <span class="text-brand ms-2">
                                                    <a href="{{ url("/user/innercategories/$category->id") }}" class="w-100">
                                                        {{ $category->name }}@if (!$loop->last),@endif
                                                    </a>
                                                </span>
                                            @empty
                                                <span class="text-brand">{{ __('names.noCategories') }}</span>
                                            @endforelse
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-45 d-md-none" style="color: #8f5c5c">
                    <div class="product-info">
                        @include('user_views.product.tabs')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        /*
         * Size buttons
         */
        .product-size-button {
            margin: 0 5px 0 0;
            background: transparent;
            min-width: 100px;
            width: auto;
            text-align: center;
            font-family: "Quicksand", sans-serif;
            font-weight: 600;
        }

        .product-size-button label,
        .product-size-button input {
            display: block;
            background: transparent;
            color: #6e6e6e;
            border: 1px solid #d9d9d9;
            border-radius: 20px;
            transition: all 100ms ease-in-out;
        }

        .product-size-button label:hover,
        .product-size-button input:hover {
            -webkit-box-shadow: 1px 1px 12px #e9e9e9;
            -moz-box-shadow: 1px 1px 12px #e9e9e9;
            box-shadow: 1px 1px 12px #e9e9e9;
            color: #dc0505;
            transform: translateY(-2px);
        }

        .product-size-button input[type="radio"] {
            opacity: 0.011;
            z-index: 100;
        }

        .product-size-button input[type="radio"]:checked + label {
            background: transparent;
            -webkit-box-shadow: 1px 1px 12px #e9e9e9;
            -moz-box-shadow: 1px 1px 12px #e9e9e9;
            box-shadow: 1px 1px 12px #e9e9e9;
            color: #dc0505;
        }

        .product-size-button label {
            cursor: pointer;
            z-index: 90;
            padding: 8px 18px;
            font-size: .95rem;
        }

        /*
         * Checkboxes
         */
        input[type='checkbox'] {
            width: 16px;
            height: 16px;
        }

        input[type='checkbox']:checked {
            accent-color: #ec0f0f;
        }

        input[type='checkbox']:checked + label {
            color: #dc0505;
        }

        /*
         * Rating form
         */
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .rating > input {
            display: none
        }

        .rating > label {
            position: relative;
            width: 1.1em;
            cursor: pointer;
            margin-right: 5px;
            margin-bottom: 15px;
        }

        .rating > label .fa-solid {
            position: absolute;
            top: 0;
            left: 0;
            display: none;
        }

        .rating > label:hover .fa-solid,
        .rating > label:hover ~ label .fa-solid {
            display: block !important;
        }

        .rating > input:checked ~ label .fa-solid {
            display: block;
        }
    </style>
@endpush

@push('scripts')
    <script>
        @if ($product->hasSizes)
            const sizeButtons = document.querySelectorAll("input[name='size']")

            const createClickEventListenerForSizeButtons = sizeButtons => {
                sizeButtons.forEach((button, index) => {
                    if (index !== sizeButtons.length - 1) {
                        button.addEventListener('click', () => {
                            size.value = button.value
                            changeProductPrice()
                        })
                    }
                })
            }
            createClickEventListenerForSizeButtons(sizeButtons)

            const changeProductPrice = () => {
                const newPrice = document.getElementById('newPrice');
                const oldPrice = document.getElementById('oldPrice');
                const price = document.getElementById('price');

                $.ajax({
                    url: '{{ route('changeProductPrice', $product->id) }}',
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        size: size.value
                    },
                    success: res => {
                        @if ($product->hasSizes)
                            @if ($product->discount)
                            newPrice.innerText = `€${res.newPrice}`
                        oldPrice.innerText = `€${res.oldPrice}`
                        @else
                            price.innerText = `€${res.price}`
                        @endif
                            @else
                            price.innerText = `€${res.price}`
                        @endif
                    },
                    error: XMLHttpRequest => console.error(XMLHttpRequest)
                })
            }
        @endif

        @if ($product->hasMeats)
            const meatButtons = document.querySelectorAll("input[name='meat']")
            const meatInput = document.getElementById('meat')

            const createClickEventListenerForMeatButtons = meatButtons => {
                meatButtons.forEach((button, index) => {
                    if (index !== meatButtons.length - 1) {
                        button.addEventListener('click', () => meatInput.value = button.value)
                    }
                })
            }
            createClickEventListenerForMeatButtons(meatButtons)
        @endif

        @if ($product->hasSauces)
            const sauceButtons = document.querySelectorAll("input[name='sauce']")
            const sauceInput = document.getElementById('sauce');

            const createClickEventListenerForSauceButtons = sauceButtons => {
                sauceButtons.forEach((button, index) => {
                    if (index !== sauceButtons.length - 1) {
                        button.addEventListener('click', () => sauceInput.value = button.value)
                    }
                })
            }
            createClickEventListenerForSauceButtons(sauceButtons)
        @endif

        @if ($product->hasPaidAccessories)
            const paidAccessoryButtons = document.querySelectorAll("input[name='paidAccessory']")
            const paidAccessoriesInput = document.getElementById('paidAccessories')

            let paidAccessories = ''

            const removeDuplicatesFromPaidAccessoriesArr = button => {
                let paidAccessoriesArr = paidAccessories.split(',')

                for (let i = 0; i < paidAccessoriesArr.length; i++) {
                    if (paidAccessoriesArr[i] === button.value) {
                        paidAccessoriesArr.splice(i, 1)
                        paidAccessories = paidAccessoriesArr.join(',')
                        break
                    }
                }
            }

            const addPaidAccessoriesToInput = button => {
                paidAccessories += button.checked && paidAccessories ? ',' : ''
                paidAccessories += button.checked ? button.value : ''
                paidAccessoriesInput.value = paidAccessories
            }

            const createClickEventListenersForPaidAccessoryButtons = paidAccessoryButtons => {
                paidAccessoryButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        removeDuplicatesFromPaidAccessoriesArr(button)
                        addPaidAccessoriesToInput(button)
                    })
                })
            }
            createClickEventListenersForPaidAccessoryButtons(paidAccessoryButtons)
        @endif

        @if ($product->hasFreeAccessories)
            const freeAccessoryButtons = document.querySelectorAll("input[name='freeAccessory']")
            const freeAccessoriesInput = document.getElementById('freeAccessories')

            let freeAccessories = ''

            const removeDuplicatesFromFreeAccessoriesArr = button => {
                let freeAccessoriesArr = freeAccessories.split(',')

                for (let i = 0; i < freeAccessoriesArr.length; i++) {
                    if (freeAccessoriesArr[i] === button.value) {
                        freeAccessoriesArr.splice(i, 1)
                        freeAccessories = freeAccessoriesArr.join(',')
                        break
                    }
                }
            }

            const addFreeAccessoriesToInput = button => {
                freeAccessories += !button.checked && freeAccessories ? ',' : ''
                freeAccessories += !button.checked ? button.value : ''
                freeAccessoriesInput.value = freeAccessories
            }

            const createClickEventListenersForFreeAccessoryButtons = freeAccessoryButtons => {
                freeAccessoryButtons.forEach(button => {
                    button.addEventListener('click', () => {
                        removeDuplicatesFromFreeAccessoriesArr(button)
                        addFreeAccessoriesToInput(button)
                    })
                })
            }
            createClickEventListenersForFreeAccessoryButtons(freeAccessoryButtons)
        @endif

        $('button[type="button"]').click(function () {
            const value = $('input[type=radio][name=rating]:checked').val();
            const desc = $('textarea#comment').val();
            $.post("{{ route('addUserRating') }}",
                {
                    "_token": "{{ csrf_token() }}",
                    rating: value,
                    description: desc,
                    product: {{ $product->id }}
                },
                (data, status) => {
                    if (data.val == "ok") location.reload();
                }
            );
        });
    </script>
@endpush
