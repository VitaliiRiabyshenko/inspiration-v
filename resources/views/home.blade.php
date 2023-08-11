@extends('layouts.app')

@section('lang', "$meta->lang")

@section('head_seo')
    @include('includes.meta-tags', $meta)
    <link rel="stylesheet" href="{{ asset('admin_p/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="alternate" hreflang="uk-ua" href="{{ route('home-locale', 'ua') }}">
	<link rel="alternate" hreflang="en-gb" href="{{ route('home-locale', 'en') }}">
    <link rel="canonical" href="{{ route('home') }}">
@endsection

@section('content')
    <div class="container" id="about_us">
        <h2 class="mt-5">{{ __('home.our_advantages') }}</h2>
        <div class="advantages">
            @foreach ($advantages as $advantage)
                <div>
                    <div class="advantage">
                        <div>
                            <span class="svg-icon"></span>
                            <h3>{{ $advantage->title }}</h3>
                        </div>
                        <p>{{ $advantage->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container" id="visa_categories">
        <h2 class="mt-5">{{ __('home.visa_categories') }}</h2>
        <div class="mt-3">
            @foreach ($visa_categories as $country => $visa_category)
                <button type="button" class="collapsible mt-2">
                    <span class="icon-flag {{ $country }}"></span>
                    <span>{{ __('home.countries.' . $country) }}</span>
                </button>
                <div class="content">
                    @foreach ($visa_category as $item)
                        <h5>{{ $item['title'] }}</h5>
                        <p>{{ $item['description'] }}</p>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <div class="container" id="services">
        <h2 class="mt-5">{{ __('home.services') }}</h2>
        <div class="services">
            @foreach ($services as $service)
                <div class="services-box">
                    <div>
                        <h3>{{ $service['title'] }}</h3>
                        <div class="custom-ul">
                            {!! $service['description'] !!}
                        </div>
                    </div>
                    {{-- <button class="btn page-big-button"><a href="{{ $service['link'] }}" target="_blank">{{ __('home.fill_out_the_form') }}</a></button> --}}

                    <button class="btn page-big-button mb-4" data-bs-toggle="modal"
                        data-bs-target="#modalServiceForm">{{ __('home.fill_out_the_form') }}</button>
                </div>
            @endforeach
        </div>
    </div>
    @include('includes.form.application')


    <div class="container mt-5" id="reviews">
        <h2 class="mt-5 main-text-clr">{{ __('home.reviews') }}</h2>

        <div class="reviews">
            @foreach ($reviews as $review)
                <a data-fancybox data-src="{{ asset($review->image_path) }}">
                    <img class="reviews-img" src="{{ asset($review->image_path) }}"
                        alt="{{ __('home.review') }}-{{ $review->id }}">
                </a>
            @endforeach
        </div>
    </div>

    <div class="container mt-5" id="visa">
        <h2 class="mt-5 main-text-clr">{{ __('home.ur_visa') }}</h2>

        <div class="ur_visa">
            @foreach ($visas_img as $visa_img)
                <a data-fancybox data-src="{{ asset($visa_img->image_path) }}">
                    <img class="reviews-img" src="{{ asset($visa_img->image_path) }}"
                        alt="{{ __('home.visa') }}-{{ $visa_img->id }}">
                </a>
            @endforeach
        </div>
    </div>
@endsection

@section('toast')
    @if ($message = Session::get('success'))
        <div id="toastContainer" class="toast-container position-fixed bottom-0 end-0 m-5" aria-live="polite">
            <div role="alert" aria-live="assertive" aria-atomic="true" class="toast bg-primary" data-bs-autohide="true"
                data-bs-delay="5000">
                <div class="toast-header">
                    <img class="rounded mr-2" src="{{ asset('/img/icon/logo-black.svg') }}" alt="Inspiration Logo" height="30"
                        width="30">
                    <strong class="me-auto"> {{ config('app.name') }}</strong>
                    <button type="button" class="btn-close ms-2" data-bs-dismiss="toast" aria-label="Close"
                        style="filter: unset;"></button>
                </div>
                <div class="toast-body text-white">{{ $message }}</div>
            </div>
        </div>
    @endif
@endsection


@section('script')
    <script>
        // категорії віз collaps
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.display === "block") {
                    content.style.display = "none";
                } else {
                    content.style.display = "block";
                }
            });
        }

        //карусель для reviews
        $(document).ready(function() {
            $('.reviews, .ur_visa').slick({
                dots: false,
                infinite: false,
                variableWidth: false,
                lazyLoad: 'ondemand',
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [{
                    breakpoint: 1025,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                }, {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                }]
            });

            //збільшення фото
            Fancybox.bind('[data-fancybox]', {
                //
            });

            // показувати форму, якщо є помилки
            var errors = document.getElementsByClassName('text-danger')
            if (errors.length !== 0) {
                $('#modalServiceForm').modal('show');
            }

            // окно увeдомлений
            $('.toast').toast('show');
        });
    </script>
@endsection
