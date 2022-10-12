<div>
    @include('user_views.section', ['title' => __('menu.messenger')])
    <div id="position">
        <div class="container">
            <ul>
                <li>
                    <a href="{{ url('/user/messenger') }}">{{ __('menu.messenger') }}</a>
                </li>
                <li>
                    {{ $user->name }}
                </li>
            </ul>
        </div>
    </div>
    <section class="pt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title-container d-flex justify-content-between align-items-center mb-2">
                                <h6 class="widget-title m-0 text-uppercase">
                                    {{ __('names.messages') }}
                                </h6>
                                <a class="messenger-users-contact" href="{{ route('livewire.messenger.add') }}">
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
