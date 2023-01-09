<div class="row mt-3">
    <form wire:submit.prevent="sendMessage({{ $user->id }})">
        <div class="d-flex">
            <input
                type="text"
                class="me-3 w-100"
                placeholder="{{__('messages.typeYourMsgHere')}}"
                wire:model="message_text"
                required
            >
            <button type="submit" class="btn btn-primary p-3" style="width: 150px">
                <i class="fa-solid fa-paper-plane me-1"></i>
                {{__('messages.send')}}
            </button>
        </div>
    </form>
</div>
