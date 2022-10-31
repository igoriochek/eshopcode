<div id="product_list" class="tab_pane">
    <div class="product__section--inner product__section--style3__inner">
        <div class="row row-cols-1 mb--n30">
            @forelse ($products as $product)
                <div class="col mb-30">
                    {!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
                        <div class="product__card product__list d-flex align-items-center">
                            <div class="product__card--thumbnail product__list--thumbnail">
                                @if ($product->image)
                                    <a class="product__card--thumbnail__link display-block"
                                       href="{{ route('viewproduct', $product->id) }}">
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                             class="product__card--thumbnail__img product__primary--img"/>
                                        <img src="{{ $product->image }}" alt="{{ $product->name }}"
                                             class="product__card--thumbnail__img product__secondary--img"/>
                                    </a>
                                @else
                                    <a class="product__card--thumbnail__link display-block"
                                       href="{{ route('viewproduct', $product->id) }}">
                                        <img src="{{ asset('images/noimage.jpeg') }}" alt="no-image"
                                             class="product__card--thumbnail__img product__primary--img"/>
                                        <img src="{{ asset('images/noimage.jpeg') }}" alt="no-image"
                                             class="product__card--thumbnail__img product__secondary--img"/>
                                    </a>
                                @endif
                                @if ($product->discount)
                                    <span class="product__badge">{{ $product->discount->proc }}%</span>
                                @endif
                            </div>
                            <div class="product__card--content product__list--content">
                                <h3 class="product__card--title">
                                    <a href="{{ route('viewproduct', $product->id) }}">
                                        {{ $product->name }}
                                    </a>
                                </h3>
                                <ul class="rating product__card--rating d-flex">
                                    @for($i = 1; $i <= 5; $i++)
                                        <li class="rating__list">
                                            <span class="rating__icon">
                                                <i class="fs-5 product-rating-star @if ($product->average >= $i) fa-solid fa-star
                                                                                   @elseif ($product->average >= $i - .5) fa-solid fa-star-half-stroke
                                                                                   @else fa-regular fa-star @endif"></i>
                                            </span>
                                        </li>
                                    @endfor
                                    <li>
                                        <span class="rating__review--text">
                                            {{ '('.$product->count.') '.__('names.reviews') }}
                                        </span>
                                    </li>
                                </ul>
                                <div class="product__list--price">
                                    @if ($product->discount)
                                        <span class="current__price">
                                            €{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}
                                        </span>
                                        <span class="old__price">
                                            €{{ number_format($product->price, 2) }}
                                        </span>
                                    @else
                                        <span class="fs-3">
                                            €{{ number_format($product->price, 2) }}
                                        </span>
                                    @endif
                                </div>
                                <p class="product__card--content__desc mb-20">{{ $product->description }}</p>
                                <div class="w-100 d-flex align-items-center gap-4 mt-3">
                                    <div class="d-flex justify-content-center">
                                        <input type="button"
                                               class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary"
                                               value="-">
                                        {!! Form::number('count', "1", ['class' => 'product-add-to-cart-number', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                                        <input type="button"
                                               class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary"
                                               value="+">
                                    </div>
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <button type="submit"
                                            class="product__card--btn primary__btn"
                                            title="{{ __('buttons.addToCart') }}">
                                        <svg width="14" height="11" viewBox="0 0 14 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.2371 4H11.5261L8.5027 0.460938C8.29176 0.226562 7.9402 0.203125 7.70582 0.390625C7.47145 0.601562 7.44801 0.953125 7.63551 1.1875L10.0496 4H3.46364L5.8777 1.1875C6.0652 0.953125 6.04176 0.601562 5.80739 0.390625C5.57301 0.203125 5.22145 0.226562 5.01051 0.460938L1.98707 4H0.299574C0.135511 4 0.0183239 4.14062 0.0183239 4.28125V4.84375C0.0183239 5.00781 0.135511 5.125 0.299574 5.125H0.721449L1.3777 9.78906C1.44801 10.3516 1.91676 10.75 2.47926 10.75H11.0339C11.5964 10.75 12.0652 10.3516 12.1355 9.78906L12.7918 5.125H13.2371C13.3777 5.125 13.5183 5.00781 13.5183 4.84375V4.28125C13.5183 4.14062 13.3777 4 13.2371 4ZM11.0339 9.625H2.47926L1.86989 5.125H11.6433L11.0339 9.625ZM7.33082 6.4375C7.33082 6.13281 7.07301 5.875 6.76832 5.875C6.4402 5.875 6.20582 6.13281 6.20582 6.4375V8.3125C6.20582 8.64062 6.4402 8.875 6.76832 8.875C7.07301 8.875 7.33082 8.64062 7.33082 8.3125V6.4375ZM9.95582 6.4375C9.95582 6.13281 9.69801 5.875 9.39332 5.875C9.0652 5.875 8.83082 6.13281 8.83082 6.4375V8.3125C8.83082 8.64062 9.0652 8.875 9.39332 8.875C9.69801 8.875 9.95582 8.64062 9.95582 8.3125V6.4375ZM4.70582 6.4375C4.70582 6.13281 4.44801 5.875 4.14332 5.875C3.8152 5.875 3.58082 6.13281 3.58082 6.4375V8.3125C3.58082 8.64062 3.8152 8.875 4.14332 8.875C4.44801 8.875 4.70582 8.64062 4.70582 8.3125V6.4375Z" fill="currentColor"></path>
                                        </svg>
                                        <span>{{ __('buttons.addToCart') }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            @empty
                <span class="text-muted mb-5">{{ __('names.noProducts') }}</span>
            @endforelse
        </div>
    </div>
</div>
