<div wire:poll.1s='updateMessages'>
    <div>
        <h4 class="pb-2">{{$user->name}}</h4>
    </div>
    <div class="card" id="messsageBox" style="display: flex-column; padding: 20px; overflow: scroll; height: 50vh; margin: 15px 0;">
        @forelse ($messages ?? [] as $message)
            @if ($message->user_from === $user->id)
                <div style="display: flex; align-items: center; gap: 20px;">
                    <span style="background-color: #eeeeee; border-radius: 0 15px 15px 15px; padding: 10px 20px; max-width: 500px; font-size: 1rem">
                        {{ $message->message_text }}
                    </span>
                </div>
                <div style="display: flex; align-items: center; margin-bottom: 15px;">
                    <span style="font-size: 0.8em">{{ $message->created_at->format('M d, H:i A') }}</span>
                </div>
            @else
                <div style="display: flex; flex-direction: row-reverse; justify-content: flex-start; align-items: center; gap: 20px;">
                    <span class="text-light" style="background-color: #2bcc70; color: #eeeeee; border-radius: 15px 0 15px 15px; padding: 10px 20px; max-width: 500px; font-size: 1rem">
                        {{ $message->message_text }}
                    </span>
                </div>
                <div style="display: flex; flex-direction: row-reverse; justify-content: flex-start; align-items: center; margin-bottom: 15px;">
                    <span style="font-size: 0.8em">{{ $message->created_at->format('M d, H:i A') }}</span>
                </div>
            @endif
        @empty
            <div style="display: flex; justify-content: center; align-items: center;">
                <span>{{__('messages.emptyChat')}}</span>
            </div>
        @endforelse
    </div>
    @include('livewire.messenger.form')
</div>
@push('scripts')
    <script>
        const messageBox = document.getElementById('messsageBox');
        messageBox.scrollTop = messageBox.scrollHeight;
    </script>
@endpush
