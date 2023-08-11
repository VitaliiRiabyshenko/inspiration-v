<?php

namespace App\Http\Requests\Admin\HomePage\VisaTypes;

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
        ];
    }
}
