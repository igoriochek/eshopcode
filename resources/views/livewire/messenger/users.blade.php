<div wire:poll.1s>
    <ul class="messenger-users">
        <hr>
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
                            <div class="messenger-user-unread">{{ $user->unread }}</div>
                        </div>
                    @endif
                </a>
            </li>
        @empty
            <div>
                <span>{{__('table.noUsersFound')}}</span>
            </div>
        @endforelse
        <hr class="messenger-users-hr"/>
    </ul>
</div>

@push('css')
    <style>
        .messenger-users {
            padding: 0;
            margin: 0;
        }
        .messenger-users .messenger-user-container .messenger-user {
            display: flex;
            align-items: center;
            width: 100%;
            border-radius: 5px;
            transition: all 200ms ease;
            position: relative;
        }
        .messenger-users .messenger-user-container .messenger-user:hover > .messenger-information-container .messenger-user-name,
        .messenger-users .messenger-user-container .messenger-user:focus > .messenger-information-container .messenger-user-name,
        .messenger-users .messenger-user-container .messenger-user:hover > .messenger-information-container .messenger-user-last-message-container span,
        .messenger-users .messenger-user-container .messenger-user:focus > .messenger-information-container .messenger-user-last-message-container span,
        .messenger-users .messenger-user-container .messenger-user:hover > .messenger-information-container .messenger-user-last-message-container .messenger-user-last-message p,
        .messenger-users .messenger-user-container .messenger-user:focus > .messenger-information-container .messenger-user-last-message-container .messenger-user-last-message p,
        .messenger-users .messenger-user-container .messenger-user:hover > .messenger-information-container .messenger-user-last-message-container .messenger-user-last-message span,
        .messenger-users .messenger-user-container .messenger-user:focus > .messenger-information-container .messenger-user-last-message-container .messenger-user-last-message span {
            color: #08c;
        }
        .messenger-users .messenger-user-container .messenger-user .messenger-user-unread-container {
            width: 19px;
            margin-right: 11px;
        }
        .messenger-users .messenger-user-container .messenger-user .messenger-user-unread-container .messenger-user-unread {
            width: 19px;
            height: 19px;
            background-color: #08c;
            border-radius: 10px;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.65em;
            font-weight: 600;
            padding-top: 2px;
        }
        .messenger-users .messenger-user-container .messenger-user .messenger-information-container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }
        .messenger-users .messenger-user-container .messenger-user .messenger-information-container .messenger-user-name {
            color: #222;
            font-weight: 500;
            transition: color 200ms ease;
        }
        .messenger-users .messenger-user-container .messenger-user .messenger-information-container .messenger-user-last-message-container {
            display: flex;
            width: 100%;
        }
        .messenger-users .messenger-user-container .messenger-user .messenger-information-container .messenger-user-last-message-container span {
            color: #989898;
            transition: color 200ms ease;
        }
        .messenger-users .messenger-user-container .messenger-user .messenger-information-container .messenger-user-last-message-container .messenger-user-last-message {
            padding: 0;
            margin: 0;
            width: 100%;
            display: -webkit-flex;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .messenger-users .messenger-user-container .messenger-user .messenger-information-container .messenger-user-last-message-container .messenger-user-last-message p {
            color: #989898;
            width: auto;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-right: 5px;
            transition: color 200ms ease;
        }
        .messenger-users .messenger-user-container .messenger-user .messenger-information-container .messenger-user-last-message-container .messenger-user-last-message span {
            color: #989898;
            width: 150px;
            transition: color 200ms ease;
        }
        .messenger-users .messenger-user-container .messenger-user .messenger-information-container .messenger-user-last-message-container .messenger-user-last-message-date {
            color: #989898;
            font-size: 0.9em;
            padding: 0;
            margin: 0;
            transition: color 200ms ease;
        }
        .messenger-users .messenger-users-hr {
            height: 2px;
            background-color: #dcdcdc;
        }
    </style>
@endpush
