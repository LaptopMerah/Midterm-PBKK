<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lecturer extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ta_registration(): HasMany
    {
        return $this->hasMany(TeachingAssistantData::class, 'lecturer_recommendation_id', 'id');
    }

    public function ta_logs(): HasMany
    {
        return $this->hasMany(TeachingAssistantLog::class, 'lecture_confirmation_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function class(): BelongsTo
    {
        return $this->belongsTo(CourseClass::class, 'class_id', 'id');
    }
}
