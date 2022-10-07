<div class="dropdown-menu dropdown-menu-arrow-centered min-width-0" aria-labelledby="dropdownCurrency" style="">
    @foreach (config('translatable.locales') as $locale)
        <a class="dropdown-item d-flex justify-content-start align-items-center gap-1" href="/lang/{{ $locale }}" style="font-size: .9rem;">
            <img src="{{ asset("images/$locale.png") }}" alt="{{ $locale }}">
            {{ strtoupper($locale) }}
        </a>
    @endforeach
</div>
