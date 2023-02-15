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
            <button type="submit" class="messenger-form-button">
                <i class="fa-solid fa-paper-plane fs-6 me-1"></i>
                {{__('messages.send')}}
            </button>
        </div>
    </form>
</div>
