@extends('admin.layouts.admin')

@section('title', "Заявка {$application->id}")


@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => "Заявка {$application->id}"])

    <section class="content">
        <div class="container-fluid">
            <div class="row ml-5">
                <div class="col">
                    <div class="mb-3">
                        <h3>Повне ім'я</h3>
                        <p>{{ $application->full_name }}</p>
                    </div>
                    <div class="mb-3 md-form">
                        <h3>Статус</h3>
                        <select data-id="{{ $application->id }}" class="form-control select-status" name="country" style="width: 250px">
                            @foreach ($statuses as $status)
                                <option value="{{ $status->status }}"
                                    {{ $application->application_status === $status->status ? 'selected' : '' }}>
                                    {{ $status->status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <h3>Електронна пошта</h3>
                        <a class="btn btn-primary w-lg-50 align-center"
                            href="mailto:{{ $application->email }}">{{ $application->email }}</a>
                    </div>
                    <div class="mb-3">
                        <h3>Країна подачі</h3>
                        <p>{{ __('home.countries.' . $application->country) }}</p>
                    </div>
                    <div class="mb-3">
                        <h3>Типи віз</h3>
                        <p>
                            @foreach (json_decode($application->visa_types) as $type)
                                {{ $type }};
                            @endforeach
                        </p>
                    </div>
                    <div class="mb-3">
                        <h3>Відправлено</h3>
                        <p>{{ $application->created_at }}</p>
                    </div>
                </div>
            </div>
            @include('admin.includes.delete-modal')
        </div>
    </section>
@endsection

@section('admin_js')

    <script>
        $(document).ready(function() {
            var id = $("select").attr("data-id");
            $(document).on('change', '.select-status', function() {
                var selected = $(this).val();
                $.ajax({
                    url: `http://inspiration-admin.ua/admin/application/${id}`,
                    type: 'PATCH',
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        application_status: selected
                    },
                    success: function(response) {
                        // console.log(response);
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "showDuration": "300",
                            "hideDuration": "1000000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"](response.success, "Inspiration");
                    },
                    error: function(response) {
                        console.log(response);
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": true,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "showDuration": "300",
                            "hideDuration": "1000000",
                            "timeOut": "5000",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["error"](response.responseJSON.message, "Inspiration");
                    },
                });
            });
        });
    </script>
@endsection
