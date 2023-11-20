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
        Schema::create(config('table.attendances'), function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->string('id_no');
            $table->date('date');
            $table->unsignedMediumInteger('fore_noon');
            $table->unsignedMediumInteger('after_noon');
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
        Schema::dropIfExists(config('table.attendances'));
    }
};
