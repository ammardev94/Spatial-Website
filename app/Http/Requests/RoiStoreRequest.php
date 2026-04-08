<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoiStoreRequest extends FormRequest
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
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'purchase_price' => 'required|string|max:255',
            'renovation_budget' => 'required|string|max:255',
            'target_sale_price' => 'required|string|max:255',
            'timeline' => 'required|string|max:255',
        ];
    }
}