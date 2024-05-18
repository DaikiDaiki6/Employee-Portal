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
        Schema::create('studypermits', function (Blueprint $table) {
            $table->id();
              
            // Info
            $table->foreignId('employee_id');
            $table->string('department_name');
            $table->date('application_date');
            $table->date('start_period_cover');
            $table->date('end_period_cover');
            $table->longText('degree_prog_and_school');
            $table->json('load');
            $table->string('total_teaching_load')->nullable();
            $table->string('total_aggregate_load')->nullable();
            $table->string('applicant_signature');
            $table->string('status')->default('reviewing');
            $table->decimal('total_units_enrolled', 10, 2)->nullable();
            $table->decimal('available_units', 10, 2)->nullable();
            

            // Documents
            $table->json('cover_memo');
            $table->json('request_letter');
            $table->json('teaching_assignment')->nullable();
            $table->json('summary_of_schedule');
            $table->json('certif_of_grades')->nullable();
            $table->json('study_plan')->nullable();
            $table->json('student_faculty_eval')->nullable();
            $table->json('rated_ipcr');

            // Approve requests
            $table->decimal('discount_entitlement', 10, 2)->nullable();
            $table->integer('maximum_units')->nullable();
            $table->string('signature_head_office_unit')->nullable();
            $table->date('date_head_office_unit')->nullable();
            $table->string('signature_endorsed_by')->nullable();
            $table->date('date_endorsed_by')->nullable();
            $table->boolean('verdict_recommended_by')->nullable();
            $table->boolean('verdict_endorsed_by')->nullable();
            $table->string('signature_recommended_by')->nullable();
            $table->date('date_recommended_by')->nullable();
            $table->string('signature_univ_pres')->nullable();
            $table->date('date_univ_pres')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studypermits');
    }
};
