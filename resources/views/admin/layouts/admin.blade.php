@include('admin.common.head')

@include('admin.common.header')

<!-- Navbar -->
@include('admin.includes.index.navbar')

@include('admin.includes.index.sidebar')

<div class="content-wrapper">
    @yield('content')
</div>


@if ($message = Session::get('success'))
        @include('admin.includes.succes-toast', ['message' => $message])
@endif

@if ($message = Session::get('fail'))
        @include('admin.includes.fail-toast', ['message' => $message])
@endif

@include('admin.common.footer')