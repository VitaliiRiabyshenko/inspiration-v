@extends('admin.layouts.admin')

@section('title', 'Статуси заявок')

@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Статуси заявок'])

    <section class="content">
        <div class="container-fluid">
            <div class="table-wrapper" style="margin-bottom: 0; margin-top:20px; ">
                <div class="table-title">
                    <div class="row">
                        <div class="col align-items-end">
                            <a href="{{ route('application-status.create') }}" class="btn btn-info add-new"><i class="fa fa-plus"></i>
                                Додати</a>
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Дія</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statuses as $status)
                            <tr>
                                <td>{{ $status->id }}</td>
                                <td>{{ $status->status }}</td>
                                <td>
                                    <a href="{{ route('application-status.edit', $status->id) }}" class="edit" title="Edit" data-toggle="tooltip"><i
                                            class="material-icons">&#xE254;</i></a>
                                    {{-- <a data-url="{{ route('application-status.destroy', $status->id) }}"
                                    data-id="{{ $status->id }}" class="delete remove-record"
                                    title="Delete" data-target="#delete-modal" data-toggle="modal"><i
                                        class="material-icons">&#xE872;</i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @include('admin.includes.delete-modal')
@endsection

@section('admin_js')
@endsection
