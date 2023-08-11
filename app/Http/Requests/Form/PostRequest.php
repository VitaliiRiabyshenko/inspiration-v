<?php

namespace App\Http\Requests\Form;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'full_name' => 'required|string|min:3|max:50',
            'email' => 'required|email|min:3|max:255',
            'select_country' => 'required|not_in:0|exists:visa_categories,country',
            'type_visa' => 'required|min:1|exists:visa_types,value',
            'name_a' => '',
            'surname_a' => '',
            'age' => ''
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => __('attr.full_name'),
            'email' => __('attr.email'),
            'select_country' => __('attr.select_country'),
            'type_visa' => __('attr.type_visa'),
        ];
    }
}
