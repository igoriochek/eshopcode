<div>
    @include('header', ['title' => __('messages.messenger'), 'paragraph' => __('names.contactUsers')])
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
                            </div>
                            <div class="category-tree-widget-content">
                                @include('livewire.messenger.users')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 mb-5">
                    <div class="messenger-add-users p-4 mb-4 mb-sm-5">
                        <h4 class="messenger-add-users-title m-0">
                            {{ __('names.contactUsers') }}
                        </h4>
                        <p class="p-0 m-0 showing-all-results">
                            {{ __('names.results').': '.$addUsers->count() }}
                        </p>
                        <hr class="hr"/>
                        @include('livewire.messenger.add_users')
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
