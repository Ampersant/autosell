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
        Schema::create('techdatas_fuels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('techd_id')->constrained('tech_datas');
            $table->foreignId('fuel_id')->constrained('fuels');

        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
