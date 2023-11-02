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
        Schema::create(config('table.class_rooms'), function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->mediumInteger('academic_standard_id');
            $table->tinyInteger('department_id')->nullable();
            $table->string('section')->nullable();
            $table->string('name');
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('table.class_rooms'));
    }
};
