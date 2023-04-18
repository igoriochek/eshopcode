<div class="col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12">
    <div class="product-cart-wrap mb-30">
        <div class="product-img-action-wrap">
            <div class="product-img product-img-zoom">
                @if ($product->image)
                    <a style="cursor: pointer; overflow: hidden" href="{{ route('viewproduct', $product->id) }}">
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="default-img mb-2" style="width: 100%; height: 300px; object-fit: cover"/>
                    </a>
                @else
                    <a style="cursor: pointer; overflow: hidden" href="{{ route('viewproduct', $product->id) }}">
                        <img src="{{ asset('images/noimage.jpeg') }}" alt="no-image" class="default-img mb-2" style="width: 100%; height: 300px; object-fit: cover"/>
                    </a>
                @endif
                @if ($product->discount)
                    <div class="product-badges product-badges-position product-badges-mrg">
                        <span class="hot" style="font-size: 14px">-{{$product->discount->proc}}%</span>
                    </div>
                @endif
            </div>
        </div>
        <div class="product-content-wrap">
            <div class="product-category text-center mt-2 mb-2">
                @foreach ($product->categories ?? [] as $category)
                    <a href="{{ Auth::user() ? url("/user/innercategories/$category->id") : url("/innercategories/$category->id") }}">
                        {{ $category->name }}
                    </a>
                    @if ($loop->first)
                        @break
                    @endif
                @endforeach
            </div>
            <div class="d-flex justify-content-center align-items-center w-100 mb-3">
                <div class="d-flex">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fs-6 product-rating-star text-warning
                                  @if ($product->average >= $i) fa-solid fa-star
                                  @elseif ($product->average >= $i - .5) fa-solid fa-star-half-stroke
                                  @else fa-regular fa-star @endif"></i>
                    @endfor
                </div>
                <span class="font-small ms-1">({{ sprintf("%.1f", $product->average) ?? 0 }})</span>
            </div>
            <h2 class="text-center" style="font-size: 21px">
                <a href="{{ route('viewproduct', $product->id) }}">
                    {{ $product->name }}
                </a>
            </h2>
            <div class="product-rate-cover mt-2 mb-4">
                <div class="product-price text-center d-flex justify-content-center align-items-center gap-3">
                    @if ($product->hasSizes)
                        @if ($product->discount)
                            <div class="d-flex flex-column gap-1">
                                @foreach ($product->sizesPrices as $sizePrice)
                                    <div class="d-flex gap-2">
                                        <span class="fw-500 fs-6" style="color: #888">{{ $sizePrice->size->name }}:</span>
                                        <span class="old-price">€{{ sprintf("%.2f", $sizePrice->price) }}</span>
                                        <span >€{{ $sizePrice->price - (round(($sizePrice->price * $product->discount->proc / 100), 2)) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="d-flex align-items-center flex-wrap gap-2">
                                @foreach ($product->sizesPrices as $sizePrice)
                                    <div class="d-flex gap-2">
                                        <span class="fw-500 fs-6" style="color: #888">{{ $sizePrice->size->name }}:</span>
                                        <span>€{{ sprintf("%.2f", $sizePrice->price) }}</span>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    @else
                        @if ($product->discount)
                            <span class="old-price">€{{ sprintf("%.2f", $product->price) }}</span>
                            <span >€{{ $product->price - (round(($product->price * $product->discount->proc / 100), 2)) }}</span>
                        @else
                            <span>€{{ sprintf("%.2f", $product->price) }}</span>
                        @endif
                    @endif
                </div>
            </div>
            <div class="product-card-bottom mb-3">
                <div class="add-cart w-100 d-flex justify-content-center align-items-center">
                    {!! Form::open(['route' => ['addtocart'], 'method' => 'post', 'class' => 'd-flex justify-content-between align-items-center gap-2']) !!}
                    {!! Form::number('count', "1", ['style' => 'height: 46px; width: 80px; padding-left: 20px; padding-right: 15px; border-radius: 5px', "min" => "1", "max" => "5", "minlength" => "1", "maxlength" => "5", "oninput" => "this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null"]) !!}
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    @if ($product->hasSizes)
                        <input type="hidden" name="size" id="size" value="{{ $product->sizesPrices[1]->size->id }}">
                    @endif
                    @if ($product->hasMeats)
                        <input type="hidden" name="meat" id="meat" value="{{ $defaultMeat }}">
                    @endif
                    @if ($product->hasSauces)
                        <input type="hidden" name="sauce" id="sauce" value="{{ $defaultSauce }}">
                    @endif
                    <button type="submit" class="ms-1 add border-0">
                        <i class="fa-solid fa-bag-shopping me-1"></i>
                        {{ __('buttons.addToCart') }}
                    </button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
