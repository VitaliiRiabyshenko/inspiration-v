@extends('admin.layouts.admin')

@section('title', "Оновити тип візи")

@section('head')
@endsection


@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Оновити тип візи'])
    <section class="content">
        <div class="container-fluid">
            <form class="col-sm-6" action="{{ route('visa-types.update', [$id]) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="en_title" class="form-label">Заголовок EN</label>
                    <input type="text" class="form-control  @error('en_title') is-invalid @enderror" name="en_title"
                        id="en_title" value='{{ old('en_title', $visa_type_en->title) }}' required>
                    @include('includes.show-error', ['name' => 'en_title'])
                </div>
                <div class="mb-3">
                    <label for="ua_title" class="form-label">Заголовок UA</label>
                    <input type="text" class="form-control @error('ua_title') is-invalid @enderror" name="ua_title"
                        id="ua_title" value='{{ old('ua_title', $visa_type_ua->title) }}' required>
                    @include('includes.show-error', ['name' => 'ua_title'])
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary mb-4 align-content-center col-4">Оновити</button>
                </div>
            </form>
        </div>
    </section>
@endsection
