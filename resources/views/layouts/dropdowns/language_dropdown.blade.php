<div class="dropdown-menu dropdown-menu-arrow-centered min-width-0" aria-labelledby="dropdownCurrency" style="">
    @foreach (config('translatable.locales') as $locale)
        <a class="dropdown-item" href="/lang/{{ $locale }}" style="font-size: 1.5rem;">
            {{ strtoupper($locale) }}
        </a>
    @endforeach
</div>
