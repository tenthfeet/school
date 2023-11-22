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
    public function up(): void
    {
        Schema::table(config('table.exams'), function (Blueprint $table) {
            $table->after('id', function (Blueprint $table) {
                $table->string('name');
                $table->unsignedSmallInteger('subject_id');
                $table->unsignedSmallInteger('class_room_id');

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
                'name',
                'subject_id',
                'class_room_id'
            ]);
        });
    }
};
