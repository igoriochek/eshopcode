<div>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('messages.messenger')}}</h1>
                </div>
            </div>
        </div>
    </section>
    <div class="content px-3">
        <div class="row px-3" style="gap: 10px">
            @include('flash::message')
            <div class="clearfix"></div>
            <div class="card p-3 col-sm-2 h-100">
                <div class="card-body">
                    @include('livewire.messenger.users')
                </div>
            </div>
            <div class="card p-3 col-sm h-100">
                <div class="card-body">
                    @include('livewire.messenger.table')
                </div>
            </div>
        </div>
    </div>
</div>
