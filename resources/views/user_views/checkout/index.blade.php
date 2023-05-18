@extends('layouts.app')

@section('content')
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ url('/') }}" rel="nofollow">
                    <i class="fi-rs-home mr-5"></i>
                    {{ __('menu.home') }}
                </a>
                <span></span>
                <a href="{{ url('/user/viewcart') }}">
                    {{ __('menu.cart') }}
                </a>
                <span></span>
                <a href="{{ url('/user/checkout') }}">
                    {{ __('names.checkout') }}
                </a>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="container mb-10 mt-20 px-0">
            <div class="row">
                <div class="col-12 mb-40">
                    <h1 class="heading-2 mb-10">{{ __('names.checkout') }}</h1>
                </div>
                <!-- End col-lg-8 mb-40-->
            </div>
            <!-- End row -->
            <div class="row justify-content-center">
                <div class="col-xxl-8 col-xl-7 col-lg-6 mb-50 px-0">
                    <div class="border cart-totals">
                        <div class="table-responsive order_table checkout">
                            <h5 class="fw-bold text-black text-uppercase mb-4 text-center">{{ __('names.yourOrder') }}</h5>
                            <div class="d-flex flex-column mb-15"
                                style="border: 1px solid #eee; overflow: scroll; box-shadow: 1px 1px 10px #f5f5f5">
                                <div style="min-width: 600px;">
                                    <div class="d-flex gap-3 fs-6 fw-bold ps-xl-0 ps-4"
                                        style="border-bottom: 2px solid #f5f5f5">
                                        <div class="d-flex align-items-center py-3" style="width: 30%"></div>
                                        <div class="d-flex align-items-center py-3" style="width: 40%">
                                            {{ __('table.product') }}</div>
                                        <div class="d-flex align-items-center py-3" style="width: 15%">
                                            {{ __('table.count') }}</div>
                                        <div class="d-flex align-items-center py-3" style="width: 15%">
                                            {{ __('table.subTotal') }}</div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        @forelse($cartItems as $item)
                                            <div class="d-flex gap-3 text-dark py-4 ps-xl-0 ps-4 fw-bold"
                                                style="@if (!$loop->last) border-bottom: 2px solid #f5f5f5; @endif font-size: calc(1rem + .1vw)">
                                                <div class="d-flex align-items-center justify-content-center py-1"
                                                    style="width: 30%">
                                                    <a href="{{ route('viewproduct', $item['product']->id) }}"
                                                        title="{{ $item['product']->name }}"
                                                        class="d-flex align-items-center justify-content-center">
                                                        <img alt="{{ $item['product']->name }}" class="img-fluid"
                                                            width="150" style="border-radius: 10px"
                                                            src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/noimage.jpeg @endif">
                                                    </a>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center gap-1"
                                                    style="width: 40%">
                                                    <a href="{{ route('viewproduct', $item['product']->id) }}"
                                                        class="product-name">
                                                        {{ $item['product']->name }}
                                                    </a>
                                                    <div class="d-flex flex-column">
                                                        @if ($item->product_size_id)
                                                            <span class="fw-normal fs-6" style="color: #999">
                                                                {{ __('names.size') . ': ' }}
                                                                <span
                                                                    style="color: #777">{{ $item->itemSize->name }}</span>
                                                            </span>
                                                        @endif
                                                        @if ($item->product_meat_id)
                                                            <span class="fw-normal fs-6" style="color: #999">
                                                                {{ __('names.meat') . ': ' }}
                                                                <span style="color: #777">{{ $item->meat->name }}</span>
                                                            </span>
                                                        @endif
                                                        @if ($item->product_sauce_id)
                                                            <span class="fw-normal fs-6" style="color: #999">
                                                                {{ __('names.sauce') . ': ' }}
                                                                <span style="color: #777">{{ $item->sauce->name }}</span>
                                                            </span>
                                                        @endif
                                                        @if ($item->paid_accessories)
                                                            <span class="fw-normal fs-6" style="color: #999">
                                                                {{ __('names.paidAccessories') . ': ' }}
                                                                @forelse($item->paidAccessories as $paidAccessory)
                                                                    <span
                                                                        style="color: #777">{{ $paidAccessory->name }}</span>
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @empty
                                                                @endforelse
                                                            </span>
                                                        @endif
                                                        @if ($item->free_accessories)
                                                            <span class="fw-normal fs-6" style="color: #999">
                                                                {{ __('names.compositionWithout') . ': ' }}
                                                                @forelse($item->freeAccessories as $freeAccessory)
                                                                    <span
                                                                        style="color: #777">{{ $freeAccessory->name }}</span>
                                                                    @if (!$loop->last)
                                                                        ,
                                                                    @endif
                                                                @empty
                                                                @endforelse
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="d-flex align-items-center" style="width: 15%; color: #888">
                                                    {{ $item->count }}
                                                </div>
                                                <div class="d-flex align-items-center" style="width: 15%; color: #dc0505">
                                                    €{{ number_format($item->price_current * $item->count, 2) }}
                                                </div>
                                            </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End col-lg-5 -->
                <div class="col-xxl-4 col-xl-5 col-lg-6 px-0">
                    <div class="border p-md-4 cart-totals ms-md-4">
                        <h5 class="fw-bold text-black text-uppercase mb-3 text-center">{{ __('names.overview') }}</h5>
                        <div class="divider-2 mb-30"></div>
                        <div class="col text-center">
                            <p class="mb-3">{{ __('names.wantToApply') }}</p>
                            {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                            <div class="d-flex flex-column flex-lg-row align-items-center gap-3">
                                <input type="hidden" name="hours" id="hoursHidden">
                                <input type="hidden" name="minutes" id="minutesHidden">
                                <input type="hidden" name="place" id="placeHidden">
                                <input type="hidden" name="isCompanyBuying" id="isCompanyBuyingHidden">
                                <select name="discount[]" class="form-control border-radius-0">
                                    <option value="" class="text-muted">{{ __('---') }}</option>
                                    @foreach ($discounts as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->value }}%
                                            {{ __('names.off') }}</option>
                                    @endforeach
                                </select>
                                <button type="submit"
                                    class="btn btn-heading btn-block-hover-up btn-md col-xl-5 col-lg-6 col-12"
                                    name="login">{{ __('buttons.applyCoupon') }}</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="divider-2 mb-30 mt-30"></div>
                        {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                        <div class="d-flex flex-column justify-content-center mt-30 mb-30 gap-2">
                            <p class="mb-2">
                                1. {{ __('names.selectCollectTime') }}.
                            </p>
                            <div class="d-flex align-items-center gap-2">
                                {!! Form::select('hours', $hoursList, null, [
                                    'id' => 'hoursSelector',
                                    'class' => 'form-control custom-select',
                                    'style' => 'width: 55px;',
                                ]) !!}
                                <span class="fw-bold fs-6">:</span>
                                {!! Form::select('minutes', $minutesList, null, [
                                    'id' => 'minutesSelector',
                                    'class' => 'form-control custom-select',
                                    'style' => 'width: 55px;',
                                ]) !!}
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center">
                            <p class="m-0 p-0">
                                2. {{ __('names.selectEatLocation') }}.
                                <span class="text-danger fw-bold ms-1 fs-5">*</span>
                            </p>
                            <div class="d-flex align-items-center gap-2">
                                <div class="product-size-button">
                                    <input type="radio" id="onTheSpot" name="place" value="1" required />
                                    <label for="onTheSpot">
                                        {{ __('names.onTheSpot') }}
                                    </label>
                                </div>
                                <div class="product-size-button">
                                    <input type="radio" id="takeaway" name="place" value="2" required />
                                    <label for="takeaway">
                                        {{ __('names.takeaway') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center gap-3 mt-30">
                            <p class="m-0 p-0">
                                3. {{ __('names.selectCompanyBuy') }}.
                            </p>
                            <div class="d-flex align-items-center gap-2">
                                <input type="checkbox" id="companyBuy" name="isCompanyBuying" />
                                <label class="d-flex align-items-center justify-content-center pt-1 fw-500"
                                    for="companyBuy" style="font-size: 16px; line-height: 2px; color: #666">
                                    {{ __('names.companyBuy') }}
                                </label>
                            </div>
                            <div class="row" id="company">
                                <div class="col-12 mt-2">
                                    {!! Form::text('company_name', null, [
                                        'id' => 'companyRequired',
                                        'class' => 'form-control',
                                        'placeholder' => __('forms.companyName') . ' *',
                                    ]) !!}
                                </div>
                                <div class="col-12 mt-4 mb-md-0">
                                    {!! Form::text('company_address', null, [
                                        'id' => 'companyRequired',
                                        'class' => 'form-control',
                                        'placeholder' => __('forms.companyAddress') . ' *',
                                    ]) !!}
                                </div>
                                <div class="col-md-6 col-12 mt-4 mb-md-0">
                                    {!! Form::text('company_code', null, [
                                        'id' => 'companyRequired',
                                        'class' => 'form-control',
                                        'placeholder' => __('forms.companyCode') . ' *',
                                    ]) !!}
                                </div>
                                <div class="col-md-6 col-12 mt-4 mb-md-0">
                                    {!! Form::text('company_vat_code', null, [
                                        'class' => 'form-control',
                                        'placeholder' => __('forms.companyVatCode'),
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column justify-content-center gap-3 mt-30 row">
                            <p class="m-0 p-0 ms-3">
                                4. {{ __('names.enterPhoneNumber') }}.
                                <span class="text-danger fw-bold ms-1 fs-5">*</span>
                            </p>
                            <div class="col-md-6 col-12">
                                {!! Form::text('phone_number', auth()->user()->phone_number ? auth()->user()->phone_number : null, [
                                    'placeholder' => __('forms.phone_number'),
                                    'class' => 'form-control',
                                    'required',
                                ]) !!}
                            </div>
                        </div>
                        <div class="divider-2 mb-30 mt-30"></div>
                        <div class="d-flex align-items-center justify-content-between mb-4 mt-30"
                            style="border: 2px solid white">
                            <h6 class="text-heading">{{ __('names.total') }}</h6>
                            <h5 class="text-brand text-end">€{{ number_format($cart->sum, 2) }}</h5>
                        </div>
                        <button type="submit" class="btn mr-10 w-100 font-weight-500 border-0">
                            {{ __('buttons.preview') }}
                            <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>
                <!-- End col-lg-6 -->
            </div>
            <!-- End row -->
        </div>
        <!-- End container mb-80 mt-50 -->
    </div>
    <!-- End container py-5 -->
@endsection

@push('css')
    <style>
        .product-name {
            color: #222;
        }

        .product-name:hover,
        .product-name:focus {
            color: #dc0505;
        }

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

        .product-size-button input[type="radio"]:checked+label {
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
            width: 18px;
            height: 18px;
        }

        input[type='checkbox']:checked {
            accent-color: #ec0f0f;
        }

        input[type='checkbox']:checked+label {
            color: #dc0505;
        }
    </style>
@endpush

@push('scripts')
    <script>
        const hoursSelector = document.getElementById('hoursSelector');
        const minutesSelector = document.getElementById('minutesSelector');

        const setCollectTimeAutomatically = () => {
            const currentDate = new Date();
            const currentHours = currentDate.getHours();
            let currentMinutes = currentDate.getMinutes();

            hoursSelector.value = currentHours + 2;

            for (let i = 0; i <= 45; i += 15) {
                if (i === currentMinutes) {
                    minutesSelector.value = i.toString();
                }
                if (currentMinutes > i && currentMinutes < i + 15) {
                    const minutesToString = (i + 15).toString();

                    if (minutesToString === '60') {
                        hoursSelector.value = currentHours + 3;
                        minutesSelector.value = '00';
                        return;
                    }

                    minutesSelector.value = minutesToString;
                }
            }
        }

        hoursSelector.addEventListener('change', () => {
            disableMinutesForTwoHours();
            setDiscountHours();
        });

        minutesSelector.addEventListener('change', () => {
            setDiscountMinutes();
        });

        const disableMinutesForTwoHours = () => {
            if (hoursSelector.value === '02' || hoursSelector.value === '26') {
                minutesSelector.value = '00';
                minutesSelector.disabled = true;
            } else {
                minutesSelector.disabled = false;
            }
        }

        const setDiscountHours = () => {
            const hoursHidden = document.getElementById('hoursHidden');
            hoursHidden.value = hoursSelector.value;
        }

        const setDiscountMinutes = () => {
            const minutesHidden = document.getElementById('minutesHidden');
            minutesHidden.value = minutesSelector.value;
        }

        setCollectTimeAutomatically();
        setDiscountHours();
        setDiscountMinutes();

        const onTheSpot = document.getElementById('onTheSpot');
        const takeaway = document.getElementById('takeaway');

        const placeButtons = [onTheSpot, takeaway];

        const addEventListenerToPlaceButtons = () => {
            placeButtons.forEach(button => button.addEventListener('click', () => setPlaceHidden(button)));
        }

        const setPlaceHidden = button => {
            const placeHidden = document.getElementById('placeHidden')
            placeHidden.value = button.value;
        }

        addEventListenerToPlaceButtons()

        const companyBuy = document.getElementById('companyBuy');

        const addEventListenerToCompanyBuying = () => {
            companyBuy.addEventListener('click', () => {
                companyBuy.checked ? companyBuy.value = 1 : companyBuy.value = 0

                showCompanyInputFields()
                setIsCompanyBuyingHidden(companyBuy)
            });
        }

        const setIsCompanyBuyingHidden = checkbox => {
            const isCompanyBuyingHidden = document.getElementById('isCompanyBuyingHidden')
            isCompanyBuyingHidden.value = checkbox.value;
        }

        const companyInputs = document.getElementById('company')
        companyInputs.classList.add('d-none')

        const showCompanyInputFields = () => {
            const companyInputs = document.getElementById('company')
            const companyRequiredInputs = document.querySelectorAll('#companyRequired')

            if (companyBuy.checked) {
                companyInputs.classList.remove('d-none')
                companyRequiredInputs.forEach(input => input.required = true)
            } else {
                companyRequiredInputs.forEach(input => input.required = false)
                companyInputs.classList.add('d-none')
            }
        }

        addEventListenerToCompanyBuying()
    </script>
@endpush
