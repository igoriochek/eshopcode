<div class="col-md-4 col-6 mb-24 bb-product-box pro-bb-content" data-aos="fade-up" data-aos-duration="1000"
    data-aos-delay="200">
    {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
    <div class="bb-pro-box">
        <div class="bb-pro-img">
            @if ($product->discount)
                <span class="flags">
                    <span>{{ __('names.discount') }}</span>
                </span>
            @endif
            <a href="{{ route('viewproduct', $product->id) }}">
                <div class="inner-img d-flex justify-content-center align-items-center">
                    @if ($product->image)
                        <img class="main-img" src="{{ $product->image }}" alt="{{ $product->name }}">
                    @else
                        <img class="main-img" src="{{ asset('template/img/new-product/1.jpg') }}"
                            alt="{{ $product->name }}">
                    @endif
                </div>
            </a>
            <ul class="bb-pro-actions">
                <li class="bb-btn-group">
                    <a href="javascript:void(0)" data-link-action="quickview" title="{{ __('buttons.quickView') }}"
                        data-bs-toggle="modal" data-bs-target="#bry_quickview_modal_{{ $product->id }}">
                        <i class="ri-eye-line"></i>
                    </a>
                </li>
                @if ($product->count > 0)
                    <li>
                        <button class="bb-btn-group" type="submit" id="add_to_cart"
                            title="{{ __('buttons.addToCart') }}">
                            <i class="ri-shopping-bag-4-line"></i>
                        </button>
                    </li>
                @endif
            </ul>
        </div>
        <div class="bb-pro-contact">
            <div class="bb-pro-subtitle">
                @forelse ($product->categories as $category)
                    <a href="{{ url("/innercategories/$category->id") }}">
                        {{ $category->name }}
                        @if (!$loop->last)
                            ,
                        @endif
                    </a>
                @empty
                    <span class="text-muted">{{ __('names.noCategories') }}</span>
                @endforelse
                <span class="bb-pro-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        <i class="
                        @if ($product->average >= $i) ri-star-fill
                        @elseif ($product->average >= $i - 0.5) ri-star-half-fill
                        @else ri-star-line @endif"
                            style="
                        @if ($product->average >= $i - 0.5) color: #fea99a; @endif"></i>
                    @endfor
                </span>
            </div>
            <h4 class="bb-pro-title"><a href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
            </h4>
            <p>{{ $product->description }}</p>
            <div class="bb-price">
                <div class="inner-price">
                    @if ($product->discount)
                        <span
                            class="new-price">€{{ $product->price - round(($product->price * $product->discount->proc) / 100, 2) }}</span>
                        <span class="old-price">€{{ number_format($product->price, 2) }}</span>
                    @else
                        <span class="new-price">€{{ number_format($product->price, 2) }}</span>
                    @endif
                    @if ($product->count <= 3 && $product->count > 0)
                        <span class="item-left">{{ $product->count }} {{ __('names.left') }} </span>
                    @elseif ($product->count === 0)
                        <span class="item-left">{{ __('names.outOfStock') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="count" value="1">
    <input type="hidden" name="id" value="{{ $product->id }}">
    {!! Form::close() !!}
</div>

<div class="modal fade quickview-modal" id="bry_quickview_modal_{{ $product->id }}" tabindex="-1" role="dialog">
    {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="qty-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row mb-minus-24">
                    <div class="col-md-5 col-sm-12 col-xs-12 mb-24">
                        <div class="single-pro-img single-pro-img-no-sidebar">
                            <div class="single-product-scroll">
                                <div class="single-slide zoom-image-hover">
                                    @if ($product->image)
                                        <img class="img-responsive" src="{{ $product->image }}"
                                            alt="{{ $product->name }}">
                                    @else
                                        <img class="img-responsive"
                                            src="{{ asset('template//img/new-product/1.jpg') }}"
                                            alt="{{ $product->name }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12 col-xs-12 mb-24">
                        <div class="quickview-pro-content">
                            <h5 class="bb-quick-title">
                                <a href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
                            </h5>
                            <div class="bb-pro-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="
                                    @if ($product->average >= $i) ri-star-fill
                                    @elseif ($product->average >= $i - 0.5) ri-star-half-fill
                                    @else ri-star-line @endif"
                                        style="
                                    @if ($product->average >= $i - 0.5) color: #fea99a; @endif"></i>
                                @endfor
                            </div>
                            <div class="bb-quickview-desc">{{ $product->description }}</div>
                            <div class="bb-quickview-price">
                                @if ($product->discount)
                                    <span
                                        class="new-price">€{{ $product->price - round(($product->price * $product->discount->proc) / 100, 2) }}</span>
                                    <span class="old-price">€{{ number_format($product->price, 2) }}</span>
                                @else
                                    <span class="new-price">€{{ number_format($product->price, 2) }}</span>
                                @endif
                            </div>
                            <div class="bb-quickview-qty">
                                <div class="qty-plus-minus">
                                    <input class="qty-input" type="text" name="count" value="1"
                                        max="{{ $product->count }}">
                                </div>
                                <div class="bb-quickview-cart">
                                    <button type="submit" type="button" class="bb-btn-1">
                                        <i class="ri-shopping-bag-line"></i>{{ __('buttons.addToCart') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="id" value="{{ $product->id }}">
    {!! Form::close() !!}
</div>

<style>
    .inner-img {
        height: 270px;
    }

    .main-img,
    .hover-img {
        max-height: 270px;
        width: auto;
        height: auto;
    }
</style>
