<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectFormRequest extends FormRequest
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
            'slug' => ['nullable','string','max:255', Rule::unique('projects','slug')->ignore($this->project?->id ?? null)],
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'project_category_id' => 'nullable|exists:project_categories,id',
            'overview' => 'nullable|array',
            'feature_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'main_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
            'gallery.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ];
    }
}