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
        Schema::create('customer_meter', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('customer_id');
            $table->foreignId('meter_id');
            $table->date('since');

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('meter_id')->references('id')->on('meters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_meter');
    }
};
