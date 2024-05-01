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
        Schema::create('traininganswers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->string('training_id');
            $table->json('pre_test_answers')->nullable();
            $table->json('post_test_answers')->nullable();
            $table->decimal('pre_test_rating', 10, 2)->nullable();
            $table->decimal('post_test_rating', 10, 2)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traininganswers');
    }
};
