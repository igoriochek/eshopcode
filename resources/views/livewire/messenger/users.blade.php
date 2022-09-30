<div wire:poll.1s>
    <ul class="messenger-users">
        @forelse ($users ?? [] as $user)
            <li class="messenger-user-container">
                <a class="messenger-user" href="{{ route('livewire.messenger.show', [$user->id]) }}">
                    <div class="messenger-information-container">
                        <div>
                            <div class="mb-2">
                                <p class="messenger-user-name">{{ $user->name }}</p>
                            </div>
                            <div class="messenger-user-last-message-container">
                                @if ($user->last_message->user_from == auth()->user()->id)
                                    <span class="me-1">{{ __('names.you') }}:</span>
                                @endif
                                <div class="messenger-user-last-message">
                                    <p>{{ $user->last_message->message_text ?? '' }}</p>
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
            {{--<hr class="messenger-users-hr"/>--}}
        @empty
            <div class="mt-4">
                <span class="text-muted">{{__('table.noUsersFound')}}</span>
            </div>
        @endforelse
    </ul>
</div>
