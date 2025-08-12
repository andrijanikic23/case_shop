<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchJobRequest extends FormRequest
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
            "keywords" => "required",
            "type" => "exists:occupations,type",
            "department" => "exists:occupations,id"
        ];
    }

    public function messages(): array
    {
        return [
            "keywords.in" => "Keywords field must be filled",
            "type.in" => "Allowed values are: full-time, part-time, internship",
        ];
    }
}
