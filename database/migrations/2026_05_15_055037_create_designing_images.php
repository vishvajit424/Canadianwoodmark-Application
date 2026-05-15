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
        Schema::create('designing_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('designing_id')
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
        Schema::dropIfExists('designing_images');
    }
};
