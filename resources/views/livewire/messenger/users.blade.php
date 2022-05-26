<div wire:poll.1s style="margin: 1em 0" >
    <h3>Users:</h3>
    <ul style="padding: 0;">
        @forelse ($users ?? [] as $user)
                <li style="display: flex; justify-content: space-between; align-items: center">
                    <a href="{{ route('livewire.messenger.show', [$user->id]) }}">{{ $user->name }}</a>
                    @if ($user->unread)
                        <span>{{ $user->unread }}</span>
                    @endif
                </li>
        @empty
            <div style="display: flex; justify-content: center; align-items: center;">
                <span>No users found</span>
            </div>
        @endforelse
    </ul>
</div>