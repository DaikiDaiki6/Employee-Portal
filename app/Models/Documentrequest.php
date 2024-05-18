<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documentrequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'ref_number',
        'employee_id',
        'position',
        'employement_status',
        'status',
        'date_of_filling',
        'requests',
        'milc_description',
        'other_request',
        'status',
        'date_of_filling',
        'purpose',
        'signature_requesting_party',
        
    ];

    protected $casts = [
        'requests' => 'json',
        'other_documents' => 'json'
    ];
}
