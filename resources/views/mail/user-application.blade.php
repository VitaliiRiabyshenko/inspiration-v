@component('mail::message')
    <h1>Заявка на візу</h1>
    <div class="d-flex flex-column">
        <h3>Ім'я:</h3>
        <p>{{ $application_data->full_name }}</p>
        <h3>Електронна пошта:</h3>
        <p>{{ $application_data->email }}</p>
        <h3>Країна:</h3>
        <p>{{ __('home.countries.'.$application_data->country) }}</p>
        <h3>Типи віз:</h3>
        @foreach (json_decode($application_data->visa_types) as $type)
            <p>{{ $type }}</p>
        @endforeach
        @component('mail::button', ['url' => route('application.show', $application_data->id)])
            Перейти на сторінку заявки
        @endcomponent
    </div>
@endcomponent