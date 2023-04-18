<div class="d-flex flex-column mb-40" style="border: 1px solid #eee; border-radius: 15px; overflow: scroll; box-shadow: 1px 1px 10px #f5f5f5">
    <div style="min-width: 600px;">
        <div class="d-flex gap-3 fs-6 fw-bold" style="border-bottom: 2px solid #f5f5f5">
            <div class="d-flex align-items-center py-3" style="width: 60px"></div>
            <div class="d-flex align-items-center py-3" style="width: 25%"></div>
            <div class="d-flex align-items-center py-3" style="width: 35%">{{ __('table.product') }}</div>
            <div class="d-flex align-items-center py-3" style="width: 15%">{{ __('table.price') }}</div>
            <div class="d-flex align-items-center py-3" style="width: 15%">{{ __('table.count') }}</div>
            <div class="d-flex align-items-center py-3" style="width: 15%">{{ __('table.subTotal') }}</div>
        </div>
        <div class="d-flex flex-column">
            @forelse($cartItems as $item)
                <div class="d-flex gap-3 text-dark py-4 fw-bold" style="@if (!$loop->last) border-bottom: 2px solid #f5f5f5; @endif font-size: calc(1rem + .1vw)">
                    <div class="d-flex align-items-center py-1" style="width: 60px">
                        {!! Form::open(['route' => ['userCartItemDestroy', $item->id], 'method' => 'delete', 'class' => 'ps-xxl-4 ms-xxl-3 ps-3']) !!}
                            <div class="btn-group">
                                <button type="submit" class="btn btn-danger btn-xs text-center border-0" title="{{ __('names.removeProduct') }}"
                                        onclick="return confirm('{{ __('messages.areYouSureCart') }}?')" style="border-radius: 30px; padding: 17px 12px;">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                    <div class="d-flex align-items-center justify-content-center py-1" style="width: 25%">
                        <a href="{{ route('viewproduct', $item['product']->id) }}" title="{{ $item['product']->name }}" class="d-flex align-items-center justify-content-center">
                            <img alt="{{ $item['product']->name }}" class="img-fluid" width="150" style="border-radius: 10px"
                                 src="@if ($item['product']->image) {{ $item['product']->image }} @else /images/noimage.jpeg @endif">
                        </a>
                    </div>
                    <div class="d-flex flex-column justify-content-center gap-2" style="width: 35%">
                        <a href="{{ route('viewproduct', $item['product']->id) }}" class="product-name">
                            {{ $item['product']->name }}
                        </a>
                        <div class="d-flex flex-column">
                            @if ($item->size)
                                <span class="fw-normal fs-6" style="color: #888">
                                    @if ($item->size == \App\Models\Product::SMALL)
                                        {{ __('names.size').': '.__('names.small') }}
                                    @elseif ($item->size == \App\Models\Product::LARGE)
                                        {{ __('names.size').': '.__('names.large') }}
                                    @endif
                                </span>
                            @endif
                            @if ($item->product_meat_id)
                                <span class="fw-normal fs-6" style="color: #888">
                                    {{ __('names.meat').': '.$item->meat->name }}
                                </span>
                            @endif
                            @if ($item->product_sauce_id)
                                    <span class="fw-normal fs-6" style="color: #888">
                                    {{ __('names.sauce').': '.$item->sauce->name }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="d-flex align-items-center" style="width: 15%; color: #888">
                        @if ($item['product']->hasSizes)
                            @if ($item['product']->discount && $item->size == \App\Models\Product::SMALL)
                                €{{ $item['product']->small - (round(($item['product']->small * $item['product']->discount->proc / 100), 2)) }}
                            @elseif ($item['product']->discount && $item->size == \App\Models\Product::LARGE)
                                €{{ $item['product']->big - (round(($item['product']->big * $item['product']->discount->proc / 100), 2)) }}
                            @else
                                @if ($item->size == \App\Models\Product::SMALL)
                                    €{{ sprintf("%.2f", $item['product']->small) }}
                                @else
                                    €{{ sprintf("%.2f", $item['product']->big) }}
                                @endif
                            @endif
                        @else
                            @if ($item['product']->discount)
                                €{{ $item['product']->price - (round(($item['product']->price * $item['product']->discount->proc / 100), 2)) }}
                            @else
                                €{{ sprintf("%.2f", $item['product']->price) }}
                            @endif
                        @endif
                    </div>
                    <div class="d-flex align-items-center" style="width: 15%; color: #888">
                        {{ $item->count }}
                    </div>
                    <div class="d-flex align-items-center" style="width: 15%; color: #dc0505">
                        €{{ number_format($item->price_current * $item->count, 2) }}
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</div>

@push('css')
    <style>
        .product-name {
            color: #222;
        }

        .product-name:hover,
        .product-name:focus {
            color: #dc0505;
        }
    </style>
@endpush
