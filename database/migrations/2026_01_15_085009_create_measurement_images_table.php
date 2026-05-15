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
        Schema::create('measurement_images', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->foreignId('measurement_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('image_path'); // storage path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('measurement_images');
    }
};
