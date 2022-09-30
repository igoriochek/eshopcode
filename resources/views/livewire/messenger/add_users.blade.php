<ul class="list-unstyled">
    @forelse ($addUsers as $user)
        <li>
            <div class="messenger-add-users-user flex-column flex-sm-row">
                <div class="mb-3 mb-sm-0">
                    <p class="messenger-add-users-name">{{ $user->name }}</p>
                    <p class="messenger-add-users-email">{{ $user->email }}</p>
                </div>
                <a class="messenger-add-users-button" href="{{ route('livewire.messenger.show', [$user->id]) }}">
                    {{ __('buttons.contact') }}
                </a>
            </div>
        </li>
    @empty
        <div>
            <span class="text-muted">{{ __('names.noUncontactedUsers') }}</span>
        </div>
    @endforelse
    <div class="pt-3 mt-3">
        {{ $addUsers->links() }}
    </div>
</ul>
