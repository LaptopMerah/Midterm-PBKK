<?php

namespace App\Http\Requests;

use App\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;

class StoreTeachingAssistantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->user_type == UserType::STUDENT;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'class_id' => 'required|integer|exists:course_classes,id',
            'gpa' => 'required|decimal:1|min:0|max:4',
            'is_available' => 'required|boolean',
            'lecturer_recommendation_id'=>'nullable|integer|exists:lecturer_recommendations,id',
            'recommendation_proof'=>'required_with:lecturer_recommendation_id|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
