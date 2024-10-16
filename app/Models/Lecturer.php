<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Lecturer extends Pivot
{
    public $incrementing = true;

    public function ta_registration(): HasMany
    {
        return $this->hasMany(TeachingAssistant::class, 'lecturer_recommendation_id', 'id');
    }

    public function ta_logs(): HasMany
    {
        return $this->hasMany(TeachingAssistantLog::class, 'lecture_confirmation_id', 'id');
    }
}
