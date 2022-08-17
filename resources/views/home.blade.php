@extends('layouts.app')

@section('content')
    <header class="banner">
        <div class="container">
            <div class="d-flex flex-column justify-content-center align-items-center text-light" style="gap: 30px">
                <div class="banner-text-container" style="gap: 15px">
                    <h1>LET’S TRAVEL</h1>
                    <h3>{{ __('Book Unique Tours & Experiences') }}</h3>
                </div>
                <div class="banner-search-container">
                    <input type="text" placeholder="{{ __('London, walking tour in Paris...') }}" class="banner-search-input">
                    <button type="submit" class="banner-search-button">
                        <i class="fa-solid fa-magnifying-glass me-2"></i>
                        {{ __('Find Now') }}
                    </button>
                </div>
            </div>
        </div>
    </header>
@endsection
