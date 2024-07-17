<div class="dropdown-menu dropdown-menu-arrow-centered min-width-0" aria-labelledby="dropdownCurrency" style="">
    @foreach (config('translatable.locales') as $locale)
        <a href="/lang/{{ $locale }}" class="dropdown-item" style="font-size: .9rem;">
            {{ strtoupper($locale) }}
        </a>
    @endforeach
</div>
