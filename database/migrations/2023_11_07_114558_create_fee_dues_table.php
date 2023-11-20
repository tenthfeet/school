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
    public function up()
    {
        Schema::create(config('table.fee_dues'), function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedMediumInteger('academic_year_id');
            $table->unsignedMediumInteger('academic_standard_id');
            $table->unsignedSmallInteger('term_id');
            $table->string('id_no');
            $table->mediumInteger('total_amount');
            $table->mediumInteger('paid_amount');
            $table->mediumInteger('pending_amount');
            $table->boolean('is_penalty_applied');
            $table->mediumInteger('penalty_amount')->nullable();
            $table->date('next_due_date')->nullable();
            $table->boolean('is_partial_payment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(config('table.fee_dues'));
    }
};
