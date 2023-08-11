<header class="container-fuild">
    <div class="container-md d-flex flex-column">
        <div class="social-head">
            @include('includes.social-btn')
            <ul class="header-lang">
                <li>{{ $contacts['phone'][0]['link'] }}</li>
                <li><a href="{{ url()->current() }}?change_language=en" class="icon" style="background-image: url('{{ asset('img/flag/United-Kingdom.svg') }}')"></a></li>
                <li><a href="{{ url()->current() }}?change_language=ua" class="icon" style="background-image: url('{{ asset('img/flag/Ukraine.svg') }}')"></a></li>	
            </ul>
        </div>
        <nav class="header-nav">
            <a href="{{ route('home-locale', app()->getLocale()) }}" class="logo-inspiration"><h1 style="font-weight: 700;">Inspiration</h1></a>
            <input type="checkbox" id="toggler">
            <label for="toggler"><i class="fa fa-bars" aria-hidden="true" style="color: #000000;"></i></label>
            <div class="header-menu">
                <ul class="header-list">
                    <li><a href="{{ route('home-locale', app()->getLocale()) }}#about_us">{{ __('home.about_us') }}</a></li>
                    <li><a href="{{ route('home-locale', app()->getLocale()) }}#visa_categories">{{ __('home.visa_categories') }}</a></li>
                    <li><a href="{{ route('home-locale', app()->getLocale()) }}#services">{{ __('home.services') }}</a></li>
                    <li><a href="{{ route('home-locale', app()->getLocale()) }}#reviews">{{ __('home.reviews') }}</a></li>
                    <li><a href="{{ route('home-locale', app()->getLocale()) }}#visa">{{ __('home.ur_visa') }}</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container-fuild main-banner">
        <div class="container-md banner-first-row">
            <h4 class="text-white">{{ __('home.preparation_for_a_visa_application') }}</h4>
            <div class="banner-countries">
                <div>
                    <img class="rounded" src="{{ asset('img/flag/United-Kingdom.webp') }}" alt="{{ __('home.countries.united_kingdom') }}" style="width: 200px;">
                    <h5>{{ __('home.countries.united_kingdom') }}</h5>
                </div>
                <div>
                    <img class="rounded" src="{{ asset('img/flag/Canada.webp') }}" alt="{{ __('home.countries.canada') }}" style="width: 200px;">
                    <h5>{{ __('home.countries.canada') }}</h5>
                </div>
                <div>
                    <img class="rounded" src="{{ asset('img/flag/United-States-of-America.webp') }}" alt="{{ __('home.countries.usa') }}" style="width: 200px;">
                    <h5>{{ __('home.countries.usa') }}</h5>
                </div>
            </div>
            <div class="banner-second-row">
                <div>
                    <ul class="header-info">
                        <li>{{ __('home.5_years_of_experience') }}</li>
                        <li>{{ __('home.worldwide_application') }}</li>
                    </ul>
                </div>
                <div>
                    <div class="page-big-button">
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSfLA37nL4oJesjER1q9tsl3SOIj_xfby_2KTPrAaJe-U8viQQ/viewform" target="_blank">{{ __('home.leave_a_request') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>