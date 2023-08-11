<?php

namespace App\Http\Requests\Admin\MetaTags;

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
            'en_description' => 'required|string|min:3|max:255',
            'ua_description' => 'required|string|min:3|max:255',
            'ua_keywords' => '',
            'en_keywords' => '',
            'ua_lang' => 'required|string|min:3|max:10',
            'en_lang' => 'required|string|min:3|max:10',
            'route' => 'required|string|min:3|max:50'
        ];
    }
}

