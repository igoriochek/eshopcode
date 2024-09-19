<div wire:poll.1s='updateMessages'
    class="messenger-room px-0 pb-4 mb-sm-5 mt-10 mt-lg-0 single-shop-sidebar-widget color-and-item">
    <div>
        <h4 class="pb-1">
            {{ __('menu.admin') . ' ' . $user->name }}
        </h4>
    </div>
    <div class="messenger-message-box" id="messsageBox" style="border: 1px solid rgba(1, 15, 28, 0.1);">
        @forelse ($messages ?? [] as $message)
            @if ($message->user_from === $user->id)
                <div class="messenger-message-from-container">
                    <span class="messenger-message-from">
                        {{ $message->message_text }}
                    </span>
                </div>
                <div class="messenger-message-from-date-container">
                    <span class="messenger-message-date">
                        {{ $message->created_at->format('M d, H:i A') }}
                    </span>
                </div>
            @else
                <div class="messenger-message-to-container">
                    <span class="messenger-message-to">
                        {{ $message->message_text }}
                    </span>
                </div>
                <div class="messenger-message-to-date-container">
                    <span class="messenger-message-date">{{ $message->created_at->format('M d, H:i A') }}</span>
                </div>
            @endif
        @empty
            <div style="display: flex; justify-content: center; align-items: center;">
                <span class="text-muted">{{ __('messages.emptyChat') }}</span>
            </div>
        @endforelse
    </div>
    @include('livewire.messenger.form')
</div>

<style>
    .messenger-room .messenger-message-box .messenger-message-to-container .messenger-message-to {
        background-color: #ee3231;
    }

    .messenger-room .messenger-message-box {
        border-radius: 0px;
    }
</style>

@push('scripts')
    <script>
        const messageBox = document.getElementById('messsageBox');
        messageBox.scrollTop = messageBox.scrollHeight;
    </script>
@endpush
