<ul>
    @foreach (config('translatable.locales') as $locale)
        <li class="language__items">
            <a class="language__text" href="/lang/{{ $locale }}">
                {{ strtoupper($locale) }}
            </a>
        </li>
    @endforeach
</ul>
