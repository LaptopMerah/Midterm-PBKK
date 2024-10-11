<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function course_class(): HasMany
    {
        return $this->hasMany(CourseClass::class, 'course_id', 'id');
    }
}
