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
                $table->smallInteger('country_id');
                $table->string('mobile_no',20);
                $table->unsignedMediumInteger('city_id')->nullable();
                $table->unsignedSmallInteger('state_id')->nullable();
                $table->text('address',1000);
                $table->string('role_id');
                $table->string('qualification');
                $table->boolean('is_active');
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
                'country_id',
                'mobile_no',
                'city_id',
                'state_id',
                'address',
                'role_id',
                'qualification',
                'is_active'
            ]);
        });
    }
};
