@extends('admin.layouts.admin')

@section('title', "Категорії віз")

@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Категорії віз'])

    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.table', [ 'data' => $visa_categories, 'action' => 'visa-categories'])
        </div>
    </section>
@endsection

@section('admin_js')
@endsection