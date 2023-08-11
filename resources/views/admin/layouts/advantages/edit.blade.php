@extends('admin.layouts.admin')

@section('title', 'Оновити перевагу')

@section('head')
@endsection


@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Оновити перевагу'])
    <section class="content">
        <div class="container-fluid">
            <form class="col-sm-6" action="{{ route('advantages.update', [$id]) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="en_title" class="form-label">Заголовок EN</label>
                    <input type="text" class="form-control  @error('en_title') is-invalid @enderror" name="en_title"
                        id="en_title" value='{{ old('en_title', $advantage_en->title) }}' required>
                    @include('includes.show-error', ['name' => 'en_title'])
                </div>
                <div class="mb-3">
                    <label for="en_description" class="form-label">Наповнення EN</label>
                    <textarea name="en_description" id="en_description" rows="6"
                        class="form-control @error('en_description') is-invalid @enderror" required>{{ old('en_description', $advantage_en->description) }}</textarea>
                    @include('includes.show-error', ['name' => 'en_description'])
                </div>
                <div class="mb-3">
                    <label for="ua_title" class="form-label">Заголовок UA</label>
                    <input type="text" class="form-control @error('ua_title') is-invalid @enderror" name="ua_title"
                        id="ua_title" value='{{ old('ua_title', $advantage_ua->title) }}' required>
                    @include('includes.show-error', ['name' => 'ua_title'])
                </div>
                <div class="mb-3">
                    <label for="ua_description" class="form-label">Наповнення UA</label>
                    <textarea name="ua_description" id="ua_description" rows="6"
                        class="form-control @error('ua_description') is-invalid @enderror" required>{{ old('ua_description', $advantage_ua->description) }}</textarea>
                    @include('includes.show-error', ['name' => 'ua_description'])
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary mb-4 align-content-center col-4">Оновити</button>
                </div>
            </form>
        </div>
    </section>
@endsection
