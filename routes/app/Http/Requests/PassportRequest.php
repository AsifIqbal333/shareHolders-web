<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassportRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'passport_expiry' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'passport_number' => ['required', 'string'],
            'issue_country' => ['required', 'string'],
            'passport_image' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ];
    }
}
