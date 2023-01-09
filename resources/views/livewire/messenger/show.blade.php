<div>
    @include('page_header', [
        'secondPageLink' => 'messenger',
        'secondPageName' => __('menu.messenger'),
        'hasThirdPage' => true,
        'thirdPageName' => $user->name
    ])
    <div class="container mb-30 mt-30" style="transform: none;">
        <div class="row" style="transform: none;">
            <div class="col-lg-4 col-md-12 primary-sidebar sticky-sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                <!-- Messenger Sidebar Widget -->
                <div class="theiaStickySidebar" style="padding-top: 0; padding-bottom: 1px; position: static; transform: none; top: 0; left: 975.994px;">
                    <div class="sidebar-widget widget-category-2 mb-30">
                        <h5 class="section-title style-1 mb-30 d-flex justify-content-between align-items-center w-100">
                            {{ __('names.messages') }}
                            <a class="btn btn-primary" href="{{ route('livewire.messenger.add') }}">
                                <i class="fa-solid fa-address-book me-1"></i>
                                {{ __('buttons.contact') }}
                            </a>
                        </h5>
                        @include('livewire.messenger.users')
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                @include('livewire.messenger.room')
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        /*
         * Scroll to previous Y position after sending your message
         */
        const setCookie = (cName, cValue, expDays) => {
            let date = new Date();
            date.setTime(date.getTime() + (expDays * 24 * 60 * 60 * 1000));
            const expires = `expires=${date.toUTCString()}`;
            document.cookie = `${cName}=${cValue};${expires}; path=/`;
        }

        const messengerWindowHeightValue = document.cookie
            .split('; ')
            .find((row) => row.startsWith('messengerWindowHeight='))
            ?.split('=')[1];

        window.onload = () => window.scrollTo(0, messengerWindowHeightValue);
        window.onscroll = () => setCookie('messengerWindowHeight', window.scrollY, 30);
    </script>
@endpush
