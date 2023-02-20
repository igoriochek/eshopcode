<ul class="list-unstyled mt-4">
    @forelse ($addUsers as $user)
        <li>
            <div class="messenger-add-users-user flex-column flex-sm-row">
                <div class="mb-3 mb-sm-0">
                    <p class="messenger-add-users-name">{{ $user->name }}</p>
                    <p class="messenger-add-users-email">{{ $user->email }}</p>
                </div>
                <a class="messenger-add-users-button" href="{{ route('livewire.messenger.show', [$user->id]) }}">
                    <i class="fa-solid fa-comment me-1"></i>
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
        @if (count($addUsers)>0)
            {{ $addUsers->onEachSide(1)->links() }}
        @endif
    </div>
</ul>
