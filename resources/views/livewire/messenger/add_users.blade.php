@forelse ($addUsers as $user)
    @if ($user->type == 1)
        <article class="tp-postbox-item format-image transition-3 p-3">
            <div class="tp-postbox-content d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="tp-sidebar-widget-title mb-0">
                        {{ $user->name }}
                    </h2>
                    <p class="mb-0">
                        {{ $user->email }}
                    </p>
                </div>
                <a href="{{ route('livewire.messenger.show', [$user->id]) }}" 
                    class="tp-load-more-btn d-flex align-items-center" style="height: 40px">
                    {{ __('buttons.contact') }}
                </a>
            </div>
        </article>
        @if (!$loop->last)
            <div style="background: #EEEEEE; height: 1px"></div>
        @endif
    @endif
@empty
    <span class="text-muted">{{ __('names.noUncontactedUsers') }}</span>
@endforelse
<div class="tp-blog-pagination mt-50">
    <div class="tp-pagination">
        @if (count($addUsers) > 0)
            {{ $addUsers->onEachSide(1)->links() }}
        @endif
    </div>
</div>