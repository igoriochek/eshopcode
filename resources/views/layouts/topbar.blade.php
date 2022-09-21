<div class="header-top header-top-ptb-1 d-lg-block">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 cl-md-6 col-sm-6 col-6">
                <div class="header-info">
                    <ul>
                        <li><a href="page-about.htlm">NUMBER</a></li>
                        <li><a href="page-account.html">ADDRESS</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                <div class="header-info header-info-right">
                    <ul>
                        <li>
                            <a id="navbarDropDown"  class="language-dropdown-active" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"  aria-expanded="false">
                                {{__('messages.chooselang')}} <i class="fi-rs-angle-small-down"></i>
                                <a/>
                                <ul class="language-dropdown" aria-labelledby="navbarDropdown">
                                    @foreach (config('translatable.locales') as $locale)
                                        <li> <a class="dropdown-item"  href="/lang/{{ $locale }}"
                                                class="@if (app()->getLocale() == $locale) border-indigo-400 @endif inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium leading-5 focus:outline-none transition duration-150 ease-in-out">
                                                <img src="{{asset('/images/theme/flag-' . $locale . '.png')}}" alt="{{$locale}}"/>
                                                {{ strtoupper($locale) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
