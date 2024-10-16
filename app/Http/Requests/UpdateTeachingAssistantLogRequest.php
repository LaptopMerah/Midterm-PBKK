<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeachingAssistantLogRequest extends FormRequest
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
            'teaching_assistant_id' => ['required', 'exists:teaching_assistants,id'],
            'week' => ['required', 'numeric', 'between:1,16'],
            'date' => ['required', 'date'],
            'description' => ['required', 'string'],
        ];
    }
}
