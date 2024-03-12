<div class="top-header-area bg-111111">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="top-header-left-content">
                    <ul>
                        <li>
                            <i class="fa-solid fa-phone"></i>
                            <a href="tel:37062023126">+37062023126</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-envelope"></i>
                            <a href="mailto:info@consultusmagnus.com">info@consultusmagnus.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="top-header-right-content">
                    <ul>
                        <li style="cursor: pointer">
                            <i class="fa-solid fa-globe"></i>
                            <select class="form-select" style="cursor: pointer" onchange="changeLanguage(this.value)">
                                @foreach (config('translatable.locales') as $locale)
                                    <option @if (app()->getLocale() == $locale) selected @endif value="{{ strtoupper($locale) }}">
                                        {{ strtoupper($locale) }}
                                    </option>
                                @endforeach
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const changeLanguage = locale => {
        const currentUrl = window.location.origin;
        window.location.href = `${currentUrl}/lang/${locale.toLowerCase()}`
    }
</script>