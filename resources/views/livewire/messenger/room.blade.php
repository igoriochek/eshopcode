<div wire:poll.1s='updateMessages' class="messenger-room p-4 single-shop-sidebar-widget color-and-item">
    <div>
        <h4 class="title">
            {{ __('menu.admin').' '.$user->name }}
        </h4>
    </div>
    <div class="messenger-message-box" id="messsageBox">
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

@push('css')
    <style>
        .messenger-room .messenger-message-box {
            background-color: #f9f3f0;
        }
        .messenger-room .messenger-message-box .messenger-message-to-container .messenger-message-to {
            background-color: #3577f0;
        }
    </style>
@endpush


@push('scripts')
    <script>
        const messageBox = document.getElementById('messsageBox');
        messageBox.scrollTop = messageBox.scrollHeight;
    </script>
@endpush
