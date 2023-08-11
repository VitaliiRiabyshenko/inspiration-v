@extends('admin.layouts.admin')

@section('title', "Додати послугу")

@section('head')
@endsection


@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Додати послугу'])
    <section class="content">
        <div class="container-fluid">
            <form class="col-sm-10" action="{{ route('services.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="en_title" class="form-label">Заголовок EN</label>
                            <input type="text" class="form-control  @error('en_title') is-invalid @enderror"
                                name="en_title" id="en_title" value='{{ old('en_title') }}' required>
                            @include('includes.show-error', ['name' => 'en_title'])
                        </div>
                        <div class="mb-3 input-field-en">
                            <label for="en_description_trum" class="form-label">Наповнення EN</label>
                            <textarea name="en_description" class="form-controll" id="en_description_trum" cols="50" rows="10" required>{{ old('en_description') }}</textarea>
                            @include('includes.show-error', ['name' => 'en_description'])
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="ua_title" class="form-label">Заголовок UA</label>
                            <input type="text" class="form-control @error('ua_title') is-invalid @enderror"
                                name="ua_title" id="ua_title" value='{{ old('ua_title') }}' required>
                            @include('includes.show-error', ['name' => 'ua_title'])
                        </div>
                        <div class="mb-3 input-field-ua">
                            <label for="ua_description_trum" class="form-label">Наповнення UA</label>
                            <textarea name="ua_description" class="form-controll" id="ua_description_trum" cols="50" rows="10" required>{{ old('ua_description') }}</textarea>
                            @include('includes.show-error', ['name' => 'ua_description'])
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary mb-4 align-content-center col-4">Зберегти</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('admin_js')
@endsection
