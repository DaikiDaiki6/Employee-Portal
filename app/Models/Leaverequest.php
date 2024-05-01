<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaverequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'date_of_filing',
        'position_type',
        'salary',
        'status',
        'type_of_leave',
        'type_of_leave_sub_category',
        'type_of_leave_description',
        'num_of_days_work_days_applied',
        'inclusive_start_date',
        'inclusive_end_date',
        'commutation',
        'commutation_signature_of_appli',
        
        // Approve requests
        'total_earned_vaca',
        'less_this_appli_vaca',
        'balance_vaca',
        'total_earned_sick',
        'less_this_appli_sick',
        'balance_sick',
        'as_of_filling',
        'auth_off_sig_a',
        'status',
        'status_description',
        'auth_off_sig_b',
        'days_with_pay',
        'days_without_pay',
        'others',
        'disapprove_reason',
        'auth_off_sig_c&&d'
    ];
}
