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
        Schema::create('designings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('task_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone_no');
            $table->string('lock_code')->nullable();
            $table->string('address')->nullable();
            $table->date('installation_date')->nullable();
            $table->text('material')->nullable();
            $table->text('tape')->nullable();
            $table->text('handle')->nullable();
            $table->string('layout_pdf')->nullable();
            $table->string('updated_pdf')->nullable();
            $table->foreignId('updated_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('updated_pdf_user_role')->nullable();
            $table->text('content')->nullable();
        
            $table->enum('status', ['pending', 'completed'])->default('pending')->index();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designings');
    }
};
