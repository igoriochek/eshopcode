<div class="col-lg-4 col-md-4 col-12 ">
    {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
    <article class="single_product">
        <figure>
            <div class="product_thumb">
                <a class="primary_img" href="{{ route('viewproduct', $product->id) }}">
                    @if ($product->image)
                    <img class="thumb_img" src="{{ $product->image }}" alt="">
                    @else
                    <img class="thumb_img" src="{{ asset('template/img/product/product1.jpg') }}" alt="">
                    @endif
                </a>
                @if ($product->discount)
                <div class="label_product">
                    <span class="label_sale">-{{ $product->discount->proc }}%</span>
                </div>
                @endif
                <div class="action_links">
                    <ul>
                        <li class="add_to_cart">
                            <button class="add_to_cart_icon_button" type="submit" id="add_to_cart" title="{{ __('buttons.addToCart') }}">
                                <i class="icon-shopping-bag"></i>
                            </button>
                        </li>
                        <li class="quick_button">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box_{{ $product->id }}" title="{{ __('buttons.quickView') }}">
                                <i class="icon-eye"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="action_links list_action">
                    <ul>
                        <li class="quick_button">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal_box_{{ $product->id }}" title="{{ __('buttons.quickView') }}">
                                <i class="icon-eye"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="product_content grid_content">
                <div class="product_price_rating">
                    <div class="product_rating">
                        <ul>
                            @for ($i = 1; $i <= 5; $i++)
                                <li>
                                <a>
                                    <i class="
                                @if ($product->average >= $i) icon-star2
                                @elseif ($product->average >= $i - 0.5) icon-star2
                                @else icon-star-outlined @endif">
                                    </i>
                                </a>
                                </li>
                                @endfor
                        </ul>
                    </div>
                    <h4 class="product_name">
                        <a href="{{ route('viewproduct', $product->id) }}">
                            {{ $product->name }}
                        </a>
                    </h4>
                    <div class="price_box">
                        @if ($product->discount)
                        <span class="current_price">€{{ $product->price - round(($product->price * $product->discount->proc) / 100, 2) }}</span>
                        <span class="old_price">€{{ number_format($product->price, 2) }}</span>
                        @else
                        <span class="current_price">€{{ number_format($product->price, 2) }}</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="product_content list_content">
                <div class="product_rating">
                    <ul>
                        @for ($i = 1; $i <= 5; $i++)
                            <li>
                            <a>
                                <i class="
                                @if ($product->average >= $i) icon-star2
                                @elseif ($product->average >= $i - 0.5) icon-star2
                                @else icon-star-outlined @endif">
                                </i>
                            </a>
                            </li>
                            @endfor
                    </ul>
                </div>
                <h4 class="product_name">
                    <a href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
                </h4>
                <div class="price_box">
                    @if ($product->discount)
                    <span class="current_price">€{{ $product->price - round(($product->price * $product->discount->proc) / 100, 2) }}</span>
                    <span class="old_price">€{{ number_format($product->price, 2) }}</span>
                    @else
                    <span class="current_price">€{{ number_format($product->price, 2) }}</span>
                    @endif
                </div>
                <div class="product_desc">
                    <p>{{ $product->description }}</p>
                </div>
                <div class="action_links list_action_right">
                    <ul>
                        <li class="add_to_cart">
                            <button class="add_to_cart_button" type="submit" id="add_to_cart" title="{{ __('buttons.addToCart') }}">
                                {{ __('buttons.addToCart') }}
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </figure>
    </article>
    <input type="hidden" name="count" value="1">
    <input type="hidden" name="id" value="{{ $product->id }}">
    {!! Form::close() !!}
</div>

@include('user_views.product.product_modal')

<style>
    .product_thumb {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .thumb_img {
        min-width: 150px;
        min-height: 150px;
    }

    .add_to_cart_button {
        padding: 20px 55px;
        background: #222;
        color: #fff;
        border-radius: 30px;
        width: inherit;
        font-size: 14px;
        line-height: 16px;
        font-weight: 500;
        text-transform: capitalize;
        transition: all 0.3s ease 0s;
        border: 0px;
    }

    .add_to_cart_button:hover {
        background: #79a206;
    }

    .inner-img {
        height: 270px;
    }

    .main-img,
    .hover-img {
        max-height: 270px;
        width: auto;
        height: auto;
    }

    .action_links ul li a {
        height: 60px;
        align-content: center;
    }

    .add_to_cart_icon_button {
        transition: all 0.3s ease 0s;
        border: 0px solid #fff;
        background: transparent;
        font-size: 18px;
        line-height: 60px;
        width: 50px;
        text-align: center;
        font-size: 18px;
        display: inline-block;
        height: 60px;
    }

    .add_to_cart_icon_button:hover {
        color: #79a206;
    }

    .product_rating ul li a:hover {
        color: #79a206 !important;
    }

    .product_rating ul li a {
        font-size: 17px !important;
        color: #FEB954 !important;
    }
</style>