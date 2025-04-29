<ul>
    @forelse ($addUsers as $user)
        @if ($user->type == 1)
            <li class="mb-3">
                <div class="desc">
                    <div class="col-lg-6">
                        <p class="mb-1 text-dark">
                            {{ $user->name }}
                        </p>
                        <p>{{ $user->email }}</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-flex justify-content-end">
                            <a class="bb-btn-2" href="{{ route('livewire.messenger.show', [$user->id]) }}">
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
    @if (count($addUsers) > 0)
        <div class="col-12">
            <div class="bb-pro-pagination">
                <p>
                    {{ __('names.showing') }}
                    @if ($addUsers->currentPage() !== $addUsers->lastPage())
                        {{ $addUsers->count() * $addUsers->currentPage() - $addUsers->count() + 1 . __('–') . $addUsers->count() * $addUsers->currentPage() }}
                    @else
                        @if ($addUsers->total() - $addUsers->count() === 0)
                            {{ $addUsers->count() }}
                        @else
                            {{ $addUsers->total() - $addUsers->count() . __('–') . $addUsers->total() }}
                        @endif
                    @endif
                    {{ __('names.of') }}
                    {{ $addUsers->total() . ' ' . __('names.entries') }}
                </p>
                <div class="bb-pro-pagination">
                    @if (count($addUsers) > 0)
                        {{ $addUsers->onEachSide(1)->links() }}
                    @endif
                </div>
            </div>
        </div>
    @endif
</ul>

<style>
    .desc {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .pagination .page-item.active .page-link {
        background-color: #3d4750 !important;
        color: #fff !important;
        transition: all 0.3s ease-in-out !important;
        width: 32px !important;
        height: 32px !important;
        padding: 0 !important;
        font-weight: 300 !important;
        line-height: 32px !important;
        font-size: 15px !important;
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        text-align: center !important;
        vertical-align: top !important;
        -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        border-radius: 10px !important;
        border: 1px solid #eee !important;
    }

    .pagination .page-item .page-link {

        background: #f8f8fb;
        transition: all 0.3s ease-in-out !important;
        width: 32px !important;
        height: 32px !important;
        padding: 0 !important;
        font-weight: 300 !important;
        line-height: 32px !important;
        font-size: 15px !important;
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
        text-align: center !important;
        vertical-align: top !important;
        -webkit-box-pack: center !important;
        -ms-flex-pack: center !important;
        justify-content: center !important;
        -webkit-box-align: center !important;
        -ms-flex-align: center !important;
        align-items: center !important;
        border-radius: 10px !important;
        border: 1px solid #eee !important;

        &:hover {
            background-color: #3d4750 !important;
            color: #fff !important;
        }
    }
</style>
