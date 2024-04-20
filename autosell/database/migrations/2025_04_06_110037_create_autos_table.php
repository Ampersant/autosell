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
            $table->text('description');
            $table->double('price')->unsigned();
            $table->foreignId('mark_id')->constrained('marks');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('model_id')->constrained('models');
            $table->foreignId('type_id')->constrained('types');
            $table->foreignId('color_id')->constrained('colors');
            $table->foreignId('tech_data_id')->constrained('tech_datas');
            $table->foreignId('auto_history_id')->constrained('auto_histories');
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
