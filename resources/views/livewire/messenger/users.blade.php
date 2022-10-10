<div wire:poll.1s>
    <ul class="list-unstyled">
        @forelse ($users ?? [] as $user)
            <li>
                <a href="{{ route('livewire.messenger.show', [$user->id]) }}">
                    <div>
                        <div class="my-2">
                            <div>
                                <p class="text-dark mb-1">{{ $user->name }}</p>
                            </div>
                            <div class="d-flex w-100">
                                @if ($user->last_message->user_from == auth()->user()->id)
                                    <p class="me-1">{{ __('names.you') }}:</p>
                                @endif
                                <div class="d-flex">
                                    <p class="mb-0" style="display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden;">{{ $user->last_message->message_text ?? '' }}</p>
                                    <p style="width: 180px; margin-left: 5px">
                                        • {{ $user->last_message->created_at->diffForHumans(null, false, true) ?? ''}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($user->unread)
                        <div class="messenger-user-unread-container">
                            <span class="count">{{ $user->unread }}</span>
                        </div>
                    @endif
                </a>
            </li>
        @empty
            <div>
                <span>{{__('table.noUsersFound')}}</span>
            </div>
        @endforelse
    </ul>
</div>
