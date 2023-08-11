@extends('admin.layouts.admin')

@section('title', "$title")

@section('head')
@endsection

@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => "$title"])

    <section class="content">
        <div class="container-fluid pb-3">
            <div class="d-flex">
                <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#addImgModal">
                    Додати {{ $title }}
                </button>
                <div id="submit-container" class="ml-3" style="display: none;">
                    <input type='button' class="btn btn-success" value='Зберегти порядок' id='submit' />
                </div>
            </div>

            <div id="gallery">
                <div id="image-container">
                    <ul id="image-list">
                        @foreach ($images as $img)
                            <li id="image_{{ $img->id }}">
                                <div class="image-area">
                                    <img src="{{ asset($img->image_path) }}"
                                        alt="{{ asset($action) }}-{{ asset($img->id) }}">
                                    <a data-url="{{ route($action . '.destroy', $img->id) }}" data-id="{{ $img->id }}"
                                        class="delete remove-record remove-image" title="Delete" data-target="#delete-modal"
                                        data-toggle="modal">&#215;
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>
    </section>
    @include('admin.includes.delete-modal')

    @include('admin.layouts.images.create-modal')

@endsection

@section('admin_js')
    <script>
        $(document).ready(function() {
            // показувати форму, якщо є помилки
            var errors = document.getElementsByClassName('text-danger')
            if (errors.length !== 0) {
                $('#addImgModal').modal('show');
            }

            // переміщення фото
            var dropIndex;
            $("#image-list").sortable({
                update: function(event, ui) {
                    dropIndex = ui.item.index();
                    $("#submit-container").css('display', 'block');
                }
            });

            $('#submit').click(function(e) {
                var imageIdsArray = [];
                $('#image-list li').each(function(index) {
                    var id = $(this).attr('id');
                    var split_id = id.split("_");
                    imageIdsArray.push(split_id[1]);
                });

                $.ajax({
                    url: "{{ route("$action.update") }}",
                    type: 'PATCH',
                    dataType: "json",
                    data: {
                        _token: '{{ csrf_token() }}',
                        imageIds: imageIdsArray
                    },
                    success: function(response) {
                        $("#submit-container").css('display', 'none');
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
                        toastr["error"](response.statusText, "Inspiration");
                    },
                });
                e.preventDefault();
            });
        });
    </script>
@endsection
