<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TimeShift extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function class(): HasMany
    {
        return $this->hasMany(CourseClass::class, 'time_shift_id', 'id');
    }
}
