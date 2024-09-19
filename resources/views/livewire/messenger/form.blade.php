<div class="row mt-3">
    <form wire:submit.prevent="sendMessage({{ $user->id }})">
        <div class="single-shop-sidebar-widget search-bar mb-0" style="box-shadow: none">
            <div class="form-group d-flex align-items-stretch">
                <input type="text" class="form-control message-input" style="height: 45px"
                    placeholder="{{ __('messages.typeYourMsgHere') }}" wire:model="message_text" required>
                <button type="submit"
                    class="btn btn btn-custom-size md-size btn-primary btn-secondary-hover rounded-0 p-0 py-2"
                    style="width: 50px; height: 45px; line-height: 0px; align-items: center; justify-content: center; display: flex;">
                    <i class="fa-regular fa-paper-plane fs-5"></i>
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
        }

        .form-group input {
            height: auto !important;
        }

        .form-group .submit-btn {
            flex-basis: 20%;
            white-space: nowrap;
        }

        .form-control {
            border-radius: 0rem;
        }

        .search-bar {
            padding: 0px;
        }
    </style>
@endpush
