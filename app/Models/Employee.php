<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $casts = [
        'is_department_head_or_dean' => 'array',
        'emp_image' => 'array',
        'emp_diploma' => 'array',
        'emp_tor' => 'array',
        'emp_cert_of_trainings_seminars' => 'array',
        'emp_auth_copy_of_csc_or_prc' => 'array',
        'emp_auth_copy_of_prc_board_rating' => 'array',
        'emp_med_certif' => 'array',
        'emp_nbi_clearance' => 'array',
        'emp_psa_birth_certif' => 'array',
        'emp_psa_marriage_certif' => 'array',
        'emp_service_record_from_other_govt_agency' => 'array',
        'emp_approved_clearance_prev_employer' => 'array',
        'other_documents' => 'array'
    ];
    
}
