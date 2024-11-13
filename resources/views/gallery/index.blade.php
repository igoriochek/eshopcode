@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    {{ __('names.gallery') }}
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>

                <div class="card-body">
                    <div class="row justify-content-center mt-2 p-2">
                        <div class="card p-2 w-100">
                            <h3>{{ __('names.uploadImages') }}</h3>
                            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                                @csrf
                                <div class="form-group">
                                    <input type="file" name="images[]" class="form-control" multiple accept="image/*">
                                    @error('images.*')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">{{ __('names.upload') }}</button>
                            </form>
                        </div>
                    </div>

                    <div class="row justify-content-center mt-2 p-2">
                        <div class="card p-2 w-100">
                            <h3>{{ __('names.galleryImages') }}</h3>
                            @if($images->count() > 0)
                                <h5 class="card-subtitle mb-2 text-muted">{{ __('names.displayingImages') }}
                                    ({{ __('names.showing') }} {{ $images->firstItem() }}-{{ $images->lastItem() }}
                                    {{ __('names.of') }} {{ $images->total() }})
                                </h5>
                                <div class="row">
                                    @foreach($images as $image)
                                        <div class="col-md-4 mb-4">
                                            <div class="card">
                                                <a href="{{ route('viewimage', $image->id) }}" class="image-link">
                                                <img src="{{ Storage::url('gallery/' . $image->filename) }}" 
                                                     class="card-img-top" 
                                                     style="width: 100%; height: auto; cursor: pointer;"
                                                     alt="{{ $image->original_filename }}">
                                                <div class="card-body">
                                                    <h5 class="card-title"> 
                                                        <a href="{{ route('viewimage', $image->id) }}" class="text-decoration-none">{{ $image->original_filename }} 
                                                        </a> 
                                                    </h5>
                                                    <p class="card-text">
                                                        <small class="text-muted">
                                                            {{ __('names.uploadedAt') }}: {{ $image->created_at->format('Y-m-d H:i') }}
                                                        </small>
                                                    </p>
                                                    <form action="{{ route('gallery.destroy', $image->id) }}" method="POST" 
                                                          onsubmit="return confirm('{{ __('names.confirmDelete') }}')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            {{ __('names.delete') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    {{ $images->links() }}
                                </div>
                            @else
                                <p class="card-text">{{ __('names.noImages') }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection