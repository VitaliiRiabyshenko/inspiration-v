@extends('layouts.app')

@section('head_seo')
    @include('includes.meta-tags', $meta)
    <link rel="alternate" hreflang="en-gb" href="{{ route('oferta', 'en') }}">
    <link rel="alternate" hreflang="uk-ua" href="{{ route('oferta', 'ua') }}">
    <link rel="canonical" href="{{ route('oferta', app()->getLocale()) }}">
@endsection

@section('content')
    <div class="container oferta">
        {!! $text !!}
    </div>
@endsection