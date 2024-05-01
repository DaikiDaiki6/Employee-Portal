<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'description',
        'poster',
        'date',
        'start',
        'end',
        'host',
        'visible_to_list',
        'is_featured',
    ];

    protected $casts = [
        'visible_to_list' => 'array',
    ];
    
}
