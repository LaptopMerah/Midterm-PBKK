<?php

namespace App\Http\Requests;

use App\Enums\DayType;
use App\Enums\UserType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCourseClassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->user_type == UserType::OPERATOR;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'class_code'=> 'required|string|min:1|max:5',
            'day'=> ['required','string','max:10','min:4',Rule::enum(DayType::class)],
            'class_participants'=> 'required|numeric|min:1|max:500',
            'semester'=> 'required|numeric|min:1|max:14',
            'course_id'=>'required|integer|exists:courses,id',
            'academic_year_id'=>'required|integer|exists:academic_years,id',
            'time_shift_id'=>'required|integer|exists:time_shifts,id',
        ];
    }
}
