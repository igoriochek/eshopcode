<div wire:poll.1s='updateMessages'>
    <div>
        <h3>{{$user->name}}</h3>
    </div>
    <div class="card" id="messsageBox" style="display: flex-column; padding: 20px; overflow: scroll; height: 50vh; margin: 15px 0;">
        @forelse ($messages ?? [] as $message)
            @if ($message->user_from === $user->id)
                <div style="display: flex; align-items: center; gap: 20px; margin: 5px 0;">
                    <span style="width: clamp(50px, 200px);">
                        {{$user->name}}
                    </span>
                    <span style="background-color: #eeeeee; border-radius: 10px; padding: 10px 20px; max-width: 500px;">
                        {{$message->message_text}}
                    </span>
                </div>
                <div style="display: flex; align-items: center; margin-bottom: 15px;">
                    <span style="font-size: 0.7em">{{$message->created_at}}</span>
                </div>
            @else
                <div style="display: flex; flex-direction: row-reverse; justify-content: flex-start; align-items: center; gap: 20px; margin: 5px 0;">
                    <span style="width: clamp(50px, 200px);">
                        {{auth()->user()->name}}
                    </span>
                    <span style="background-color: #5d48fb; color: #eeeeee; border-radius: 10px; padding: 10px 20px; max-width: 500px;">
                        {{$message->message_text}}
                    </span>
                </div>
                <div style="display: flex; flex-direction: row-reverse; justify-content: flex-start; align-items: center; margin-bottom: 15px;">
                    <span style="font-size: 0.7em">{{$message->created_at}}</span>
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
