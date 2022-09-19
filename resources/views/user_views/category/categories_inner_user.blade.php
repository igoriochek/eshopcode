@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <section class="content-header">
                <div>
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{__('names.categories')}}</h1>
                        </div>
                        <div class="col-sm-6">
                            <h3>{{$maincategory->name}}</h3>
                            <a href="{{route("rootcategories")}}">{{__('buttons.backToMainCategories')}}</a>
                        </div>
                    </div>
                </div>
            </section>
            <div class="col-sm-6">
                <h3>{{$maincategory->name}}: {{__('names.products')}}</h3>
            </div>
            <div class="content px-3">

                {{--        @include('flash::message')--}}

                <div class="clearfix"></div>

                <div class="card">
                    <div class="card-body p-0">
                        @if(!empty($products))
                            @forelse( $products as $product )
                                <div class="card-body">
                                    @if ($product->image)
                                        <div class="product-image-container">
                                            <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image mx-auto"/>
                                            </a>
                                        </div>
                                    @else
                                        <div class="product-image-container">
                                            <a style="cursor: pointer" href="{{ route('viewproduct', $product->id) }}">
                                                <img src="/images/noimage.jpeg" alt="" class="product-image mx-auto"/>
                                            </a>
                                        </div>
                                    @endif
                                    <h4 class="card-title"><a href="{{route('viewproduct', $product->id)}}">{{$product->name}}</a></h4>
                                    <h6 class="card-subtitle mb-2 text-muted">{{__('names.desc')}}</h6>
                                    <p class="card-text">{{$product->description}}</p>
                                        {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container']) !!}
                                        <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                                        {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                        <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+">
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="submit" value="{{__('buttons.addToCart')}}" class="btn product-add-to-cart-button">
                                        {!! Form::close() !!}
                                </div>
                            @empty
                                {{__('names.noProducts')}}
                            @endforelse
                            {{$products->links()}}
                        @endif
                        <div class="card-footer clearfix">
                            <div class="float-right">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="content px-3">

                {{--        @include('flash::message')--}}

                <div class="clearfix"></div>

                <div class="card">
                    <div class="card-body p-0">
                        {{--                @include('products.table')--}}

                        @if(!empty($categories))
                            @forelse( $categories as $category )
                                <div class="card-body">
                                    <h4 class="card-title"><a href="{{route('innercategories', $category->id)}}">{{$category->name}}</a></h4>
                                    <h6 class="card-subtitle mb-2 text-muted">{{__('names.desc')}}</h6>
                                    <p class="card-text">{{$category->description}}</p>
                                    @forelse($category->innerCategories as $c)
                                        <a href="{{route('innercategories', $c->id)}}" class="card-link">{{$c->name}}</a>
                                    @empty
                                        ---{{__('names.noCategories')}}---
                                    @endforelse
                                </div>
                            @empty
{{--                                {{__('messages.nocategories')}}--}}
                            @endforelse
                        @endif

{{--                        <div class="card-footer clearfix">--}}
{{--                            <div class="float-right">--}}

{{--                            </div>--}}
{{--                        </div>--}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.product-reviews-add-review-submit').click(function () {
            const value = $('input[type=radio][name=rating]:checked').val();
            $.post("{{route('addUserRating')}}",
                {
                    "_token": "{{ csrf_token() }}",
                    rating: value,
                    product: {{ $product->id }}
                },
                function (data, status) {
                    //alert("Data: " + data.val + "\nStatus: " + status);
                    if (data.val == "ok") {
                        // $('#vote').hide();
                        $('#review-product').html("<p>{{ __('names.reviewProduct') }}</p>");
                    }
                }
            );
        });

        const minus = document.querySelector('.minus');
        const plus = document.querySelector('.plus');
        const amount = document.querySelector('.product-add-to-cart-number');

        const minValue = 1;
        const maxValue = 5;

        minus.addEventListener('click', e => {
            e.preventDefault();
            const currentValue = Number(amount.value) || 0;
            if (currentValue === minValue) return;
            amount.value = currentValue - 1;
        });

        plus.addEventListener('click', e => {
            e.preventDefault();
            const currentValue = Number(amount.value) || 0;
            if (currentValue === maxValue) return;
            amount.value = currentValue + 1;
        });
    </script>
@endpush
@push('css')
    <style>
        .badge {
            font-size: 25px;
            font-weight: 200
        }

        .badge i {
            font-size: 20px;
            font-weight: 200
        }

        .about-rating {
            font-size: 15px;
            font-weight: 500;
            margin-top: 10px
        }

        .total-ratings {
            font-size: 12px
        }

        .bg-custom {
            background-color: #b7dd29 !important
        }

        .progress {
            margin-top: 10px
        }

        /*    rating form*/
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center
        }

        .rating > input {
            display: none
        }

        .rating > label {
            position: relative;
            width: 1em;
            font-size: 6vw;
            color: #FFD600;
            cursor: pointer
        }

        .rating > label::before {
            content: "\2605";
            position: absolute;
            opacity: 0
        }

        .rating > label:hover:before,
        .rating > label:hover ~ label:before {
            opacity: 1 !important
        }

        .rating > input:checked ~ label:before {
            opacity: 1
        }

        .rating:hover > input:checked ~ label:before {
            opacity: 0.4
        }
    </style>
@endpush
