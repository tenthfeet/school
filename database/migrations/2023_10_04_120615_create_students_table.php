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
        Schema::create(config('table.students'), function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('parent_info_id');
            $table->string('id_no');
            $table->string('name');
            $table->boolean('gender');
            $table->date('date_of_birth');
            $table->date('date_of_joining');
            $table->string('aadhar_no')->nullable();
            $table->tinyInteger('blood_group')->nullable();
            $table->tinyInteger('mother_tounge_id');
            $table->string('photo_path')->nullable();
            $table->boolean('has_sibling')->default(0);
            $table->unsignedMediumInteger('sibling_id')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->tinyInteger('student_status_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('table.students'));
    }
};
