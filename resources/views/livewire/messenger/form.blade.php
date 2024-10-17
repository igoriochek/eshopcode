<div class="tp-header-search-2 d-block">
    <form wire:submit.prevent="sendMessage({{ $user->id }})">
        <div class="d-flex">
            <input
                type="text"
                class="form-control w-100"
                placeholder="{{__('messages.typeYourMsgHere')}}"
                wire:model="message_text"
                required
                style="margin-right: 10px;">
            <button type="submit" class="btn btn-primary">
                <i class="fa-regular fa-paper-plane fs-5"></i>
            </button>
        </div>
    </form>
</div>

<style>
    .btn {
        --bs-btn-padding-x: 0.85rem;
    }
</style>