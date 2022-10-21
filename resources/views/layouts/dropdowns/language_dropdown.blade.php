<div class="dropdown-menu" aria-labelledby="dropdownCurrency" style="">
    @foreach (config('translatable.locales') as $locale)
        <a class="dropdown-item" href="/lang/{{ $locale }}" style="font-size: .9em"
           class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
            <img src="{{asset('/images/theme/flag-' . $locale . '.png')}}" alt="{{$locale}}" width="18" class="me-1"/>
            {{ strtoupper($locale) }}
        </a>
    @endforeach
</div>
<style>
    .dropdown-menu {
        min-width: 5vw;
        text-align: center;
    }
</style>
