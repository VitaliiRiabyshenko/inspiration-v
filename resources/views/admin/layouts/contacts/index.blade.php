@extends('admin.layouts.admin')

@section('title', 'Контакти')

@section('content')
    @include('admin.includes.index.content-header', ['mainTitle' => 'Контакти'])

    <section class="content">
        <div class="container-fluid">
            <form class="col-sm-6" action="{{ route('contacts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Пошта</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email"
                        id="email" value='{{ old('email', $contacts['email'][0]['link']) }}' required>
                    @include('includes.show-error', ['name' => 'email'])
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Номер телефону</label>
                    <input type="phone" class="form-control  @error('phone') is-invalid @enderror" name="phone"
                        id="phone" value='{{ old('phone', $contacts['phone'][0]['link']) }}' required>
                    @include('includes.show-error', ['name' => 'phone'])
                </div>
                <div class="mb-3">
                    <label for="instagram" class="form-label">Instagram</label>
                    <input type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram"
                        id="instagram" value='{{ old('instagram', $contacts['instagram'][0]['link']) }}' required>
                    @include('includes.show-error', ['name' => 'instagram'])
                </div>
                <div class="mb-3">
                    <label for="telegram" class="form-label">Telegram</label>
                    <input type="text" class="form-control @error('telegram') is-invalid @enderror" name="telegram"
                        id="telegram" value='{{ old('telegram', $contacts['telegram'][0]['link']) }}' required>
                    @include('includes.show-error', ['name' => 'telegram'])
                </div>
                <div class="mb-3">
                    <label for="whatsapp" class="form-label">Whatsapp</label>
                    <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp"
                        id="whatsapp" value='{{ old('whatsapp', $contacts['whatsapp'][0]['link']) }}' required>
                    @include('includes.show-error', ['name' => 'whatsapp'])
                </div>
                <div class="mb-3">
                    <label for="viber" class="form-label">Viber</label>
                    <input type="text" class="form-control @error('viber') is-invalid @enderror" name="viber"
                        id="viber" value='{{ old('viber', $contacts['viber'][0]['link']) }}' required>
                    @include('includes.show-error', ['name' => 'viber'])
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