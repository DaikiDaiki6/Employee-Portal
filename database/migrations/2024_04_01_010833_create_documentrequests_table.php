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
        Schema::create('documentrequests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id');
            $table->string('department_name');
            $table->string('ref_number')->unique();
            $table->string('employment_status');
            $table->string('status')->default('reviewing');
            $table->date('date_of_filling');
            $table->json('requests');
            $table->longText('milc_description')->nullable();
            $table->longText('other_request')->nullable();
            $table->longText('purpose');
            $table->string('signature_requesting_party')->nullable();

            $table->string('certificate_of_employment')->nullable();
            $table->string('certificate_of_employment_with_compensation')->nullable();
            $table->string('service_record')->nullable();
            $table->string('part_time_teaching_services')->nullable();
            $table->string('milc_certification')->nullable();
            $table->string('certificate_of_no_pending_administrative_case')->nullable();
            $table->longText('other_documents')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentrequests');
    }
};
