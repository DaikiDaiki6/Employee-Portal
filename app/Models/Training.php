<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = [
        'pre_test_title',
        'post_test_title',
        'pre_test_description',
        'post_test_description',
        'pre_test_questions',
        'post_test_questions',
        'training_title',
        'training_information',
        'training_photo',
        'can_take_training_list',
    ];

    protected $casts = [
        'pre_test_questions' => 'json',
        'post_test_questions' => 'json',
        'can_take_training_list' => 'array',
        'visible_to_list' => 'array',
      
    ];
}
