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
        Schema::create(config('table.exams'), function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedTinyInteger('exam_category_id');
            $table->unsignedTinyInteger('medium_of_study_id');
            $table->date('date');
            $table->string('session');
            $table->string('subject');
            $table->string('class_name_id');
            $table->string('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('table.exams'));
    }
};
