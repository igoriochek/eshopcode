@extends('layouts.app')

@section('content')
    <section class="parallax-window" data-parallax="scroll" style="background: url('{{ asset('img/single_tour_bg_1.jpg') }}') center center" data-natural-width="1400" data-natural-height="470">
        <div class="parallax-content-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h1>{{ $product->name }}</h1>
                        <span class="rating flex-row justify-content-start">
                            @for($i = 1; $i <= 5; $i++)
                                <i class="icon-smile @if ($average >= $i) voted @endif"></i>
                            @endfor
                            <small>({{ $count }})</small>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <div id="price_single_main">
                            <span>
                                @if ($product->discount)
                                    <sup>€</sup>
                                    {{ $product->price - round(($product->price * $product->discount->proc / 100), 2) }}
                                    <sup class="text-white">€</sup>
                                    <strike class="text-white">{{ $product->price }}</strike>
                                @else
                                    <sup>€</sup>
                                    <span>{{ $product->price }}</span>
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="position">
        <div class="container">
            <ul>
                <li>
                    <a href="../">{{__('menu.home')}}</a>
                </li>
                <li>
                    <a href="/user/products">{{__('menu.products')}}</a>
                </li>
                <li>
                    {{ $product->name }}
                </li>
            </ul>
        </div>
    </div>
    <!-- End Position -->

    <div class="container margin_60">
        <div class="row">
            <div class="col-lg-8" id="single_tour_desc">
                <div id="single_tour_feat">
                    <ul>
                        <li><i class="icon_set_1_icon-4"></i>Museum</li>
                        <li><i class="icon_set_1_icon-83"></i>3 Hours</li>
                        <li><i class="icon_set_1_icon-13"></i>Accessibiliy</li>
                        <li><i class="icon_set_1_icon-82"></i>144 Likes</li>
                        <li><i class="icon_set_1_icon-22"></i>Pet allowed</li>
                        <li><i class="icon_set_1_icon-97"></i>Audio guide</li>
                        <li><i class="icon_set_1_icon-29"></i>Tour guide</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <h3>{{ __('names.description') }}</h3>
                    </div>
                    <div class="col-lg-9">
                        <p>
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-3">
                        <h3>{{ __('names.reviews') }}</h3>
                        @if (!$voted)
                            <a href="#" class="btn_1 add_bottom_30" data-bs-toggle="modal" data-bs-target="#myReview">
                                {{ __('buttons.leaveReview') }}
                            </a>
                        @endif
                    </div>
                    <div class="col-lg-9">
                        <div id="general_rating">{{ $count.' '.__('names.reviews') }}
                            <div class="rating">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="icon-smile @if ($average >= $i) voted @endif"></i>
                                @endfor
                            </div>
                        </div>
                        <!-- End general_rating -->
                        <hr>
                        @forelse ($product->ratings as $rating)
                            <div class="review_strip_single">
                                <small> - {{ $rating->created_at->format('F j, Y') }} -</small>
                                <h4 class="ms-0">{{ $rating->user->name }}</h4>
                                <p>
                                    "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed a lorem quis neque interdum consequat ut sed sem. Duis quis tempor nunc. Interdum et malesuada fames ac ante ipsum primis in faucibus."
                                </p>
                                <div class="rating flex-row justify-content-start">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="icon-smile @if ($rating->value >= $i) voted @endif"></i>
                                    @endfor
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">{{ __('names.noReviews') }}</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <!--End  single_tour_desc-->
            <aside class="col-lg-4">
                <div class="box_style_1 expose">
                    {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'product-add-to-cart-container']) !!}
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('names.quantity') }}</label>
                                    <div class="numbers-row">
                                        {!! Form::number('count', "1", ['class' => 'qty2 form-control text-center', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5",
                                                        "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                        <input type="button" class="dec button_inc" value="-">
                                        <input type="button" class="inc button_inc" value="+">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <input type="submit" value="{{__('buttons.addToCart')}}" class="btn_full">
                    {!! Form::close() !!}
                </div>
                <!--/box_style_1 -->
            </aside>
        </div>
        <!--End row -->
    </div>
    <!--End container -->
@endsection
