<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('course_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['user_id', 'course_id']); // هر دانش‌آموز فقط یکبار تو یک دوره
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('course_student');
    }
};
