<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TeachingAssistant extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(CourseClass::class, 'class_id', 'id');
    }

    public function ta_data(): HasOne
    {
        return $this->hasOne(TeachingAssistant::class, 'teaching_assistant_id', 'id');
    }

    public function ta_logs(): HasMany
    {
        return $this->hasMany(
            TeachingAssistant::class,
            'teaching_assistant_id',
            'id'
        );
    }
}
