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
        Schema::create('wine_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('machine_sn');
            $table->integer('wine_id');
            $table->integer('card_id');
            $table->string('dose');
            $table->bigInteger('price');
            $table->boolean('wine_order_status');
            $table->text('comments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wine_orders');
    }
};
