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
        Schema::table(config('table.exams'), function (Blueprint $table) {
            $table->after('subject', function (Blueprint $table) {
                $table->smallInteger('class_room_id');;
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(config('table.exams'), function (Blueprint $table) {
            $table->dropColumn([
                'class_room_id'
            ]);
        });
    }
};
