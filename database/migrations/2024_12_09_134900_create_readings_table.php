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
        Schema::create('readings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('reading');
            $table->binary('photo')->nullable();
            $table->string('systemtype');
            $table->foreignId('meter_id');

            $table->foreign('meter_id')->references('id')->on('meters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('readongs');
    }
};
