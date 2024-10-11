<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AcademicYear extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function courses_class(): HasMany
    {
        return $this->hasMany(CourseClass::class, 'academic_year_id', 'id');
    }
}
