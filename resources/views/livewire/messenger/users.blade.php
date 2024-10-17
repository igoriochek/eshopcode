<div style="border-radius: 10px;" wire:poll.1s>
    <ul class="messenger-users list-unstyled">
        @forelse ($users ?? [] as $user)
            <li class="messenger-user-container">
                <a class="messenger-user" href="{{ route('livewire.messenger.show', [$user->id]) }}">
                    <div class="messenger-information-container">
                        <div class="my-2">
                            <div>
                                <p class="messenger-user-name mb-0">{{ $user->name }}</p>
                            </div>
                            <div class="messenger-user-last-message-container">
                                @if ($user->last_message->user_from == auth()->user()->id)
                                    <span class="me-1">{{ __('names.you') }}:</span>
                                @endif
                                <div class="messenger-user-last-message">
                                    <p class="mb-0">{{ $user->last_message->message_text ?? '' }}</p>
                                    <span>
                                        • {{ $user->last_message->created_at->diffForHumans(null, false, true) ?? ''}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($user->unread)
                        <div class="messenger-user-unread-container">
                            <div class="messenger-user-unread" style="padding-top: 0px; background-color: #165bfe;">{{ $user->unread }}</div>
                        </div>
                    @endif
                </a>
            </li>
            @if (!$loop->last)
                <hr class="messenger-users-hr my-2" style="height: 0px; color: #EEEEEE;"/>
            @endif
        @empty
            <div>
                <span>{{__('table.noUsersFound')}}</span>
            </div>
        @endforelse
    </ul>
</div>

<style>

    .messenger-user-unread {
        padding-top: 0px;
        background-color: #165bfe;
    }

    .messenger-users .messenger-user-container .messenger-user:hover {
        border-radius: 10px;
        /* border: 10px solid red; */
    }

    .messenger-user-unread {
        background-color: #175cff;
        padding-top: 0px;
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
