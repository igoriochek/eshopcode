@forelse ($addUsers as $user)
    @if ($user->type == 1)
        <article class="tp-postbox-item format-image transition-3 p-3">
            <div class="tp-postbox-content d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="tp-sidebar-widget-title mb-2">
                        {{ $user->name }}
                    </h5>
                    <p class="mb-0">
                        {{ $user->email }}
                    </p>
                </div>
                <a href="{{ route('livewire.messenger.show', [$user->id]) }}"
                    class="btn btn-custom-size md-size btn-primary btn-secondary-hover" style="line-height: 35px;">
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
<div class="tp-blog-pagination mt-5">
    <div class="tp-pagination">
        @if (count($addUsers) > 0)
            {{ $addUsers->onEachSide(1)->links() }}
        @endif
    </div>
</div>
