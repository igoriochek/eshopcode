<ul class="list-unstyled">
    @forelse ($addUsers as $user)
        @if ($user->type == 1)
            <li>
                <div class="messenger-add-users-user flex-column flex-sm-row single-shop-sidebar-widget color-and-item px-4">
                    <div class="mb-3 mb-sm-0">
                        <p class="messenger-add-users-name mb-1 text-dark">
                            {{ $user->name }}
                        </p>
                        <p class="messenger-add-users-email mb-0">{{ $user->email }}</p>
                    </div>
                    <a class="default-btn style5" href="{{ route('livewire.messenger.show', [$user->id]) }}">
                        {{ __('buttons.contact') }}
                    </a>
                </div>
            </li>
        @endif
    @empty
        <div>
            <span class="text-muted">{{ __('names.noUncontactedUsers') }}</span>
        </div>
    @endforelse
    <div class="default-pagination mt-20">
        @if (count($addUsers) > 0)
            {{ $addUsers->onEachSide(1)->links() }}
        @endif
    </div>
</ul>
