<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     */
    public function up(): void
    {
        Schema::table(config('table.users'), function (Blueprint $table) {
            $table->after('password', function (Blueprint $table) {
                $table->string('employee_no');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(config('table.users'), function (Blueprint $table) {
            $table->dropColumn([
                'employee_no',
            ]);
        });
    }
};