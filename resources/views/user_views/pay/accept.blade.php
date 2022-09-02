@extends('layouts.app')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row m-2">
            <div class="col-sm-6">
                <h1>Paysera Accept</h1>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
    <script>
        setTimeout(() => window.location.replace('{{ route('rootorders') }}'), 3000);
    </script>
@endpush
