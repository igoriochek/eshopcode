<div class="row mt-3">
    <form wire:submit.prevent="sendMessage({{ $user->id }})">
        <div>
            <div class="header-search d-flex">
                <input class="input_form" type="text" wire:model="message_text" placeholder="{{__('messages.typeYourMsgHere')}}" wire:model="message_text" required
                    placeholder="{{ __('names.product') . '...' }}" value="{{ $filter['namelike'] ?? '' }}">
                <button type="submit" class="send_button">
                    {{ __('messages.send') }}
                </button>
            </div>
        </div>
    </form>
</div>

<style>
    .input_form {
        height: 35px;
        border: 1px solid #e1e1e1;
        background: #fff;
        color: #222222;
        width: 100%;
        padding: 0 15px;
        transition: all 0.3s ease 0s;
        margin: 0;
        margin-bottom: 0px;
        font-family: inherit;
        font-size: inherit;
        line-height: inherit;
    }

    .send_button {
        color: #fff;
        display: inline-block;
        background: #242424;
        border: none;
        padding: 0 20px;
        height: 34px;
        line-height: 35px;
        text-transform: uppercase;
        font-size: 12px;
        font-weight: 600;
        transition: .3s;
        border-radius: 3px;
    }

    .send_button:hover {
        color: #fff;
        background: #79a206;
    }
</style>