<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traininganswer extends Model
{
    use HasFactory;

    protected $fillable =  [
        'training_id',
        'pre_test_rating',
        'post_test_rating'
    ];

    protected $casts = [
        'pre_test_answers' => 'json',
        'post_test_answers' => 'json'

    ];
}
