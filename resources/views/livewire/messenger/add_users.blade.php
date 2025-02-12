<ul style="width: 100%;">
    <div class="shop_toolbar_wrapper">
        <div class="page_amount">
            <p>
                {{ __('names.showing') }}
                @if ($addUsers->currentPage() !== $addUsers->lastPage())
                {{ ($addUsers->count() * $addUsers->currentPage() - $addUsers->count() + 1).__('–').($addUsers->count() * $addUsers->currentPage()) }}
                @else
                @if ($addUsers->total() - $addUsers->count() === 0)
                {{ $addUsers->count() }}
                @else
                {{ ($addUsers->total() - $addUsers->count()).__('–').$addUsers->total() }}
                @endif
                @endif
                {{ __('names.of') }}
                {{ $addUsers->total().' '.__('names.entries') }}
            </p>
        </div>
    </div>
    @forelse ($addUsers as $user)
    @if ($user->type == 1)
    <li class="mb-3">
        <div class="desc">
            <div class="col-lg-6">
                <h4 style="font-weight: 500;">{{ $user->name }}</h4>
                <p>{{ $user->email }}</p>
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-end">
                    <a class="contact_button" href="{{ route('livewire.messenger.show', [$user->id]) }}">
                        {{ __('buttons.contact') }}
                    </a>
                </div>
            </div>
        </div>
    </li>
    @endif
    @empty
    <div>
        <span class="text-muted">{{ __('names.noUncontactedUsers') }}</span>
    </div>
    @endforelse
    <div class="col-12">
        <div class="bb-pro-pagination">
            <div class="bb-pro-pagination">
                @if (count($addUsers) > 0)
                {{ $addUsers->onEachSide(1)->links() }}
                @endif
            </div>
        </div>
    </div>
</ul>

<style>
    .desc {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>