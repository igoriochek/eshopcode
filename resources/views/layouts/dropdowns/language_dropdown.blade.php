<div class="dropdown-menu dropdown-menu-arrow-centered min-width-0" aria-labelledby="" id=languageDropdown>
    @foreach (config('translatable.locales') as $locale)
    <a class="dropdown-item" href="/lang/{{ $locale }}" style="font-size: 1.5rem; padding: 0px;">
        {{ strtoupper($locale) }}
    </a>
    @if (!$loop->last)
    <hr class="dropdown-divider">
    @endif
    @endforeach
</div>
