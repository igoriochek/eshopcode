<div class="row mt-3">
    <form wire:submit.prevent="sendMessage({{ $user->id }})">
        <div class="messenger-form-container">
            <input
                type="text"
                class="messenger-form-input"
                placeholder="{{__('messages.typeYourMsgHere')}}"
                wire:model="message_text"
                required
            >
            <button type="submit" class="primary__btn messenger-form-button">
                {{__('messages.send')}}
            </button>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        const msgInput = document.querySelector('.messenger-form-input');

        msgInput.addEventListener("keypress", event => {
            setTimeout(() => {
                if (event.key === "Enter") {
                    msgInput.value = '';
                    event.preventDefault();
                }
            }, 200);
        });
    </script>
@endpush
