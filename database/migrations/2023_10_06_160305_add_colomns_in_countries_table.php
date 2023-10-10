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
        Schema::table(config('table.countries'), function (Blueprint $table) {
            $table->after('name',function(Blueprint $table){
                $table->string('iso_code', 3);
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(config('table.countries'), function (Blueprint $table) {
            $table->dropColumn([
                'iso_code'
            ]);
        });
    }
};