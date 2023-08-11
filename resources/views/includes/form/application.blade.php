<div class="modal fade" id="modalServiceForm" tabindex="-1" role="dialog" aria-labelledby="modalServiceForm"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">{{ __('home.fill_out_the_form') }}</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form action="{{ route('home-form', app()->getLocale()) }}" method="POST">
                @csrf
                <div class="modal-body mx-3">

                    <div class="mailer-a">
                        <label for="name_a">{{ __('home.form.name_a') }}</label>
                        <input name="name_a" type="text" placeholder="{{ __('home.form.name_a') }}" id="name_a"
                            value="Dockfender">
                    </div>
                    <div class="mailer-a">
                        <label for="surname_a">{{ __('home.form.surname_a') }}</label>
                        <input name="surname_a" type="text" placeholder="{{ __('home.form.surname_a') }}"
                            id="surname_a" value="Panda">
                    </div>
                    <div class="mailer-a">
                        <label for="age_a">{{ __('home.form.age_a') }}</label>
                        <input name="age_a" type="number" placeholder="{{ __('home.form.age_a') }}" id="age_a"
                            value={{ null }}>
                    </div>

                    <div class="md-form mb-4">
                        <i class="fas fa-user prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="full_name"
                            class="mb-1">{{ __('home.form.fullname') }}</label>
                        <input name="full_name" type="text" id="full_name" class="form-control validate"
                            value="{{ old('full_name') }}" required>
                        @include('includes.show-error', ['name' => 'full_name'])
                    </div>

                    <div class="md-form mb-4">
                        <i class="fa fa-envelope"></i>
                        <label data-error="wrong" data-success="right" for="email"
                            class="mb-1">{{ __('home.form.email') }}</label>
                        <input name="email" type="email" id="email" class="form-control validate"
                            value="{{ old('email') }}" required>
                        @include('includes.show-error', ['name' => 'email'])
                    </div>

                    <div class="md-form mb-4">
                        <p class="mb-1"><i class="fa fa-globe"></i> {{ __('home.form.select_country') }}</p>
                        <select class="form-select" name="select_country" required>
                            <option {{ old('select_country') ? '' : 'selected' }} disabled>
                                {{ __('home.form.select') }}</option>
                            @foreach ($visa_categories as $country => $visa_category)
                                <option value="{{ $country }}"
                                    {{ old('select_country') === $country ? 'selected' : '' }}>
                                    {{ __('home.countries.' . $country) }}</option>
                            @endforeach
                        </select>
                        @include('includes.show-error', ['name' => 'select_country'])
                    </div>

                    <div class="md-form mb-4">
                        <p class="mb-1"><i class="fa fa-list"></i> {{ __('home.form.choose_type_visa') }}</p>
                        @foreach ($visa_types as $type)
                            <div class="form-check">
                                <input class="form-check-input" name="type_visa[] " type="checkbox"
                                    value="{{ $type->value }}" id="{{ $type->value }}"
                                    {{ in_array($type->value, old('type_visa', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="{{ $type->value }}">
                                    {{ $type->title }}
                                </label>
                            </div>
                        @endforeach
                        @include('includes.show-error', ['name' => 'type_visa'])
                    </div>
                </div>

                <div class="modal-footer d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary col-10">{{ __('home.form.send') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
