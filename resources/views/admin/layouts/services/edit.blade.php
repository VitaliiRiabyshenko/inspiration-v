@extends('admin.layouts.admin')

@section('title', "Оновити послугу")

@section('head')
@endsection


@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Оновити послугу'])
    <section class="content">
        <div class="container-fluid">
            <form class="col-sm-10" action="{{ route('services.update', $id) }}" method="POST">
                @csrf
                @method('put')
                <div class="row">
                    <div class="mr-5">
                        <div class="mb-3">
                            <label for="en_title" class="form-label">Заголовок EN</label>
                            <input type="text" class="form-control  @error('en_title') is-invalid @enderror"
                                name="en_title" id="en_title" value='{{ old('en_title', $service_en->title) }}' required>
                            @include('includes.show-error', ['name' => 'en_title'])
                        </div>
                        <div class="mb-3 input-field-en">
                            <label for="en_description_trum" class="form-label">Наповнення EN</label>
                            <textarea name="en_description" class="form-controll" id="en_description_trum" cols="50" rows="15" required>{{ old('en_description', $service_en->description) }}</textarea>
                            @include('includes.show-error', ['name' => 'en_description'])
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="ua_title" class="form-label">Заголовок UA</label>
                            <input type="text" class="form-control @error('ua_title') is-invalid @enderror"
                                name="ua_title" id="ua_title" value='{{ old('ua_title', $service_ua->title) }}' required>
                            @include('includes.show-error', ['name' => 'ua_title'])
                        </div>
                        <div class="mb-3 input-field-ua">
                            <label for="ua_description_trum" class="form-label">Наповнення UA</label>
                            <textarea name="ua_description" class="form-controll" id="ua_description_trum" cols="50" rows="15" required>{{ old('ua_description', $service_ua->description) }}</textarea>
                            @include('includes.show-error', ['name' => 'ua_description'])
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary mb-4 align-content-center col-4">Оновити</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('admin_js')
@endsection
