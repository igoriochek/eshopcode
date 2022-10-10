<div class="row mt-3">
    <form wire:submit.prevent="sendMessage({{ $user->id }})">
        <div class="d-flex">
            <input
                type="text"
                class="me-3"
                placeholder="{{__('messages.typeYourMsgHere')}}"
                wire:model="message_text"
                required
            >
            <button type="submit" class="btn btn-primary">
                {{__('messages.send')}}
            </button>
        </div>
    </form>
</div>
