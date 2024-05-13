<div wire:poll.1s>
    <div class="axil-single-widget widget_archive">
        <ul class="">
            @forelse ($users ?? [] as $user)
                <li class="content">
                    <a class="" href="{{ route('livewire.messenger.show', [$user->id]) }}">
                        <span class="title">{{ $user->name }}</span>
                        <div>
                            @if ($user->last_message->user_from == auth()->user()->id)
                                <span class="">{{ __('names.you') }}:</span>
                            @endif
                                <span class="">{{ $user->last_message->message_text ?? '' }}</span>
                                <span>
                                    • {{ $user->last_message->created_at->diffForHumans(null, false, true) ?? ''}}
                                </span>
                        </div>
                        @if ($user->unread)
                            <div>{{ $user->unread }}</div>
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
        .axil-single-widget {
            border: 0px;
            padding: 0px;
        }
        .messenger-user {
            padding-left: 5px !important;
        }
    </style>
@endpush