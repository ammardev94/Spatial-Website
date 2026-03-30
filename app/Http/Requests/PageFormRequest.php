<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PageFormRequest extends FormRequest
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
            'title' => 'required|min:2',
            'slug' => 'required|min:2',
            'page_title' => 'required|min:2',
            'page_description' => 'required',
            'canonical_url' => 'required|url',
            'visibility' => 'required|in:no-follow,no-index',
            'status' => 'required|boolean',
            'type' => 'required|boolean',
        ];
    }

    /**
     * Get the custom error messages for validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Please enter a title',
            'title.min' => 'The title must be at least 2 characters long',
            'slug.required' => 'Please enter a slug',
            'slug.min' => 'The slug must be at least 2 characters long',
            'page_title.required' => 'Please enter a page title',
            'page_title.min' => 'The page title must be at least 2 characters long',
            'page_description.required' => 'Please enter a page description',
            'canonical_url.required' => 'Please enter a canonical URL',
            'canonical_url.url' => 'Please enter a valid URL',
            'visibility.required' => 'Please select visibility',
            'visibility.in' => 'Please select a valid visibility option',
            'status.boolean' => 'The status must be a boolean value',
            'type.boolean' => 'The type must be a boolean value',
        ];
    }
}
