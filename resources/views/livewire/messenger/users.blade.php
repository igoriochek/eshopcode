<div wire:poll.1s>
    <ul class="messenger-users list-unstyled">
        @forelse ($users ?? [] as $user)
            <li class="">
                <a class="" href="{{ route('livewire.messenger.show', [$user->id]) }}">
                    <div class="content">
                        <div class="w-75 my-2">
                            <div>
                                <h6 class="mb-2">{{ $user->name }}</h6>
                            </div>
                            <div class="" style="display: flex; justify-content: flex-start;">
                                @if ($user->last_message->user_from == auth()->user()->id)
                                    <span class="me-1" style="color: #6c788c;">{{ __('names.you') }}:</span>
                                @endif
                                <div class="messenger-user-last-message">
                                    <p class="last-message mb-0" style="color: #6c788c;">
                                        {{ $user->last_message->message_text ?? '' }}</p>
                                </div>
                            </div>
                            <span style="color: #6c788c;">
                                • {{ $user->last_message->created_at->diffForHumans(null, false, true) ?? '' }}
                            </span>
                        </div>
                        @if ($user->unread)
                            <div class="messenger-user-unread-container">
                                <div class="messenger-user-unread">{{ $user->unread }}</div>
                            </div>
                        @endif
                    </div>

                </a>
            </li>
            @if (!$loop->last)
                <hr class="messenger-users-hr my-2" />
            @endif
        @empty
            <div>
                <span>{{ __('table.noUsersFound') }}</span>
            </div>
        @endforelse
    </ul>
</div>

<style>
    .messenger-user {
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-decoration: none;
        width: 100%;
    }

    .messenger-user-unread-container {
        display: flex;
        width: 19px;
        margin-right: 11px;
        margin-left: 11px;
        align-items: center;
    }

    .messenger-user-unread {
        width: 19px;
        height: 19px;
        background-color: #ee3231;
        border-radius: 10px;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 0.65em;
        font-weight: 600;
        padding-top: 2px;
    }

    .last-message {
        display: inline-block;
        width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .messenger-user-last-message {
        padding: 0;
        margin: 0;
        width: 100%;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .content {
        display: flex;
        justify-content: space-between;
        padding-left: 10px;
    }

    .content:hover {
        border-left: 6px solid #ee3231;
        border-top: 0;
        border-bottom: 0;
        border-right: 0;
    }

    ::marker {
        unicode-bidi: isolate;
        font-variant-numeric: tabular-nums;
        text-transform: none;
        text-indent: 0px !important;
        text-align: start !important;
        text-align-last: start !important;
        display: none;
    }
</style>
