<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationsRequest extends FormRequest
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
            "jobId" => "required|exists:occupations,id",
            "fullName" => "required|string",
            "email" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            "fullName.in" => "You must enter a full name",
            "email.in" => "You must enter a valid email address",
        ];
    }
}
