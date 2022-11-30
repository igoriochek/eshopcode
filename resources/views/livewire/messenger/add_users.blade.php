<ul class="widget__categories--menu">
    @forelse ($addUsers as $user)
        <li class="widget__categories--menu__list p-3 my-4 d-flex justify-content-between align-items-center">
            <div class="d-flex flex-column">
                <span class="widget__categories--sub__menu--text fw-bold">
                    {{ $user->name }}
                    @if ($user->type == 1) ({{ __('admin') }}) @endif
                </span>
                    <span class="widget__categories--sub__menu--text product-count">
                    {{ $user->email }}
                </span>
            </div>
            <a class="primary__btn" href="{{ route('livewire.messenger.show', [$user->id]) }}">
                {{ __('buttons.contact') }}
            </a>
        </li>
    @empty
        <li>
            <span class="text-muted ms-4">{{ __('names.noUncontactedUsers') }}</span>
        </li>
    @endforelse
    @if (count($addUsers) > 0)
        <div class="pagination__area">
            <nav class="pagination justify-content-center">
                {{ $addUsers->onEachSide(1)->links() }}
            </nav>
        </div>
    @endif
</ul>
