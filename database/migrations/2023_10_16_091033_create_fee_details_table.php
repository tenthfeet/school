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
        Schema::create(config('table.fee_details'), function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->tinyInteger('academic_year_id');
            $table->mediumInteger('academic_standard_id');
            $table->string('fee_id');
            $table->decimal('fee_amount',11,2);
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('table.fee_details'));
    }
};
