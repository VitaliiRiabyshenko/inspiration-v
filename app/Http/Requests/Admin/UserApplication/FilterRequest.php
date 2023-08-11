<?php

namespace App\Http\Requests\Admin\UserApplication;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'application_status' => 'string',
            'full_name' => 'string',
            'email' => 'string',
            'country' => '',
            'visa_types' => '',
        ];
    }
}