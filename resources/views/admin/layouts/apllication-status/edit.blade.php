@extends('admin.layouts.admin')

@section('title', 'Оновити статус')

@section('head')
@endsection


@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Оновити перевагу'])
    <section class="content">
        <div class="container-fluid">
            <form class="col-sm-6" action="{{ route('application-status.update', [$status->id]) }}" method="post">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="status" class="form-label">Статус</label>
                    <input type="text" class="form-control  @error('status') is-invalid @enderror" name="status"
                        id="status" value='{{ old('status', $status->status) }}' required>
                    @include('includes.show-error', ['name' => 'status'])
                </div>
                
                <div class="row justify-content-center">
                    <button type="submit" class="btn btn-primary mb-4 align-content-center col-4">Оновити</button>
                </div>
            </form>
        </div>
    </section>
@endsection
