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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string('about');
            $table->string('price');
            $table->string('time');
            $table->string('days');
            $table->string('start_of_class');
            $table->boolean('is_active')->default(false);
            $table->integer('sessions_count')->default(15);
            $table->integer('students_count')->default(14);
            $table->string('prerequisite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
