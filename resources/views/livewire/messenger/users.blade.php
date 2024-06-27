<div wire:poll.1s>
    <div class="axil-single-widget widget_archive">
        <ul class="">
            @forelse ($users ?? [] as $user)
                <li class="content">
                    <a class="messenger-user" href="{{ route('livewire.messenger.show', [$user->id]) }}">
                        <div class="messenger-information-container">
                            <span class="title">{{ $user->name }}</span>
                            <div class="messenger-user-last-message-container">
                                @if ($user->last_message->user_from == auth()->user()->id)
                                    <span class="">{{ __('names.you') }}: </span>
                                @endif
                                <div class="messenger-user-last-message">
                                    <span class="mb-0 last-message">{{ $user->last_message->message_text ?? '' }}</span>
                                </div>
                            </div>
                            <span>
                                • {{ $user->last_message->created_at->diffForHumans(null, false, true) ?? ''}}
                            </span>
                        </div>
                        @if ($user->unread)
                            <div class="messenger-user-unread-container">
                                <div class="messenger-user-unread">{{ $user->unread }}</div>
                            </div>
                        @endif
                    </a>
                </li>
                @if (!$loop->last)
                    <hr class="mb-3"/>
                @endif
            @empty
                <div>
                    <span>{{__('table.noUsersFound')}}</span>
                </div>
            @endforelse
        </ul>
    </div>
</div>


@push('css')
    <style>
        .messenger-user {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-decoration: none;
            width: 100%;
        }
        .messenger-information-container {
            flex: 1;
            min-width: 0;
        }
        .last-message {
            display: inline-block;
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .axil-single-widget {
            border: 0px;
            padding: 0px;
        }
        .messenger-user-last-message-container {
            display: flex;
            width: 100%;
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
            background-color: #3577f0;
            border-radius: 10px;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 0.65em;
            font-weight: 600;
            padding-top: 2px;
        }
    </style>
@endpush