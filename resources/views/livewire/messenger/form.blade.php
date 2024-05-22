<div class="row mt-3">
    <form wire:submit.prevent="sendMessage({{ $user->id }})">
        <div class="single-shop-sidebar-widget search-bar mb-0" style="box-shadow: none">
            <div class="form-group d-flex align-items-stretch">
                <input
                    type="text"
                    class="form-control message-input"
                    placeholder="{{__('messages.typeYourMsgHere')}}"
                    wire:model="message_text"
                    required
                >
                <button type="submit" class="axil-btn btn-bg-primary submit-btn">
                    {{ __('messages.send') }}
                </button>
            </div>
        </div>
    </form>
</div>

@push('css')
    <style>
        .form-group.d-flex {
            display: flex;
            flex-wrap: nowrap;
            width: 100%;
            justify-content: center;
            align-items: center;
            margin-bottom: 0px;
        }
        .form-group .message-input {
            flex-grow: 1;
            margin-right: 8px;
            height: 100%;
        }
        .form-group .submit-btn {
            flex-basis: 20%;
            white-space: nowrap;
        }
        .search-bar {
            padding: 0px 8px 0px 8px;
        }
    </style>
@endpush
