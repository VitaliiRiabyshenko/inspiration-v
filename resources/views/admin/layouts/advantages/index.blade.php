@extends('admin.layouts.admin')

@section('title', 'Переваги')

@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Переваги'])

    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.table', ['data' => $advantages, 'action' => 'advantages'])
        </div>
    </section>
@endsection

@section('admin_js')
@endsection
