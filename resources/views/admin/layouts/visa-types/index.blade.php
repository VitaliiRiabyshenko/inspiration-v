@extends('admin.layouts.admin')

@section('title', "Типи віз")

@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Типи віз'])

    <section class="content">
        <div class="container-fluid">
            @include('admin.includes.table', [ 'data' => $visa_types, 'action' => 'visa-types'])
        </div>
    </section>
@endsection

@section('admin_js')
@endsection