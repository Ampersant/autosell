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
        Schema::create('autos', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('mark_id');
            $table->unsignedInteger('model_id');
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('tech_data_id');
            $table->unsignedInteger('auto_history_id');
            $table->text('description');
            $table->foreignId('mark_id')->references('marks')->on('id');
            $table->foreignId('model_id')->references('models')->on('id');
            $table->foreignId('type_id')->references('types')->on('id');
            $table->foreignId('tech_data_id')->references('tech_datas')->on('id');
            $table->foreignId('auto_history_id')->references('auto_histories')->on('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('autos');
    }
};
