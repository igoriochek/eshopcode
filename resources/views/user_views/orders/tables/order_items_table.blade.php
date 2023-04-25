@foreach($orderItems as $orderItem)
    <div class="d-flex gap-2 px-4 text-dark fs-6" style="border: 1px solid lightgray; @if ($loop->last) border-radius: 0 0 8px 8px; @endif">
        <div class="d-flex flex-column justify-content-center py-3" style="width: 75%">
            <a href="{{ route('viewproduct', $orderItem->product_id) }}" class="text-dark mb-1" style="font-size: 1.1rem">
                {{ $orderItem->product->name }}
                @if ($order->status->name == "Returned")
                    <span class="text-danger">({{ __('table.status') }})</span>
                @endif
            </a>
            <div class="d-flex flex-column">
                @if ($orderItem->product_size_id)
                    <span class="fw-normal fs-6" style="color: #aaa">
                        {{ __('names.size').': ' }}
                        <span style="color: #777">{{ $orderItem->itemSize->name }}</span>
                    </span>
                @endif
                @if ($orderItem->product_meat_id)
                    <span class="fw-normal fs-6" style="color: #aaa">
                        {{ __('names.meat').': ' }}
                        <span style="color: #777">{{ $orderItem->meat->name }}</span>
                    </span>
                @endif
                @if ($orderItem->product_sauce_id)
                    <span class="fw-normal fs-6" style="color: #aaa">
                        {{ __('names.sauce').': ' }}
                        <span style="color: #777">{{ $orderItem->sauce->name }}</span>
                    </span>
                @endif
                @if ($orderItem->paid_accessories)
                    <span class="fw-normal fs-6" style="color: #aaa">
                        {{ __('names.paidAccessories').': ' }}
                        @forelse($orderItem->paidAccessories as $paidAccessory)
                            <span style="color: #777">{{ $paidAccessory->name }}</span>@if (!$loop->last),@endif
                        @empty
                        @endforelse
                    </span>
                @endif
                @if ($orderItem->free_accessories)
                    <span class="fw-normal fs-6" style="color: #aaa">
                        {{ __('names.compositionWithout').': ' }}
                        @forelse($orderItem->freeAccessories as $freeAccessory)
                            <span style="color: #777">{{ $freeAccessory->name }}</span>@if (!$loop->last),@endif
                        @empty
                        @endforelse
                    </span>
                @endif
            </div>
        </div>
        <div class="d-flex align-items-center py-3" style="width: 25%">€{{ number_format($orderItem->price_current, 2) }}</div>
        <div class="d-flex align-items-center py-3" style="width: 25%">{{ $orderItem->count }}</div>
    </div>
@endforeach
