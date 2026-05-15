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
        Schema::create('installings', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->foreignId('task_id')->constrained()->cascadeOnDelete();
           $table->foreignId('user_id')->constrained()->cascadeOnDelete();
           $table->string('special_instructions');
           $table->string('missing_stuff');
           $table->enum('status', ['pending', 'complete'])->default('pending');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('installings');
    }
};
