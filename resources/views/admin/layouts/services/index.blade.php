@extends('admin.layouts.admin')

@section('title', "Послуги")

@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Послуги'])

    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.table', ['data' => $services, 'action' => 'services'])
        </div>
    </section>
@endsection

@section('admin_js')
@endsection
