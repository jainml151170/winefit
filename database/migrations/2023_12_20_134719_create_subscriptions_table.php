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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->integer('subscription_type_id');
            $table->string('subscription_amount');
            $table->string('subscription_status')->default(0)->comment("0 => disable, 1 =>Enable");
            $table->timestamp('subscription_start_date');
            $table->timestamp('subscription_end_date');
            $table->string('subscription_created_by')->comment('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
