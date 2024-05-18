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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('training_title');
            $table->string('training_information');
            $table->string('training_photo')->nullable();
            // $table->string('pre_test_title');
            // $table->string('post_test_title');
            // $table->string('pre_test_description');
            // $table->string('post_test_description');
            // $table->json('pre_test_questions');
            // $table->json('post_test_questions');
            $table->string('host');
            $table->boolean('is_featured');
            $table->json('visible_to_list');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
