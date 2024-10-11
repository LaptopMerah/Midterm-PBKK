<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeachingAssistantData extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'gpa' => 'decimal:1',
            'is_available' => 'boolean',
        ];
    }

    public function lecturer_recommendation(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class, 'lecturer_recommendation_id', 'id');
    }
    public function teaching_assistant(): BelongsTo
    {
        return $this->belongsTo(TeachingAssistant::class, 'teaching_assistant_id', 'id');
    }
}
