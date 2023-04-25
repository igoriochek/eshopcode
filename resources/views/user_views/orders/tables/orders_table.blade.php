@forelse($orders as $order)
    <div class="d-flex gap-2 px-4 text-dark fs-6" style="border: 1px solid lightgray; @if ($loop->last) border-radius: 0 0 8px 8px; @endif">
        <div class="d-flex align-items-center py-3" style="width: 15%">{{ $order->id }}</div>
        <div class="d-flex align-items-center py-3" style="width: 15%">{{ __("status." . $order->status->name) }}</div>
        <div class="d-flex align-items-center py-3" style="width: 20%">{{ $order->collect_time }}</div>
        <div class="d-flex align-items-center py-3" style="width: 28%">
            @if ($order->place == \App\Models\Order::ONTHESPOT)
                {{ __('names.onTheSpot') }}
            @else
                {{ __('names.takeaway') }}
            @endif
        </div>
        <div class="d-flex align-items-center py-3" style="width: 15%">€{{ number_format($order->sum, 2) }}</div>
        <div class="d-flex align-items-center py-3" style="width: 17%">
            {{ $order->created_at ? $order->created_at->format('Y-m-d'): '' }}
        </div>
        <div class="d-flex align-items-center py-3" style="width: 110px">
            <a href="{{ route('vieworder', $order->id) }}" class="btn-small d-flex align-items-center gap-1">
                <i class="fa-solid fa-eye" style="font-size: .9rem"></i>
                {{ __('names.view') }}
            </a>
        </div>
    </div>
@empty
    <div class="d-flex align-items-center justify-content-between" style="border: 1px solid lightgray">
        <div class="d-flex align-items-center p-3 fs-6">{{ __('names.noOrders') }}</div>
    </div>
@endforelse
