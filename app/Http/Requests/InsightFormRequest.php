<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsightFormRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'outlook_title' => 'nullable|string|max:255',
            'outlook_description' => 'nullable|string',
            'why_title' => 'nullable|string|max:255',
            'why_description' => 'nullable|string',
            'optimistic_title' => 'nullable|string|max:255',
            'optimistic_description' => 'nullable|string',
            'status' => 'nullable|in:draft,published',
            'publish_date' => 'nullable|date',
            'feature_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ];
    }
}