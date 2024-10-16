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
        Schema::create('teaching_assistants', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_accepted')->default(false);
            $table->float('gpa', 1);
            $table->boolean('is_available');
            $table->foreignId('lecturer_recommendation_id')->nullable()->constrained('lecturers', 'id');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->foreignId('class_id')->constrained('course_classes', 'id');
            $table->string('recommendation_proof')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_assistants');
    }
};
