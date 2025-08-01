<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            "quantity" => "required|integer|min:1",
            "productId" => "required|integer|exists:products,id",
            "singleProductPrice" => "required|numeric|exists:products,price",
            "imageUrl" => "required|exists:products,image_url",
            "productName" => "required|exists:products,name"
        ];
    }
}
