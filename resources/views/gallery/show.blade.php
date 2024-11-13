@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('names.viewingImage') }}: {{ $image->original_filename }}
                </div>

                <div class="card-body">
                    <div class="row justify-content-center mt-2 p-2">
                        <div class="card p-2 w-100">
                            <div class="text-center">
                                <img src="{{ Storage::url('gallery/' . $image->filename) }}" 
                                     class="img-fluid" 
                                     alt="{{ $image->original_filename }}"
                                     style="max-height: 80vh;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $image->original_filename }}</h5>
                                <p class="card-text">
                                    <small class="text-muted">
                                        {{ __('names.uploadedAt') }}: {{ $image->created_at->format('Y-m-d H:i') }}<br>
                                        {{ __('names.fileSize') }}: {{ number_format($image->size / 1024, 2) }} KB<br>
                                        {{ __('names.fileType') }}: {{ $image->mime_type }}
                                    </small>
                                </p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <a href="{{ route('gallery.index') }}" class="btn btn-secondary">
                                        {{ __('names.backToGallery') }}
                                    </a>
                                    <form action="{{ route('gallery.destroy', $image->id) }}" method="POST" 
                                          onsubmit="return confirm('{{ __('names.confirmDelete') }}')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            {{ __('names.delete') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection