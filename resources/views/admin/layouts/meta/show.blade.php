@extends('admin.layouts.admin')

@section('title', "Meta теги {$route}")


@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => "Meta теги  {$route}"])

    <section class="content">
        <div class="container-fluid">


            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <h3 class="font-weight-bold">Title EN</h3>
                        <p style="font-size: 20px">{{ $meta_en->title }}</p>
                    </div>
                    <div class="mb-3">
                        <h3 class="font-weight-bold">Description EN</h3>
                        <p style="font-size: 20px">{{ $meta_en->description }}</p>
                    </div>
                    <div class="mb-3">
                        <h3 class="font-weight-bold">Keywords EN</h3>
                        <p style="font-size: 20px">{{ $meta_en->keywords }}</p>
                    </div>
                    <div class="mb-3">
                        <h3 class="font-weight-bold">Locale EN</h3>
                        <p style="font-size: 20px">{{ $meta_en->lang }}</p>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <h3 class="font-weight-bold">Title UA</h3>
                        <p style="font-size: 20px" style="font-size: 20px">{{ $meta_ua->title }}</p>
                    </div>
                    <div class="mb-3">
                        <h3 class="font-weight-bold">Description UA</h3>
                        <p style="font-size: 20px">{{ $meta_ua->description }}</p>
                    </div>
                    <div class="mb-3">
                        <h3 class="font-weight-bold">Keywords UA</h3>
                        <p style="font-size: 20px">{{ $meta_ua->keywords }}</p>
                    </div>
                    <div class="mb-3">
                        <h3 class="font-weight-bold">Locale UA</h3>
                        <p style="font-size: 20px">{{ $meta_ua->lang }}</p>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <a href="{{ route('meta.edit', $route) }}" class="edit btn btn-warning m-1" title="Edit"
                    data-toggle="tooltip">
                    <i class="material-icons">&#xE254;</i>
                </a>
                <a data-url="{{ route('meta.destroy', ['route' => $route, 'id' => $id] ) }}" data-id="{{ $id }}"
                    class="delete remove-record btn btn-danger m-1" title="Delete" data-target="#delete-modal"
                    data-toggle="modal">
                    <i class="material-icons">&#xE872;</i>
                </a>
            </div>
            @include('admin.includes.delete-modal')
        </div>
    </section>
@endsection

@section('admin_js')
@endsection
