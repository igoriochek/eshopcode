{!! Form::open(['route' => ['addtocart'], 'method' => 'post']) !!}
<div class="tp-product-list-item d-md-flex">
    <div class="tp-product-list-thumb p-relative fix">
        <a href="{{ route('viewproduct', $product->id) }}">
            @if ($product->image)
                <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 500px">
            @else
                <img src="{{ asset('template/img/product/2/prodcut-1.jpg') }}" alt="product">
            @endif
        </a>
    </div>
    <div class="tp-product-list-content">
        <div class="tp-product-content-2 pt-15">
            <div class="tp-product-tag-2">
                @forelse($product->categories as $category)
                    <a href="{{ route('innercategories', ['category_id' => $category->id]) }}">
                        {{ $category->name }}
                    </a>
                    @if ($loop->first)
                    @break
                @endif
            @empty
            @endforelse
        </div>
        <h3 class="tp-product-title-2">
            <a href="{{ route('viewproduct', $product->id) }}">{{ $product->name }}</a>
        </h3>
        <div class="tp-product-rating-icon tp-product-rating-icon-2">
            <div class="rating py-2">
                <div class="d-flex">
                    @for ($i = 1; $i <= 5; $i++)
                        <i
                            class="product-rating-star text-warning
                                  @if ($product->average >= $i) fa-solid fa-star
                                  @elseif ($product->average >= $i - 0.5) fa-solid fa-star-half-stroke
                                  @else fa-regular fa-star @endif"></i>
                    @endfor
                </div>
            </div>
        </div>
        <div class="tp-product-price-wrapper-2">
            @if ($product->discount)
                <span class="tp-product-price-2 new-price">
                    €{{ number_format($product->price - round(($product->price * $product->discount->proc) / 100, 2), 2) }}
                </span>
                <span class="tp-product-price-2 old-price">
                    €{{ number_format($product->price, 2) }}
                </span>
            @else
                <span class="tp-product-price-2 new-price">
                    €{{ number_format($product->price, 2) }}
                </span>
            @endif
        </div>
        <div class="tp-product-list-add-to-cart d-flex align-items-center">
            <div class="tp-product-details-quantity">
                <div class="tp-product-quantity mb-15 mr-15">
                    <span class="tp-cart-minus">
                        <svg width="11" height="2" viewBox="0 0 11 2" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </span>
                    {!! Form::text('count', '1', [
                        'class' => 'tp-cart-input',
                        'oninput' => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null
                                                              ",
                    ]) !!}
                    <span class="tp-cart-plus">
                        <svg width="11" height="12" viewBox="0 0 11 12" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </div>
            </div>
            <button type="submit" class="tp-product-list-add-to-cart-btn py-2 mb-3" id="add_to_cart">
                {{ __('buttons.addToCart') }}
            </button>
        </div>
    </div>
</div>
</div>
<input type="hidden" name="id" value="{{ $product->id }}">
{!! Form::close() !!}
