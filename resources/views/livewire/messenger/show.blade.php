@section('title', $user->name ?? __('names.user'))
@section('parentTitle', __('menu.messenger'))
@section('parentUrl', url('/user/messenger'))

<div>
    <section class="pt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0">
                    <div class="single-shop-sidebar-widget categories">
                        <div class="widget">
                            <div class="widget-title-container d-flex justify-content-between align-items-center mb-2">
                                <h3 class="widget-title m-0">
                                    {{ __('names.messages') }}
                                </h3>
                                <a href="{{ route('livewire.messenger.add') }}" class="default-btn style5">
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
