<div class="row mt-3">
    <form wire:submit.prevent="sendMessage({{ $user->id }})">
        <div class="single-shop-sidebar-widget search-bar p-0 mb-0" style="box-shadow: none">
            <div class="form-group">
                <input
                    type="text"
                    class="form-control w-100"
                    placeholder="{{__('messages.typeYourMsgHere')}}"
                    wire:model="message_text"
                    required
                >
                <button type="submit" class="search-btn fs-6">
                    {{ __('messages.send') }}
                </button>
            </div>
        </div>
    </form>
</div>
