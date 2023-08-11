@extends('admin.layouts.admin')

@section('title', "Оновити Meta теги {$route}")

@section('head')
@endsection


@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => "Оновити Meta теги  {$route}"])
    <section class="content">
        <div class="container-fluid">
            <form action="{{ route('meta.update', $route) }}" method="POST">
                @csrf
                @method('put')
                <input type="text" name="route" value="{{ $route }}" style="display: none;">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="en_title" class="form-label">Title EN</label>
                            <input type="text" class="form-control  @error('en_title') is-invalid @enderror" name="en_title"
                                id="en_title" value='{{ old('en_title', $meta_en->title) }}' required>
                            @include('includes.show-error', ['name' => 'en_title'])
                        </div>
                        <div class="mb-3">
                            <label for="en_description" class="form-label">Description EN</label>
                            <textarea name="en_description" id="en_description" rows="6"
                                class="form-control @error('en_description') is-invalid @enderror" required>{{ old('en_description', $meta_en->description) }}</textarea>
                            @include('includes.show-error', ['name' => 'en_description'])
                        </div>
                        <div class="mb-3">
                            <label for="en_keywords" class="form-label">Keywords EN</label>
                            <input type="text" class="form-control  @error('en_keywords') is-invalid @enderror"
                                name="en_keywords" id="en_keywords" value='{{ old('en_keywords', $meta_en->keywords) }}'>
                            @include('includes.show-error', ['name' => 'en_keywords'])
                        </div>
                        <div class="mb-3">
                            <label for="en_lang" class="form-label">Lang EN</label>
                            <input type="text" class="form-control  @error('en_lang') is-invalid @enderror" name="en_lang"
                                id="en_lang" value='{{ old('en_lang', $meta_en->lang) }}' required>
                            @include('includes.show-error', ['name' => 'en_lang'])
                        </div>
                    </div>
    
                    <div class="col">
                        <div class="mb-3">
                            <label for="ua_title" class="form-label">Title UA</label>
                            <input type="text" class="form-control @error('ua_title') is-invalid @enderror" name="ua_title"
                                id="ua_title" value='{{ old('ua_title', $meta_ua->title) }}' required>
                            @include('includes.show-error', ['name' => 'ua_title'])
                        </div>
                        <div class="mb-3">
                            <label for="ua_description" class="form-label">Description UA</label>
                            <textarea name="ua_description" id="ua_description" rows="6"
                                class="form-control @error('ua_description') is-invalid @enderror" required>{{ old('ua_description', $meta_ua->description) }}</textarea>
                            @include('includes.show-error', ['name' => 'ua_description'])
                        </div>
                        <div class="mb-3">
                            <label for="ua_keywords" class="form-label">Keywords UA</label>
                            <input type="text" class="form-control @error('ua_keywords') is-invalid @enderror"
                                name="ua_keywords" id="ua_keywords" value='{{ old('ua_keywords', $meta_ua->keywords) }}'>
                            @include('includes.show-error', ['name' => 'ua_keywords'])
                        </div>
    
                        <div class="mb-3">
                            <label for="ua_lang" class="form-label">Lang UA</label>
                            <input type="text" class="form-control @error('ua_lang') is-invalid @enderror" name="ua_lang"
                                id="ua_lang" value='{{ old('ua_lang', $meta_ua->lang) }}' required>
                            @include('includes.show-error', ['name' => 'ua_lang'])
                        </div>
                    </div>
                </div>
                
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary mb-3 align-content-center col-4">Оновити</button>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('admin_js')
@endsection
