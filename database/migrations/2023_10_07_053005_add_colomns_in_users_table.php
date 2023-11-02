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
    Schema::table(config('table.users'), function (Blueprint $table) {
        $table->after('password', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_join')->nullable();
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
            'date_of_birth',
            'date_of_join',
        ]);
    });
}
};
