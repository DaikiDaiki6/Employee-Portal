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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->date('date');
            $table->decimal('salary');
            $table->decimal('lvt_pay', 10, 2)->nullable();
            $table->decimal('pera', 10, 2)->nullable();
            $table->decimal('absences', 10, 2)->nullable();
            $table->decimal('amount_earned', 10, 2)->nullable();
            $table->decimal('gsis_deduction', 10, 2)->nullable();
            $table->decimal('wtax', 10, 2)->nullable();
            $table->decimal('philhealth', 10, 2)->nullable();
            $table->decimal('pag_ibig', 10, 2)->nullable();
            $table->decimal('plmpcci', 10, 2)->nullable();
            $table->decimal('landbank', 10, 2)->nullable();
            $table->decimal('maxicare', 10, 2)->nullable();
            $table->decimal('study_grant', 10, 2)->nullable();
            $table->decimal('other_deductions', 10, 2)->nullable();
            $table->decimal('net_pay', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
