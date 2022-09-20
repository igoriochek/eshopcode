<div class="strip_all_tour_list wow fadeIn" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
    <div class="row">
        <div class="col-lg-4 col-md-4 position-relative">
            <div class="img_list">
                <a href="{{ route('viewproduct', $product->id) }}">
                    @if ($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}">
                    @else
                        <img src="/images/noimage.jpeg" alt="noimage">
                    @endif
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="tour_list_desc">
                <div class="rating">
                    @for($i = 1; $i <= 5; $i++)
                        <i class="icon-smile @if ($product->average >= $i) voted @endif"></i>
                    @endfor
                    <small>({{ $product->count }})</small>
                </div>
                <h3>
                    <strong>{{ $product->name }}</strong>
                </h3>
                <p>{{ $product->description }}</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-2">
            <div class="price_list">
                <div class="fs-2">
                    @if ($product->discount)
                        €{{ $product->price - round(($product->price * $product->discount->proc / 100), 2) }}
                        <span class="normal_price_list">€{{ $product->price }}</span>
                    @else
                        <span>€{{ $product->price }}</span>
                    @endif
                    <p>
                        <a href="{{ route('viewproduct', $product->id) }}" class="btn_1 mt-2">
                            {{ __('buttons.details') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
