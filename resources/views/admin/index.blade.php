@extends('admin.layouts.admin')

@section('title', 'Заявки')


@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Заявки'])

    <section class="content">
        <div class="container-fluid">
            <div class="table-wrapper" style="margin-bottom: 0; margin-top:20px; ">
                <table class="table table-bordered" id='applicationTable'>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Повне ім'я</th>
                            <th scope="col">Відправлено</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Дія</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <tr>
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->full_name }}</td>
                                {{-- <td>{{ $application->email }}</td>
                                <td>{{ __('home.countries.' . $application->country) }}</td>
                                <td>
                                    @foreach (json_decode($application->visa_types) as $type)
                                        {{ $type }};
                                    @endforeach
                                </td> --}}
                                <td>{{ $application->created_at }}</td>
                                <td>{{ $application->application_status }}</td>
                                <td>
                                    <a href="{{ route('user-application.show', $application->id) }}" class="show"
                                        title="Edit" data-toggle="tooltip">
                                        <i class="material-icons">&#xe8f4;</i>
                                    </a>
                                    <a data-url="{{ route('user-application.destroy', $application->id) }}"
                                        data-id="{{ $application->id }}" class="delete remove-record" title="Delete"
                                        data-target="#delete-modal" data-toggle="modal"><i
                                            class="material-icons">&#xE872;</i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('admin.includes.delete-modal')
                {{-- {{ $applications->withQueryString()->links() }} --}}
            </div>
        </div>
    </section>
@endsection

@section('admin_js')
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        // let table = new DataTable('#applicationTable');

        new DataTable('#applicationTable', {
            order: [
                [2, 'desc']
            ]
        });
    </script>
@endsection
