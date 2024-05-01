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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('title');
            $table->longText('description');
            $table->string('poster');
            $table->date('date');
            $table->time('start');
            $table->time('end');
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
        Schema::dropIfExists('activities');
    }
};
