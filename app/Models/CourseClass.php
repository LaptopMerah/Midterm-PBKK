<?php

namespace App\Models;

use App\Models\Lecturer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseClass extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lecturer(): HasMany
    {
        return $this->hasMany(Lecturer::class, 'class_id', 'id');
    }
    public function teaching_assistant(): HasMany
    {
        return $this->hasMany(TeachingAssistant::class, 'class_id', 'id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function academic_year(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id', 'id');
    }
    public function time_shift(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'time_shift_id', 'id');
    }
}
