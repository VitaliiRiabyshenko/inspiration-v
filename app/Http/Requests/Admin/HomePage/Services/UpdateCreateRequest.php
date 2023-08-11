<?php

namespace App\Http\Requests\Admin\HomePage\Services;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCreateRequest extends FormRequest
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
            'en_title' => 'required|string|min:3|max:255',
            'ua_title' => 'required|string|min:3|max:255',
            'en_description' => 'required|string|max:10000',
            'ua_description' => 'required|string|max:10000',
        ];
    }

    // public function attributes()
    // {
    //     return [
    //         'full_name' => __('attr.full_name'),
    //         'email' => __('attr.email'),
    //         'select_country' => __('attr.select_country'),
    //         'type_visa' => __('attr.type_visa'),
    //     ];
    // }
}
