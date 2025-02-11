<ul>
    @foreach (config('translatable.locales') as $locale)
        <li class="language__items">
            <a class="language__text" href="/lang/{{ $locale }}">
                <img src="{{asset('/images/flag-' . $locale . '.png')}}" alt="{{$locale}}" style="max-width: 15px; display: inline-block; margin-right: 5px;"/>
                {{ strtoupper($locale) }}
            </a>
        </li>
    @endforeach
</ul>

<style>
    .language__text {
        display: flex;
        align-items: center;
    }

</style>
