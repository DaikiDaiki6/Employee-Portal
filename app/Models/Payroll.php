<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'salary',
        'lvt_pay',
        'pera',
        'absences',
        'amount_earned',
        'gsis_deduction',
        'wtax',
        'philhealth',
        'pag_ibig',
        'plmpcci',
        'landbank',
        'maxicare',
        'study_grant',
        'other_deductions',
        'net_pay'
    ];
}
