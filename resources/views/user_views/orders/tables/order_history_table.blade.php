@foreach ($logs as $log)
    <div class="d-flex gap-2 px-4 text-dark fs-6" style="border: 1px solid lightgray; @if ($loop->last) border-radius: 0 0 8px 8px; @endif">
        <div class="d-flex align-items-center py-3" style="width: 50%">{{ $log->created_at }}</div>
        <div class="d-flex align-items-center py-3" style="width: 50%">{{ $log->activity }}</div>
    </div>
@endforeach
