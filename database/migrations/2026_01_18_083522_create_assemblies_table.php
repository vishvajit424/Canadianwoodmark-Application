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
        Schema::create('assemblies', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->foreignId('task_id')->constrained()->cascadeOnDelete();
           $table->foreignId('user_id')->constrained()->cascadeOnDelete();
           $table->json('completed_items'); 
           $table->string('cabinets_size')->nullable();
           $table->text('missing_pieces')->nullable();
           $table->enum('status',['pending', 'completed'])->default('pending');
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assemblies');
    }
};
