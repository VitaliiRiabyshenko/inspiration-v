@if($meta)
    <meta charset="UTF-8">
    <title>{{ $meta->title }} | {{ config('app.name') }}</title>
    <meta name="description" content="{{ $meta->description }}">
    <meta name="keywords" content="{{ $meta->keywords }}">
    <meta property="og:description" content="{{ $meta->description }}">
    <meta property="og:title" content="{{ $meta->title }} | {{ config('app.name') }}">
    <meta property="og:url" content="">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="D0ckfender">
    <meta name="generator" content="Visual Studio Code x64">
    <meta property="og:locale" content="{{ $meta->lang }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ config('app.name') }}">
    <meta property="og:image" content="{{ asset('img/icon/favicon.png') }}">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="180">
    <meta property="og:image:height" content="60">
    <meta name="theme-color" content="#FFFFFF">
    <meta name="msapplication-navbutton-color" content="#FFFFFF">
    <meta name="apple-mobile-web-app-status-bar-style" content="white-translucent">
    <link rel="icon" type="image/svg+xml" href="{{ asset('img/icon/favicon.svg') }}">
@endif