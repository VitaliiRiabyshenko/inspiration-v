@extends('admin.layouts.admin')

@section('title', 'Додати статус')
@section('head')
@endsection


@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Додати статус'])
    <section class="content">
        <div class="container-fluid">
            <form class="col-sm-6" action="{{ route('application-status.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="status" class="form-label">Статус</label>
                    <input type="text" class="form-control  @error('status') is-invalid @enderror" name="status"
                        id="status" value='{{ old('status') }}' required>
                    @include('includes.show-error', ['name' => 'status'])
                </div>
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary mb-4 align-content-center col-4">Зберегти</button>
                </div>
            </form>
        </div>
    </section>
@endsection
