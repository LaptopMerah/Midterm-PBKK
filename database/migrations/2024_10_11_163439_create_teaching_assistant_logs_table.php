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
        Schema::create('teaching_assistant_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teaching_assistant_id')->constrained('teaching_assistants', 'id');
            $table->integer('week');
            $table->string('description');
            $table->date('date');
            $table->boolean('is_confirmed')->default(false);
            $table->foreignId('lecture_confirmation_id')->nullable()->constrained('lecturers', 'id');
            $table->dateTime('confirmed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaching_assistant_logs');
    }
};
