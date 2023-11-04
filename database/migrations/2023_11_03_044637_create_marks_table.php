<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('table.marks'), function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedMediumInteger('student_admission_id');
            $table->unsignedTinyInteger('academic_year_id');
            $table->unsignedMediumInteger('exam_id');
            $table->unsignedSmallInteger('subject_id');
            $table->unsignedSmallInteger('class_room_id');
            $table->integer('marks');
            $table->integer('maximum_marks');
            $table->integer('pass_marks');
            $table->string('grade_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('table.marks'));
    }
};
