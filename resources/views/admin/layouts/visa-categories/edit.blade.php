@extends('admin.layouts.admin')

@section('title', "Оновити категорію віз")

@section('head')
@endsection


@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Оновити категорію віз'])
    <section class="content">
        <div class="container-fluid">
            <form class="col-sm-6" action="{{ route('visa-categories.update', [$visa_category->id]) }}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <p class="form-label" style="font-weight: 700;">{{ __('home.form.select_country') }}</p>
                    <select class="custom-select" name="country" required>
                        <option value="{{ 'united_kingdom' }}" {{ old('country', $visa_category->country) === 'united_kingdom' ? 'selected' : '' }}>
                            {{ __('home.countries.' . 'united_kingdom') }}</option>
                        <option value="{{ 'canada' }}" {{ old('country', $visa_category->country) === 'canada' ? 'selected' : '' }}>
                            {{ __('home.countries.' . 'canada') }}</option>
                        <option value="{{ 'usa' }}" {{ old('country', $visa_category->country) === 'usa' ? 'selected' : '' }}>
                            {{ __('home.countries.' . 'usa') }}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="title" class="form-label">Заголовок</label>
                    <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title"
                        id="title" value='{{ old('title', $visa_category->title) }}' required>
                    @include('includes.show-error', ['name' => 'title'])
                </div>
                <div class="mb-3">
                    <label for="en_description" class="form-label">Наповнення EN</label>
                    <textarea name="en_description" id="en_description" rows="4"
                        class="form-control @error('en_description') is-invalid @enderror" required>{{ old('en_description', $visa_category_en->description) }}</textarea>
                    @include('includes.show-error', ['name' => 'en_description'])
                </div>
                <div class="mb-3">
                    <label for="ua_description" class="form-label">Наповнення UA</label>
                    <textarea name="ua_description" id="ua_description" rows="4"
                        class="form-control @error('ua_description') is-invalid @enderror" required>{{ old('ua_description', $visa_category_ua->description) }}</textarea>
                    @include('includes.show-error', ['name' => 'ua_description'])
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary mb-4 align-content-center col-4">Зберегти</button>
                </div>
            </form>
        </div>
    </section>
@endsection
