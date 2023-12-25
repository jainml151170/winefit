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
        Schema::create('wines', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('machine_id');
            $table->string('wine_name');
            $table->string('wine_winery');
            $table->string('wine_tipologia');
            $table->string('wine_graps');
            $table->string('wine_region');
            $table->string('wine_country');
            $table->string('wine_image');
            $table->string('wine_alcohol');
            $table->string('wine_year');
            $table->text('wine_description');
            $table->integer('wine_price_low');
            $table->integer('wine_price_mid');
            $table->integer('wine_price_full');
            $table->string('wine_level_low');
            $table->string('wine_level_mid');
            $table->string('wine_level_full');
            $table->string('wine_temperature_service');
            $table->string('wine_temperature_tolerance');
            $table->string('wine_value_bottle');
            $table->string('wine_value_tolerance');
            $table->string('wine_value_correction');
            $table->timestamp('wine_days_opened');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wines');
    }
};
