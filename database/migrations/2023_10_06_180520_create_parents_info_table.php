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
        Schema::create(config('table.parents_info'), function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('father_occupation');
            $table->string('mother_occupation');
            $table->string('email');
            $table->unsignedSmallInteger('country_id');
            $table->bigInteger('mobile_no');
            $table->unsignedMediumInteger('state_id');
            $table->unsignedMediumInteger('city_id');
            $table->text('address');
            $table->mediumInteger('pincode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists(config('table.parents_info'));
    }
};
