<div class="tp-header-search-2 d-block">
    <form wire:submit.prevent="sendMessage({{ $user->id }})">
        <input
            type="text"
            class="form-control w-100"
            placeholder="{{__('messages.typeYourMsgHere')}}"
            wire:model="message_text"
            required
        >
        <button type="submit">
            <i class="fa-regular fa-paper-plane fs-5"></i>                                 
        </button>
     </form>
 </div>
