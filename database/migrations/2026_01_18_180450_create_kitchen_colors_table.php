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
        Schema::create('kitchen_colors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('design_id')->constrained('designings')->onDelete('cascade');
            $table->string('upper_cabinet');
            $table->string('riser');
            $table->string('base_cabinet');
            $table->string('handle');
            $table->string('island');
            $table->string('garbage_bin');
            $table->string('vanities');
            $table->string('spice_rack');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kitchen_colors');
    }
};
