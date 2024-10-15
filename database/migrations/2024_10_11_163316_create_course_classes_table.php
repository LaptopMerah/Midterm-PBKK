<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('course_classes', function (Blueprint $table) {
            $table->id();
            $table->char('class_code', 8)->unique();
            $table->string('day', 10);
            $table->integer('class_participant');
            $table->integer('semester');
            $table->foreignId('course_id')->constrained('courses', 'id');
            $table->foreignId('academic_year_id')->constrained('academic_years', 'id');
            $table->foreignId('time_shift_id')->constrained('time_shifts', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_classes');
    }
};
