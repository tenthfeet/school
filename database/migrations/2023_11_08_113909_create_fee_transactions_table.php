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
        Schema::create(config('table.fee_transactions'), function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('payment_id');
            $table->date('Paid_date');
            $table->mediumInteger('payment_mode');
            $table->mediumInteger('amount');
            $table->date('ref_no')->nullable();
            $table->mediumInteger('bank_name')->nullable();
            $table->date('document_date')->nullable();
            $table->mediumText('note')->nullable();
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
        Schema::dropIfExists(config('table.fee_transactions'));
    }
};
