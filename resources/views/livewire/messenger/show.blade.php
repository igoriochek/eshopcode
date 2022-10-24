<div>
    @include('layouts.navi.page-banner',[
        'secondPageLink' => 'messenger',
        'secondPageName' => __('menu.messenger'),
        'hasThirdPage' => true,
        'thirdPageName' => $user->name,
    ])
    <section class="pt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title-container d-flex justify-content-between align-items-center mb-2">
                                <h6 class="widget-title m-0">
                                    {{ __('names.messages') }}
                                </h6>
                                <a class="btn btn-primary btn-hover-secondary" href="{{ route('livewire.messenger.add') }}">
                                    <i class="fa-solid fa-plus"></i>
                                    {{ __('buttons.contact') }}
                                </a>
                            </div>
                            <div class="category-tree-widget-content">
                                @include('livewire.messenger.users')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @include('livewire.messenger.room')
                </div>
            </div>
        </div>
    </section>
</div>

@push('css')
    <style>
        .messenger-room .messenger-chat-user-name {
            color: #222;
            padding-bottom: 10px;
        }
        .messenger-room .messenger-message-box {
            display: flex-column;
            padding: 25px;
            overflow: scroll;
            height: 60vh;
            margin: 15px 0;
            scroll-behavior: smooth;
            border-radius: 5px;
            background-color: #f6f6f6;
        }
        .messenger-room .messenger-message-box .messenger-message-from-container, .messenger-room .messenger-message-box .messenger-message-to-container {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .messenger-room .messenger-message-box .messenger-message-from, .messenger-room .messenger-message-box .messenger-message-to {
            padding: 8px 20px;
            max-width: 500px;
        }
        .messenger-room .messenger-message-box .messenger-message-from-container .messenger-message-from {
            background-color: #fff;
            border-radius: 0 15px 15px 15px;
        }
        .messenger-room .messenger-message-box .messenger-message-from-date-container, .messenger-room .messenger-message-box .messenger-message-to-date-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .messenger-room .messenger-message-box .messenger-message-to-container {
            flex-direction: row-reverse;
            justify-content: flex-start;
        }
        .messenger-room .messenger-message-box .messenger-message-to-container .messenger-message-to {
            background-color: #1e81f3;
            color: #fff;
            border-radius: 15px 0 15px 15px;
        }
        .messenger-room .messenger-message-box .messenger-message-to-date-container {
            flex-direction: row-reverse;
            justify-content: flex-start;
        }
        .messenger-room .messenger-message-box .messenger-message-date {
            font-size: 0.7em;
            color: #777;
        }
        .messenger-room .messenger-form-container {
            display: flex;
            justify-content: start;
            align-content: center;
            height: 60px;
            width: 100%;
            gap: 15px;
        }
        .messenger-room .messenger-form-container .messenger-form-input {
            width: 100%;
            height: 100%;
            border: none;
            border-radius: 5px;
            padding: 20px;
            font-size: 1em;
            background: #f2f2f2;
        }
        .messenger-room .messenger-form-container .messenger-form-input::placeholder {
            color: #aaa;
        }
        .messenger-room .messenger-form-container .messenger-form-input:focus {
            background: #fff;
            outline: 2px solid #2b6dd2;
        }
        .messenger-room .messenger-form-container .messenger-form-button {
            height: 100%;
        }
        .sidebar .category-tree-widget-content li {
            list-style: none;
        }
        .sidebar .category-tree-widget-content li a {
            text-decoration: none;
            transition: color 400ms ease;
        }
    </style>
@endpush

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
