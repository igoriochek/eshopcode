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
                <a href="{{ url("/user/viewcart") }}">
                    {{ __('menu.cart') }}
                </a>
                <span></span>
                <a href="{{ url("/user/checkout") }}">
                    {{ __('names.checkout') }}
                </a>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="container mb-10 mt-20 px-0">
            <div class="row">
                <div class="col-12 mb-40">
                    <h1 class="heading-2 mb-10">{{__('names.checkout')}}</h1>
                </div>
                <!-- End col-lg-8 mb-40-->
            </div>
            <!-- End row -->
            <div class="row justify-content-center">
                <div class="col-lg-7 mb-50 px-0">
                    <div class="border p-40 cart-totals mb-50">
                        <div class="table-responsive order_table checkout">
                            <h5 class="fw-bold text-black text-uppercase mb-3 text-center">{{ __('names.yourOrder') }}</h5>
                            <table class="table no-border table-responsive overflow-scroll">
                                <tbody>
                                <tr>
                                    <th scope="col" ></th>
                                    <th scope="col" class="text-dark">{{__('table.product')}}</th>
                                    <th scope="col" class="text-dark pl-20 pr-20">{{__('table.count')}}</th>
                                    <th scope="col" class="text-dark pl-20 pr-20">{{__('table.price')}}</th>
                                </tr>
                                @foreach($cartItems as $item)
                                    <tr>
                                        <td class="image product-thumbnail">
                                                <a href="{{ route('viewproduct', $item['product']->id) }}" title="{{ $item['product']->name }}" >
                                                    <img alt="{{ $item['product']->name }}" class="product-thumbnail-image" style="border: 2px solid white"
                                                         src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/noimage.jpeg @endif">
                                                </a>
                                        </td>
                                        <td class="product-name">
                                            <h6 class="w-160 mb-5">
                                                <a class="text-heading"
                                                   href="{{ route('viewproduct', $item['product']->id) }}">
                                                    {{ $item['product']->name }}
                                                </a>
                                            </h6>
                                        </td>
                                        <td class="product-quantity">
                                            <h6 class="text-muted pl-20 pr-20">x {{ $item->count }}</h6>
                                        </td>
                                        <td class="product-subtotal">
                                            <h5 class="text-brand">
                                                {{ number_format($item->price_current * $item->count,2) }} €
                                            </h5>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End col-lg-5 -->
                <div class="col-lg-5 px-0">
                    <div class="border p-md-4 cart-totals ml-30">
                        <h5 class="fw-bold text-black text-uppercase mb-3 text-center">{{ __('names.overview') }}</h5>
                        <div class="divider-2 mb-30"></div>
                        <div class="col text-center">
                            <p class="mb-3">{{ __('names.wantToApply') }}</p>
                            {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                            <div class="d-flex align-items-center gap-3">
                                <input type="hidden" name="hours" id="hoursHidden">
                                <input type="hidden" name="minutes" id="minutesHidden">
                                <select name="discount[]" class="form-control border-radius-0">
                                    <option value="" class="text-muted">{{ __('---') }}</option>
                                    @foreach($discounts as $item)
                                        <option value="{{ $item->id }}">{{ $item->code }} - {{ $item->value }} EU {{ __('names.off') }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-heading btn-block-hover-up btn-md col-xl-5 col-lg-6 col-md-4 col-6" name="login">{{ __('buttons.applyCoupon') }}</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        {!! Form::open(['route' => ['checkout-preview'], 'method' => 'post']) !!}
                            <div class="d-flex flex-column justify-content-center align-items-center mt-30 mb-10 gap-2">
                                <p class="mb-2">{{ __('names.selectCollectTime') }}.</p>
                                <div class="d-flex align-items-center gap-2">
                                    {!! Form::select('hours', $hoursList, null, ['id' => 'hoursSelector', 'class' => 'form-control custom-select', 'style' => 'width: 50px']) !!}
                                    <span class="fw-bold fs-6">:</span>
                                    {!! Form::select('minutes', $minutesList, null, ['id' => 'minutesSelector', 'class' => 'form-control custom-select', 'style' => 'width: 50px']) !!}
                                </div>
                            </div>
                            <div class="table-responsive mt-30 mb-10">
                                <table class="table no-border" style="border: 2px solid white">
                                    <tbody>
                                    <tr class="total">
                                        <td>
                                            <h6 class="text-heading">{{__('names.total')}}</h6>
                                        </td>
                                        <td class="text-end">
                                            <h5 class="text-brand text-end">{{number_format($cart->sum,2) }} €</h5>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <button type="submit" class="btn mr-10 w-100 font-weight-500">{{__('buttons.preview')}}<i class="fas fa-arrow-right ms-2"></i></button>
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
            if (hoursSelector.value === '02') {
                minutesSelector.value = '00';
                minutesSelector.disabled = true;
            }
            else {
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

        setDiscountHours();
        setDiscountMinutes();
        setCollectTimeAutomatically();
    </script>
@endpush

