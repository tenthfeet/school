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
        Schema::create(config('table.homeworks'), function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->mediumInteger('class_room_id');
            $table->tinyInteger('subject_id');
            $table->date('date');
            $table->string('homework_detail');
            $table->string('user_id');
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('table.homeworks'));
    }
};
