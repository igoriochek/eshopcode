@extends('layouts.app')

@section('content')

    @include('user_views.section', ['title' => __('names.promotions'), 'paragraph' => $promotion->name])

    <div id="position">
        <div class="container">
            <ul>
                <li>
                    <a href="../">{{__('menu.home')}}</a>
                </li>
                <li>
                    <a href="/promotions">{{ __('names.promotions') }}</a>
                </li>
                <li>
                    {{ __($promotion->name) }} {{ __('names.promotions') }}
                </li>
            </ul>
        </div>
    </div>

    <div class="container margin_60">
        <div class="row">
            <aside class="col-lg-3 theiaStickySidebar" id="sidebar">
                @include('user_views.promotion.promotionsLinks')
            </aside>
            <!-- End aside -->
            <div class="col-lg-9">
                <div class="row">
                    @forelse ($products as $product)
                        <div class="shop-item col-lg-4 col-md-6 col-sm-6">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ route('viewproduct', $product->id) }}">
                                            @if ($product->image)
                                                <img src="{{ $product->image }}" alt="{{ $product->name }}">
                                            @else
                                                <img src="/images/noimage.jpeg" alt="noimage">
                                            @endif
                                        </a>
                                    </figure>
                                    <div class="item-options clearfix">
                                        {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="count" value="1">
                                        <button type="submit" class="btn_shop border-0">
                                            <span class="icon-basket"></span>
                                            <div class="tool-tip">
                                                {{ __('buttons.addToCart') }}
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                <div class="product_description">
                                    <div class="rating flex-row justify-content-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <i class="@if ($product->average >= $i) icon-star voted @else icon-star-empty @endif"></i>
                                        @endfor
                                    </div>
                                    <h3>
                                        <a href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
                                    </h3>
                                    <div class="price">
                                        @if ($product->discount)
                                            <span class="offer">
                                                    €{{ $product->price }}
                                                </span>
                                            €{{ $product->price - round(($product->price * $product->discount->proc / 100), 2) }}
                                        @else
                                            €{{ $product->price }}
                                        @endif
                                    </div>
                                    <div class="w-100 d-flex justify-content-center flex-column mt-3">
                                        <div class="d-flex justify-content-center">
                                            <div class="numbers-row">
                                                {!! Form::number('count', "1", ['class' => 'qty2 form-control text-center', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5",
                                                                "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                                <input type="button" class="dec button_inc" value="-">
                                                <input type="button" class="inc button_inc" value="+">
                                            </div>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                        <!--End Shop Item-->
                    @empty
                        {{ __('names.noProducts') }}
                    @endforelse
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>

    @push('scripts')
        <script src="{{ asset('js/theia-sticky-sidebar.js') }}"></script>
        <script>
            jQuery('#sidebar').theiaStickySidebar({
                additionalMarginTop: 80
            });
        </script>
    @endpush

@endsection
