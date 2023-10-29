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
        Schema::create(config('table.fee_bundles_and_fee_details'), function (Blueprint $table) {
            $table->unsignedMediumInteger('fee_bundle_id');
            $table->unsignedMediumInteger('fee_detail_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('table.fee_bundles_and_fee_details'));
    }
};
