<div>
    <!-- Start breadcrumb section -->
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <h1 class="breadcrumb__content--title">{{ $user->name }}</h1>
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/') }}">{{ __('menu.home') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <a href="{{ url('/user/messenger') }}">{{ __('menu.messenger') }}</a>
                            </li>
                            <li class="breadcrumb__content--menu__items">
                                <span>{{ $user->name }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End breadcrumb section -->
    <div class="shop__section section--padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 shop-col-width-lg-4">
                    <div class="shop__sidebar--widget widget__area d-block mb-5 mb-lg-0" style="top: 100px">
                        <div class="single__widget widget__bg">
                            <h2 class="widget__title h3 d-flex align-items-center justify-content-between">
                                {{ __('names.messages') }}
                                <a class="primary__btn product__card--btn " href="{{ route('livewire.messenger.add') }}">
                                    <i class="fa-solid fa-plus me-2"></i>
                                    {{ __('buttons.contact') }}
                                </a>
                            </h2>
                            @include('livewire.messenger.users')
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 shop-col-width-lg-8">
                    @include('livewire.messenger.room')
                </div>
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
