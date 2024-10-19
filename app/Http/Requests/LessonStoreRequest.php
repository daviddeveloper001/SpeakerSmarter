<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LessonStoreRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:150'],
            'description' => ['required', 'string'],
            'image_uri' => ['nullable', 'string', 'max:255'],
            'content_uri' => ['required', 'string', 'max:255'],
            'pdf_uri' => ['required', 'string', 'max:255'],
        ];
    }
}
