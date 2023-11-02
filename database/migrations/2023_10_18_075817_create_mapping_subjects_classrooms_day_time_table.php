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
        Schema::create(config('table.mapping_subjects_classrooms_day_time'), function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->mediumInteger('class_room_id');
            $table->tinyInteger('academic_year_id');
            $table->string('day');
            $table->tinyInteger('class_period_id');
            $table->tinyInteger('subject_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('table.mapping_subjects_classrooms_day_time'));
    }
};
