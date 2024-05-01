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
        Schema::create('dailytimerecords', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->date('attendance_date')->default(now());
            $table->time('time_in')->nullable();
            $table->time('time_out')->nullable();
            // $table->string('attendance_type')->nullable();
            $table->boolean('late')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dailytimerecords');
    }
};
