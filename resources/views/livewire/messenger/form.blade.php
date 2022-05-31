<div class="row mt-3">
    <form wire:submit.prevent="sendMessage({{ $user->id }})">
        <div class="d-flex justify-content-between align-items-center">
            <input
                type="text"
                class="form-control me-3"
                placeholder="{{__('messages.typeYourMsgHere')}}"
                wire:model="message_text"
                required
            >
            <button type="submit" class="btn btn-primary w-auto">{{__('messages.send')}}</button>
        </div>
    </form>
</div>
