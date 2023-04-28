@forelse($returns as $return)
    <div class="d-flex gap-2 px-4 text-dark fs-6" style="border: 1px solid lightgray; @if ($loop->last) border-radius: 0 0 8px 8px; @endif">
        <div class="d-flex align-items-center py-3" style="width: 15%">{{ $return->id }}</div>
        <div class="d-flex align-items-center py-3" style="width: 15%">{{ $return->order_id }}</div>
        <div class="d-flex align-items-center py-3" style="width: 20%">{{ __("status." . $return->status->name) }}</div>
        <div class="d-flex align-items-center py-3" style="width: 20%">€{{ number_format($returnItemSum, 2) }}</div>
        <div class="d-flex align-items-center py-3" style="width: 20%">
            {{ $return->created_at ? $return->created_at->format('Y-m-d'): '' }}
        </div>
        <div class="d-flex align-items-center py-3" style="width: 110px">
            <a href="{{ route('viewreturn', $return->id) }}" class="btn-small d-flex align-items-center gap-1">
                <i class="fa-solid fa-eye" style="font-size: .9rem"></i>
                {{ __('names.view') }}
            </a>
        </div>
    </div>
@empty
    <div class="d-flex align-items-center justify-content-between" style="border: 1px solid lightgray">
        <div class="d-flex align-items-center p-3 fs-6">{{ __('names.noReturns') }}</div>
    </div>
@endforelse
