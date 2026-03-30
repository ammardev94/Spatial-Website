<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageMetaFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ref_id' => 'required|exists:pages,id',
            'ref_key' => 'required|string|max:255',
            'ref_value' => 'required|string|max:255',
        ];
    }

    /**
     * Customize the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'page_id.required' => 'The page selection is required.',
            'page_id.exists' => 'The selected page does not exist.',
            'ref_key.required' => 'The reference key is required.',
            'ref_value.required' => 'The reference value is required.',
        ];
    }
}
