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
        Schema::create('teaching_assistant_data', function (Blueprint $table) {
            $table->id();
            $table->float('gpa', 1);
            $table->boolean('is_available');
            $table->string('recommendation_proof')->nullable();
            $table->foreignId('lecturer_recommendation_id')->nullable()->constrained('lecturers', 'id');
            $table->foreignId('teaching_assistant_id')->nullable()->constrained('teaching_assistants', 'id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_assistant_data');
    }
};