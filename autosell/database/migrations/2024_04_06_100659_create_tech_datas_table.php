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
        Schema::create('tech_datas', function (Blueprint $table) {
            $table->id();
            $table->integer('year')->unsigned();
            $table->foreignId('form_id')->constrained('forms');
            $table->foreignId('state_id')->constrained('states');
            $table->foreignId('transmission_id')->constrained('transmissions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tech_datas');
    }
};
