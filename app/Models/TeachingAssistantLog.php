<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TeachingAssistantLog extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected function casts(): array
    {
        return [
            'date' => 'date',
            'confirmed_at' => 'datetime',
            'is_confirmed' => 'boolean'
        ];
    }

    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(Lecturer::class, 'lecture_confirmation_id', 'id');
    }

    public function teaching_assistant(): BelongsTo
    {
        return $this->belongsTo(TeachingAssistant::class, 'teaching_assistant_id', 'id');
    }
}