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
        Schema::create('ipcrs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->string('status')->default('Pending');
            $table->string('ipcr_type');
            $table->date('date_of_filling');
            $table->string('position');
            $table->date('start_period');
            $table->date('end_period');
            $table->string('ratee');
            $table->json('core_functions');
            $table->float('core_rating');
            $table->json('supp_admin_functions');
            $table->float('supp_admin_rating');
            $table->float('final_average_rating');
            $table->longText('comments_and_reco')->nullable();
            $table->string('discussed_with')->nullable();
            $table->date('disscused_with_date')->nullable();
            $table->string('assessed_by')->nullable();
            $table->boolean('assessed_by_verdict')->nullable();
            $table->date('assessed_by_date')->nullable();
            $table->float('final_rating')->nullable();
            $table->string('final_rating_by')->nullable();
            $table->boolean('final_rating_by_verdict')->nullable();
            $table->date('final_rating_by_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ipcrs');
    }
};
