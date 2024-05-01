<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studypermit extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'application_date',
        'start_period_cover',
        'end_period_cover',
        'degree_prog_and_school',
        'load',
        'total_teaching_load',
        'total_aggregate_load',
        'applicant_signature',
        'status',
        'total_units_enrolled',
        'available_units',
        
        'cover_memo',
        'request_letter',
        'teaching_assignment',
        'summary_of_schedule',
        'certif_of_grades',
        'study_plan',
        'student_faculty_eval',
        'rated_ipcr',

        // Approve Request
        'discount_entitlement',
        'maximum_units',
        'signature_head_office_unit',
        'date_head_office_unit',
        'signature_endorsed_by',
        'date_endorsed_by',
        'signature_recommended_by',
        'date_recommended_by',
        'signature_univ_pres',
        'date_univ_pres',
    ];

    protected $casts = [
        'load' => 'json',
        'cover_memo' => 'array',
        'request_letter' => 'array',
        'teaching_assignment' => 'array',
        'summary_of_schedule' => 'array',
        'certif_of_grades' => 'array',
        'study_plan' => 'array',
        'student_faculty_eval' => 'array',
        'rated_ipcr' => 'array',
        
    ];
}
