<div class="row mt-3">
    <form wire:submit.prevent="sendMessage({{ $user->id }})">
        <div class="single-shop-sidebar-widget search-bar mb-0" style="box-shadow: none">
            <div class="form-group d-flex align-items-stretch">
                <input
                    type="text"
                    class="form-control message-input"
                    placeholder="{{__('messages.typeYourMsgHere')}}"
                    wire:model="message_text"
                    style="font-size: 14px;"
                    required
                >
                <button type="submit" class="btn btn-primary">
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
            margin-right: 0px;
            padding: 1rem 22rem 1rem 2rem;
            border: 2px solid #0090f0;
            border-top-left-radius: 3rem;
            border-bottom-left-radius: 3rem;
            border-top-right-radius: 0rem;
            border-bottom-right-radius: 0rem;
        }

        .btn {
            border-top-left-radius: 0rem;
            border-bottom-left-radius: 0rem;
            border-top-right-radius: 3rem;
            border-bottom-right-radius: 3rem;
        }

        .form-group input {
            height: auto !important;
        }
        .form-group .submit-btn {
            flex-basis: 20%;
            white-space: nowrap;
        }
        .search-bar {
            padding: 0px;
        }
    </style>
@endpush
