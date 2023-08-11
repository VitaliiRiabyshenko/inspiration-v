<footer class="container-fuild mt-5">
    <div class="container-md footer">
        <div>
            <h4>{{ __('home.contacts_us') }}</h4>
            <h5>{{ $contacts['phone'][0]['link'] }}</h5>
            @include('includes.social-btn')
            <a href="mailto:{{ $contacts['email'][0]['link'] }}" class="a-mail-insp ">travelagency.inspiration@gmail.com</a>
            <a href="{{ route('oferta', app()->getLocale()) }}" class="a-mail-insp a-oferta ">{{ __('home.oferta') }}</a>
        </div>
        <ul class="footer-nav">
            <li><a href="{{ route('home-locale', app()->getLocale()) }}#about_us">{{ __('home.about_us') }}</a></li>
            <li><a href="{{ route('home-locale', app()->getLocale()) }}#visa_categories">{{ __('home.visa_categories') }}</a></li>
            <li><a href="{{ route('home-locale', app()->getLocale()) }}#services">{{ __('home.services') }}</a></li>
            <li><a href="{{ route('home-locale', app()->getLocale()) }}#reviews">{{ __('home.reviews') }}</a></li>
        </ul>
    </div>
    <div class="main-banner mt-3" style="height: 40px"></div>
</footer>