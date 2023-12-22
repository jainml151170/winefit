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
        Schema::create('wine_machines', function (Blueprint $table) {
            $table->id();
            $table->string("machine_sn")->comment("Wine Machine Serial Number");
            $table->integer("price")->nullable()->comment("Wine Machine Price");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wine_machines');
    }
};