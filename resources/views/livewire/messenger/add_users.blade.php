<ul class="list-unstyled">
    @forelse ($addUsers as $user)
        <li class="my-4 p-4 border-radius-5" style="border: 1px solid #efefef">
            <div class="d-flex justify-content-between w-100 flex-column flex-sm-row">
                <div class="mb-3 mb-sm-0">
                    <p class="messenger-add-users-name mb-0">
                        {{ $user->name }}
                        <span class="text-muted">
                            @if ($user->type == 1) ({{ __('admin') }}) @endif
                        </span>
                    </p>
                    <p class="mb-0">{{ $user->email }}</p>
                </div>
                <a class="btn btn-primary px-4" href="{{ route('livewire.messenger.show', [$user->id]) }}">
                    {{ __('buttons.contact') }}
                </a>
            </div>
        </li>
    @empty
        <div>
            <span class="text-muted">{{ __('names.noUncontactedUsers') }}</span>
        </div>
    @endforelse
    <hr class="messenger-users-hr my-0"/>
    <div class="pt-3 mt-3">
        @if (count($addUsers) > 0)
            {{ $addUsers->links() }}
        @endif
    </div>
</ul>
