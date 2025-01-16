<div class="row mt-3">
    <form wire:submit.prevent="sendMessage({{ $user->id }})">
        <div>
            <div class="header-search d-flex">
                <input type="text" wire:model="message_text" placeholder="{{__('messages.typeYourMsgHere')}}" wire:model="message_text" required
                    placeholder="{{ __('names.product') . '...' }}" value="{{ $filter['namelike'] ?? '' }}">
                <button type="submit" class="bb-btn-2">
                    {{ __('messages.send') }}
                </button>
            </div>
        </div>
    </form>
</div>