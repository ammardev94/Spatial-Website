<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoiRequestRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'purchase_price' => 'required',
            'renovation_budget' => 'required',
            'plot_size' => 'required',
            'target_sale_price' => 'required',
            'timeline' => 'required|string|max:255',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'full_name.required' => 'Full name is required.',
            'full_name.string' => 'Full name must be a text string.',
            'full_name.max' => 'Full name cannot exceed 255 characters.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email cannot exceed 255 characters.',
            'purchase_price.required' => 'Property Address is required.',
            'renovation_budget.required' => 'Renovation budget range is required.',
            'renovation_budget.string' => 'Renovation budget must be a text value.',
            'renovation_budget.max' => 'Renovation budget cannot exceed 255 characters.',
            'target_sale_price.required' => 'Built Up Area Size is required.',
            // 'target_sale_price.numeric' => 'Target sale price must be a valid number.',
            // 'target_sale_price.min' => 'Target sale price must be greater than or equal to 0.',
            'timeline.required' => 'Timeline is required.',
            'timeline.string' => 'Timeline must be a text value.',
            'timeline.max' => 'Timeline cannot exceed 255 characters.',
        ];
    }
}
