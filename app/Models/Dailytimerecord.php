<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dailytimerecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'attendance_date',
        'attendance_details',
        'attendance_type',
    ];
}
