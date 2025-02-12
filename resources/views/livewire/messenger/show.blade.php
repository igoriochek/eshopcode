@section('title', $user->name ?? __('names.user'))
@section('parentTitle', __('menu.messenger'))
@section('parentUrl', url('/user/messenger'))

<div class="shop_area mb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <div class="blog_sidebar_widget">
                    <div class="widget_list widget_search">
                        <div class="widget_title">
                            <h3>{{ __('names.messages') }}</h3>
                            <a href="{{ route('livewire.messenger.add') }}" class="contact_button">
                                {{ __('buttons.contact') }}
                            </a>
                        </div>
                        @include('livewire.messenger.users')
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mb-5">
                @include('livewire.messenger.room')
            </div>
        </div>
    </div>
</div>

<style>
    .widget_list h3 {
        border-bottom: 0px;
        padding-bottom: 0px;
    }

    .blog_sidebar_widget .widget_title {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid #e1e1e1;
        padding-bottom: 10px;
        margin-bottom: 10px;
    }
</style>