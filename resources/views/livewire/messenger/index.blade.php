<div>
    @include('header', ['title' => __('messages.messenger')])
    <section class="pt-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 mt-4 mt-md-5 mt-lg-0">
                    <div class="sidebar">
                        <div class="widget">
                            <div class="widget-title-container d-flex justify-content-between align-items-center mb-2">
                                <h4 class="widget-title m-0">
                                    {{ __('names.messages') }}
                                </h4>
                                <a class="messenger-users-add" href="{{ route('livewire.messenger.add') }}">
                                    <i class="fa-solid fa-plus"></i>
                                    {{__('buttons.contact')}}
                                </a>
                            </div>
                            <div class="category-tree-widget-content">
                                @include('livewire.messenger.users')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-5">
                    <div class="d-flex justify-content-center align-items-center">
                        <span class="text-muted">{{__('messages.openChat')}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
